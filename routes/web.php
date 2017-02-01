<?php


Route::get('/', [
   'uses' => 'UserController@index',
    'as' => 'show'
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

Auth::routes();

Route::get('/home', 'HomeController@index');
