<?php

use App\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    $word = $faker->word;

    return [
        'name' => $word,
        'slug' => Str::slug($word),
    ];
});
