<?php

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function(){

        Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

        Route::get("sticker", ["as" => "sticker.index", "uses" => "StickerController@index"]);
        Route::get("sticker/{sticker}", ["as" => "sticker.show", "uses" => "StickerController@show"]);

        Route::get("cart", ["as" => "cart.index", "uses" => "CartController@index"]);
        Route::get("payment", ["as" => "payment.index", "uses" => "PaymentController@index"]);

        Route::get("page/{page}", ["as" => "page.show", "uses" => "PageController@show"]);

        Route::get("contact", ["as" => "contact.index", "uses" => "ContactController@index"]);

        Route::group(["middleware" => ["auth"]], function(){
            Route::get("user/settings", ["as" => "user.settings", "uses" => "UserController@settings"]);

            Route::get("user/address", ["as" => "user.address.index", "uses" => "UserAddressController@index"]);
            Route::get("user/address/create", ["as" => "user.address.create", "uses" => "UserAddressController@create"]);

            Route::get("user/payment", ["as" => "user.payment.index", "uses" => "UserPaymentController@index"]);
            Route::get("user/payment/{user_payment}", ["as" => "user.payment.show", "uses" => "UserPaymentController@show"]);

            Route::get("logout", ["as" => "user.logout", "uses" => "UserController@logout"]);
        });

        Route::group(["middleware" => ["guest"]], function(){
            Route::get("login", ["as" => "user.login", "uses" => "UserController@login"]);
            Route::post("login", ["as" => "user.login", "uses" => "UserController@doLogin"]);

            Route::get("register", ["as" => "user.register", "uses" => "UserController@register"]);
            Route::post("register", ["as" => "user.register", "uses" => "UserController@doRegister"]);
        });
    });

});
