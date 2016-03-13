<?php

namespace App\Http\Controllers\Frontend;

use App\Sticker;
use App\StickerSize;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use Cart;
use App\Http\Requests\PaymentCreateRequest;
use App\Order;
use App\OrderSticker;
use App\UserAddress;
use App\User;
use App\Http\Requests\SpecialStickerRequest;

class PaymentController extends FrontendController
{
    public function index() {
        return view("payment.index", [
            "cart" => Cart::content(),
            "cargo" => Cart::total() >= 30.00 ? 0.00 : 5.00,
        ]);
    }

    public function payment(PaymentCreateRequest $request) {

        if(!auth()->check()){
            if(User::where("email", $request->get("email"))->count() > 0)
                return redirect()->back()->withErrors(["email" => "Bu E-postaya ait bir kullanıcı bulunmaktadır. Lütfen giriş yaptıktan sonra siparişinizi tamamlayınız."])->withInput();
            $user = new User;
            $user->name = $request->get("name");
            $user->email = $request->get("email");
            $password = str_random(10);
            $user->password = bcrypt($password);
            $user->phone = $request->get("phone");
            $user->save();

            \Mail::send('emails.new-user', ['user' => $user, 'password' => $password], function($m) use ($user) {
                $m->from("no-reply@stticker.com", "Stticker.com");
                $m->to($user->email, $user->name)->subject("Stticker.com - Üyelik Bilgileriniz");
            });

            \Auth::login($user);
        }

        $order = new Order;

        do {
            $code = strtoupper(substr(\App\City::find($request->get("city_id"))->name, 0, 3)).strtolower(str_random(5));
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
        $order->user_id      = auth()->user()->id;

        $total = 0;
        foreach(Cart::content() as $sticker) {
            $total += $sticker->price * $sticker->qty;
        }
        $order->total = $total;
        $order->cargo = $total >= 30.00 ? 0.00 : 5.00;

        $order->save();

        foreach(Cart::content() as $sticker) {
            if($sticker->options->file) {
                $product             = new OrderSticker;
                $product->order_id   = $order->id;
                $product->sticker_id = null;
                $product->quantity   = $sticker->qty;
                $product->size = $sticker->options->size;
                $product->name       = "Özel Tasarım";
                $product->image      = null;
                $product->price      = $sticker->price;
                $product->is_special = true;
                $product->file       = $sticker->options->file;
                $product->save();
            } else {
                $size = StickerSize::find($sticker->options->size);
                $s = Sticker::where("slug", $sticker->options->sticker)->first();
                $product             = new OrderSticker;
                $product->order_id   = $order->id;
                $product->sticker_id = $s->id;
                $product->quantity   = $sticker->qty;
                $product->size = $size->name;
                $product->name       = $s->name;
                $product->image      = $s->image;
                $product->price      = $sticker->price * $sticker->qty;
                $product->is_special = false;
                $product->save();
            }
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

        \Mail::send('emails.new-order', ['order' => $order], function($m) use ($order) {
            $m->from("no-reply@stticker.com", "Stticker.com");
            $m->to(auth()->user()->email, auth()->user()->name)->subject("Stticker.com - Siparişiniz Oluşturuldu");
        });

        alert()->success("Siparişiniz başarıyla oluşturulmuştur. Ödeme işleminizi gerçekleştirdikten sonra ürünleriniz adresinize kargolanacaktır.");
        return redirect()->route("frontend.user.payment.show", $order->id);
    }

    public function special(SpecialStickerRequest $request)
    {
        do {
            $filename = str_slug($request->file("file")->getClientOriginalName())."-".str_random(3).".".$request->file("file")->getClientOriginalExtension();
        } while(\File::exists(storage_path("app/special/".$filename)));
        $request->file("file")->move(storage_path("app/special"), $filename);

        Cart::add(str_random(9), "Özel Tasarım Sticker", 1, $request->get("price"), [
            "file" => $filename,
            "size" => $request->get("quantity")
        ]);

        alert()->success("Özel tasarım sticker sepete eklendi.");
        return redirect()->route("frontend.cart.index");
    }
}
