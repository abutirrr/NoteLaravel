<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'name' => 'hatim',
        'email' => 'hatim@gmail.com',
        'password' => '$2y$10$WKW8faZAt2hBR8cctJd9fO4v55MwwXuvOpXTMT7wPodpQhOSAGYly', // password
    ];
});
