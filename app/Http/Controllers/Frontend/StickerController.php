<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Sticker;

class StickerController extends FrontendController
{
    public function index() {
        return view("sticker.index");
    }

    public function show(Sticker $sticker) {
        return view("sticker.show", [
            "sticker" => $sticker,
        ]);
    }
}
