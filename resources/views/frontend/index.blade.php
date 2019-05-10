
@extends('layouts.auth_master')

@section('f-title')

   Login Panel::PGDIT
@stop

@section('content')

    <div id="page-wrapper">
        <div class="main-page login-page ">
            <h2 class="title1">Please Select Your Panel</h2>
            <div class="widget-shadow">
                <div class="login-body ">
                    <div class=" button_set_one three one">
                        <a href="{{ URL('/login') }}" type="button" class="btn btn-primary btn-flat btn-pri btn-lg" ><i class="fa fa-plus" aria-hidden="true"></i>Admin</a>
                        <a href="{{ route('teacher-login') }}" type="button" class="btn btn-info btn-flat btn-pri btn-lg" ><i class="fa fa-plus" aria-hidden="true"></i>Teacher</a>
                        <a href="{{ route('student-login') }}" type="button" class="btn btn-success btn-flat btn-pri btn-lg" ><i class="fa fa-plus" aria-hidden="true"></i>Student</a>

                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
