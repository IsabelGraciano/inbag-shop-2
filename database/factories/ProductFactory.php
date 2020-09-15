<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/**Isabel Graciano Vasquez */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//attributes id, name, description, size, discount, category, color, price, activated, image, created_at, updated_at

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'size' => $faker->randomElement(['none','XS','S','M','L','XL','XXL']),
        'discount' => $faker->numberBetween($min = 0, $max = 100),
        'description' => $faker->paragraph,
        'category' => $faker->randomElement(['Man','Woman','Kids','Accessories','Shoes']),
        'color' => $faker->colorName,
        'price' => $faker->numberBetween($min = 0, $max = 1000000),
        'activated' => $faker->randomElement(['1','0']),
        'image' => $faker->image
    ];
});
