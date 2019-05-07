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
                <div class="row">
                    <div class="col-md-9 pull-right">
                        @include('backend.includes.message')
                    </div>
                </div>
                {{Form::open(['route'=>'semester.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                <div class="form-group">
                    <label class="control-label col-md-3" >Semester's Name</label>
                    <div class="col-md-6">
                        <input type="text" name="semester_name" class="form-control" placeholder="Spring"/>
                        <span class="text-danger">{{$errors->has('semester_name') ? $errors->first('semester_name') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Starting Month</label>
                    <div class="col-md-6">
                        <select class="form-control" name="starting_month">
                            @foreach($month as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <span class="text-danger">{{$errors->has('starting_month') ? $errors->first('starting_month') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Ending Month</label>
                    <div class="col-md-6">
                        <select class="form-control" name="ending_month">
                            @foreach($month as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('ending_month') ? $errors->first('ending_month') : ''}}</span>
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
                    <div class="col-md-8 col-md-offset-3">
                        <input type="submit" value="Create" name="btn" class="btn btn-success btn block" />
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

</div>

@endsection