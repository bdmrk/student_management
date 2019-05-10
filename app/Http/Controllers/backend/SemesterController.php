<?php

namespace App\Http\Controllers\backend;

use App\Helpers\Enum\EnrollCourseStatusEnum;
use App\Helpers\Enum\MonthEnum;
use App\Models\EnrolledCourse;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view('backend.semester.manage_semester', ['semesters'=>$semesters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.semester.create_semester');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
            $isActiveSemester = Semester::where('status', true)->first();
            if ($isActiveSemester instanceof Semester) {
                return redirect()->back()->withInput()->with('errorMessage', 'Failed. Please inactive old semester before creating new semester');
            }
            $semester = new Semester();
            $semester->semester_name = $request->input('semester_name');
            $semester->start_date = $request->input('start_date');
            $semester->end_date = $request->input('end_date');
            $semester->status = $request->input('status');
            $semester->created_by = Auth::user()->id;
            $semester->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }

       return redirect('admin/semester')->with('successMessage','Semester Saved Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['semester'] = Semester::find($id);
        return view('backend.semester.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $semester = Semester::findOrFail($id);
            $semester->semester_name = $request->input('semester_name');
            $semester->start_date = $request->input('starting_date');
            $semester->end_date = $request->input('ending_date');
            $semester->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect()->route("semester.edit", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $semester = Semester::findOrFail($id);
            $hasRunningCourse = EnrolledCourse::select('enrolled_course.*')
                ->leftJoin('offers', 'offers.id', 'enrolled_course.offer_id')
                ->where('offers.semester_id', $semester->id)->first();

            if ($hasRunningCourse) {
                return  redirect()->back()->with('errorMessage', "Failed. Some student enrolled under this semester");
            }
            $semester->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect()->back()->with('successMessage', 'Semester deleted successfully');

    }

    public function changeStatus(Request $request)
    {
        try {
            $semester =  Semester::find($request->id);

            $hasRunningCourse = EnrolledCourse::select('enrolled_course.*')
                ->whereIn('enrolled_course.status', [EnrollCourseStatusEnum::Running,EnrollCourseStatusEnum::Retake])
                ->leftJoin('offers', 'offers.id', 'enrolled_course.offer_id')
                ->where('offers.semester_id', $semester->id)->first();

            $activeSemester = Semester::where('status', true)->where('id',"<>",$request->id)->first();
            if($activeSemester instanceof Semester && $semester->status == 0) {
                return  redirect()->back()->with('errorMessage', "Failed. You can't a Semester while another is active");

            }

            if ($hasRunningCourse) {
                return  redirect()->back()->with('errorMessage', "Failed. This Semester has some running student course");
            }
            $semester->status = !$semester->status;


            $semester->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect()->route('semester.index');
    }

}

