@extends('student.student_master')

@section('title')
   Enroll New Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Enroll New Course</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>'enroll.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3">Semester : </label>
                        <div class="col-md-6">
                            <select name="semester" class="form-control semester">
                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                            </select>
                            <span class="text-danger">{{$errors->has('semester') ? $errors->first('semester') : ''}}</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Course : </label>
                        <div class="col-md-6">
                            @foreach($offers as $offer)
                                {{ $offer->course->course_name }} <input type="checkbox" value="{{ $offer->id }}" name="course[]" />
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" value="Enroll" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection