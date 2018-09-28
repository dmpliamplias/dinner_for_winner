<?php

use Illuminate\Database\Seeder;

class RezeptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Rezept::class, 5)->create();
    }
}
