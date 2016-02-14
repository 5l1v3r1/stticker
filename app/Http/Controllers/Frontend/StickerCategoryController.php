<?php

namespace App\Http\Controllers\Frontend;

use App\Sticker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\StickerCategory;

class StickerCategoryController extends FrontendController
{

    public function show(StickerCategory $category) {
        $stickers = $category->stickers()->orderBy("name", "ASC")->paginate(16);
        return view("sticker.category.show", [
            "category" => $category,
            "stickers" => $stickers
        ]);
    }
}
