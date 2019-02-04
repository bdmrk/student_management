@extends('backend.admin_master')

@section('title')
    Add Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Create Course</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('errorMessage')}}</h4>
                    {{Form::open(['route'=>'course.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Title</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ old('course_name') }}" name="course_name" class="form-control" placeholder="Object Oriented Programming"/>
                            <span class="text-danger">{{$errors->has('course_name') ? $errors->first('course_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Code</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ old('course_code') }}" name="course_name" class="form-control" placeholder="OPP-203"/>
                            <span class="text-danger">{{$errors->has('course_code') ? $errors->first('course_code') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" name="description" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Syllabus</label>
                        <div class="col-md-6">
                            <select name="syllabus" class="form-control">
                               
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-6">
                            <label><input type="radio"  checked name="status" value="1"/>Active</label>
                            <label><input type="radio"  name="status" value="0"/>Inactive</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" value="Create Syllabus" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection