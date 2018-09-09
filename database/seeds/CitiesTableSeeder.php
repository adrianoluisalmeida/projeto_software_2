<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        City::create(['name' => 'Santa Maria', 'state_id' => 1]);
        City::create(['name' => 'Restinga Seca', 'state_id' => 1]);
    }
}
