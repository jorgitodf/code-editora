<?php

Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', 'CategoriesController');
    Route::resource('books', 'BooksController');
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function() {
        Route::resource('books', 'BooksTrashedController', [
            'except' => ['create', 'store', 'edit', 'destroy']
        ]);
    });
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function() {
        Route::resource('users', 'CategoriesTrashedController', [
            'except' => ['show', 'create', 'store', 'edit', 'update', 'destroy']
        ]);
    });
});


