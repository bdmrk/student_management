<?php

// Home index routing
Route::get('/', 'frontend\HomeController@index')->name('home');

//admin main path
Route::get('/dashboard', 'backend\AdminConroller@index')->name('dash');

//Route::get('/dashboard', 'backend\AdminConroller@dashboard')->name('dash');
Route::prefix('backend')->group (
    function() {

        Route::resource('/students', 'backend\StudentController');

        Route::resource('/semester', 'backend\SemesterController');

        Route::get('/semester/change-status/{id}', 'backend\SemesterController@changeStatus')->name('semester.change-status');
        Route::resource('/subjects', 'backend\SubjectController');

        Route::resource('/teachers', 'backend\TeachersController');
        Route::get('/teachers/change-status/{id}', 'backend\TeachersController@changeStatus')->name('teachers.change-status');

        Route::resource('/syllabus', 'backend\SyllabusController');
    }
);


Auth::routes();

