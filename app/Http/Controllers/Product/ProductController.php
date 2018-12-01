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

        $product->product_amount = 0;
        $product->product_unit = "TODO";
        $product->calorie_amount = 0;
        $product->calorie_unit = "TODO";
        $product->carb_amount = 0;
        $product->carb_unit = "TODO";
        $product->fat_amount = 0;
        $product->fat_unit = "TODO";
        $product->salt_amount = 0;
        $product->salt_unit = "TODO";

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
            'name' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->product_amount = 0;
        $product->product_unit = "TODO";
        $product->calorie_amount = $request->input('calorie');
        $product->calorie_unit = "TODO";
        $product->carb_amount = $request->input('carb');
        $product->carb_unit = "TODO";
        $product->fat_amount = $request->input('fat');
        $product->fat_unit = "TODO";
        $product->salt_amount = $request->input('salt');
        $product->salt_unit = "TODO";

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
            'name' => 'required|string|max:255'
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
            'name' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->product_amount = 0;
        $product->product_unit = "TODO";
        $product->calorie_amount = $request->input('calorie');
        $product->calorie_unit = "TODO";
        $product->carb_amount = $request->input('carb');
        $product->carb_unit = "TODO";
        $product->fat_amount = $request->input('fat');
        $product->fat_unit = "TODO";
        $product->salt_amount = $request->input('salt');
        $product->salt_unit = "TODO";

        return redirect('/product')->with('success', 'Produkt bearbeitet');
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

        return redirect('/product')->with('success', 'Produkt gelöscht');
    }

}
