<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('index');
    });

Route::group(['prefix' => 'api'], function () {
    Route::resource('order', '\Mukuru\Controllers\OrderController');
});
