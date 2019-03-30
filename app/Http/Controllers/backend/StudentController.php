<?php

namespace App\Http\Controllers\backend;

use App\DataTables\StudentDataTable;
use App\Helpers\Enum\StudentStatus;
use App\Models\AcademicInfo;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Matrix\Exception;

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
//            'email' => 'required|email|unique:students,email',
//            'password' => 'required|max:10|min:6',
            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'nid' => 'required',
//            'present_address' => 'required',
//            'permanent_address' => 'required',
//            'ssc.examination' => 'required',
//            'ssc.board' => 'required',
//            'ssc.group' => 'required',
//            'ssc.result' => 'required',
//            'ssc.passing_year' => 'required',
//            'honours.subject' => 'required',
//            'masters.subject' => 'required',
//            'student_photo' => 'required|mimes:jpeg,jpg,png|max:100',
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
            $student = new Student();
            $student->full_name = $request->input('applicant_name');
            $student->father_name = $request->input('father_name');
            $student->mother_name = $request->input('mother_name');
            $student->dob = Carbon::parse($request->input('dob'))->format("Y-m-d");
            $student->gender = $request->input('gender');
            $student->contact_number = $request->input('contact_number');
            $student->email = $request->input('email');
            $student->present_address = $request->input('present_address');
            $student->permanent_address = $request->input('permanent_address');
            $student->religion = $request->input('religion');
            $student->blood_group = $request->input('blood_group');
            $student->nationality = $request->input('nationality');
            $student->nid = $request->input('nid');
            $student->student_photo = $imageUrl;
            $student->password = bcrypt($request->input('password'));
            $student->status = StudentStatus::Applied;
            $student->program_id = 1;
            $student->is_active = 0;
            $student->is_selected = 0;
            $student->created_by = Auth::user()->id;
            $student->save();

//            $count = count($request->input('examination'));

            $academicData = [];
            $now = Carbon::now();



            $sscInfo = [];
            $ssc = $request->input('ssc');

            $sscInfo['student_id'] = $student->id;
            $sscInfo['board'] = isset($ssc['board']) ? $ssc['board']: '';
            $sscInfo['group'] = isset($ssc['group']) ? $ssc['group']: '';
            $sscInfo['examination'] = isset($ssc['examination']) ? $ssc['examination']: '';
            $sscInfo['roll_no'] = isset($ssc['roll']) ? $ssc['roll']: '';
            $sscInfo['result'] = isset($ssc['result']) ? $ssc['result']: '';
            $sscInfo['passing_year'] = isset($ssc['passing_year']) ? $ssc['passing_year']: '';
            $sscInfo['created_at'] = $now;
            $sscInfo['updated_at'] = $now;


            AcademicInfo::insert($sscInfo);

            $hscInfo = [];
            $hsc = $request->input('hsc');
            $hscInfo['student_id'] = $student->id;
            $hscInfo['board'] = isset($hsc['board']) ? $hsc['board']: '';
            $hscInfo['group'] = isset($hsc['group']) ? $hsc['group']: '';
            $hscInfo['examination'] = isset($hsc['examination']) ? $hsc['examination']: '';
            $hscInfo['roll_no'] = isset($hsc['roll']) ? $hsc['roll']: '';
            $hscInfo['result'] = isset($hsc['result']) ? $hsc['result']: '';
            $hscInfo['passing_year'] = isset($hsc['passing_year']) ? $hsc['passing_year']: '';
            $hscInfo['created_at'] = $now;
            $hscInfo['updated_at'] = $now;
            AcademicInfo::insert($hscInfo);


            $honoursInfo = [];
            $honours = $request->input('honours');
            $honoursInfo['student_id'] = $student->id;
            $honoursInfo['institute'] = isset($honours['institute']) ? $honours['institute']: '';
            $honoursInfo['subject'] = isset($honours['subject']) ? $honours['subject']: '';
            $honoursInfo['examination'] = isset($honours['examination']) ? $honours['examination']: '';
            $honoursInfo['roll_no'] = isset($honours['roll']) ? $honours['roll']: '';
            $honoursInfo['result'] = isset($honours['result']) ? $honours['result']: '';
            $honoursInfo['passing_year'] = isset($honours['passing_year']) ? $honours['passing_year']: '';
            $honoursInfo['course_duration'] = isset($honours['course_duration']) ? $honours['course_duration']: '';
            $honoursInfo['created_at'] = $now;
            $honoursInfo['updated_at'] = $now;


            AcademicInfo::insert($honoursInfo);

            $masters = $request->input('masters');
            if($masters['examination'] != ''){
                $mastersInfo = [];
                $mastersInfo['student_id'] = $student->id;
                $mastersInfo['institute'] = isset($masters['institute']) ? $masters['institute']: '';
                $mastersInfo['subject'] = isset($masters['subject']) ? $masters['subject']: '';
                $mastersInfo['examination'] = isset($masters['examination']) ? $masters['examination']: '';
                $mastersInfo['roll_no'] = isset($masters['roll']) ? $masters['roll']: '';
                $mastersInfo['result'] = isset($masters['result']) ? $masters['result']: '';
                $mastersInfo['passing_year'] = isset($masters['passing_year']) ? $masters['passing_year']: '';
                $mastersInfo['course_duration'] = isset($masters['course_duration']) ? $masters['course_duration']: '';
                $mastersInfo['created_at'] = $now;
                $mastersInfo['updated_at'] = $now;

                AcademicInfo::insert($mastersInfo);
            }




//            for ($i = 0; $i < $count; $i++) {
//
//                if ($request->input('examination')[$i]) {
//                    $academicInfo = [];
//                    $academicInfo['student_id'] = $student->id;
//                    $academicInfo['board'] = isset($request->input('board')[$i]) ? $request->input('board')[$i]: '';
//                    $academicInfo['group'] = isset($request->input('group')[$i]) ? $request->input('group')[$i]: '';
//                    $academicInfo['examination'] = isset($request->input('examination')[$i]) ? $request->input('examination')[$i]: '';
//                    $academicInfo['roll_no'] = isset($request->input('roll')[$i]) ? $request->input('roll')[$i]: '';
//                    $academicInfo['result'] = isset($request->input('result')[$i]) ? $request->input('result')[$i]: '';
//                    $academicInfo['passing_year'] = isset($request->input('passing_year')[$i]) ? $request->input('passing_year')[$i]: '';
//                    $academicInfo['course_duration'] = isset($request->input('course_duration')[$i]) ? $request->input('course_duration')[$i]: '';
//                    $academicInfo['created_at'] = $now;
//                    $academicInfo['updated_at'] = $now;
//
//                    array_push($academicData, $academicInfo);
//                }
//            }

            AcademicInfo::insert($academicData);

        } catch(\Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }


        return redirect()->route('students.index')->with('successMessage', "Student is Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student'] = Student::with(['academicInfo', 'enrolledCourse.offer.course'])->find($id);

        return view('backend.students.student_details', $data);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectStudent($id)
    {
        try {
            $student = Student::where('status', StudentStatus::Applied)->where('id', $id)->first();
            if ($student instanceof Student) {
                $student->status = StudentStatus::Selected;
                $student->save();
                return redirect()->back()->with('successMessage', "Student selected successfully");
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('errorMessage', "Action failed. Something went wrong");
        }

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
            $student->status = !$student->status;
            $student->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with("errorMessage", "Failed. Something went wrong!");
        }
        return redirect()->route('students.index');
    }
}
