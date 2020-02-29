<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    $name = $faker->sentence;
    $status = $faker->randomElement([\App\Models\Course::PUBLISHED,\App\Models\Course::PENDING,\App\Models\Course::REJECTED]);
    return [
        'teacher_id' => \App\Models\Teacher::all()->random()->id,
        'category_id' => \App\Models\Category::all()->random()->id,
        'level_id' => \App\Models\Level::all()->random()->id,
        'name' => $name,
        'slug' => \Illuminate\Support\Str::slug($name, '-'),
        'description' => $faker->paragraph,
        'picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/courses', 600,350,'business',false),
        'status' => $status,
        'previous_approved' => $status !== \App\Models\Course::PUBLISHED ? false : true,
        'previous_rejected' => $status === \App\Models\Course::REJECTED ? true : false,
    ];
});
