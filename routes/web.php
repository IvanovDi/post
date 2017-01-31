<?php


Route::get('/', [
   'uses' => 'UserController@index',
    'as' => 'show'
]);

Route::get('post/{id}', [
    'uses' => 'UserController@post',
    'as' => 'post'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
