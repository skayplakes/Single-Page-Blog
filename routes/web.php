<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//landing page
Route::get('/', 'Controller@index');

//captcha
Route::get('/captcha', 'Controller@captcha');

//login
Route::get('/login', 'Auth\LoginController@showLoginForm'); //check this later
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

//dashboard & admin panel
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'Controller@dashboard');
    Route::get('/dashboard/posts/{id}/export', 'Api\PostController@export');
    Route::any('/dashboard/{any}', 'Controller@dashboard')->where('any', '.*');
});

//Must be placed between other routes
Route::any('/{any}', 'Controller@index')->where('any', '.*');