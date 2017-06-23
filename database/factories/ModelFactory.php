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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\goods::class, function (Faker\Generator $faker) {
    return [
        'goods' => $faker->name,
        'style' => $faker->numberBetween(4,6),
        'area' => $faker->numberBetween(7,9),
        'kind' => $faker->numberBetween(10,12),
    ];
});
