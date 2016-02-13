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

        Route::get("user/settings", ["as" => "user.settings", "uses" => "UserController@settings"]);

        Route::get("user/address", ["as" => "user.address.index", "uses" => "UserAddressController@index"]);
        Route::get("user/address/create", ["as" => "user.address.create", "uses" => "UserAddressController@create"]);

        Route::get("login", ["as" => "user.login", "uses" => "UserController@login"]);
        Route::get("register", ["as" => "user.register", "uses" => "UserController@register"]);

    });

});
