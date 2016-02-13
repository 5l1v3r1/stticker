<?php

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function(){

        Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

        Route::get("sticker", ["as" => "sticker.index", "uses" => "StickerController@index"]);
        Route::get("sticker/{sticker}", ["as" => "sticker.show", "uses" => "StickerController@show"]);

        Route::get("cart", ["as" => "cart.index", "uses" => "CartController@index"]);
        Route::get("payment", ["as" => "payment.index", "uses" => "PaymentController@index"]);

    });

});
