<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use App\User;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'user_id' => User::first()->id,
        'name' => $faker->sentence(),
        'description' => $faker->sentence(20),
    ];
});
