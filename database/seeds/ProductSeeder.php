<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Product::truncate();
    	
        $categories = Category::get('id')->count();

        $faker = \Faker\Factory::create(); 

        for($i=0; $i < 50; $i++)
        {
            $product = factory(Product::class)->create();

            $product->categories()->attach($faker->numberBetween(1, $categories));
        }
    }
}
