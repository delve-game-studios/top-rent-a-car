<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'active' => $faker->boolean,
        'name' => $faker->unique()->firstName . ' ' . $faker->unique()->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(1), // 1
        'remember_token' => str_random(10),
    ];
});
