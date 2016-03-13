<?php

namespace App\Http\Controllers\Backend;

use App\StickerCategory;
use App\Http\Requests\Backend\StickerCategoryCreateRequest;
use App\Http\Requests\Backend\StickerCategoryEditRequest;

class StickerCategoryController extends BackendController
{
    public function index($category = null)
    {
        if(!is_null($category)){
            $categories = $category->subs()->paginate(20);
        } else {
            $categories = StickerCategory::whereNull("parent_id")->paginate(20);
        }
        return view("backend.sticker.category.index", [
            "categories" => $categories,
            "category"   => $category
        ]);
    }

    public function create($category = null)
    {
        return view("backend.sticker.category.create", [
            "category" => $category,
        ]);
    }

    public function store(StickerCategoryCreateRequest $request)
    {
        $category            = new StickerCategory;
        $category->parent_id = $request->get("parent_id") == 0 ? null : $request->get("parent_id");
        $category->name      = $request->get("name");
        $category->slug      = $request->get("slug");
        $category->icon      = $request->get("icon");
        $category->save();

        $category->sizes()->attach($request->get("sizes"));

        alert()->success("Kategori başarıyla kaydedildi!");
        return redirect()->route("backend.sticker.category.index");
    }

    public function edit(StickerCategory $category)
    {
        return view("backend.sticker.category.edit", [
            "category" => $category
        ]);
    }

    public function update(StickerCategoryEditRequest $request, StickerCategory $category)
    {
        $category->parent_id = $request->get("parent_id") == 0 ? null : $request->get("parent_id");
        $category->name      = $request->get("name");
        $category->slug      = $request->get("slug");
        $category->icon      = $request->get("icon");
        $category->save();

        $category->sizes()->sync($request->get("sizes"));

        alert()->success("Kategori başarıyla güncellendi!");
        return redirect()->route("backend.sticker.category.edit", $category->slug);
    }

    public function destroy(StickerCategory $category)
    {
        $category->delete();
        alert()->success("Kategori başarıyla silindi!");
        return redirect()->route("backend.sticker.category.index");
    }
}
