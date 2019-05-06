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