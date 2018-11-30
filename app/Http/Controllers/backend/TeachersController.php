<?php

namespace App\Http\Controllers\backend;

use App\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//    protected function teacherInfoValidate($request) {
//        $this->validate($request,[
//            'teacher_name'=>'required',
//        ]);
//    }
   /* protected function teacherImageUpload($request){
        $teacherImage = $request->file('teacher_photo');
        //product extention
        $fileType = $teacherImage->getClientOriginalExtension();
        //for image name as teacher's name
        $imageName = $request->teacher_photo. '.' .$fileType;
        $directory = 'images/';
        $imageUrl = $directory.$imageName;
        Image::make($teacherImage)->save($imageUrl);
        return $imageUrl;

    }*/

    /*protected function teacherBasicInfoSave($request, $imageUrl){
        $teachers = new Teacher();
        $teachers->first_name = $request->input('first_name');
        $teachers->second_name = $request->input('second_name');
        $teachers->dob = $request->input('dob');
        $teachers->designation = $request->input('designation');
        $teachers->contact_number = $request->input('contact_number');
        $teachers->email = $request->input('email');
        $teachers->father_name = $request->input('father_name');
        $teachers->mother_name = $request->input('mother_name');
        $teachers->address = $request->input('address');
        $teachers->gender = $request->input('gender');
        $teachers->status = $request->input('status');
        $teachers->teacher_image = $imageUrl;
        $teachers->save();
    }*/

    public function store(Request $request )
    {
//        $this->teacherInfoValidate($request);
//        $imageUrl= $this->teacherImageUpload($request);
//        $this->teacherBasicInfoSave($request, $imageUrl);
//        return redirect('/backend/teacher')->with('message', 'Teacher saved successfully');

        $teacherImage = $request->file('teacher_photo');
        $imageName = $teacherImage->getClientOriginalname();
        $directory = 'images/';
        $imageUrl = $directory.$imageName;
        $teacherImage->move($directory, $imageName);

        $teachers = new Teacher();
        $teachers->first_name = $request->input('first_name');
        $teachers->second_name = $request->input('second_name');
        //$teachers->dob = $request->input('dob');
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
        return redirect()->route('teachers.create')->with('message', "Teacher Created Successfully");
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
