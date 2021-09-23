<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resturant;


class ResturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Models\Resturant::factory()->count(30)->create(); 
    }
}
