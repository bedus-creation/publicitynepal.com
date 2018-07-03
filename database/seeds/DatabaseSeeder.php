<?php

use Illuminate\Database\Seeder;

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
            'email'=>"tmgbedu@gmail.com"
        ]);
        $category=factory('App\Category',20)->create();
        $posts=factory('App\Post',100)->create();
        foreach ($posts as $post) {
            $post->categories()->attach(App\Category::inRandomOrder()->first()->id);
        }
    }
}
