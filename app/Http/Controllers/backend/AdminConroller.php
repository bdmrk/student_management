<?php

namespace App\Http\Controllers\backend;

use App\Models\Offer;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminConroller extends Controller
{
    public function dashboard()
    {
        $data['totalStudent'] = Student::count();
        $data['totalTeacher'] = Teacher::count();
        $data['offeredCourse'] = Offer::with(['syllabus' => function($query){
            $query->where('status', true);
        }])->count();
        return view('backend.dashboard', $data);
    }
//    public function dashboard(){
//        return view('backend.index');
//    }

}
