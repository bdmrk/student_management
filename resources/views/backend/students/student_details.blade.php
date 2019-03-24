
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
                            <div class="fb-profile">

                                <img align="left" class="fb-image-profile thumbnail" src="{{asset($student->student_photo)}}"/>

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
                                                Course Information</a>
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
                                                            @foreach($student as $s)
                                                            <tr>
                                                                <th scope="row">{{$i++}}</th>
                                                                <td>SSC</td>
                                                                <td>Dhaka</td>
                                                                <td>2005</td>
                                                                <td>5.00</td>
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
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Highest Education:</label>
                                                        <p> MBA/PGDM</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Place of Birth:</label>
                                                        <p> pune, maharashtra</p>
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

    </div>
@endsection

@section('scripts')

@endsection


