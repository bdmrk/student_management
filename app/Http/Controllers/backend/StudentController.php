<?php

namespace App\Http\Controllers\backend;

use App\DataTables\StudentDataTable;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(StudentDataTable $dataTable)
    {
//        $data['students'] = Student::all();
        return $dataTable->render('backend.students.student_manage');
           
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
//        dd($request->all());

            $request->validate([
                'applicant_name' => 'required|max:100',
                'father_name' => 'required|max:100',
                'mother_name' => 'required|max:100',
                'dob' => 'required|date',
                'contact_number' => 'required',
                'email' => 'required|email',
                'gender' => 'required',
                'religion' => 'required',
                'blood_group' => 'required',
                'nid' => 'required',
                'present_address' => 'required',
                'permanent_address' => 'required',
                'student_photo' => 'required|mimes:jpeg,jpg,png|max:100',
            ]);


        try {
            if ($request->hasFile('student_photo')) {

                $studentImage = $request->file('student_photo');
                $ext = $studentImage->getClientOriginalExtension();
                $imageName = 'st_'.rand(100,999)."_".date('ymdhis').".".$ext;
//                dd($imageName);
                $directory = '/images/students/';
                $imageUrl = $directory.$imageName;
                $destination = public_path() . $directory;
                $studentImage->move($destination, $imageName);

            }
            $students = new Student();
            $students->full_name = $request->input('applicant_name');
            $students->father_name = $request->input('father_name');
            $students->mother_name = $request->input('mother_name');
            $students->dob = Carbon::parse($request->input('dob'))->format("Y-m-d");
            $students->gender = $request->input('gender');
            $students->contact_number = $request->input('contact_number');
            $students->email = $request->input('email');
            $students->present_address = $request->input('present_address');
            $students->permanent_address = $request->input('permanent_address');
            $students->religion = $request->input('religion');
            $students->blood_group = $request->input('blood_group');
            $students->nationality = $request->input('nationality');
            $students->nid = $request->input('nid');
            $students->student_photo = $imageUrl;
            $students->username = 'abcd';
            $students->password = '1233';
            $students->status = 1;
            $students->program_id = 1;
            $students->is_active = 0;
            $students->is_selected = 0;
            $students->created_by = Auth::user()->id;
            $students->save();
        } catch(\Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }
      
       
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
        $data['student'] = Student::all();
        return view('backend.students.student_index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['students'] = Student::all();
        return view('backend.students.student_edit', $data);
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
        try {
            $student = Student::findOrFail($id);
            $student->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect('backend/students');
    }

    public function changeStatus(Request $request)
    {
        try {
            $student =  Student::find($request->id);
            $student->status = !$semester->status;
            $student->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect()->route('students.index');
    }
}
