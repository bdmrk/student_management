@extends('backend.admin_master')

@section('title')
    Add Semester
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Create Semester</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                    {{Form::open(['route'=>['semester.update', $semester->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                                                 {{ method_field("put") }}
                    <div class="form-group">
                        <label class="control-label col-md-4" >Semester's Name</label>
                        <div class="col-md-8">
                            <input type="text" name="semester_name" class="form-control" value="{{ $semester->semester_name }}" placeholder="Spring"/>
                            <span class="text-danger">{{$errors->has('semester_name') ? $errors->first('semester_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Starting Date</label>
                        <div class="col-md-8">
                            <input type="date" name="starting_date" class="form-control" value="{{ $semester->start_date }}" placeholder="01/01/2019"/>
                            <span class="text-danger">{{$errors->has('starting_date') ? $errors->first('starting_date') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Ending Date</label>
                        <div class="col-md-8">
                            <input type="date" name="ending_date" class="form-control" value="{{ $semester->end_date }}" placeholder="01/01/2019"/>
                            <span class="text-danger">{{$errors->has('ending_date') ? $errors->first('ending_date') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-md-8">

                            @if($semester->status)
                                <label><input type="radio"  checked name="status" value="1"/>Active</label>
                                <label><input type="radio"  name="status" value="0"/>Inactive</label>
                            @else
                                <label><input type="radio"   name="status" value="1"/>Active</label>
                                <label><input type="radio" checked name="status" value="0"/>Inactive</label>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" value="Update" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection