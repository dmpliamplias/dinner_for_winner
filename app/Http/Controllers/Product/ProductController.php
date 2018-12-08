<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Person;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public static function createFromJson($json)
    {
        $product = new Product();

        $product->name = $json[1];
        $product->unit = $json[2];
        $product->calorie = $json[3];
        $product->carb = $json[4];
        $product->fat = $json[5];
        $product->fattyAcid = $json[6];
        $product->sugar = $json[7];
        $product->protein = $json[8];
        $product->price = $json[9];

        $product->save();
    }

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
        $products = Product::paginate(10);

        return view('product.index')->with('products', $products);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|String|unique:products,name|max:255',
            'price' => 'bail|required|numeric',
            'calorie' => 'bail|required|numeric',
            'carb' => 'bail|required|numeric|max:100',
            'fat' => 'bail|required|numeric|max:100',
            'fattyAcid' => 'bail|required|numeric|max:100',
            'sugar' => 'bail|required|numeric|max:100',
            'protein' => 'bail|required|numeric|max:100',
        ]
      );

        $product = new Product();

        $product->name = $request->input('name');
        $product->unit = '1';
        $product->calorie = $request->input('calorie');
        $product->carb = $request->input('carb');
        $product->fat = $request->input('fat');
        $product->fattyAcid = $request->input('fattyAcid');
        $product->sugar = $request->input('sugar');
        $product->protein = $request->input('protein');
        $product->price = $request->input('price');

        $product->save();

        return redirect('/product')->with('success', 'Neues Produkt hinzugefügt');
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name' => 'bail|required|String|unique:products,name|max:255',
          'price' => 'bail|required|numeric',
          'calorie' => 'bail|required|numeric',
          'carb' => 'bail|required|numeric|max:100',
          'fat' => 'bail|required|numeric|max:100',
          'fattyAcid' => 'bail|required|numeric|max:100',
          'sugar' => 'bail|required|numeric|max:100',
          'protein' => 'bail|required|numeric|max:100',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);
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
          'name' => 'bail|required|String|max:255',
          'price' => 'bail|required|numeric',
          'calorie' => 'bail|required|numeric',
          'carb' => 'bail|required|numeric|max:100',
          'fat' => 'bail|required|numeric|max:100',
          'fattyAcid' => 'bail|required|numeric|max:100',
          'sugar' => 'bail|required|numeric|max:100',
          'protein' => 'bail|required|numeric|max:100',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->unit = '1';
        $product->calorie = $request->input('calorie');
        $product->carb = $request->input('carb');
        $product->fat = $request->input('fat');
        $product->fattyAcid = $request->input('fattyAcid');
        $product->sugar = $request->input('sugar');
        $product->protein = $request->input('protein');
        $product->price = $request->input('price');

        $product->save();

        return redirect('/product')->with('success', 'Produkt erfolgreich bearbeitet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product')->with('success', 'Produkt erfolgreich gelöscht');
    }

}
