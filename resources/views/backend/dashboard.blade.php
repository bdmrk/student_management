@extends('backend.admin_master')

@section('title')
    Dashboard
@endsection

@section('body')

    <div class="col_3 row">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $totalStudent }}</strong></h5>
                    <span>Student</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user user1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $totalTeacher }}</strong></h5>
                    <span>Teacher</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-pie-chart user2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $offeredCourse }}</strong></h5>
                    <span>Offered Course</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $totalBill }}</strong></h5>
                    <span>Total Bill</span>
                </div>
            </div>
        </div>


        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-money dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $paidAmount }}</strong></h5>
                    <span>Collection</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-money dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $totalBill-$paidAmount }}</strong></h5>
                    <span>Bill Due</span>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
@endsection