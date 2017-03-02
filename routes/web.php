<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'show',
    ]);

    Route::get('post/{id}', [
        'uses' => 'UserController@post',
        'as' => 'post'
    ]);

    Route::get('create', [
        'uses' => 'UserController@create',
        'as' => 'create_post'
    ]);

    Route::post('store', [
        'uses' => 'UserController@store',
        'as' => 'store'
    ]);


    Route::get('/home', 'HomeController@index');

    Route::get('about', [
        'uses' => 'UserController@about',
        'as' => 'about'
    ]);

    Route::get('video', [
        'uses' => 'UserController@video',
        'as' => 'video'
    ]);

    Route::get('contacts', [
        'uses' => 'UserController@contact',
        'as' => 'contacts'
    ]);

     Route::get('mail', [
         'uses' => 'UserController@sendMail',
         'as' => 'mail'
     ]);
});
Route::get('hello', function() {
    return 'Hello World';
});


Route::get('dima', function() {
    return 'Hello World dimka';
});