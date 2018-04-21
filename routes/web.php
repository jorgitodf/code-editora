<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('categories', 'CategoriesController');
    Route::resource('books', 'BooksController');
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function() {
        Route::resource('books', 'BooksTrashedController', [
            'except' => ['create', 'store', 'edit', 'destroy']
        ]);
    });
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function() {
        Route::resource('categories', 'CategoriesTrashedController', [
            'except' => ['show', 'create', 'store', 'edit', 'update', 'destroy']
        ]);
    });
});