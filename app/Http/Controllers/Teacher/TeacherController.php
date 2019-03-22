<?php

namespace App\Http\Controllers\Teacher;

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

    public function marksEntry()
    {
        $data['courses'] = EnrolledCourse::with(['enroll.semester','student','offer.course'])->where('status', EnrollStatusEnum::Running)->get();
        return view('teacher.marks-entry', $data);
    }

    public function saveMark(Request $request)
    {
       $validator = Validator::make($request->all(),[
           'incourse_mark' => "required|numeric",
           'final_mark' => "required|numeric"
       ]);

       if ($validator->fails()) {
           return response()->json(['status'=> false, 'message' => $validator->errors()->first()]);
       }
    }
}
