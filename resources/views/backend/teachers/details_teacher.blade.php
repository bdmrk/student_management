
@extends('backend.admin_master')

@section('title')
    Student Details
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"> Teacher's Profile </h4>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">

                                <div class="fb-profile">

                                    <img align="left" height="100" class="fb-image-profile thumbnail" src="{{asset($teacher->teacher_photo)}}"/>


                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fb-profile-text">
                                    <h1>{{$teacher->full_name}}</h1>

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
                                                Present Course</a>
                                        </li>
                                        <li>
                                            <a href="#tab_default_4" data-toggle="tab">
                                                Previous Course </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_default_2">

                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="father">Designation :</label>
                                                        <p>{{$teacher->designation}}</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="father_name">Father's Name:</label>
                                                        <p>{{$teacher->father_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mother">Mothers's Name :</label>
                                                        <p>{{$teacher->mother_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dob">Birth Of Birth:</label>
                                                        <p>{{$teacher->dob}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender:</label>
                                                        @if ($teacher->gender == 1)
                                                             <p>Male</p>
                                                             @else
                                                            <p>Female</p>
                                                             @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone:</label>
                                                        <p>{{$teacher->contact_number}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <p>{{$teacher->email}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Present Address:</label>
                                                        <p>{{$teacher->address}}</p>
                                                    </div>

                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="permanent">Status</label>
                                                        @if($teacher->status == 1)
                                                            <p>Active</p>
                                                            @else
                                                        <p>Terminated</p>
                                                            @endif
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

                                                                <th>Course Name</th>
                                                                <th>Semester</th>
                                                                <th>Syllabus</th>
                                                            </tr>

                                                            </thead>

                                                            <tbody>
                                                            @php($i=1)
                                                            @foreach($currentCourses as $course)
                                                                <tr>
                                                                    <th scope="row">{{$i++}}</th>
                                                                    <td>{{$course->course_name}}</td>
                                                                    <td>{{$course->semester_name}}</td>
                                                                    <td>{{$course->syllabus_name}}</td>
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
                                                            <th>Semester</th>
                                                            <th>Syllabus</th>


                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php($i=1)
                                                        @foreach($previousCourses as $course)
                                                            <tr>
                                                                <th scope="row">{{$i++}}</th>
                                                                <td>{{$course->course_name}}</td>
                                                                <td>{{$course->semseter_name}}</td>
                                                                <td>{{$course->syllabus_name}}</td>

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


