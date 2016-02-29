<?php

Route::bind("sticker_category", function($value, $route) {
    return \App\StickerCategory::where("slug", $value)->firstOrFail();
});
Route::bind("sticker", function($value, $route) {
    return \App\Sticker::where("slug", $value)->firstOrFail();
});
Route::model("user_address", 'App\UserAddress');
Route::model("order", 'App\Order');
Route::bind("page", function($value, $route){
    return \App\Page::where("slug", $value)->firstOrFail();
});
Route::model("user", 'App\User');

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

        Route::post("payment/special", ["as" => "payment.special", "uses" => "PaymentController@special"]);

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
        Route::get("sticker/create", ["as" => "sticker.create", "uses" => "StickerController@create"]);
        Route::post("sticker", ["as" => "sticker.store", "uses" => "StickerController@store"]);
        Route::get("sticker/{sticker}/edit", ["as" => "sticker.edit", "uses" => "StickerController@edit"]);
        Route::put("sticker/{sticker}", ["as" => "sticker.update", "uses" => "StickerController@update"]);
        Route::get("sticker/{sticker}/delete", ["as" => "sticker.destroy", "uses" => "StickerController@destroy"]);

        Route::get("category/create", ["as" => "sticker.category.create", "uses" => "StickerCategoryController@create"]);
        Route::post("category", ["as" => "sticker.category.store", "uses" => "StickerCategoryController@store"]);
        Route::get("category/{sticker_category?}", ["as" => "sticker.category.index", "uses" => "StickerCategoryController@index"]);
        Route::get("category/{sticker_category}/edit", ["as" => "sticker.category.edit", "uses" => "StickerCategoryController@edit"]);
        Route::put("category/{sticker_category}", ["as" => "sticker.category.update", "uses" => "StickerCategoryController@update"]);
        Route::get("category/{sticker_category}/delete", ["as" => "sticker.category.destroy", "uses" => "StickerCategoryController@destroy"]);

        Route::get("order", ["as" => "order.index", "uses" => "OrderController@index"]);
        Route::get("order/{order}", ["as" => "order.show", "uses" => "OrderController@show"]);
        Route::put("order/{order}", ["as" => "order.update", "uses" => "OrderController@update"]);

        Route::get("page", ["as" => "page.index", "uses" => "PageController@index"]);
        Route::get("page/create", ["as" => "page.create", "uses" => "PageController@create"]);
        Route::post("page", ["as" => "page.store", "uses" => "PageController@store"]);
        Route::get("page/{page}/edit", ["as" => "page.edit", "uses" => "PageController@edit"]);
        Route::put("page/{page}", ["as" => "page.update", "uses" => "PageController@update"]);
        Route::get("page/{page}/delete", ["as" => "page.destroy", "uses" => "PageController@destroy"]);

        Route::get("user", ["as" => "user.index", "uses" => "UserController@index"]);
        Route::get("user/create", ["as" => "user.create", "uses" => "UserController@create"]);
        Route::post("user", ["as" => "user.store", "uses" => "UserController@store"]);
        Route::get("user/{user}/edit", ["as" => "user.edit", "uses" => "UserController@edit"]);
        Route::put("user/{user}", ["as" => "user.update", "uses" => "UserController@update"]);
        Route::get("user/{user}/delete", ["as" => "user.destroy", "uses" => "UserController@destroy"]);

        Route::get("blog", ["as" => "blog.index", "uses" => "BlogController@index"]);

        Route::get("settings", ["as" => "settings", "uses" => "SettingsController@index"]);
        Route::put("settings", ["as" => "settings", "uses" => "SettingsController@update"]);
    });

});
