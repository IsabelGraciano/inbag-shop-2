<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Donation;
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
//attributes id, size, usetime, description, deliveryType, image, created_at, updated_at

$factory->define(Donation::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'size' => $faker->randomElement(['none','XS','S','M','L','XL','XXL']),
        'usetime' => $faker->numberBetween($min = 1, $max = 72).' meses',
        'description' => $faker->paragraph,
        'deliveryType' => $faker->randomElement(['I will send it to you','Pick it at my home']),
        'image' => $faker->image
    ];
});
