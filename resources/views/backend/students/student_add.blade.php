@extends('backend.admin_master')

@section('title')
    Create Student
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

                    @include('backend.students.includes.general_information')

                    <div class="form-grids row widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Academic Qualifications : </h4>
                        </div>
                        @include('backend.students.includes.ssc_hsc')
                        @include('backend.students.includes.honours_master')


                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-5">
                            <input type="submit" value="Save Student" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>

    </div>

@endsection