<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
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
//attributes id, description, ranking, product_id, customer_id, created_at, updated_at

$factory->define(Review::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'ranking' => $faker->numberBetween($min = 1, $max = 5),
        'product_id'=>$faker->numberBetween($min=1,$max=10),
        'customer_id'=>$faker->numberBetween($min=1,$max=10)
    ];
});
