@extends('backend.admin_master')

@section('title')
    Add Teachers
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Teacher Registration </h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    {{Form::open(['route'=>'teachers.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-4" >First Name</label>
                        <div class="col-md-8">
                            <input type="text" name="first_name" class="form-control" placeholder="Mahabubur Rahman"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Second Name</label>
                        <div class="col-md-8">
                            <input type="text" name="second_name" class="form-control" placeholder="Kausar"/>
                            <span class="text-danger">{{$errors->has('second_name') ? $errors->first('second_name') : ''}}</span>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="control-label col-md-4">Date of Birth</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<input type="text" name="dob" class="form-control" placeholder="18/03/1992"/>--}}
                            {{--<span class="text-danger">{{$errors->has('dob') ? $errors->first('dob') : ''}} </span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Designation</label>
                        <div class="col-md-8">
                            <input type="text" name="designation" class="form-control" placeholder="Professor">
                            <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contact Number</label>
                        <div class="col-md-8">
                            <input type="text" name="contact_number" class="form-control" placeholder="01839590972"/>
                            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" placeholder="hostkausar@gmail.com"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Father's Name</label>
                        <div class="col-md-8">
                            <input type="text" name="father_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('father_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Mother's Name</label>
                        <div class="col-md-8">
                            <input type="text" name="mother_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <textarea type="text" name="address" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Teacher Photo</label>
                        <div class="col-md-8">
                            <input type="file" name="teacher_photo" accept="image/*"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Gender</label>
                        <div class="col-md-8">
                            <label><input type="radio"  checked name="gender" value="1"/>Male</label>
                            <label><input type="radio"  name="gender" value="0"/>Female</label>
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
                            <input type="submit" value="Save Teacher" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection