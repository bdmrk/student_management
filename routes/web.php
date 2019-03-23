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
        Route::get('/student/select/{id}', 'backend\StudentController@selectStudent')->name('student.select');


        Route::resource('/semester', 'backend\SemesterController');
        Route::get('/semester/change-status/{id}', 'backend\SemesterController@changeStatus')->name('semester.change-status');
       

        Route::resource('/teachers', 'backend\TeachersController');

        //Route::get('/teachers/change-status/{id}', 'backend\TeachersController@changeStatus')->name('teachers.change-status');
        Route::get('/teacher/change-status/{id}', 'backend\TeachersController@changeStatus')->name('teacher.change-status');

        Route::resource('/course', 'backend\CourseController');
        Route::get('/course/change-status/{id}', 'backend\CourseController@changeStatus')->name('course.change-status');

        Route::resource('/syllabus', 'backend\SyllabusController');
        Route::get('/teachers/change-status/{id}', 'backend\SyllabusController@changeStatus')->name('syllabus.change-status');
       

        Route::get('/offer/change-status/{id}', 'backend\OfferController@changeStatus')->name('offer.change-status');
        Route::resource('/offer', 'backend\OfferController');
      
        //logout route
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');



        //Ajax Route

        Route::get('/ajax/get-syllabus/{program_id}', 'backend\SyllabusController@getSyllabusByProgramId')->name('ajax.get-syllabus');
        Route::get('/ajax/get-prerequisite-course-by-syllabus-id/{syllabus_id}', 'backend\CourseController@getCourseBySyllabusId');
    }
);


Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/student-login', 'Auth\StudentLoginController@showLoginForm')->name('student-login');
Route::post('/student-login', 'Auth\StudentLoginController@postLogin')->name('student-login');
Route::get('/teacher-login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher-login');
Route::post('/teacher-login', 'Auth\TeacherLoginController@postLogin')->name('teacher-login');


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('student')->middleware('auth:student')->group (
    function() {
        Route::get('/dashboard', 'Student\StudentController@dashboard')->name('student-dash');
        Route::get('/enroll', 'Student\StudentController@enroll')->name('student-enroll');
        Route::post('/enroll', 'Student\StudentController@store')->name('enroll.store');
        Route::get('/semester', 'Student\StudentController@enrolledSemester')->name('enroll.semester');
        Route::get('/print-payment-slip/{enroll_id}', 'Student\StudentController@printPaymentSlip')->name('student.print.payment-slip');

        Route::get('logout', 'Auth\StudentLoginController@logut')->name('student-logout');
    });

Route::prefix('teacher')->middleware('auth:teacher')->group (
    function() {
        Route::get('/dashboard', 'Teacher\TeacherController@dashboard')->name('teacher-dash');
        Route::get('/marks-entry', 'Teacher\TeacherController@marksEntry')->name('marks-entry');
        Route::get('/show-courses', 'Teacher\TeacherController@showCourses')->name('show-courses');
        Route::post('/ajax/save-mark', 'Teacher\TeacherController@saveMark')->name('save-mark');

        Route::get('logout', 'Auth\TeacherLoginController@logut')->name('teacher-logout');
    });