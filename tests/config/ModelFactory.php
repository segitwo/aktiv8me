<?php

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\RegistrationToken::class, function (Faker\Generator $faker) {
    return [
        'token' => hash_hmac('sha256', str_random(64), config('app.key')),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
