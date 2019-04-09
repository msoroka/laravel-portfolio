<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(App\Social::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'link' => $faker->url,
        'logo' => UploadedFile::fake()->image('random.jpg'),
    ];
});
