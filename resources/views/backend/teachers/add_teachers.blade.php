@extends('backend.admin_master')

@section('title')
    Add Teachers
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center ">Add Teacher </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>'teachers.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3" >Full Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" required name="full_name" value="{{ old('full_name') }}" class="form-control" required placeholder="Enter teacher name"/>
                            <span class="text-danger">{{$errors->has('full_name') ? $errors->first('full_name') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Date of Birth<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="date" required name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" placeholder="Enter date of birth"/>
                            <span class="text-danger">{{$errors->has('date_of_birth') ? $errors->first('date_of_birth') : ''}} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Designation<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" required name="designation" value="{{ old('designation') }}" class="form-control" placeholder="Enter designation">
                            <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Contact Number<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" required name="contact_number" value="{{ old('contact_number') }}" class="form-control" placeholder="Enter contact"/>
                            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="email" required name="email" class="form-control" placeholder="Enter email"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Password<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" required name="password" class="form-control" placeholder="Password"/>
                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Confirm Password<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" required name="password_confirmation" class="form-control" placeholder=" Retype Password"/>
                            <span class="text-danger">{{$errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Father's Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" required name="father_name" placeholder="Enter father's name" value="{{ old('father_name') }}" class="form-control"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('father_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Mother's Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" required name="mother_name"  placeholder="Enter mother's name" value="{{ old('mother_name') }}" class="form-control"/>
                            <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-6">
                            <textarea type="text" name="address" class="form-control">{{ old('address') }}</textarea>
                            <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Teacher Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="teacher_photo" accept="image/*"/>
                            <span class="text-danger">{{$errors->has('teacher_photo') ? $errors->first('teacher_photo') : ''}}</span>
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
