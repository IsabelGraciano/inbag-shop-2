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
//attributes id, name, description, size, category, color, price, activated, image, created_at, updated_at

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'size' => $faker->randomElement(['none','XS','S','M','L','XL','XXL']),
        'description' => $faker->paragraph,
        'category' => $faker->randomElement(['Man','Woman','Kids','Accessories','Shoes']),
        'color' => $faker->colorName,
        'price' => $faker->numberBetween($min = 0, $max = 1000000),
        'image' => $faker->randomElement(['p1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p5.jpg', 'p6.jpg','p7.jpg', 'p8.jpg', 'p9.jpg',
                                          'p10.jpg', 'p12.jpg', 'p13.jpg', 'p14.jpg', 'p15.jpg','p16.jpg', 'p17.jpg', 'p18.jpg',
                                          'p19.jpg', 'p20.jpg', 'p21.jpg', 'p22.jpg', 'p23.jpg', 'p24.jpg','p25.jpg'])
    ];
});
