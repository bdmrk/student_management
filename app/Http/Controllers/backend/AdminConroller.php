<?php

namespace App\Http\Controllers\backend;

use App\Models\Enroll;
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
        $data['enrolled'] = Enroll::count();
        $data['offeredCourse'] = Offer::with(['syllabus' => function($query){
            $query->where('status', true);
        }])->count();

        $data['totalBill'] = Enroll::sum('bill_amount');
        $data['paidAmount'] = Enroll::where('payment_status', true)->sum('bill_amount');
        return view('backend.dashboard', $data);
    }
//    public function dashboard(){
//        return view('backend.index');
//    }

}
