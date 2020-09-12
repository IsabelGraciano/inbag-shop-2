<?php
/*Santiago Moreno Rave */
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
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

$factory->define(Order::class, function (Faker $faker) {
    return [
        'totalPay'=> $faker->numberBetween($min = 200.0, $max = 9000.0),
        'totalPay'=> $faker->numberBetween($min = 200.0, $max = 9000.0),
        'date' => $faker->date(),
        'discountOrder' => $faker->numberBetween($min = 200.0, $max = 9000.0),
        'shippingCost'=> $faker->numberBetween($min = 200.0, $max = 9000.0),

    ];
});