<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $last_name = $faker->lastName;
    return [
        'name' => $name,
        'role_id' => \App\Models\Role::all()->random()->id,
        'last_name' => $last_name,
        'slug' => \Illuminate\Support\Str::slug($name . " " . $last_name, '-'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'picture' => \Faker\Provider\Image::image(storage_path() . "/app/public/users" , 200, 200, 'people',false),
    ];
});
