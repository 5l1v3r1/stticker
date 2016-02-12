<?php

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'Frontend'], function(){

        Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

    });

});
