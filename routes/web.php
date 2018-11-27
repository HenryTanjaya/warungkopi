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

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

Auth::routes();
Route::resource('menu', 'MenuController');
Route::resource('order', 'OrderController');
Route::resource('category', 'CategoryController');
Route::resource('type', 'TypeController');
