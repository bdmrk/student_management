<?php

namespace App\Http\Controllers\Student;

use App\Models\Enroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $data['enrolledCourses'] =  Enroll::with('offer.course')->where('student_id', Auth::guard('student')->user()->id)->get();
        return view('student.dashboard', $data);
    }

    public function enroll()
    {
        return view('student.enroll_form');
    }
}
