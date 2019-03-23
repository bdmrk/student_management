@extends('backend.admin_master')

@section('title')
    Manage Offers
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"> Manage Offers </h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-9 pull-right">
                        @include('backend.includes.message')
                    </div>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL NO</th>
                            <th>Program</th>
                            <th>Syllabus</th>
                            <th>Semester</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$offer->syllabus->program->program_name}}</td>
                                <td>{{$offer->syllabus->syllabus_name}}</td>
                                <td>{{$offer->semester->semester_name}}</td>
                                <td>{{$offer->course->course_name}}</td>
                                <td>{{$offer->status ==1 ? 'Active' : 'Inactive'}}</td>
                                <td>

                                    @if($offer->status ==1)
                                        <a href="{{ route('offer.change-status', $offer->id) }}" class="btn btn-info btn-xs pull-left">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('offer.change-status', $offer->id) }}" class="btn btn-warning btn-xs pull-left">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{route('offer.edit',['id'=>$offer->id])}}" class="btn btn-success btn-xs pull-left">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <form method="post" action="{{ route('offer.destroy', ($offer->id)) }}">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button class="btn btn-danger btn-xs pull-left"> <span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure!!')"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
