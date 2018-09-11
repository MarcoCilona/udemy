<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	App\Category::create(['name' => 'Category not available']);
        App\Category::create(['name' => 'Test']);
    	App\Category::create(['name' => 'Cibo']);
    	App\Category::create(['name' => 'Giochi']);

    }
}
