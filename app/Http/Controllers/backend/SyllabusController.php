<?php

namespace App\Http\Controllers\backend;

use App\Helpers\Enum\EnrollCourseStatusEnum;
use App\Http\Helpers;
use App\Models\EnrolledCourse;
use App\Models\Syllabus;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$syllabuses = Syllabus::all();
        $syllabuses = Syllabus::with(['program'])->get();
        return view('backend.syllabuses.manage_syllabus', ['syllabuses' =>$syllabuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['programs'] = Program::all();
        return view('backend.syllabuses.create_syllabus', $data);
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
            'syllabus_name' => 'required|unique:syllabus|max:255',
            'status' => 'required'
        ]);

        try {
            $isActiveSyllabus = Syllabus::where('status', true)->first();
            if ($isActiveSyllabus instanceof Syllabus) {
                return redirect()->back()->withInput()->with('errorMessage', 'Failed. Please inactive old syllabus before creating new syllabus');
            }
            $syllabus = new Syllabus();
            $syllabus->syllabus_name = $request->input('syllabus_name');
            $syllabus->description = $request->input('description');
            $syllabus->status = $request->input('status');
            $syllabus->program_id = 1;
            $syllabus->created_by = Auth::user()->id;
            $syllabus->save();

        } catch(\Exception $exception) {
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }
      
        return redirect()->route('syllabus.index')->with('successMessage', "Syllabus Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['syllabus'] = Syllabus::findOrFail($id);
        return view('backend.syllabuses.details_syllabus', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['programs'] = Program::all();
        $data['syllabus'] = Syllabus::find($id);
        return view('backend.syllabuses.edit_syllabus', $data);
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
            'syllabus_name' => 'required|max:255',
            'description' => 'max:1500',
        ]);

        try {

            $syllabus = Syllabus::findOrFail($id);
            $isActiveSyllabus = Syllabus::where('id', '<>', $syllabus->id)->where('status', true)->first();
            if ($isActiveSyllabus instanceof Syllabus && $request->input('status')) {
               return redirect()->back()->withInput()->with('errorMessage', 'Failed. Another syllabus already active');
            }
            $syllabus->syllabus_name = $request->input('syllabus_name');
            $syllabus->description = $request->input('description');
            $syllabus->program_id = 1;
            $syllabus->save();
        } catch(\Exception $exception) {
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }
      
        return redirect()->route("syllabus.index", $id)->with('message', "Syllabus Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::find($id);
        $hasRunningCourse = EnrolledCourse::select('enrolled_course.*')
            ->leftJoin('offers', 'offers.id', 'enrolled_course.offer_id')
            ->where('offers.syllabus_id', $syllabus->id)->first();

        if ($hasRunningCourse) {
            return  redirect()->back()->with('errorMessage', "Failed. Some Student enrolled under this syllabus.");
        }
        $syllabus->delete();
        return redirect()->route('syllabus.index')->with('message', "Syllabus Deleted Successfully");
    }

    public  function  changeStatus(Request $request){

        $syllabus =  Syllabus::find($request->id);
        $isActiveSyllabus = Syllabus::where('id', '<>', $syllabus->id)->where('status', true)->first();

        if ($isActiveSyllabus instanceof Syllabus && !$syllabus->status) {
            return redirect()->back()->with('errorMessage', 'Failed. Another syllabus already active');
        }
                                                            
        $hasRunningCourse = EnrolledCourse::select('enrolled_course.*')
            ->whereIn('enrolled_course.status', [EnrollCourseStatusEnum::Running,EnrollCourseStatusEnum::Retake])
            ->leftJoin('offers', 'offers.id', 'enrolled_course.offer_id')
            ->where('offers.syllabus_id', $syllabus->id)->first();

        if ($hasRunningCourse) {
          return  redirect()->back()->with('errorMessage', "Failed. This syllabus has some running student course");
        }

        $syllabus->status = !$syllabus->status;
        $syllabus->save();
        return redirect()->back()->with('successMessage', 'Syllabus status change successfully');;

    }

    public function getSyllabusByProgramId($programId)
    {
        $syllabus = Syllabus::where('program_id', $programId)->get();
        $options = "<option value=''>Select Syllabus</option>";
        $options .= Helpers::makeOptions($syllabus, "id", "syllabus_name");
        return response()->json($options);
    }
}
