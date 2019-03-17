<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(rand(3, 7), true),
        'user_id' => App\User::pluck('id')->random(), // Take user_id from User table randomly
        'votes_count' => rand(-3, 10)
    ];
});
