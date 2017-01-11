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
    static $password;
    $name = $faker->name;
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'slug' => str_slug($name),
        'gender' => 0,
        'avatar' =>  'public/defaults/avatars/female.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'location' => $faker->city,
        'about' => $faker->paragraph(4)
    ];
});