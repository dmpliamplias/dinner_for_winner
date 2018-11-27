<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Person;
use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipe.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('recipe.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $recipe = new Recipe();
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $daytimes = $request->input('daytime');
        $recipe->daytime = serialize($daytimes);
        $recipe->time = $request->input('time');

        $recipe->person()->associate(Auth::user()->person()->getResults());
//        $recipe->products()->save($request->input('products'));
        $productArray = $request->input('products');
        foreach($productArray as $entry) {
            $product = Product::find($entry->id);
            $recipe->products()->attach($product);
        }

        $recipe->save();

        return redirect('/recipe')->with('success', 'Rezept erstellt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $recipe = Recipe::find($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $daytimes = $request->input('daytime');
        $recipe->daytime = serialize($daytimes);
        $recipe->time = $request->input('time');
        $recipe->save();

        return redirect('/recipe')->with('success', 'Rezept bearbeitet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect('/recipe')->with('success', 'Rezept gelöscht');
    }

    public static function createFromJson($json)
    {
        // todo validate if invalid return false
        $recipe = new Recipe();
        $recipe->name = $json['name'];
        $recipe->description = $json['calorie_amount'];
        $recipe->daytimes = $json['calorie_unit'];
        $recipe->time = $json['carb_amount'];

        $recipe->save();
        return true;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
           'name' => 'required|string|max:255',
           'description' => 'required|string|max:500'
        ]);
    }

}
