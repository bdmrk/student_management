<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\Enum\EnrollCourseStatusEnum;
use App\Helpers\Enum\EnrollStatusEnum;
use App\Models\Enroll;
use App\Models\EnrolledCourse;
use App\Models\Offer;
use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;

class TeacherController extends Controller
{
    public function dashboard()
    {
//        dd($data);
        return view('teacher.dashboard' );
    }

    public function showCourses()
    {
        $data['courses'] = EnrolledCourse::with(['enroll.semester','student','offer' => function($query) {
            $query->with('course')->where('teacher_id', auth()->guard('teacher')->user()->id);
        }])->get();
        return view('teacher.show-courses', $data);
    }

    public function marksEntry()
    {
        $data['courses'] = EnrolledCourse::with(['enroll.semester','student','offer' => function($query) {
            $query->with('course')->where('teacher_id', auth()->guard('teacher')->user()->id);
        }])->where('status', EnrollStatusEnum::Running)->get();
        return view('teacher.marks-entry', $data);
    }

    public function calculateCgpa($mark) {
        $cgpa = 0;

        if ($mark >= 80) {
            $cgpa = 4;
        } elseif ($mark >= 75) {
            $cgpa = 3.75;
        } elseif ($mark >= 70) {
            $cgpa = 3.50;
        } elseif ($mark >= 65) {
            $cgpa = 3.25;
        } elseif ($mark >= 60) {
            $cgpa = 3.00;
        } elseif ($mark >= 55) {
            $cgpa = 2.75;
        } elseif ($mark >= 50) {
            $cgpa = 2.50;
        } elseif ($mark >= 45) {
            $cgpa = 2.25;
        } elseif ($mark >= 40) {
            $cgpa = 2;
        } else {
            $cgpa = 0;
        }
        return $cgpa;
    }

    public function calculateGrade($cgpa)
    {
        $grade = "F";

        if ($cgpa >= 4) {
            $grade = "A+";
        } elseif ($cgpa >= 3.75) {
            $grade = "A";
        } elseif ($cgpa >= 3.50) {
            $grade = "A-";
        } elseif ($cgpa >= 3.25) {
            $grade = "B+";
        } elseif ($cgpa >= 3.00) {
            $grade = "B";
        } elseif ($cgpa >= 2.75) {
            $grade = "B-";
        } elseif ($cgpa >= 2.50) {
            $grade = "C+";
        } elseif ($cgpa >= 2.25) {
            $grade = "C";
        } elseif ($cgpa >= 2) {
            $grade = "D";
        } else {
            $grade = "F";
        }
        return $grade;
    }


    public function saveMark(Request $request)
    {
       $validator = Validator::make($request->all(),[
           'incourse_mark' => "required|numeric",
           'final_mark' => "required|numeric"
       ]);

       if ($validator->fails()) {
           return response()->json(['status'=> false, 'message' => $validator->errors()->first()]);
       } else {
            $totalMark = ($request->input('incourse_mark') + $request->input('final_mark'));
            $cgpa = $this->calculateCgpa($totalMark);
            $grade = $this->calculateGrade($cgpa);

            $course = EnrolledCourse::findOrFail($request->input('enrolled_course_id'));
            $course->incourse_mark = $request->input('incourse_mark');
            $course->final_mark = $request->input('final_mark');
            $course->cgpa = $cgpa;
            $course->grade = $grade;

            if ($cgpa > 2) {
                $course->status = EnrollCourseStatusEnum::Passed;
            } else {
                $course->status = EnrollCourseStatusEnum::Failed;
            }

            $course->save();
            return response()->json(['status' => true, 'message' => "Mark has added succesfully.", 'data' => $course ]);
       }
    }
}

//80 >= A+
//75 -79 A
//70 - 74  A-
//65 - 69 B+
//60 -64 B
//55-59 B-
//50 -54 C+
//45 - 49  c
//40 - 44  D
