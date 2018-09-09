<?php

use Illuminate\Database\Seeder;
use App\Models\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['uf' => 'RS', 'name' => 'Rio Grande do Sul']);
        State::create(['uf' => 'SC', 'name' => 'Santa Catarina']);
    }
}
