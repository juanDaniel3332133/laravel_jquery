<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' 		  => $faker->word,
        'description' => $faker->text($max=100),
        'image_path'  => $faker->imageUrl() 
    ];
});