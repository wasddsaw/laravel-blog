<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/users/{id}', function ($id) {
    return $id;
});

Route::get('/hello', function () {
    return 'hello there !!';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');


Route::auth();

Route::get('/home', 'HomeController@index');

