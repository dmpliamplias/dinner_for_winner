<?php

namespace App\Http\Controllers\Calendar;

use App\Calendar;
use App\Day;
use App\Daytime;
use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $existingEntries = $this->getExistingCalendarEntries();

        $amountOfRecipes = $this->getAmountOfRecipes($existingEntries);

        $values = $this->getValuesOfAllConfirmedRecipes($existingEntries);

        return view('calendar.index')
            ->with(['calendars' => $existingEntries->take(sizeof($existingEntries)),
                'amountOfRecipes' => $amountOfRecipes, 'values' => $values]);
    }

    public function unconfirm($calendarId)
    {
        $calendar = Calendar::find($calendarId);

        $calendar->confirmed = false;

        $calendar->save();

        return redirect('/calendar');
    }

    public function newRecipe(Request $request, $id)
    {
        $calendar = Calendar::find($id);

        $recipeId = $request->input('recipeId');
        $newRecipe = $this->getNewRecipe($recipeId);

        if (sizeof($newRecipe->all()) === 0) {
            return redirect('/calendar');
        }

        if ($newRecipe->all()[0]->id != $recipeId) {
            $calendar->recipe()->dissociate($recipeId);
            $calendar->save();

            $calendar = Calendar::find($calendar->id);

            $calendar->recipe()->associate($newRecipe->all()[0]);
            $calendar->save();
        }

        return redirect('/calendar');
    }

    public function store(Request $request, $id)
    {
        $calendar = Calendar::find($id);

        $index = $request->input('index');
        $this->determineDayAndDaytime($calendar, $index);

        $calendar->confirmed = true;

        $calendar->save();

        return redirect('/calendar');
    }

    private function determineDayAndDaytime($calendar, $index)
    {
        $day = null;
        $daytime = null;
        if ($index < 3) {
            $day = Day::MONDAY;
            if ($index == 0) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 1) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 2) {
                $daytime = Daytime::EVENING;
            }
        }
        else if ($index < 6) {
            $day = Day::TUESDAY;
            if ($index == 3) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 4) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 5) {
                $daytime = Daytime::EVENING;
            }
        }
        else if ($index < 9) {
            $day = Day::WEDNESDAY;
            if ($index == 6) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 7) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 8) {
                $daytime = Daytime::EVENING;
            }
        }
        else if ($index < 12) {
            $day = Day::THURSDAY;
            if ($index == 9) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 10) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 11) {
                $daytime = Daytime::EVENING;
            }
        }
        else if ($index < 15) {
            $day = Day::FRIDAY;
            if ($index == 12) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 13) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 14) {
                $daytime = Daytime::EVENING;
            }
        }
        else if ($index < 18) {
            $day = Day::SATURDAY;
            if ($index == 15) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 16) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 17) {
                $daytime = Daytime::EVENING;
            }
        }
        else {
            $day = Day::SUNDAY;
            if ($index == 18) {
                $daytime = Daytime::MORNING;
            }
            if ($index == 19) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index == 20) {
                $daytime = Daytime::EVENING;
            }
        }
        $calendar->day = $day;
        $calendar->daytime = $daytime;

        $calendar->save();
    }

    private function create()
    {
        $person = Auth::user()->person()->getResults();
        for ($x = 0; $x <= 20; $x++) {
            $calendar = new Calendar();

            $calendar->kw = date('W', time());
            $calendar->confirmed = false;

            $calendar->person()->associate($person);

            $calendar->save();
        }

        $calendars = $person->calendars();
        $recipes = $this->getRecipes();
        for ($i = 0; $i < sizeof($recipes); $i++) {
            $calendar = $calendars->getResults()[$i];
            $calendar->recipe()->associate($recipes[$i]);

            $calendar->save();
        }

        return $calendars->getResults();
    }

    private function getExistingCalendarEntries()
    {
        $person = Auth::user()->person()->getResults();
        $existingEntries = Calendar::all()
            ->where('person_id', $person->id)
            ->where('kw', date("W", time()));

        if (sizeof($existingEntries) === 0) {
            $existingEntries = $this->create();
        }

        $amountOfRecipes = $this->getAmountOfRecipes($existingEntries);
        $allRecipes = $this->getRecipes();

        if ($amountOfRecipes < sizeof($allRecipes)) {
            $allEntriesWithoutRecipe = $existingEntries->where('recipe_id', null);
            $allEntriesWithRecipe = $existingEntries->where('recipe_id', '!=', null)->values();
            $ids = [];
            for ($i = 0; $i < sizeof($allEntriesWithRecipe); $i++) {
                $ids[$i] = $allEntriesWithRecipe[$i]->recipe_id;
            }
            $recipes = Recipe::all()->whereNotIn('id', $ids)->values()->all();
            $counter = 0;
            foreach ($allEntriesWithoutRecipe as $entry) {
                if ($counter === sizeof($recipes)) {
                    continue;
                }
                $entry->recipe()->associate($recipes[$counter]);
                $entry->save();
                $counter++;
            }
        }

        return $existingEntries;
    }

    private function getRecipes()
    {
        $recipes = Recipe::all();

        if (sizeof($recipes) >= 21) {
            $recipes = $recipes->random(21);
        }

        return $recipes;
    }

    private function getNewRecipe($recipeId)
    {
        $otherRecipes = Recipe::all()->whereNotIn('id', [$recipeId]);
        if (sizeof($otherRecipes) === 0) {
            return Recipe::all()->where('id = '.$recipeId);
        }

        return $otherRecipes->random(1);
    }

    private function getAmountOfRecipes($existingEntries)
    {
        $counter = 0;
        foreach ($existingEntries as $entry) {
            $recipe = $entry->recipe()->getResults();
            if ($recipe != null) {
                $counter++;
            }
        }

        return $counter;
    }

    private function getValuesOfAllConfirmedRecipes($existingEntries)
    {
        $calorie = 0;
        $carb = 0;
        $fat = 0;
        $fattyAcid = 0;
        $sugar = 0;
        $protein = 0;
        $price = 0;
        foreach ($existingEntries as $entry) {
            $recipe = $entry->recipe()->getResults();
            if ($recipe != null && $entry->confirmed) {
                $products = $recipe->products()->getResults();
                foreach ($products as $product) {
                    $calorie += $product->calorie;
                    $carb += $product->carb;
                    $fat += $product->fat;
                    $fattyAcid += $product->fattyAcid;
                    $sugar += $product->sugar;
                    $protein += $product->protein;
                    $price += $product->price;
                }
            }
        }

        return [$calorie, $carb, $fat, $fattyAcid, $sugar, $protein, $price];
    }

}
