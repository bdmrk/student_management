@extends('backend.admin_master')

@section('title')
    Add Student
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Student Registration</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>'students.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3" >First Name</label>
                        <div class="col-md-6">
                            <input type="text" name="first_name" class="form-control" placeholder="Mahabubur Rahman"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Second Name</label>
                        <div class="col-md-6">
                            <input type="text" name="second_name" class="form-control" placeholder="Kausar"/>
                            <span class="text-danger">{{$errors->has('second_name') ? $errors->first('second_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Date of Birth</label>
                        <div class="col-md-6">
                            <input type="date" name="dob" class="form-control" placeholder="18/03/1992"/>
                            <span class="text-danger">{{$errors->has('dob') ? $errors->first('dob') : ''}} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Contact Number</label>
                        <div class="col-md-6">
                            <input type="text" name="contact_number" class="form-control" placeholder="01839590972"/>
                            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="hostkausar@gmail.com"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Father's Name</label>
                        <div class="col-md-6">
                            <input type="text" name="father_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('father_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Mother's Name</label>
                        <div class="col-md-6">
                            <input type="text" name="mother_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-6">
                            <textarea type="text" name="address" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Student Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="student_photo" accept="image/*"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-6">
                            <label><input type="radio"  checked name="gender" value="1"/>Male</label>
                            <label><input type="radio"  name="gender" value="0"/>Female</label>
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
                            <input type="submit" value="Save Student" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection