<?php

use Illuminate\Http\Request;

//Route::get('/articles/{article}/comments', 'CommentController@index');
//
//Route::middleware('auth:api')->group(function () {
//    Route::post('/article/{article}/comment', 'CommentController@store');
//});
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
