<?php

namespace App\Http\Controllers\Backend;

use App\Sticker;
use App\Http\Requests\Backend\StickerCreateRequest;
use App\Http\Requests\Backend\StickerEditRequest;

class StickerController extends BackendController
{
    public function index()
    {
        $stickers = Sticker::paginate(20);
        return view("backend.sticker.index", [
            "stickers" => $stickers,
        ]);
    }

    public function create()
    {
        return view("backend.sticker.create");
    }

    public function store(StickerCreateRequest $request)
    {
        $sticker = new Sticker;
        $sticker->name = $request->get("name");
        $sticker->sticker_category_id = $request->get("sticker_category_id");
        $sticker->slug = $request->get("slug");
        $sticker->campaign = $request->get("campaign");

        if($request->hasFile("image")){
            do {
                $filename = str_random(3)."-".str_slug($sticker->name).".".$request->file("image")->getClientOriginalExtension();
            } while(file_exists(public_path()."/upload/sticker/".$filename));
            $request->file("image")->move(public_path()."/upload/sticker", $filename);
            $sticker->image = "upload/sticker/".$filename;
        }

        $sticker->save();

        alert()->success("Sticker başarıyla kaydedildi!");
        return redirect()->route("backend.sticker.index");
    }

    public function edit(Sticker $sticker)
    {
        return view("backend.sticker.edit", [
            "sticker" => $sticker
        ]);
    }

    public function update(StickerEditRequest $request, Sticker $sticker)
    {
        $sticker->name = $request->get("name");
        $sticker->sticker_category_id = $request->get("sticker_category_id");
        $sticker->slug = $request->get("slug");
        $sticker->campaign = $request->get("campaign");

        if($request->hasFile("image")){
            do {
                $filename = str_random(3)."-".str_slug($sticker->name).".".$request->file("image")->getClientOriginalExtension();
            } while(file_exists(public_path()."/upload/sticker/".$filename));
            $request->file("image")->move(public_path()."/upload/sticker", $filename);
            $sticker->image = "upload/sticker/".$filename;
        }

        $sticker->save();

        alert()->success("Sticker başarıyla güncellendi!");
        return redirect()->route("backend.sticker.edit", $sticker->slug);
    }

    public function destroy(Sticker $sticker)
    {
        $sticker->delete();
        alert()->success("Sticker başarıyla silindi!");
        return redirect()->route("backend.sticker.index");
    }
}
