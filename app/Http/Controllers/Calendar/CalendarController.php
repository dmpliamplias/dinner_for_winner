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

        $recipes = Recipe::all();

        if (sizeof($recipes) > 21) {
            $recipes = $recipes->random(21);
        }

        return view('calendar.index')->with(['calendars' => $existingEntries, 'recipes' => $recipes]);
    }

    public function create()
    {
        $person = Auth::user()->person()->getResults();
        for ($x = 0; $x <= 20; $x++) {
            $calendar = new Calendar();
            $calendar->kw = date('W', time());
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

}
