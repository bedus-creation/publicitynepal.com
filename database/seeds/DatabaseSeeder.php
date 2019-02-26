<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create([
            'email' => "theoryeducation@gmail.com"
        ]);
        $category = factory('App\Category', 20)->create();

        $categories = Category::all();
        foreach ($categories as $key => $item) {
            $item->posts()->attach(factory('App\Post')->create());
        }
    }
}
