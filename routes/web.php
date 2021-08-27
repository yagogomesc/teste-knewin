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

use Illuminate\Support\Facades\Route;

Route::get('/', function() {return view('index')->with(['title' => 'Lista de noticias']);})->name('index');

Route::prefix('notices')->name('notices.')->group(function() {
    Route::get('/create', 'NoticesController@create')->name('create');
    Route::get('/show/{id}', 'NoticesController@show')->name('show');
});