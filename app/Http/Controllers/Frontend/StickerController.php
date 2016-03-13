<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Sticker;
use App\Http\Requests\StickerSearchRequest;

class StickerController extends FrontendController
{
    public function index() {
        return view("sticker.index");
    }

    public function show(Sticker $sticker) {
        $sizes = [];
        foreach($sticker->category->parent->sizes as $size)
            $sizes[$size->id] = $size->name." - ".number_format($size->price, 2)." TL";
        return view("sticker.show", [
            "sticker" => $sticker,
            "sizes"   => $sizes,
        ]);
    }

    public function search(StickerSearchRequest $request) {
        $stickers = Sticker::search($request->get("query"))->paginate(16);
        return view("sticker.search", [
            "query" => $request->get("query"),
            "stickers" => $stickers
        ]);
    }
}
