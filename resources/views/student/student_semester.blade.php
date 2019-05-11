@extends('student.student_master')

@section('title')
    Enrolled Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class=""> Enrolled Semester </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>

                    <div class="row">
                        <div lass="col-md-12">
                            <table class="table">
                                <tr>
                                    <th>Semester Name</th>
                                    <th>Status</th>
                                    <th>CGPA</th>
                                    <th>Grade</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                @foreach($enrolledSemester as $enroll)
                                    <tr>
                                        <td>{{ $enroll->semester->semester_name }}</td>
                                        <td>{{ $enroll->status }}</td>
                                        <td>{{ $enroll->cgpa }}</td>
                                        <td>{{ $enroll->grade }}</td>
                                        <td class="text-center">
                                            <a href="{{route('student.print.payment-slip', $enroll->id)}}" target="__blank" class="btn btn-info">Print Payment Slip</a>
                                             @if($enroll->semester->status)
                                                <a href="{{route('student-edit-enroll', $enroll->semester->id)}}" class="btn btn-primary">Edit Enrollment</a>
                                             @endif
                                        </td>

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