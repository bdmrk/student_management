<?php

namespace App\Http\Controllers\backend;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view('backend.semester.manage_semester', ['semesters'=>$semesters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.semester.create_semester');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = new Semester();
        $semester->semester_name = $request->input('semester_name');
        $semester->start_date = $request->input('starting_date');
        $semester->end_date = $request->input('ending_date');
        $semester->status = $request->input('status');
        $syllabus->created_by = Auth::user()->id;
        $semester->save();
       return redirect('backend/semester/create')->with('message','Semester Saved Succesfully');
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
        $data['semester'] = Semester::find($id);
        return view('backend.semester.edit', $data);
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
        $semester = Semester::find($id);
        $semester->semester_name = $request->input('semester_name');
        $semester->start_date = $request->input('starting_date');
        $semester->end_date = $request->input('ending_date');
        $semester->status = $request->input('status');
        $semester->save();
        return redirect()->route("semester.edit", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

//        $semester = Semester::findOrFail($id);
//        $semester->delete();
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('backend/semester');


    }

    public function changeStatus(Request $request)
    {
        $semester =  Semester::find($request->id);
        $semester->status = !$semester->status;
        $semester->save();
        return redirect()->route('semester.index');
    }

}

