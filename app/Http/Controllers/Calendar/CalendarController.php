<?php

namespace App\Http\Controllers\Calendar;

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
        $recipesMorning = Recipe::all()->where('daytime = morning')->take(7);
        $recipesMidday = Recipe::all()->where('daytime = midday')->take(7);
        $recipesEvening = Recipe::all()->where('daytime = evening')->take(7);
        $recipes = [
            'recipesMorning' => $recipesMorning,
            'recipesMidday' => $recipesMidday,
            'recipesEvening' => $recipesEvening
        ];
        return view('calendar.index')->with('recipes', $recipes);
    }

}
