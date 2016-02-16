<?php

namespace App\Http\Controllers\Backend;

use App\Page;
use App\Http\Requests\Backend\PageCreateRequest;
use App\Http\Requests\Backend\PageEditRequest;

class PageController extends BackendController
{
    public function index()
    {
        $pages = Page::all();
        return view("backend.page.index", [
            "pages" => $pages,
        ]);
    }

    public function create()
    {
        return view("backend.page.create");
    }

    public function store(PageCreateRequest $request)
    {
        $page              = new Page;
        $page->name        = $request->get("name");
        $page->slug        = $request->get("slug");
        $page->description = $request->get("description");
        $page->content     = $request->get("content");
        $page->save();

        alert()->success("Sayfa başarıyla oluşturuldu!");
        return redirect()->route("backend.page.index");
    }

    public function edit(Page $page)
    {
        return view("backend.page.edit", [
            "page" => $page,
        ]);
    }

    public function update(PageEditRequest $request, Page $page)
    {
        $page->name        = $request->get("name");
        $page->slug        = $request->get("slug");
        $page->description = $request->get("description");
        $page->content     = $request->get("content");
        $page->save();

        alert()->success("Sayfa başarıyla güncellendi!");
        return redirect()->route("backend.page.edit", $page->slug);
    }

    public function destroy(Page $page)
    {
        $page->delete();
        alert()->success("Sayfa başarıyla silindi!");
        return redirect()->route("backend.page.index");
    }
}
