<?php

namespace App\Http\Controllers\backend;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.students.student_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentImage = $request->file('student_photo');
        $imageName = $studentImage->getClientOriginalname();
        $directory = 'images/students/';
        $imageUrl = $directory.$imageName;
        $studentImage->move($directory, $imageName);

        $students = new Student();
        $students->first_name = $request->input('first_name');
        $students->second_name = $request->input('second_name');
        //$teachers->dob = $request->input('dob');
        $students->contact_number = $request->input('contact_number');
        $students->email = $request->input('email');
        $students->father_name = $request->input('father_name');
        $students->mother_name = $request->input('mother_name');
        $students->address = $request->input('address');
        $students->student_photo = $imageUrl;
        $students->gender = $request->input('gender');
        $students->status = $request->input('status');
        $students->save();
        return redirect()->route('students.create')->with('message', "Student is Created Successfully");
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
