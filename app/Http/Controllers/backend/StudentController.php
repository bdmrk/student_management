<?php

namespace App\Http\Controllers\backend;

use App\DataTables\StudentDataTable;
use App\Helpers\Enum\BloodEnum;
use App\Helpers\Enum\GroupEnum;
use App\Helpers\Enum\ReligionEnum;
use App\Helpers\Enum\StudentStatus;
use App\Models\AcademicInfo;
use App\Models\Board;
use App\Models\Examinations;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Matrix\Exception;
use File;

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
        $data['boards'] = Board::all();
        $data['exams'] = Examinations::all();
        $data['groups'] = GroupEnum::getValues();
        $data['religions'] = ReligionEnum::getValues();
        $data['bloods'] = BloodEnum::getValues();
        return view('backend.students.student_add', $data);
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
            'applicant_name' => 'required|max:100',
            'father_name' => 'required|max:100',
            'mother_name' => 'required|max:100',
            'dob' => 'required|date',
            'contact_number' => 'required',

            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'nid' => 'required'
        ]);

        try {
            if ($request->hasFile('student_photo')) {

                $studentImage = $request->file('student_photo');
                $ext = $studentImage->getClientOriginalExtension();
                $imageName = 'st_'.rand(100,999)."_".date('ymdhis').".".$ext;
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

            $now = Carbon::now();

            $sscInfo = [];
            $ssc = $request->input('ssc');

            $sscInfo['student_id'] = $student->id;
            $sscInfo['board_id'] = isset($ssc['board']) ? $ssc['board']: '';
            $sscInfo['group'] = isset($ssc['group']) ? $ssc['group']: '';
            $sscInfo['examination_id'] = isset($ssc['examination']) ? $ssc['examination']: '';
            $sscInfo['roll_no'] = isset($ssc['roll']) ? $ssc['roll']: '';
            $sscInfo['result'] = isset($ssc['result']) ? $ssc['result']: '';
            $sscInfo['passing_year'] = isset($ssc['passing_year']) ? $ssc['passing_year']: '';
            $sscInfo['created_at'] = $now;
            $sscInfo['updated_at'] = $now;

            $certficateDirectory = '/images/students/certificate';
            $certificatDestination = public_path() . $certficateDirectory;

            if ($request->hasFile('ssc.certificate')) {
                $sscCertificate = $request->file('ssc.certificate');
                $sscext = $sscCertificate->getClientOriginalExtension();
                $sscImageName = 'ssc_certificate_'.rand(100,999)."_".date('ymdhis').".".$sscext;

                $sscCertificate->move($certificatDestination, $sscImageName);
                $sscInfo['certificate'] = $sscImageName;;
            }

            AcademicInfo::insert($sscInfo);

            $hscInfo = [];
            $hsc = $request->input('hsc');
            $hscInfo['student_id'] = $student->id;
            $hscInfo['board_id'] = isset($hsc['board']) ? $hsc['board']: '';
            $hscInfo['group'] = isset($hsc['group']) ? $hsc['group']: '';
            $hscInfo['examination_id'] = isset($hsc['examination']) ? $hsc['examination']: '';
            $hscInfo['roll_no'] = isset($hsc['roll']) ? $hsc['roll']: '';
            $hscInfo['result'] = isset($hsc['result']) ? $hsc['result']: '';
            $hscInfo['passing_year'] = isset($hsc['passing_year']) ? $hsc['passing_year']: '';
            $hscInfo['created_at'] = $now;
            $hscInfo['updated_at'] = $now;

            if ($request->hasFile('hsc.certificate')) {
                $hscCertificate = $request->file('hsc.certificate');
                $hscext = $hscCertificate->getClientOriginalExtension();
                $hscImageName = 'hsc_certificate_'.rand(100,999)."_".date('ymdhis').".".$hscext;

                $hscCertificate->move($certificatDestination, $hscImageName);
                $hscInfo['certificate'] = $hscImageName;;
            }

            AcademicInfo::insert($hscInfo);


            $honoursInfo = [];
            $honours = $request->input('honours');
            $honoursInfo['student_id'] = $student->id;
            $honoursInfo['institute'] = isset($honours['institute']) ? $honours['institute']: '';
            $honoursInfo['subject'] = isset($honours['subject']) ? $honours['subject']: '';
            $honoursInfo['examination_id'] = isset($honours['examination']) ? $honours['examination']: '';
            $honoursInfo['roll_no'] = isset($honours['roll']) ? $honours['roll']: '';
            $honoursInfo['result'] = isset($honours['result']) ? $honours['result']: '';
            $honoursInfo['passing_year'] = isset($honours['passing_year']) ? $honours['passing_year']: '';
            $honoursInfo['course_duration'] = isset($honours['course_duration']) ? $honours['course_duration']: '';
            $honoursInfo['created_at'] = $now;
            $honoursInfo['updated_at'] = $now;

            if ($request->hasFile('honours.certificate')) {
                $honoursCertificate = $request->file('honours.certificate');
                $honoursext = $honoursCertificate->getClientOriginalExtension();
                $honoursImageName = 'honours_certificate_'.rand(100,999)."_".date('ymdhis').".".$honoursext;

                $honoursCertificate->move($certificatDestination, $honoursImageName);
                $honoursInfo['certificate'] = $honoursImageName;;
            }



            AcademicInfo::insert($honoursInfo);

            $masters = $request->input('masters');
            if($masters['examination'] != ''){
                $mastersInfo = [];
                $mastersInfo['student_id'] = $student->id;
                $mastersInfo['institute'] = isset($masters['institute']) ? $masters['institute']: '';
                $mastersInfo['subject'] = isset($masters['subject']) ? $masters['subject']: '';
                $mastersInfo['examination_id'] = isset($masters['examination']) ? $masters['examination']: '';
                $mastersInfo['roll_no'] = isset($masters['roll']) ? $masters['roll']: '';
                $mastersInfo['result'] = isset($masters['result']) ? $masters['result']: '';
                $mastersInfo['passing_year'] = isset($masters['passing_year']) ? $masters['passing_year']: '';
                $mastersInfo['course_duration'] = isset($masters['course_duration']) ? $masters['course_duration']: '';
                $mastersInfo['created_at'] = $now;
                $mastersInfo['updated_at'] = $now;
                if ($request->hasFile('masters.certificate')) {
                    $mastersCertificate = $request->file('masters.certificate');
                    $mastersext = $mastersCertificate->getClientOriginalExtension();
                    $mastersImageName = 'masters_certificate_'.rand(100,999)."_".date('ymdhis').".".$mastersext;

                    $mastersCertificate->move($certificatDestination, $mastersImageName);
                    $mastersInfo['certificate'] = $mastersImageName;;
                }

                AcademicInfo::insert($mastersInfo);
            }


            //Multiple Image upload

        } catch(\Exception $exception) {
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
        $data['student'] = Student::with(['academicInfo' => function($query){
            $query->with(['board', 'exam']);
        }, 'enrolledCourse.offer.course'])->find($id);

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
        $data['students'] = $student = Student::with(['academicInfo.exam'])->where('id', $id)->first();
        //dd($student);
        $data['boards'] = Board::all();
        $data['exams'] = Examinations::all();
        $data['groups'] = GroupEnum::getValues();
        $data['religions'] = ReligionEnum::getValues();
        $data['bloods'] = BloodEnum::getValues();
        //$data['academicExamIds'] = $student->academicInfo->pluck('examination_id')->toArray();
        $academicInfo = [];
        foreach ($student->academicInfo as $acInfo) {
            $academicInfo[$acInfo->exam->level] =  $acInfo;
        }
//        dd($academicInfo);
        $data['academicInfo'] = $academicInfo;
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

        $request->validate([
            'applicant_name' => 'required|max:100',
            'father_name' => 'required|max:100',
            'mother_name' => 'required|max:100',
            'dob' => 'required|date',
            'contact_number' => 'required',

            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'nid' => 'required',

        ]);


        try {

            $student = Student::findOrFail($id);
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

            if ($request->hasFile('student_photo')) {

                $studentImage = $request->file('student_photo');
                $ext = $studentImage->getClientOriginalExtension();
                $imageName = 'st_'.rand(100,999)."_".date('ymdhis').".".$ext;
                $directory = '/images/students/';
                $imageUrl = $directory.$imageName;
                $destination = public_path() . $directory;
                $studentImage->move($destination, $imageName);

                $student->student_photo = $imageUrl;
            }
            if ($request->has('password')) {
                $student->password = bcrypt($request->input('password'));
            }
            $student->program_id = 1;
            $student->updated_by = Auth::user()->id;
            $student->save();


            $academicData = [];
            $now = Carbon::now();



            $sscInfo = [];
            $ssc = $request->input('ssc');

            $sscInfo['student_id'] = $student->id;
            $sscInfo['board_id'] = isset($ssc['board']) ? $ssc['board']: '';
            $sscInfo['group'] = isset($ssc['group']) ? $ssc['group']: '';
            $sscInfo['examination_id'] = isset($ssc['examination']) ? $ssc['examination']: '';
            $sscInfo['roll_no'] = isset($ssc['roll']) ? $ssc['roll']: '';
            $sscInfo['result'] = isset($ssc['result']) ? $ssc['result']: '';
            $sscInfo['passing_year'] = isset($ssc['passing_year']) ? $ssc['passing_year']: '';
            $sscInfo['updated_at'] = $now;

            $certficateDirectory = '/images/students/certificate';
            $certificatDestination = public_path() . $certficateDirectory;

            if ($request->hasFile('ssc.certificate')) {
                $sscCertificate = $request->file('ssc.certificate');
                $sscext = $sscCertificate->getClientOriginalExtension();
                $sscImageName = 'ssc_certificate_'.rand(100,999)."_".date('ymdhis').".".$sscext;


                $sscCertificate->move($certificatDestination, $sscImageName);
                $sscInfo['certificate'] = $sscImageName;;
            }


            $sscAcInfo = AcademicInfo::where('student_id', $student->id)->where('examination_id', $ssc['examination'])->first();

            if ($sscAcInfo instanceof AcademicInfo) {
                AcademicInfo::where('student_id', $student->id)->where('examination_id', $ssc['examination'])->update($sscInfo);
//                File::delete("/images/students/certificate/".$sscAcInfo->certificate);
                if ($request->hasFile('ssc.certificate') && file_exists($certificatDestination.'/'.$sscAcInfo->certificate)) {
                    unlink($certificatDestination.'/'.$sscAcInfo->certificate);
                }

            } else {
                AcademicInfo::insert($sscInfo);
            }




            $hscInfo = [];
            $hsc = $request->input('hsc');
            $hscInfo['student_id'] = $student->id;
            $hscInfo['board_id'] = isset($hsc['board']) ? $hsc['board']: '';
            $hscInfo['group'] = isset($hsc['group']) ? $hsc['group']: '';
            $hscInfo['examination_id'] = isset($hsc['examination']) ? $hsc['examination']: '';
            $hscInfo['roll_no'] = isset($hsc['roll']) ? $hsc['roll']: '';
            $hscInfo['result'] = isset($hsc['result']) ? $hsc['result']: '';
            $hscInfo['passing_year'] = isset($hsc['passing_year']) ? $hsc['passing_year']: '';
            $hscInfo['updated_at'] = $now;

            if ($request->hasFile('hsc.certificate')) {
                $hscCertificate = $request->file('hsc.certificate');
                $hscext = $hscCertificate->getClientOriginalExtension();
                $hscImageName = 'hsc_certificate_'.rand(100,999)."_".date('ymdhis').".".$hscext;

                $hscCertificate->move($certificatDestination, $hscImageName);
                $hscInfo['certificate'] = $hscImageName;;
            }

            $hscAcInfo = AcademicInfo::where('student_id', $student->id)->where('examination_id', $hsc['examination'])->first();
            if ($hscAcInfo instanceof AcademicInfo) {
                AcademicInfo::where('student_id', $student->id)->where('examination_id', $hsc['examination'])->update($hscInfo);
                if ($request->hasFile('hsc.certificate') && file_exists($certificatDestination.'/'.$hscAcInfo->certificate)) {
                    unlink($certificatDestination.'/'.$hscAcInfo->certificate);
                }

            } else {
                AcademicInfo::insert($hscInfo);
            }

            $honoursInfo = [];
            $honours = $request->input('honours');
            $honoursInfo['student_id'] = $student->id;
            $honoursInfo['institute'] = isset($honours['institute']) ? $honours['institute']: '';
            $honoursInfo['subject'] = isset($honours['subject']) ? $honours['subject']: '';
            $honoursInfo['examination_id'] = isset($honours['examination']) ? $honours['examination']: '';
            $honoursInfo['roll_no'] = isset($honours['roll']) ? $honours['roll']: '';
            $honoursInfo['result'] = isset($honours['result']) ? $honours['result']: '';
            $honoursInfo['passing_year'] = isset($honours['passing_year']) ? $honours['passing_year']: '';
            $honoursInfo['course_duration'] = isset($honours['course_duration']) ? $honours['course_duration']: '';
            $honoursInfo['updated_at'] = $now;

            if ($request->hasFile('honours.certificate')) {
                $honoursCertificate = $request->file('honours.certificate');
                $honoursext = $honoursCertificate->getClientOriginalExtension();
                $honoursImageName = 'honours_certificate_'.rand(100,999)."_".date('ymdhis').".".$honoursext;

                $honoursCertificate->move($certificatDestination, $honoursImageName);
                $honoursInfo['certificate'] = $honoursImageName;;
            }

            $honoursAcInfo = AcademicInfo::where('student_id', $student->id)->where('examination_id', $honours['examination'])->first();
            if ($honoursAcInfo instanceof AcademicInfo) {
                AcademicInfo::where('student_id', $student->id)->where('examination_id', $honours['examination'])->update($honoursInfo);
                if ($request->hasFile('honours.certificate') && file_exists($certificatDestination.'/'.$honoursAcInfo->certificate)) {
                    unlink($certificatDestination.'/'.$honoursAcInfo->certificate);
                }


            } else {
                AcademicInfo::insert($honoursInfo);
            }

            $masters = $request->input('masters');
            if($masters['examination'] != ''){
                $mastersInfo = [];
                $mastersInfo['student_id'] = $student->id;
                $mastersInfo['institute'] = isset($masters['institute']) ? $masters['institute']: '';
                $mastersInfo['subject'] = isset($masters['subject']) ? $masters['subject']: '';
                $mastersInfo['examination_id'] = isset($masters['examination']) ? $masters['examination']: '';
                $mastersInfo['roll_no'] = isset($masters['roll']) ? $masters['roll']: '';
                $mastersInfo['result'] = isset($masters['result']) ? $masters['result']: '';
                $mastersInfo['passing_year'] = isset($masters['passing_year']) ? $masters['passing_year']: '';
                $mastersInfo['course_duration'] = isset($masters['course_duration']) ? $masters['course_duration']: '';
                $mastersInfo['updated_at'] = $now;
                if ($request->hasFile('masters.certificate')) {
                    $mastersCertificate = $request->file('masters.certificate');
                    $mastersext = $mastersCertificate->getClientOriginalExtension();
                    $mastersImageName = 'masters_certificate_'.rand(100,999)."_".date('ymdhis').".".$mastersext;

                    $mastersCertificate->move($certificatDestination, $mastersImageName);
                    $mastersInfo['certificate'] = $mastersImageName;;
                }

                $masterAcInfo = AcademicInfo::where('student_id', $student->id)->where('examination_id', $masters['examination'])->first();
                if ($masterAcInfo instanceof AcademicInfo) {
                    AcademicInfo::where('student_id', $student->id)->where('examination_id', $masters['examination'])->update($mastersInfo);
                    if ($request->hasFile('masters.certificate') && file_exists($certificatDestination.'/'.$masterAcInfo->certificate)) {
                        unlink($certificatDestination.'/'.$masterAcInfo->certificate);
                    }
                } else {
                    AcademicInfo::insert($mastersInfo);
                }

            }

        } catch(\Exception $exception) {
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }


        return redirect()->route('students.index')->with('successMessage', "Student is updated successfully");
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

    public function admittedStudent($id)
    {
        try {
            $student = Student::where('status', StudentStatus::Selected)->where('id', $id)->first();
            if ($student instanceof Student) {
                $student->status = StudentStatus::Admitted;
                $staudentRoll = time();
                $student->roll = $staudentRoll;
                $student->save();
                return redirect()->back()->with('successMessage', "Student Admitted successfully");
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
