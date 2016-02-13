<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
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
}
