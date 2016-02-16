<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class SettingsController extends BackendController
{
    public function index()
    {
        return view("backend.settings.index");
    }

    public function update(Request $request)
    {
        \Settings::setData($request->except(["_token", "_method"]))->save();
        alert()->success("Site ayarları güncellendi!");
        return redirect()->route("backend.settings");
    }
}
