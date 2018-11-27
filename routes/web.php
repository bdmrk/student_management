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

// Home index routing
Route::get('/', 'front\HomeController@index')->name('home');

//admin index routing
Route::get('/dashboard', 'admin\AdminConroller@index')->name('dash');
//Route::get('/dashboard', 'admin\AdminConroller@dashboard')->name('dash');
Route::prefix('admin')->group (
    function() {
        Route::resource('/students', 'admin\StudentController');
        //Route::resource('/test', 'admin\Test');
        Route::resource('/semester', 'admin\SemesterController');
        Route::get('/semester/change-status/{id}', 'admin\SemesterController@changeStatus')->name('semester.change-status');
    }
);


Auth::routes();

