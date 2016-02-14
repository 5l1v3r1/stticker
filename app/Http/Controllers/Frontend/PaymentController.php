<?php

namespace App\Http\Controllers\Frontend;

use App\Sticker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use Cart;
use App\Http\Requests\PaymentCreateRequest;
use App\Order;
use App\OrderSticker;
use App\UserAddress;

class PaymentController extends FrontendController
{
    public function index() {
        return view("payment.index", [
            "cart" => Cart::content(),
            "cargo" => Cart::total() >= 30.00 ? 0.00 : 5.00,
        ]);
    }

    public function payment(PaymentCreateRequest $request) {
        $order = new Order;

        do {
            $code = substr(\App\City::find($request->get("city_id"))->name, 0, 3).str_random(5);
        } while(Order::where("code", $code)->count());
        $order->code         = $code;
        $order->name         = $request->get("name");
        $order->email        = $request->get("email");
        $order->phone        = $request->get("phone");
        $order->town         = $request->get("town");
        $order->zipcode      = $request->get("zipcode");
        $order->address      = $request->get("address");
        $order->notes        = $request->get("notes");
        $order->payment_type = $request->get("payment");
        $order->city_id      = $request->get("city_id");
        $order->user_id      = auth()->check() ? auth()->user()->id : null;
        $order->save();

        foreach(Cart::content() as $sticker) {
            $product             = new OrderSticker;
            $product->order_id   = $order->id;
            $product->sticker_id = Sticker::where("slug", $sticker->options->sticker)->first()->id;
            $product->quantity   = $sticker->qty;
            $product->size       = $sticker->options->size;
            $product->save();
        }

        if($request->has("remember")){
            $address          = new UserAddress;
            $address->name    = $request->get("address_name");
            $address->user_id = auth()->user()->id;
            $address->city_id = $request->get("city_id") != 0 ? $request->get("city_id") : null;
            $address->town    = $request->get("town");
            $address->zipcode = $request->get("zipcode");
            $address->address = $request->get("address");
            $address->save();
        }

        Cart::destroy();

        alert()->success("Siparişiniz başarıyla oluşturulmuştur. Ödeme işleminizi gerçekleştirdikten sonra ürünleriniz adresinize kargolanacaktır.");
        return redirect()->route("frontend.user.payment.show", $order->id);
    }
}
