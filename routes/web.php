<?php

// blog

Route::get('/index', 'IndexController@index');

Route::get('/category/{id}', 'PostController@showByCategoryId');
Route::get('post/{id}/edit', 'PostController@showEdit');
Route::get('/post/{id}', 'PostController@showById')->where('id', '^[0-9]*$');;
Route::get('/post/create', 'PostController@showCreate'); // post/create  PostController@showCreate  Route::get('/addpost', 'PostController@showCreate');

    //


Route::post('/addpost/get', 'PostController@getcreate'); // post/create      PostController@create -
Route::post('/post/edit', 'PostController@edit');
Route::get('post/{id}/delete', 'PostController@delete'); // post/{id}/delete

?>
