<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        
        $categories = [
        	'ropa',
        	'deportes',
        	'videojuegos',
        	'camping',
        	'juguetes',
        	'construccion',
        	'libreria',
        	'hogar',
        	'tecnologia',
        	'diseño'
        ];

        foreach ($categories as $category)
        {
        	Category::create([
                'name' => $category
            ]);
        }
    }
}
