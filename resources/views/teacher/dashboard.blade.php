@extends('teacher.teacher_master')

@section('title')
    Marks Entry
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class=""> Marks Entry </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('student-enroll')}}" class="btn btn-success pull-right">Enroll a New Course</a>
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>

                    <div class="row">
                        <div lass="col-md-12">
                            <table class="table">
                                <tr>
                                    <th>Course Name</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th>CGPA</th>
                                    <th>Grade</th>
                                </tr>
                               

                            </table>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>

@endsection