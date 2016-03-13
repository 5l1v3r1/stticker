<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;

class PageController extends FrontendController
{
    public function show($page) {
        return view("page.show", [
            "page" => $page,
        ]);
    }
}
