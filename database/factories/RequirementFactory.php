<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Requirement;
use Faker\Generator as Faker;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
        'course_id' => \App\Models\Course::all()->random()->id,
        'requirement' => $faker->sentence
    ];
});
