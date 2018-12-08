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
            $table->string('unit');
            $table->decimal('calorie', 8, 2);
            $table->decimal('carb', 8, 2);
            $table->decimal('fat', 8, 2);
            $table->decimal('fattyAcid', 8, 2);
            $table->decimal('sugar', 8, 2);
            $table->decimal('protein', 8, 2);
            $table->decimal('price', 8, 2);

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
