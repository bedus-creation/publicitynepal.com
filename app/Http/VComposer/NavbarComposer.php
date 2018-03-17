<?php

namespace App\Http\VComposer;

use Illuminate\View\View;
use App\Category;

class NavbarComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    //protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        //$this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   
        $categories=Category::where("parent",0)->get();
        $view->with('menus', $categories);
    }
}