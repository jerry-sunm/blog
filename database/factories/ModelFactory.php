<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Users::class, function (Faker\Generator $faker) {
    // static $password;

    return [
        'id' => $faker->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'phone' => $faker->phone,
        'addr' => $faker->addr,

        'remember_token' => str_random(10),
    ];
});
