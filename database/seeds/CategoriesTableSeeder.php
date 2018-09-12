<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['name' => 'Iluminação', 'status' => true]);
        \App\Models\Category::create(['name' => 'Saúde', 'status' => true]);
        \App\Models\Category::create(['name' => 'Vias Urbanas', 'status' => true]);
        \App\Models\Category::create(['name' => 'Vias Rurais', 'status' => true]);
    }
}
