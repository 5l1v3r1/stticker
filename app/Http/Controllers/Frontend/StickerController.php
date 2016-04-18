<?php

namespace App\Http\Controllers\Frontend;

use App\CustomOrder;
use App\Http\Requests\CustomOrderRequest;
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

    /**
     * @return mixed
     */
    public function campaign() {
        $stickers = Sticker::where('campaign', 1)->get();
        $code = "ID" . str_random(3);
        return view("campaign.index", compact('code', 'stickers'));
    }

    public function campaignOrder(CustomOrderRequest $request)
    {
        $post = new CustomOrder;
        $post->code = $request->get('code');
        $post->name = $request->get('name');
        $post->email = $request->get('email');
        $post->phone = $request->get('phone');
        $post->adress = $request->get('adress');
        $post->content = $request->get('content');
        $post->save();
        alert()->success("Siparişiniz başarıyla gönderildi.");
        return redirect()->route("frontend.sticker.campaign")->with(['code' => $request->get('code')]);
    }

    public function show(Sticker $sticker) {
        $sizes = [];
        if($sticker->category->parent){
        	foreach($sticker->category->parent->sizes as $size)
            		$sizes[$size->id] = $size->name." - ".number_format($size->price, 2)." TL";
	} else {
	        foreach($sticker->category->sizes as $size)
        		$sizes[$size->id] = $size->name." - ".number_format($size->price, 2)." TL";

	}
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
