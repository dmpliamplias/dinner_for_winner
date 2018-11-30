<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\Controller;

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

}
