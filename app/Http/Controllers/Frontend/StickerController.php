<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class StickerController extends FrontendController
{
    public function index() {
        return view("sticker.index");
    }
}
