<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //todo user oder person referenz
            //todo rezept
            //todo welcher tag oder tagunabhängig; tage eigene entität
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_plans');
    }
}
