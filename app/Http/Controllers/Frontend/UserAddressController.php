<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\UserAddressCreateRequest;
use App\Http\Requests\UserAddressEditRequest;
use App\UserAddress;

class UserAddressController extends FrontendController
{
    public function index() {
        $addresses = auth()->user()->addresses;
        return view("user.address.index", [
            "addresses" => $addresses,
        ]);
    }

    public function create() {
        return view("user.address.create");
    }

    public function store(UserAddressCreateRequest $request) {
        $address = new UserAddress;
        $address->name = $request->get("name");
        $address->user_id = auth()->user()->id;
        $address->city_id = $request->get("city_id") != 0 ? $request->get("city_id") : null;
        $address->town = $request->get("town");
        $address->zipcode = $request->get("zipcode");
        $address->address = $request->get("address");
        $address->save();

        alert()->success("Adres bilgileriniz kayıt edildi!");
        return redirect()->route("frontend.user.address.index");
    }

    public function show(Request $request) {
        $json            = ["status" => true];
        $address =  UserAddress::where("user_id", auth()->user()->id)->where("id", $request->get("id"))->first();
        if($address){
            $json["address"] = $address;
        } else {
            $json["status"] = false;
            $json["error"]  = "Kayıtlı adres bulunamadı.";
        }
        return $json;
    }

    public function edit(UserAddress $address) {
        return view("user.address.edit", [
            "address" => $address,
        ]);
    }

    public function update(UserAddressEditRequest $request, UserAddress $address) {
        $address->name = $request->get("name");
        $address->city_id = $request->get("city_id") != 0 ? $request->get("city_id") : null;
        $address->town = $request->get("town");
        $address->zipcode = $request->get("zipcode");
        $address->address = $request->get("address");
        $address->save();

        alert()->success("Adres bilgileriniz güncellendi!");
        return redirect()->route("frontend.user.address.index");
    }

    public function destroy(UserAddress $address) {
        $address->delete();
        alert()->success("Adres bilgisi silindi!");
        return redirect()->route("frontend.user.address.index");
    }
}
