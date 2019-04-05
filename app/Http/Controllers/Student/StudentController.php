<?php

namespace App\Http\Controllers\Student;

use App\Helpers\Enum\EnrollStatusEnum;
use App\Models\Enroll;
use App\Models\EnrolledCourse;
use App\Models\Offer;
use App\Models\Semester;
use Dompdf\Exception;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class StudentController extends Controller
{
    public function dashboard()
    {
        $data['enrolledCourses'] =  EnrolledCourse::with(['enroll.semester','offer.course'])->where('student_id', Auth::guard('student')->user()->id)->get();
//        dd($data);
        return view('student.dashboard', $data);
    }

    public function enroll()
    {
        $enrolledSemesterId = Enroll::where('student_id', Auth::guard('student')->user()->id)
            ->orderBy('id', 'desc')
            ->get()->pluck('semester_id');

        $availbaleSemester = Semester::whereNotIn('id', $enrolledSemesterId)->orderBy('id', 'asc')->first();

        $hasRunningCourse = Enroll::where('status', EnrollStatusEnum::Running)
                    ->where('student_id', Auth::guard('student')->user()->id)
                    ->orderBy('id', 'desc')
                    ->first();

        if ($hasRunningCourse  instanceof  Enroll) {
            $errorMessage = "Sorry. You do not complete current semester courses.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
        
        if ($availbaleSemester instanceof  Semester) {
           $data['semester'] = $availbaleSemester;
           $data['offers'] = Offer::with(['course', 'course.syllabus' => function($query) {
               $query->where('status', 1);
           }])->where('semester_id', $availbaleSemester->id)->get();
          
        } else {
            $errorMessage = "Sorry. You have enrolled all semester courses.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
        return view('student.enroll_form', $data);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'course' => 'required',
            'semester' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $enroll = new Enroll();
            $enroll->student_id = Auth::guard('student')->user()->id;
            $enroll->semester_id = $request->input('semester');
            $enroll->status = "Running";
            $enroll->payment_status = false;
            $enroll->save();
            $count = count($request->input('course'));
            $offers = Offer::with('course')->whereIn('id', $request->input('course'))->get();
            $courses = [];
            $now = Carbon::now();
            $totalCourseFee = 0;

            foreach ($offers as $offer) {
                $course = [];
                $course['enroll_id'] = $enroll->id;
                $course['student_id'] = $enroll->student_id;
                $course['offer_id'] = $offer->id;
                $course['course_fee'] = $offer->course_fee;
                $totalCourseFee += $offer->course_fee;
                $course['status'] = "Running";
                $course['created_at'] = $now;
                $course['updated_at'] = $now;
                array_push($courses, $course);
            }
            
            EnrolledCourse::insert($courses);
            $enroll->bill_amount = $totalCourseFee;
            $enroll->save();
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('errorMessage', "Failed. Something went wrong.");

        }

        return redirect()->route('student-dash');
    }

    public function enrolledSemester()
    {
        $data['enrolledSemester'] = Enroll::all();
        return view('student.student_semester', $data);
    }

    public function printPaymentSlip($enrollId)
    {
        try {
            $data['courses'] = EnrolledCourse::with(['offer.course', 'enroll.semester'])->where("student_id", auth()->guard("student")->user()->id)->where('enroll_id', $enrollId)->get();
            $data['enroll'] = Enroll::with(['student'])->where('id', $enrollId)->first();
            $pdf = PDF::loadView('pdf.student.payment_slip', $data)->setPaper('a4', 'landscape');
            return $pdf->stream('invoice.pdf');
        } catch (Exception $exception) {
            abort(404);
        }

    }
}
