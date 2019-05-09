
@extends('backend.admin_master')

@section('title')
    Teacher Details
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
                                                        <p> {{$teacher->full_name}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="father">Father's Name :</label>
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
                                                        <p>{{$teacher->gender}}</p>
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
                                                        <label for="permanent">Designation:</label>
                                                        <p>{{$teacher->designation}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="religion">Status:</label>

                                                        @if($teacher->status == 1)
                                                        <p>Active</p>

                                                            @else
                                                            <p>Terminated</p>


                                                        @endif
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


