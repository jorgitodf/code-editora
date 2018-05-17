<?php

Route::group(['middleware' => ['auth', config('codeeduuser.middleware.isVerified')]], function(){
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


