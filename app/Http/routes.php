<?php

Route::get('/', 'HomeController@index');
Route::get('admin', function(){return view('admin');});
Route::get('category/{id}', 'CategoryController@show')->where('id', '[0-9]+');
Route::get('article/{id}', 'ArticleController@show')->where('id', '[0-9]+');


Route::controllers([
    'admin/categories' => 'CategoryController',
    'admin/articles' => 'ArticleController',
]);
