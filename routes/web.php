<?php

// Home index routing
Route::get('/', 'frontend\HomeController@index')->name('home');



//Route::get('/dashboard', 'backend\AdminConroller@dashboard')->name('dash');
Route::prefix('admin')->middleware('auth')->group (
    function() {
        //admin main path
Route::get('/dashboard', 'backend\AdminConroller@index')->name('dash');

        Route::resource('/students', 'backend\StudentController');
        Route::get('/student/change-status/{id}', 'backend\StudentController@changeStatus')->name('student.change-status');


        Route::resource('/semester', 'backend\SemesterController');
        Route::get('/semester/change-status/{id}', 'backend\SemesterController@changeStatus')->name('semester.change-status');
       

        Route::resource('/teachers', 'backend\TeachersController');
        Route::get('/teachers/change-status/{id}', 'backend\TeacherController@changeStatus')->name('k');

        Route::resource('/course', 'backend\CourseController');
        Route::get('/course/change-status/{id}', 'backend\CourseController@changeStatus')->name('course.change-status');

        Route::resource('/syllabus', 'backend\SyllabusController');
        Route::get('/teachers/change-status/{id}', 'backend\SyllabusController@changeStatus')->name('syllabus.change-status');
       
       //logout route
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        //Ajax Route

        Route::get('/ajax/get-syllabus/{program_id}', 'backend\SyllabusController@getSyllabus')->name('ajax.get-syllabus');
    }
);


Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');


Route::get('/home', 'HomeController@index')->name('home');
