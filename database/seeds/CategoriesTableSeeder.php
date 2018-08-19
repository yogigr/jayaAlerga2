<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
        	[
        		'id' => 1,
        		'name' => 'Sandal',
                'slug' => 'sandal',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'Sepatu',
                'slug' => 'sepatu',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        ]);
    }
}
