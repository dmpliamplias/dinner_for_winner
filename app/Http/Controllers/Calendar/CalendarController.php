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
        $person = Auth::user()->person()->getResults();
        $existingEntries = Calendar::all()->where('person_id = '.$person->id.' and kw ='.date("W", time()));

        if (sizeof($existingEntries) === 0) {
            $existingEntries = $this->create();
        }

        return view('calendar.index')->with('calendars', $existingEntries);
    }

    public function create()
    {
        $morningCounter = 0;
        $middayCounter = 0;
        $eveningCounter = 0;
        $person = Auth::user()->person()->getResults();
        for ($x = 0; $x <= 20; $x++) {
            $calendar = new Calendar();
            $calendar->kw = date('W', time());
            $randomRecipe = Recipe::all()->random()->get();
            $time = $randomRecipe->time;
            if ($time === Daytime::MORNING) {
                $morningCounter++;
            }
            if ($time === Daytime::MIDDAY) {
                $middayCounter++;
            }
            if ($time === Daytime::EVENING) {
                $eveningCounter++;
            }
            $calendar->recipe()->associate($recipe);
            $calendar->person()->associate($person);

            $calendar->save();
        }
        $calendars = $person->calendars();
        return $calendars;
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
