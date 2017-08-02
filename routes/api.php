<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['namespace' => 'Api'], function() {
    
    //Category
    Route::get('/categories', 'ArchiveController@categories');
    Route::get('/categories/{name}/posts', 'ArchiveController@getPostsByCategory');

    //Tags
    Route::get('/tags', 'ArchiveController@tags');
    Route::get('/tags/{name}/posts', 'ArchiveController@getPostsByTag');

    //Dates of posts
    Route::get('/posts', 'PostController@all');
    Route::get('/posts/{slug}', 'PostController@getBySlug');
    Route::post('/posts/{id}/likes', 'PostController@like');

    //Comments
    Route::get('/posts/{id}/comments', 'CommentController@getByPost');
    Route::post('/posts/{id}/comments', 'CommentController@store');

    //Misc
    Route::get('/links', 'SettingController@links');
    Route::get('/pages/{name}', 'PageController@page');


    /*
    |--------------------------------------------------------------------------
    | Dashboard API Routes
    |--------------------------------------------------------------------------
    */

    

});