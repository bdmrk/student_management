@extends('backend.admin_master')

@section('title')
    Edit Teachers
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Edit Teacher </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>

                    {{Form::open(['route'=>['teachers.update', $teacher->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    {{ method_field("put") }}

                    <div class="form-group">
                        <label class="control-label col-md-4" >Full Name</label>
                        <div class="col-md-6">
                            <input type="text" name="full_name"   class="form-control" value="{{ $teacher->full_name }}" />
                            <span class="text-danger">{{$errors->has('full_name') ? $errors->first('full_name') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4">Date of Birth</label>
                        <div class="col-md-6">
                            <input type="text" name="date_of_birth" class="form-control" value="{{ $teacher->dob }}"/>
                            <span class="text-danger">{{$errors->has('date_of_birth') ? $errors->first('date_of_birth') : ''}} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Designation</label>
                        <div class="col-md-6">
                            <input type="text" name="designation" class="form-control" value="{{ $teacher->designation }}"  >
                            <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contact Number</label>
                        <div class="col-md-6">
                            <input type="text" name="contact_number" class="form-control" value="{{ $teacher->contact_number }}"/>
                            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-6">
                            <input type="email" name="email" value="{{ $teacher->email }}" class="form-control"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Father's Name</label>
                        <div class="col-md-6">
                            <input type="text" name="father_name" class="form-control" value="{{ $teacher->father_name }}"/>
                            <span class="text-danger">{{$errors->has('first_name') ? $errors->first('father_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Mother's Name</label>
                        <div class="col-md-6">
                            <input type="text" name="mother_name" class="form-control" value="{{ $teacher->mother_name }}"/>
                            <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Address </label>
                        <div class="col-md-6">
                            <textarea type="text" name="address" class="form-control" > {{ $teacher->address }}</textarea>
                            <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Teacher Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="teacher_photo" accept="image/*"/>
                            <br/>
                            <img src="{{asset($teacher->teacher_photo)}}" alt="photo" height="50" width="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Gender</label>
                        <div class="col-md-6">
                            <label><input type="radio"  {{$teacher->gender ==1 ? 'checked' : ''}} name="gender" value="1"/>Male</label>
                            <label><input type="radio" {{$teacher->gender ==0 ? 'checked' : ''}} name="gender" value="0"/>Female</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-md-6">
                            <label><input type="radio"  {{$teacher->status ==1 ? 'checked' : ''}}   name="status" value="1"/>Active</label>
                            <label><input type="radio" {{$teacher->status ==0 ? 'checked' : ''}} name="status" value="0"/>Inactive</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" value="Update Teacher" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection