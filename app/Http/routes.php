<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [ 'uses' => '\Mukuru\Controllers\PagesController@homepage' ]);

});

Route::group(['prefix' => 'api'], function () {
    Route::resource('order', '\Mukuru\Controllers\OrderController');
});
