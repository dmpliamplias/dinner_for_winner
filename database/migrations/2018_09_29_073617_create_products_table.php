<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('product_unit');
            $table->integer('product_amount');

            $table->integer('calorie_amount');
            $table->string('calorie_unit');
            $table->integer('carb_amount');
            $table->string('carb_unit');
            $table->integer('fat_amount');
            $table->string('fat_unit');
            $table->integer('salt_amount');
            $table->string('salt_unit');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
