@extends('backend.admin_master')

@section('title')
    Edit Student
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


                    {{Form::open(['route'=>['students.update', $students->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    @csrf
                    {{ method_field('PUT') }}

                    @include('backend.students.includes.edit.general')


                    <div class="form-grids row widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Academic Qualifications : </h4>
                        </div>


                        @include('backend.students.includes.edit.ssc_hsc')




                        @include('backend.students.includes.edit.honours_masters')


                    </div>

                    <div class="form-grids row widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Upload Your Certificates  Here : </h4>

                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-2"></label>
                            <div class="col-sm-6">
                                <span class="text-muted">Max file size 512kb</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">SSC </label>
                            <div class="col-sm-6">
                                <input type="file"  name="ssc[certificate]" accept="image/*" placeholder="Please Upload Certificate"/>
                                <span class="text-danger">{{$errors->has('ssc.certificate') ? $errors->first('ssc.certificate') : ''}}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">HSC </label>
                            <div class="col-sm-6">
                                <input type="file"  name="hsc[certificate]" accept="image/*" placeholder="Please Upload Certificate"/>
                                <span class="text-danger">{{$errors->has('hsc.certificate') ? $errors->first('hsc.certificate') : ''}}</span>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Graduation </label>
                            <div class="col-sm-6">
                                <input type="file"  name="honours[certificate]" accept="image/*" placeholder="Please Upload Certificate"/>
                                <span class="text-danger">{{$errors->has('honours.certificate') ? $errors->first('honours.certificate') : ''}}</span>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Post Graduation </label>
                            <div class="col-sm-6">
                                <input type="file"  name="masters[certificate]" accept="image/*" placeholder="Please Upload Certificate"/>
                                <span class="text-danger">{{$errors->has('masters.certificate') ? $errors->first('masters.certificate') : ''}}</span>

                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8 col-md-offset-5">
                            <input type="submit" value="Update Student" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>

    </div>

@endsection
