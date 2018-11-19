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
Route::get('/dashboard', 'admin\AdminConroller@index')->name('dash');
//Route::get('/dashboard', 'admin\AdminConroller@dashboard')->name('dash');

Route::get('/', function () {
    return view('welcome');
});
