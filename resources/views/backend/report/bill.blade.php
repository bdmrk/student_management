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

                    <div class="row">
                        <div class="col-md-9 pull-left">
                            <form action="" method="get">
                                <label class="">Payment Status</label>
                                <select name="payment_status">
                                    <option value="" @if($payment_status == null) selected @endif>All</option>
                                    <option value="1" @if($payment_status == 1) selected @endif>Paid</option>
                                    <option value="0" @if($payment_status == 0 && $payment_status != null) selected @endif>Not Paid</option>
                                </select>
                                <label class="">Payment Status</label>
                                <select name="semester">
                                    <option value="">All</option>
                                    @foreach($semesters as $semester)
                                        <option value="{{$semester->id}}" @if($semester_id == $semester->id) selected @endif>{{ $semester->semester_name }}</option>
                                    @endforeach

                                </select>

                                <input type="submit" value="Search" class="btn btn-info">
                            </form>
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
                            <td>{{ $bill->created_at }}</td>
                            <td>@if($bill->payment_status){{'Paid'}}@else {{ "Not Paid" }}@endif</td>
                            <td>{{ $bill->bill_amount }}</td>
                            <td>
                                @if(!$bill->payment_status)
                                    <a href="{{route('bill.paid', $bill->id)}}" class="btn btn-info">Paid</a>
                                @else
{{--                                    <a href="{{route('bill.show', $bill->id)}}" class="btn btn-success">Show</a>--}}
                                    @endif
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
