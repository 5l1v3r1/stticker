<?php

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function(){

        Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

        Route::get("sticker", ["as" => "sticker.index", "uses" => "StickerController@index"]);

    });

});
