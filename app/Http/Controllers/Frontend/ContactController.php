<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\ContactSendRequest;

class ContactController extends FrontendController
{
    public function index() {
        return view("contact.index");
    }

    public function send(ContactSendRequest $request) {
        \Mail::send('emails.contact', [
            "name"    => $request->get("name"),
            "email"   => $request->get("email"),
            "phone"   => $request->get("phone"),
            "content" => $request->get("message"),
        ], function($m) {
            $m->to(\Settings::get('contact_send_email'), \Settings::get('name'))->subject("İletişim Mesajı");
        });

        alert()->success("İletişim mesajınız başarıyla gönderildi!");
        return redirect()->back();
    }
}
