<?php

namespace App\Http\Controllers\Backend;

use App\StickerSize;
use App\Http\Requests\Backend\StickerSizeRequest;

class StickerSizeController extends BackendController
{
    public function index()
    {
        $sizes = StickerSize::latest()->get();
        return view("backend.sticker.size.index", [
            "sizes" => $sizes,
        ]);
    }

    public function create()
    {
        return view("backend.sticker.size.create");
    }

    public function store(StickerSizeRequest $request)
    {
        $size        = new StickerSize;
        $size->name  = $request->get("name");
        $size->price = $request->get("price");
        $size->save();

        alert()->success("Boyut başarıyla kaydedildi!");
        return redirect()->route("backend.sticker.size.index");
    }

    public function edit(StickerSize $size)
    {
        return view("backend.sticker.size.edit", [
            "size" => $size
        ]);
    }

    public function update(StickerSizeRequest $request, StickerSize $size)
    {
        $size->name  = $request->get("name");
        $size->price = $request->get("price");
        $size->save();

        alert()->success("Boyut başarıyla güncellendi!");
        return redirect()->route("backend.sticker.size.edit", $size->id);
    }

    public function destroy(StickerSize $size)
    {
        $size->delete();
        alert()->success("Boyut başarıyla silindi!");
        return redirect()->route("backend.sticker.size.index");
    }
}
