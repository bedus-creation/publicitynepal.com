<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PostTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function admin_create_create_post(){

        $this->be(factory('App\User')->create());

        $post=factory('App\Post')->make();

        $categories=factory('App\Category',5)->create();

        $this->post('/admin/posts',array_merge($categories->toArray(),["categories"=>[1,2]]));


    }
}
