<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\NoteCategory::class, function (Faker $faker) {

        // THE PROBLEM IS THAT THIS DUPLICATED THE CODE AND THE SEEDING CRASHES
    return [
        'note_id' => \App\Note::all()->pluck('id')->shuffle()->first(),
        'category_id' => \App\Category::all()->pluck('id')->shuffle()->first(),

    ];
});
