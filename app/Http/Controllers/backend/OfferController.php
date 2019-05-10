<?php

namespace App\Http\Controllers\backend;

use App\Helpers\Enum\ClassDayEnum;
use App\Helpers\Enum\MonthEnum;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Syllabus;
use App\Models\Program;
use App\Models\Offer;
use App\Models\Teacher;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['offers'] = Offer::with(['syllabus.program', 'course', 'semester', 'teacher'])->get();
        return view('backend.offer.manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['programs'] = Program::all();
        $data['syllabus'] = $syllabus = Syllabus::active()->first();
        $data['courses'] = $course = Course::active()->where('syllabus_id', $syllabus->id)->get();
        $data['days'] = ClassDayEnum::getValues();

        
        $data['semester'] = Semester::active()->first();
        $data['teachers'] = Teacher::active()->get();
        
        return view('backend.offer.create', $data);
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
            'course' => 'required|integer',
            'syllabus' => 'required|integer',
            'teacher' => 'required|integer',
            'semester' => 'required|integer',
            'course_fee' => 'required|numeric',
            'class_day' => 'required',
            'class_time' => 'required'
        ]);

        try {

            $hasOffer = Offer::where('syllabus_id', $request->input('course'))
                ->where('course_id', $request->input('course'))
                ->where('course_id', $request->input('course'))
                ->where('semester_id', $request->input('semester'))
                ->where('teacher_id', $request->input('teacher'))
                ->where('class_day', $request->input('class_day'))
                ->get();

            if ($hasOffer instanceof Offer) {
                return redirect()->back()->withInput()->with('errorMessage', 'Already exist!');
            }

            $offer = new Offer();
            $offer->program_id = 1;
            $offer->course_id = $request->input('course');
            $offer->syllabus_id = $request->input('syllabus');
            $offer->semester_id = $request->input('semester');
            $offer->teacher_id = $request->input('teacher');
            $offer->course_fee = $request->input('course_fee');
            $offer->class_day = $request->input('class_day');
            $offer->class_time = $request->input('class_time');
            $offer->created_by = auth()->user()->id;
            $offer->status = $request->input('status');
            $offer->save();
            
        } catch(\Exception $exception) {
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }

        return redirect()->route("offer.index")->with('successMessage', "Offer is created Successfully");
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
        $data['offer'] = $offer = Offer::select('offers.*')
            ->leftJoin('syllabus', 'syllabus.id', 'offers.syllabus_id')
            ->leftJoin('semesters', 'semesters.id', 'offers.semester_id')
            ->where('syllabus.status', true)
            ->where('semesters.status', true)
            ->where('offers.id', $id)->first();

        if(!($offer instanceof  Offer)) {
            return redirect()->back()->with('errorMessage', 'You can not edit inactive syllabus or inactive semester offer');
        }

        $data['semester'] = Semester::active()->first();
        $data['teachers'] = Teacher::all();
        $data['courses'] = Course::all();
        $data['syllabus'] = Syllabus::active()->first();
        $data['days'] = ClassDayEnum::getValues();
        return view('backend.offer.edit', $data);
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
            'course' => 'required|integer',
            'syllabus' => 'required|integer',
            'teacher' => 'required|integer',
            'semester' => 'required|integer',
            'course_fee' => 'required|numeric',
            'class_day' => 'required',
            'class_time' => 'required'
        ]);

        try {
            $hasOffer = Offer::where('syllabus_id', $request->input('course'))
                ->where('course_id', $request->input('course'))
                ->where('semester_id', $request->input('semester'))
                ->where('teacher_id', $request->input('teacher'))
                ->where('class_day', $request->input('class_day'))
                ->get();

            if ($hasOffer instanceof Offer) {
                return redirect()->back()->withInput()->with('errorMessage', 'Already exist!');
            }

            $offer = Offer::findOrFail($id);
            $offer->program_id = 1;
            $offer->course_id = $request->input('course');
            $offer->teacher_id = $request->input('teacher');
            $offer->course_fee = $request->input('course_fee');
            $offer->class_day = $request->input('class_day');
            $offer->class_time = $request->input('class_time');
            $offer->created_by = auth()->user()->id;
            $offer->status = $request->input('status');
            $offer->save();

        } catch(\Exception $exception) {
            return redirect()->back()->withInput()->with('errorMessage', 'Something went wrong. please try again');
        }

        return redirect()->route("offer.index")->with('successMessage', "Offer is Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->route('offer.index')->with('successMessage', "Offer is Deleted Successfully");
    }

    public  function  changeStatus(Request $request){

        $offer =  Offer::find($request->id);
        $offer->status = !$offer->status;
        $offer->save();
        return redirect()->route('offer.index');

    }
}
