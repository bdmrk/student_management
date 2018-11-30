<?php

namespace App\Http\Controllers\backend;

use App\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('backend.teachers.manage_teachers', ['teachers'=>$teachers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.add_teachers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    protected  function teacherValidate($request) {
        $this->validate($request, [
            'first_name' => 'required',

        ]);
    }

    protected  function imageUploade($request) {
        $teacherImage = $request->file('teacher_photo');
        $fileType = $teacherImage->getClientOriginalExtension();
        $imageName = $request->first_name.'.'.$fileType;
        $directory = 'images/teachers/';
        $imageUrl = $directory.$imageName;
         Image::make($teacherImage)->resize(300,300)->save($imageUrl);

        //$teacherImage->move($directory, $imageName);
        return $imageUrl;
    }

    protected  function teacherBasicInfoSave($request, $imageUrl ) {
        $teachers = new Teacher();
        $teachers->first_name = $request->input('first_name');
        $teachers->second_name = $request->input('second_name');
        $teachers->designation = $request->input('designation');
        $teachers->contact_number = $request->input('contact_number');
        $teachers->email = $request->input('email');
        $teachers->father_name = $request->input('father_name');
        $teachers->mother_name = $request->input('mother_name');
        $teachers->address = $request->input('address');
        $teachers->teacher_photo = $imageUrl;
        $teachers->gender = $request->input('gender');
        $teachers->status = $request->input('status');
        $teachers->save();

    }

    public function store(Request $request )
    {
        $this->teacherValidate($request);
       $imageUrl = $this->imageUploade($request);
       $this->teacherBasicInfoSave($request, $imageUrl);
        return redirect()->route('teachers.create')->with('message', "Teacher is Created Successfully");
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
        $data['teacher'] = Teacher::find($id);
        return view('backend.teachers.edit_teachers', $data);
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
        $teachers = Teacher::find($id);
        $teachers->first_name = $request->input('first_name');
        $teachers->second_name = $request->input('second_name');
        $teachers->designation = $request->input('designation');
        $teachers->contact_number = $request->input('contact_number');
        $teachers->email = $request->input('email');
        $teachers->father_name = $request->input('father_name');
        $teachers->mother_name = $request->input('mother_name');
        $teachers->address = $request->input('address');
        $teachers->gender = $request->input('gender');
        $teachers->status = $request->input('status');
        $teachers->save();
        return redirect()->route("teachers.edit", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('message',"Teachers is deleted successfully");
    }

    public function changeStatus(Request $request)
    {
        $teacher =  Teacher::find($request->id);
        $teacher->status = !$teacher->status;
        $teacher->save();
        return redirect()->route('teachers.index');
    }
}
