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

/**
 * User model factory.
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*
 * Application model factory.
 */
$factory->define(App\Application::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'key' => Hash::make(crypt_random_string(10)),
    ];
});

/*
 * Message model factory.
 */
$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->paragraph,
        'message' => $faker->text,
        'publish_date' => $faker->dateTime,
    ];
});