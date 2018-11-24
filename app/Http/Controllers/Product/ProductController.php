<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function createFromJson($json)
    {
        // todo validate if invalid return false
        $product = new Product();
        $product->name = $json['name'];
        $product->name = $json['calorie_amount'];
        $product->name = $json['calorie_unit'];
        $product->name = $json['carb_amount'];
        $product->name = $json['carb_unit'];
        $product->name = $json['fat_amount'];
        $product->name = $json['fat_unit'];
        $product->name = $json['salt_amount'];
        $product->name = $json['salt_unit'];

        $product->save();
        return true;
    }

}
