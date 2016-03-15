<?php

namespace App\Http\Controllers\Frontend;

use App\Sticker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class HomeController extends FrontendController
{
    public function index() {
        $stickers = Sticker::take(24)->orderByRaw("RAND()")->get();
        return view("home.index", [
            'stickers' => $stickers
        ]);
    }
}
