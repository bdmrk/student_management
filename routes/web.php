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
Route::get('/', 'frontend\HomeController@index')->name('home');

//backend index routing
Route::get('/dashboard', 'backend\AdminConroller@index')->name('dash');
//Route::get('/dashboard', 'backend\AdminConroller@dashboard')->name('dash');
Route::prefix('backend')->group (
    function() {
        Route::resource('/students', 'backend\StudentController');
        //Route::resource('/test', 'backend\Test');
        Route::resource('/semester', 'backend\SemesterController');
        Route::get('/semester/change-status/{id}', 'backend\SemesterController@changeStatus')->name('semester.change-status');
        Route::resource('/subjects', 'backend\SubjectController');
    }
);


Auth::routes();

