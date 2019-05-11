@extends('student.student_master')

@section('title')
    Enrolled Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class=""> Enrolled Course </h3>
                </div>
                <div class="panel-body">
                    @if(auth()->guard('student')->user()->status == \App\Helpers\Enum\StudentStatus::Admitted)
                        <a href="{{route('student-enroll')}}" class="btn btn-success pull-right">Enroll a New Course</a>
                    @endif
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
                                @foreach($enrolledCourses as $enroll)
                                    <tr>
                                        <td>{{ $enroll->offer->course->course_name }}</td>
                                        <td>{{ $enroll->enroll->semester->semester_name }}</td>
                                        <td>{{ $enroll->status }}</td>
                                        <td>{{ $enroll->cgpa }}</td>
                                        <td>{{ $enroll->grade }}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>

@endsection