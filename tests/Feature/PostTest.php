<?php

namespace Tests\Feature;

use Tests\TestCase;


class PostTest extends TestCase
{
    /** @test */
    public function admin_create_create_post(){
        $this->be(factory('App\User')->create());
    }
}
