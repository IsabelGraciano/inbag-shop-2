<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

/** Isabel Graciano Vasquez */

use App\Donation;
use Faker\Generator as Faker;

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
        'image' => $faker->randomElement(['d1.jpg', 'd2.jpg', 'd3.jpg', 'd4.jpg', 'd5.jpg', 'd6.jpg','d7.jpg', 'd8.jpg', 'd9.jpg',
                                          'd10.jpg','d11.jpg', 'd12.jpg', 'd13.jpg', 'd14.jpg', 'd15.jpg', 'd16.jpg','d17.jpg', 
                                          'd18.jpg', 'd19.jpg','d20.jpg','d21.jpg','d22.jpg',
                                          'p1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p5.jpg', 'p6.jpg','p7.jpg', 'p8.jpg', 'p9.jpg',
                                          'p10.jpg', 'p12.jpg', 'p13.jpg', 'p14.jpg', 'p15.jpg','p16.jpg', 'p17.jpg', 'p18.jpg',
                                          'p19.jpg', 'p20.jpg', 'p21.jpg', 'p22.jpg', 'p23.jpg', 'p24.jpg','p25.jpg']),
        'customer_id'=>$faker->numberBetween($min=1, $max=10)
    ];
});
