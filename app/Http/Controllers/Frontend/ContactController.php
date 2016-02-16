<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class ContactController extends FrontendController
{
    public function index() {
        return view("contact.index");
    }
}
