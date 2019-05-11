<?php

namespace App\Http\Controllers\Student;

use App\Helpers\Enum\EnrollCourseStatusEnum;
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

        $semester = Semester::active()->first();
        $data['semester'] =  $semester;

        $enrollCourse = EnrolledCourse::where('student_id', Auth::guard('student')->user()->id)->pluck('course_id');

        $offers = Offer::with(['preRequisiteCourse', 'course'])->whereNotIn('course_id', $enrollCourse->toArray())->where('semester_id', $semester->id)->get();

        $availableOffer = [];
        foreach ($offers as $offer) {
            if(count($offer->preRequisiteCourse))  {
                $preRcourse = $offer->preRequisiteCourse->pluck('prerequisite_course_id')->toArray();
                $matchcourse = array_intersect($preRcourse, $enrollCourse->toArray());
                if($matchcourse != $preRcourse){
                    continue;
                }
            }
            array_push($availableOffer, $offer);
        }
        $failedCourses = EnrolledCourse::with(['course'])->where('status', EnrollCourseStatusEnum::Failed)->get();

        $data['failedCourses']  = $failedCourses;

        $hasEnrolledCurrentSemester = Enroll::where('semester_id', $semester->id)
                    ->where('student_id', Auth::guard('student')->user()->id)
                    ->first();


        if ($hasEnrolledCurrentSemester  instanceof  Enroll) {
            $errorMessage = "Sorry. You have already enrolled current semester.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
        
        if ($semester instanceof  Semester) {
            $data['offers'] = $availableOffer;
        } else {
            $errorMessage = "Sorry. There is no available course to enroll.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
        return view('student.enroll_form', $data);
    }

    public function editEnrollment($semesterId) {

        $data['semester'] = $semester = Semester::active()->first();

        if (!$semester instanceof Semester) {
              return redirect()->back()->with('errorMessage', "Sorry, You are not able to edit enrollment");
        }

        $enrollCourse = EnrolledCourse::where('student_id', Auth::guard('student')->user()->id)->where('semester_id', '<>', $semester->id)->pluck('course_id');

        $offers = Offer::with(['preRequisiteCourse', 'course'])->whereNotIn('course_id', $enrollCourse->toArray())->where('semester_id', $semester->id)->get();

        $availableOffer = [];
        foreach ($offers as $offer) {
            if(count($offer->preRequisiteCourse))  {
                $preRcourse = $offer->preRequisiteCourse->pluck('prerequisite_course_id')->toArray();
                $matchcourse = array_intersect($preRcourse, $enrollCourse->toArray());
                if($matchcourse != $preRcourse){
                    continue;
                }
            }
            array_push($availableOffer, $offer);
        }
        $data['offers'] = $availableOffer;



        return view('student.edit_enrollment', $data);
    }

    public function updateEnroll(Request $request)
    {

        $request->validate([
            'course' => 'required',
            'semester' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $enroll =  Enroll::where('semester_id', $request->input('semester'))
                ->where('student_id', Auth::guard('student')->user()->id)->first();
            $enroll->status = "Running";
            $enroll->payment_status = false;
            $enroll->save();
            $count = count($request->input('course'));
            $offers = Offer::with('course')->whereIn('id', $request->input('course'))->get();
            $courses = [];
            $now = Carbon::now();
            $totalCourseFee = 0;

            EnrolledCourse::where('semester_id', $enroll->semester_id)->delete();

            foreach ($offers as $offer) {
                $course = [];
                $course['enroll_id'] = $enroll->id;
                $course['student_id'] = $enroll->student_id;
                $course['course_id'] = $offer->course_id;
                $course['semester_id'] = $offer->semester_id;
                $course['offer_id'] = $offer->id;
                $course['course_fee'] = $offer->course_fee;
                $totalCourseFee += $offer->course_fee;
                $course['status'] = "Running";
                $course['teacher_id'] = $offer->teacher_id;
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
        
        return redirect()->back()->with('successMessage', "Enroll Updated successfully.");
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
                $course['course_id'] = $offer->course_id;
                $course['semester_id'] = $offer->semester_id;
                $course['course_fee'] = $offer->course_fee;
                $totalCourseFee += $offer->course_fee;
                $course['status'] = "Running";
                $course['teacher_id'] = $offer->teacher_id;
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
