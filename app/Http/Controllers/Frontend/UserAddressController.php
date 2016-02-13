<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class UserAddressController extends FrontendController
{
    public function index() {
        return view("user.address.index");
    }

    public function create() {
        return view("user.address.create");
    }
}
