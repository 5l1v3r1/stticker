<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSettingsRequest;
use App\User;

class UserController extends FrontendController
{
    public function login() {
        return view("user.login");
    }

    public function doLogin(UserLoginRequest $request) {
        if(auth()->attempt(["email" => $request->get("email"), "password" => $request->get("password")], true)) {
            auth()->user()->last_login = \Carbon\Carbon::now();
            auth()->user()->save();

            alert()->success("Başarıyla giriş yaptınız!");
            return redirect()->route("frontend.home.index");
        } else {
            return redirect()->route("frontend.user.login")->withErrors(["email" => "E-Posta veya şifre hatalı."])->withInput();
        }
    }

    public function register() {
        return view("user.register");
    }

    public function doRegister(UserRegisterRequest $request) {
        $user = new User;
        $user->email = $request->get("email");
        $user->password = bcrypt($request->get("password"));
        $user->last_login = \Carbon\Carbon::now();
        $user->save();

        auth()->login($user);
        alert()->success("Başarıyla kayıt oldunuz!");
        return redirect()->route("frontend.home.index");
    }

    public function logout() {
        auth()->logout();

        alert()->success("Başarıyla çıkış yaptınız!");
        return redirect()->route("frontend.home.index");
    }

    public function settings() {
        return view("user.settings");
    }

    public function doSettings(UserSettingsRequest $request) {
        auth()->user()->name     = $request->get("name");
        auth()->user()->phone    = $request->get("phone");
        auth()->user()->facebook = $request->get("facebook");
        auth()->user()->twitter  = $request->get("twitter");
        auth()->user()->github   = $request->get("github");
        auth()->user()->bio      = $request->get("bio");
        auth()->user()->save();

        alert()->success("Kullanıcı bilgileriniz başarıyla güncellendi!");
        return redirect()->route("frontend.user.settings");
    }
}
