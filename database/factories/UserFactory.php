<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/**Camila Barona */


use App\User;
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

//attributes id, name, las name, email, email_verified_at, password, remember_token, role, created_at, updated_at

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastName'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'provider' => 'myProvider',
        'provider_id' => $faker->numberBetween($min=00000, $max=999999),
        'remember_token' => Str::random(10),
        'role'=> $faker->randomElement(['client', 'admin']),
        'phone'=>$faker->numberBetween($min=00000, $max=999999),
        'country'=>$faker->randomElement(['Colombia','United States','Argentina','Spain','United Kingdom']),
        'state'=>$faker->state,
        'city'=>$faker->city,
        'neighborhood'=>$faker->city,
        'adress'=>$faker->streetAddress,
        'adressDetails'=>$faker->name,
    ];
});