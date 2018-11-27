@extends('admin.admin_master')

@section('title')
    Edit Semester
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Edit Semester</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('semester.update', encrypt($semester->id)) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="control-label col-md-4" >Semester's Name</label>
                        <div class="col-md-8">
                            <input type="text" name="semester_name"  value="{{ $semester->semester_name }}" class="form-control" />
                            <span class="text-danger">{{$errors->has('semester_name') ? $errors->first('semester_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Starting Date</label>
                        <div class="col-md-8">
                            <input type="date" name="starting_date" class="form-control" value="{{ $semester->start_date }}" />
                            <span class="text-danger">{{$errors->has('starting_date') ? $errors->first('starting_date') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Ending Date</label>
                        <div class="col-md-8">
                            <input type="date" name="ending_date" class="form-control" value="{{ $semester->end_date }}" />
                            <span class="text-danger">{{$errors->has('ending_date') ? $errors->first('ending_date') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-md-8">
                            <label><input type="radio"  checked name="status" value="1"/>Active</label>
                            <label><input type="radio"  name="status" value="0"/>Inactive</label>
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