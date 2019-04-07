<?php

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name'  => $faker->lastName,
        'email'      => $faker->email,
        'password'   => $faker->password,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone'      => $faker->e164PhoneNumber,
        'city'       => $faker->city,
        'country'    => $faker->country,
    ];
});
