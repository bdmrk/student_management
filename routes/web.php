<?php

// Home index routing
Route::get('/', 'frontend\HomeController@index')->name('home');



//Route::get('/dashboard', 'backend\AdminConroller@dashboard')->name('dash');
Route::prefix('admin')->middleware('auth')->group (
    function() {
        //admin main path
Route::get('/dashboard', 'backend\AdminConroller@index')->name('dash');

        Route::resource('/students', 'backend\StudentController');

        Route::resource('/semester', 'backend\SemesterController');

        Route::get('/semester/change-status/{id}', 'backend\SemesterController@changeStatus')->name('semester.change-status');
        Route::resource('/subjects', 'backend\SubjectController');

        Route::resource('/teachers', 'backend\TeachersController');
        Route::get('/teachers/change-status/{id}', 'backend\TeachersController@changeStatus')->name('teachers.change-status');

        Route::resource('/syllabus', 'backend\SyllabusController');
        Route::get('/teachers/change-status/{id}', 'backend\SyllabusController@changeStatus')->name('syllabus.change-status');
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    }
);


Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');


Route::get('/home', 'HomeController@index')->name('home');
