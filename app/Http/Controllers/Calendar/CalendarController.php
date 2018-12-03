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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $existingEntries = Auth::user()->person()->calendars();
        $allRecipes = Recipe::all();

        if ($allRecipes->count() < 21) {
            return view('calendar.index')->with('recipes', $allRecipes);
        }
        // todo read more function for description in view
        $recipes = $allRecipes->random(21);
        return view('calendar.index')->with('recipes', $recipes);
    }

    public function store(Request $request)
    {
        $calendar = new Calendar();

        $index = $request->input('index');
        $dayAndTime = $this->determineDayAndTime($index);
        $calendar->day = $dayAndTime[0];
        $calendar->daytime = $dayAndTime[1];
        $calendar->recipe()->associate(Recipe::find($request->input('recipeId')));

        $calendar->save();

        return $this->index();
    }

    private function determineDayAndTime($index) {
        // todo find better solution for this ugly shit
        $day = null;
        $daytime = null;
        if ($index <= 2) {
            if ($index === 0) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 1) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 2) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::MONDAY;
        }
        else if ($index <= 5) {
            if ($index === 3) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 4) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 5) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::TUESDAY;
        }
        else if ($index <= 8) {
            if ($index === 6) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 7) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 8) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::WEDNESDAY;
        }
        else if ($index <= 11) {
            if ($index === 9) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 10) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 11) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::THURSDAY;
        }
        else if ($index <= 14) {
            if ($index === 12) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 13) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 14) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::FRIDAY;
        }
        else if ($index <= 17) {
            if ($index === 15) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 16) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 17) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::SATURDAY;
        }
        else {
            if ($index === 18) {
                $daytime = Daytime::MORNING;
            }
            if ($index === 19) {
                $daytime = Daytime::MIDDAY;
            }
            if ($index === 20) {
                $daytime = Daytime::EVENING;
            }
            $day = Day::SUNDAY;
        }
        return [$day, $daytime];
    }

}
