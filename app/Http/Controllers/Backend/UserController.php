<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Requests\Backend\UserCreateRequest;
use App\Http\Requests\Backend\UserEditRequest;

class UserController extends BackendController
{
    public function index()
    {
        $users = User::orderBy("created_at", "DESC")->paginate(20);
        return view("backend.user.index", [
            "users" => $users,
        ]);
    }

    public function create()
    {
        return view("backend.user.create");
    }

    public function store(UserCreateRequest $request)
    {
        $user = new User;
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->password = bcrypt($request->get("password"));
        $user->phone    = $request->get("phone");
        $user->facebook = $request->get("facebook");
        $user->twitter = $request->get("twitter");
        $user->github = $request->get("github");
        $user->bio = $request->get("bio");
        $user->is_admin = $request->get("role") == "admin" ? true : false;
        $user->save();

        alert()->success("Kullanıcı başarıyla oluşturuldu!");
        return redirect()->route("backend.user.index");
    }

    public function edit(User $user)
    {
        return view("backend.user.edit", [
            "user" => $user,
        ]);
    }

    public function update(UserEditRequest $request, User $user)
    {
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        if($request->has("password")){
            $user->password = bcrypt($request->get("password"));
        }
        $user->phone    = $request->get("phone");
        $user->facebook = $request->get("facebook");
        $user->twitter = $request->get("twitter");
        $user->github = $request->get("github");
        $user->bio = $request->get("bio");
        $user->is_admin = $request->get("role") == "admin" ? true : false;
        $user->save();

        alert()->success("Kullanıcı başarıyla güncellendi!");
        return redirect()->route("backend.user.edit", $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        alert()->success("Kullanıcı başarıyla silindi!");
        return redirect()->route("backend.user.index");
    }
}
