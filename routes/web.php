<?php

Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

Route::get('/', function () { return view('index'); })->middleware('guest');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/articles', 'ArticleController@index')->name('articles.index');
    Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');

    Route::post('/users/{user}/avatar', 'UserImageController@store')->name('avatar');
    Route::delete('/users/{user}/avatar', 'UserImageController@destroy')->name('avatar.delete');

    Route::get('/users/{user}', 'UserController@show')->name('user');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::patch('/users/{user}/edit', 'UserController@update')->name('user.update');

    Route::get('/articles/{article}/comments', 'CommentController@index')->name('comments.index');
    Route::post('/articles/{article}/comments', 'CommentController@store')->name('comments.store');
    Route::delete('/comments/{comment}/delete', 'CommentController@destroy')->name('comment.delete');
    Route::patch('/comments/{comment}/update', 'CommentController@update')->name('comment.update');
});

Route::prefix('admin')->middleware('auth','verified','admin')->group(function() {
    Route::get('/users', 'AdminUserController@index')->name('users');
    Route::get('/users/{user}/edit', 'AdminUserController@edit')->name('admin.user.edit');
    Route::patch('/users/{user}/update', 'AdminUserController@update')->name('admin.user.update');
    Route::post('/users/{user}/avatar', 'AdminUserImageController@store')->name('admin.avatar');
    Route::delete('/users/{user}/avatar', 'AdminUserImageController@destroy')->name('admin.avatar.delete');
    Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('/articles/store', 'ArticleController@store')->name('articles.store');
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('articles.edit');
    Route::patch('/articles/{article}/update', 'ArticleController@update')->name('articles.update');
    Route::delete('/articles/{article}/delete', 'ArticleController@destroy')->name('articles.delete');
});
