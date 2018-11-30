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

    public function store(Request $request)
    {

    }

    private function prepareCalendarRecipes()
    {
        $recipesSize = Recipe::all();

        $fakeRecipes = Recipe::all()->take(0);

        if ($recipesSize->count() != 21) {
            return redirect('/calendar')->with(['error' => 'Sie müssen mehr Rezete erfassen', 'recipes' => $fakeRecipes]);
        }

        $recipesMorning = Recipe::all()->where('daytime = morning')->take(7)[2];
        $recipesMidday = Recipe::all()->where('daytime = mitakedday')->take(7)[2];
        $recipesEvening = Recipe::all()->where('daytime = evening')->take(7)[2];

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
