<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class UserController extends FrontendController
{
    public function login() {
        return view("user.login");
    }

    public function register() {
        return view("user.register");
    }

    public function settings() {
        return view("user.settings");
    }
}
