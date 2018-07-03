<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username'=>"tmgbedu@gmail.com",
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    $name=$faker->word;

    return [
        'name'=>$name,
        'slug'=>\Str::slug($name)
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    $title=$faker->sentence;
    
    return [
        'user_id'=>function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'title'=>$title,
        'slug'=>\Str::slug($title),
        'content'=>$faker->paragraph,
        'featured_photo'=>$faker->imageUrl(640, 480),
    ];
});