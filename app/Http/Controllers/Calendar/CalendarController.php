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
        $recipes = $this->prepareCalendarRecipes();
        return view('calendar.index')->with('recipes', $recipes);
    }

    private function prepareCalendarRecipes()
    {
        $recipesMorning = Recipe::all()->where('daytime = morning')->take(7);
        $recipesMidday = Recipe::all()->where('daytime = midday')->take(7);
        $recipesEvening = Recipe::all()->where('daytime = evening')->take(7);

        $orderdRecipes = [];
        $x = 0;
        for ($z = 0; $z <= 6; $z++) {
            $orderdRecipes[$x] = $recipesMorning[$z];
            $x++;
            $orderdRecipes[$x] = $recipesMidday[$z];
            $x++;
            $orderdRecipes{$x} = $recipesEvening[$z];
            $x++;
        }
        return $orderdRecipes;
    }

}
