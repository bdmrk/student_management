@extends('backend.admin_master')

@section('title')
    Add Subject
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Add Subject</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    {{Form::open(['route'=>'subjects.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-4" >Subject's Name</label>
                        <div class="col-md-8">
                            <input type="text" name="subject_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('subject_name') ? $errors->first('subject_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Credit</label>
                        <div class="col-md-8">
                            <input type="number" name="credit" class="form-control">
                            <span class="text-danger">{{$errors->has('credit') ? $errors->first('credit') : ''}}</span>
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
                            <input type="submit" value="Create" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection