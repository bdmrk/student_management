@extends('backend.admin_master')

@section('title')
   Due Bill
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Due Bill </h4>

                </div>


                <div class="panel-body table-responsive">
                    <div class="row">
                        <div class="col-md-9 pull-left">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <tr class="bg-primary">
                            <th>Student Name</th>
                            <th>Semester</th>
                            <th>Bill Date</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        @foreach($dueBills as $bill)
                        <tr>
                            <td>{{ $bill->student->full_name }}</td>
                            <td>{{ $bill->semester->semester_name }}</td>
                            <td>{{ $bill->crated_at }}</td>
                            <td>@if($bill->payment_status){{'Paid'}}@else {{ "Not Padi" }}@endif</td>
                            <td>{{ $bill->crated_at }}</td>
                            <td>{{ $bill->bill_amount }}</td>
                            <td><a href="">Paid</a> </td>
                        </tr>
                        @endforeach

                        
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
