<?php

Route::bind("sticker_category", function($value, $route) {
    return \App\StickerCategory::where("slug", $value)->firstOrFail();
});
Route::bind("sticker", function($value, $route) {
    return \App\Sticker::where("slug", $value)->firstOrFail();
});
Route::model("user_address", 'App\UserAddress');
Route::model("order", 'App\Order');

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function(){

        Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

        Route::get("sticker", ["as" => "sticker.index", "uses" => "StickerController@index"]);
        Route::get("sticker/{sticker}", ["as" => "sticker.show", "uses" => "StickerController@show"]);
        Route::get("sticker-category/{sticker_category}", ["as" => "sticker.category.show", "uses" => "StickerCategoryController@show"]);

        Route::get("cart", ["as" => "cart.index", "uses" => "CartController@index"]);
        Route::get("cart/content", ["as" => "cart.content", "uses" => "CartController@content"]);
        Route::post("cart/add/{sticker}", ["as" => "cart.add", "uses" => "CartController@add"]);
        Route::get("cart/remove/{rowid}", ["as" => "cart.remove", "uses" => "CartController@remove"]);
        Route::post("cart/update", ["as" => "cart.update", "uses" => "CartController@update"]);
        Route::get("cart/destroy", ["as" => "cart.destroy", "uses" => "CartController@destroy"]);

        Route::get("payment", ["as" => "payment.index", "uses" => "PaymentController@index"]);
        Route::post("payment", ["as" => "payment.store", "uses" => "PaymentController@payment"]);

        Route::get("page/{page}", ["as" => "page.show", "uses" => "PageController@show"]);

        Route::get("contact", ["as" => "contact.index", "uses" => "ContactController@index"]);

        Route::group(["middleware" => ["auth"]], function(){
            Route::get("user/settings", ["as" => "user.settings", "uses" => "UserController@settings"]);
            Route::put("user/settings", ["as" => "user.settings", "uses" => "UserController@doSettings"]);

            Route::get("user/address", ["as" => "user.address.index", "uses" => "UserAddressController@index"]);
            Route::get("user/address/create", ["as" => "user.address.create", "uses" => "UserAddressController@create"]);
            Route::post("user/address", ["as" => "user.address.store", "uses" => "UserAddressController@store"]);
            Route::post("user/address/show", ["as" => "user.address.show", "uses" => "UserAddressController@show"]);
            Route::get("user/address/{user_address}/edit", ["as" => "user.address.edit", "uses" => "UserAddressController@edit"]);
            Route::put("user/address/{user_address}", ["as" => "user.address.update", "uses" => "UserAddressController@update"]);
            Route::get("user/address/{user_address}/delete", ["as" => "user.address.destroy", "uses" => "UserAddressController@destroy"]);

            Route::get("user/payment", ["as" => "user.payment.index", "uses" => "UserPaymentController@index"]);
            Route::get("user/payment/{order}", ["as" => "user.payment.show", "uses" => "UserPaymentController@show"]);

            Route::get("logout", ["as" => "user.logout", "uses" => "UserController@logout"]);
        });

        Route::group(["middleware" => ["guest"]], function(){
            Route::get("login", ["as" => "user.login", "uses" => "UserController@login"]);
            Route::post("login", ["as" => "user.login", "uses" => "UserController@doLogin"]);

            Route::get("register", ["as" => "user.register", "uses" => "UserController@register"]);
            Route::post("register", ["as" => "user.register", "uses" => "UserController@doRegister"]);
        });
    });

    Route::group(["middleware" => ["admin"], "prefix" => "admin", "as" => "backend.", "namespace" => "Backend"], function(){
        Route::get("sticker", ["as" => "sticker.index", "uses" => "StickerController@index"]);

        Route::get("category", ["as" => "sticker.category.index", "uses" => "StickerCategoryController@index"]);

        Route::get("order", ["as" => "order.index", "uses" => "OrderController@index"]);

        Route::get("page", ["as" => "page.index", "uses" => "PageController@index"]);

        Route::get("user", ["as" => "user.index", "uses" => "UserController@index"]);

        Route::get("blog", ["as" => "blog.index", "uses" => "BlogController@index"]);

        Route::get("settings", ["as" => "settings", "uses" => "SettingsController@index"]);
    });

});
