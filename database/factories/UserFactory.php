<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
	static $password;

	return [
		'name' => $faker->name,
		'username'=>$faker->unique()->name,
		'user_type'=>array_rand(array("business","service")),
		'email' => $faker->unique()->safeEmail,
		'password' => $password ?: $password = bcrypt('secret'),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\Product::class,function(Faker $faker){
	return [
		'name'=>$faker->name,
		'user_id'=>function () {
			return factory(App\User::class)->create()->id;
		},
		'price'=>rand(100,1000)
	];
});
