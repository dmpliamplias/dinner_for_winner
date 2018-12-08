<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Product;
use App\Recipe;
use File;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $recipes = Recipe::paginate(10);

        return view('recipe.index')->with('recipes', $recipes);
    }

    public function create()
    {
        $products = Product::pluck('name', 'id');
        $refl = new ReflectionClass('App\Category');
        $categories = ($refl->getConstants());

        return view('recipe.create', ['products' => $products, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|String|max:255',
            'description' => 'required',
            'products' => 'required',
            'file' => 'required'
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->time = $request->input('time');
        $productArray = $request->input('products');
        foreach ($productArray as $entry) {
            $product = Product::find($entry);
            $recipe->products()->save($product);
        }
        $picture = $request->file('file');
        $pictureName = time().'.'.$picture->getClientOriginalExtension();
        $picture->move('img/recipes', $pictureName);
        $recipe->imagePath = 'img/recipes/'.$pictureName;

        $recipe->person()->associate(Auth::user()->person()->getResults());

        $recipe->save();

        return redirect('/recipe')->with('success', 'Rezept erstellt');
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show')->with('recipe', $recipe);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|String|max:255',
            'description' => 'required',
            'products' => 'required',
            'file' => 'required'
        ]);

        $recipe = Recipe::find($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->time = $request->input('time');
        $productArray = $request->input('products');
        foreach ($productArray as $entry) {
            $product = Product::find($entry);
            $recipe->products()->save($product);
        }
        File::delete($recipe->imagePath);
        $picture = $request->file('file');
        $pictureName = time().'.'.$picture->getClientOriginalExtension();
        $picture->move('img/recipes', $pictureName);
        $recipe->imagePath = 'img/recipes/'.$pictureName;

        $recipe->save();

        return redirect('/recipe')->with('success', 'Rezept bearbeitet');
    }

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
