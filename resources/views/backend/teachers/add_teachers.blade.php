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
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>'teachers.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3" >Full Name</label>
                        <div class="col-md-6">
                            <input type="text" name="full_name" class="form-control" placeholder="Mahabubur Rahman Kausar"/>
                            <span class="text-danger">{{$errors->has('full_name') ? $errors->first('full_name') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Date of Birth</label>
                        <div class="col-md-6">
                            <input type="date" name="date_of_birth" class="form-control" placeholder="18/03/1992"/>
                            <span class="text-danger">{{$errors->has('date_of_birth') ? $errors->first('date_of_birth') : ''}} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Designation</label>
                        <div class="col-md-6">
                            <input type="text" name="designation" class="form-control" placeholder="Professor">
                            <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}} </span>
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
                            <input type="email" name="email" class="form-control" placeholder="hostkausar@gmail.com"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder=" Retype Password"/>
                            <span class="text-danger">{{$errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
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
                        <label class="control-label col-md-3">Teacher Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="teacher_photo" accept="image/*"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-6">
                            <label><input type="radio"  checked name="gender" value="Male"/>Male</label>
                            <label><input type="radio"  name="gender" value="Female"/>Female</label>
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
                            <input type="submit" value="Save Teacher" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection