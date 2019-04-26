<?php

namespace App\Http\Controllers\backend;

use App\Http\Helpers;
use App\Models\CoursePrerequisite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Syllabus;
use App\Models\Program;
use Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['syllabus.program'])->get();

        return view('backend.courses.manage_course', ['courses' =>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['courses'] = Course::select('courses.*')
            ->leftJoin('syllabus', 'syllabus.id', 'courses.syllabus_id')
            ->where('syllabus.status', true)
            ->where('courses.status', true)
            ->get();

        return view('backend.courses.create_course', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|max:255',
            'course_code' => 'required|max:10',
            'course_credit' => 'required|integer',
            'status' => 'required'
        ]);

        $syllabus = Syllabus::active()->first();
        if (!($syllabus instanceof Syllabus)) {
            return redirect()->back()->withInput()->with('errorMessage', 'There is no syllabus is active');
        }

        DB::beginTransaction();
        try {

            $course = new Course();
            $course->course_name = $request->input('course_name');
            $course->course_code = $request->input('course_code');
            $course->course_credit = $request->input('course_credit');
            $course->description = $request->input('description');
            $course->syllabus_id = $syllabus->id;
            $course->status = $request->input('status');
            $course->created_by = Auth::user()->id;
            $course->save();

            $prerequisitCourse = [];
            $pcourses = $request->input('prerequisite_course_id');
            if(is_array($pcourses) && count($pcourses)) {
                foreach($pcourses as $coId) {
                    $data = [];
                    $data['course_id'] = $course->id;
                    $data['prerequisite_course_id'] = $coId;
                    $data['created_at'] = Carbon::now();
                    $data['updated_at'] = Carbon::now();
                    array_push($prerequisitCourse, $data);
                }

                CoursePrerequisite::insert($prerequisitCourse);
            }

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }

        return redirect()->route('course.index')->with('successMessage', "Course Created Successfully");
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
        $data['course'] = $course = Course::with(['syllabus'])->find($id);

        if ($course->syllabus->status == false) {
             return redirect()->back()->with("errorMessage", "Sorry. You cannot edit inactive syllabus course.");
        }

        $prerequisiteCourseIds = CoursePrerequisite::where('course_id', $course->id)->pluck('prerequisite_course_id');
        $data['prerequisiteCourseIds'] =   $prerequisiteCourseIds->toArray();
        $data['courses'] =  Course::where('id', "<>", $course->id)->where('syllabus_id', $course->syllabus_id)->get();

        return view('backend.courses.edit_course', $data);
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

        $request->validate([
            'course_name' => 'required|max:255',
            'course_code' => 'required|max:10',
            'course_credit' => 'required|integer',
            'status' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $course = Course::with(['syllabus','coursePrerequisite'])->findOrfail($id);

            $course->course_name = $request->input('course_name');
            $course->course_code = $request->input('course_code');
            $course->course_credit = $request->input('course_credit');
            $course->description = $request->input('description');
            $course->status = $request->input('status');
            $course->created_by = Auth::user()->id;
            $course->save();

            $prerequisitCourse = [];
            $pcourses = $request->input('prerequisite_course_id');

            $oldCoursePrerequisite =  $course->coursePrerequisite->pluck('prerequisite_course_id')->toArray();
            $isdiff = array_diff($pcourses, $oldCoursePrerequisite);

            if (count($isdiff)) {
                CoursePrerequisite::whereIn('prerequisite_course_id', $oldCoursePrerequisite)->where('course_id', $course->id)->delete();
                $prerequisiteCourses = [];
                foreach ($pcourses as $courseId) {
                    $data = [];
                    $data['course_id'] = $course->id;
                    $data['prerequisite_course_id'] = $courseId;
                    $data['created_at'] = Carbon::now();
                    $data['updated_at'] = Carbon::now();
                    array_push($prerequisiteCourses, $data);
                }

                CoursePrerequisite::insert($prerequisiteCourses);
            }
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }

        return redirect()->route('course.index')->with('successMessage', "Course is Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course.index')->with('successMessage',"Courese is deleted successfully");
    }

    public function getCourseBySyllabusId($syllabusId)
    {
        $syllabus = Course::active()->where('syllabus_id', $syllabusId)->get();
        $options = "";
        $options .= Helpers::makeOptions($syllabus, "id", "course_name");
        return response()->json($options);
    }

    public  function  changeStatus(Request $request){

        $course =  Course::find($request->id);
        $course->status = !$course->status;
        $course->save();
        return redirect()->route('course.index');
    }
}
