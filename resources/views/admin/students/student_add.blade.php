@extends('admin.admin_master')

@section('title')
    Add Student
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-success"> Student Register</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    {{Form::open(['route'=>'studentAdd.index', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-4">First Name</label>
                        <div class="col-md-8">
                            <input type="text" name="first_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Second Name</label>
                        <div class="col-md-8">
                            <input type="text" name="second_name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('second_name') ? $errors->first('second_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Date of Birth</label>
                        <div class="col-md-8">
                            <input type="text" name="dob" class="form-control"/>
                            <span class="text-danger">{{$errors->has('dob') ? $errors->first('dob') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contact Number</label>
                        <div class="col-md-8">
                            <input type="text" name="contact_number" class="form-control"/>
                            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="email" class="form-control"/>
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
                        <label class="control-label col-md-4">Present Address</label>
                        <div class="col-md-8">
                            <textarea type="text" name="present_address" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('present_address') ? $errors->first('present_address') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Parmanent Address</label>
                        <div class="col-md-8">
                            <textarea type="text" name="parmanent_address" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('parmanent_address') ? $errors->first('parmanent_address') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Student Photo</label>
                        <div class="col-md-8">
                            <input type="file" name="student_photo" accept="image/*"/>
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
                        <label class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8">
                            <label><input type="radio"  checked name="publication_status" value="1"/>Published</label>
                            <label><input type="radio"  name="publication_status" value="0"/>Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" value="Save" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection