<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\News;
use App\User;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->randomElement(User::all()),
    ];
});
