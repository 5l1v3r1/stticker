<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\CartAddRequest;
use App\Sticker;
use Cart;

class CartController extends FrontendController
{
    public function index() {
        $cart = Cart::content();

        $cargo = Cart::total() >= 30.00 ? 0.00 : 5.00;

        return view("cart.index", [
            "cart" => $cart,
            "cargo" => $cargo,
        ]);
    }

    public function content() {
        return Cart::content();
    }

    public function add(CartAddRequest $request, Sticker $sticker) {
        if($request->get("size") == "small") {
            $price = 1.00;
        } elseif($request->get("size") == "middle") {
            $price = 1.50;
        } elseif($request->get("size") == "big") {
            $price = 2.00;
        } elseif($request->get("size") == "extra_big") {
            $price = 2.50;
        }
        Cart::add($request->get("size")."-".$sticker->slug, $sticker->name, $request->get("quantity"), $price, [
            'size'     => $request->get("size"),
            "sticker"  => $sticker->slug,
        ]);
        return Cart::content();
    }

    public function update(Request $request) {
        if($request->get("cart")){
            foreach($request->get("cart") as $row => $quantity) {
                Cart::update($row, ["qty" => $quantity]);
            }
        }
        alert()->success("Sepetiniz güncellendi!");
        return redirect()->back();
    }

    public function remove($row) {
        Cart::remove($row);
        alert()->success("Ürün sepetinizden kaldırıldı!");
        return redirect()->back();
    }

    public function destroy() {
        Cart::destroy();
        return ["status" => true];
    }
}
