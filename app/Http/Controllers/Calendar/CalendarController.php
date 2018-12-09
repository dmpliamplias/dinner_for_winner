<?php

namespace App\Http\Controllers\Calendar;

use App\Calendar;
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

        //todo first run crash & lookup recipes when theres enough time
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

        $calendar->day = $request->input('day');
        $calendar->daytime = $request->input('daytime');
        $calendar->confirmed = true;

        $calendar->save();

        return redirect('/calendar');
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
