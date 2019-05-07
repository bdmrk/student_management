
@extends('backend.admin_master')

@section('title')
    Student Details
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"> Student's Profile </h4>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">

                                <div class="fb-profile">

                                    <img align="left" height="100" class="fb-image-profile thumbnail" src="{{asset($student->student_photo)}}"/>


                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fb-profile-text">
                                    <h1>{{$student->full_name}}</h1>

                                </div>
                            </div>
                        </div>
                    </div> <!-- /container fluid-->
                    <div class="container">
                        <div class="col-sm-8">

                            <div data-spy="scroll" class="tabbable-panel">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">

                                        <li class="active">
                                            <a href="#tab_default_2" data-toggle="tab">
                                                Personal Information</a>
                                        </li>
                                        <li>
                                            <a href="#tab_default_3" data-toggle="tab">
                                                Academic Information</a>
                                        </li>
                                        <li>
                                            <a href="#tab_default_4" data-toggle="tab">
                                               Enrolled Course </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_default_2">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Full Name:</label>
                                                        <p> {{$student->full_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="father">Father's Name :</label>
                                                        <p>{{$student->father_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mother">Mothers's Name :</label>
                                                        <p>{{$student->mother_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dob">Birth Of Birth:</label>
                                                        <p>{{$student->dob}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender:</label>
                                                        <p>{{$student->gender}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone:</label>
                                                        <p>{{$student->contact_number}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <p>{{$student->email}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Present Address:</label>
                                                        <p>{{$student->present_address}}</p>
                                                    </div>

                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="permanent">Permanent Address:</label>
                                                        <p>{{$student->permanent_address}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="religion">Religion:</label>
                                                        <p>{{$student->religion}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="blood">Blood Group:</label>
                                                        <p>{{$student->blood_group}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nid">Nid Card No:</label>
                                                        <p>{{$student->nid}}</p>
                                                    </div>

                                                </div>
                                            </div>



                                        </div>
                                        <div class="tab-pane" id="tab_default_3">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="bs-example widget-shadow" data-example-id="bordered-table">

                                                        <table class="table table-bordered"> <thead>
                                                            <tr>
                                                                <th>#</th>

                                                                <th>Certificate</th>
                                                                <th>Board/University</th>
                                                                <th>Passing Year</th>
                                                                <th>Result</th> </tr>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php($i=1)
                                                            @foreach($student->academicInfo as $acInfo)
                                                            <tr>
                                                                <th scope="row">{{$i++}}</th>
                                                                <td>{{$acInfo->exam->name}}</td>
                                                                <td>@if($acInfo->board_id){{$acInfo->board->name}}@else {{$acInfo->institute}} @endif</td>
                                                                <td>{{$acInfo->passing_year}}</td>
                                                                <td>{{$acInfo->result}}</td>

                                                            </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_default_4">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <br>
                                                    <table class="table table-bordered"> <thead>
                                                        <tr>
                                                            <th>#</th>

                                                            <th>Course Name</th>
                                                            <th>Incourse Mark</th>
                                                            <th>Final Mark</th>
                                                            <th>CGPA</th>
                                                            <th>Grade</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php($i=1)
                                                        @foreach($student->enrolledCourse as $course)
                                                            <tr>
                                                                <th scope="row">{{$i++}}</th>
                                                                <td>{{$course->offer->course->course_name}}</td>
                                                                <td>{{$course->incourse_mark}}</td>
                                                                <td>{{$course->final_mark}}</td>
                                                                <td>{{$course->cgpa}}</td>
                                                                <td>{{$course->grade}}</td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection


