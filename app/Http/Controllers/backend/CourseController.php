<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Syllabus;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('backend.courses.create_course', ['courses' =>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sy'] = Syllabus::all();
        //dd($data['sy']);
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
            'syllabus' => 'required|string',
            'status' => 'required'
        ]);

        try {
            $course = new Course();
        
            $course->course_name = $request->input('course_name');
            $course->course_code = $request->input('course_code');
            $course->course_code = $request->input('course_credit');
            $course->description = $request->input('description');
            $course->syllabus_id = $request->input('syllabus');
            $course->status = $request->input('status');
            $course->created_by = Auth::user()->id;
            $course->save();
        } catch(\Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }
      
        return redirect()->route('course.create')->with('successMessage', "Course is Created Successfully");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
