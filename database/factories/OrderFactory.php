<?php
/**Isabel Graciano Vasquez */
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
//attributes id, total, shipping_cost, customer_id, created_at, updated_at

$factory->define(Order::class, function (Faker $faker) {
    return [
        'total'=> $faker->numberBetween($min = 200.0, $max = 9000.0),
        'shipping_cost'=> $faker->numberBetween($min = 200.0, $max = 9000.0),
        'customer_id'=>$faker->numberBetween($min=1, $max=10)
    ];
});
