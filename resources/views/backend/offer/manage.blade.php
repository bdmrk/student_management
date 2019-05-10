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
                            <th>Teacher</th>
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
                                <td>{{$offer->teacher->full_name}}</td>
                                <td>{{$offer->status ==1 ? 'Active' : 'Inactive'}}</td>
                                <td>

                                    @if($offer->status ==1)
                                        <a href="{{ route('offer.change-status', $offer->id) }}" class="btn btn-info btn-xs d-inline" title="Click to inactive this offer">
                                            <span class="glyphicon glyphicon-arrow-up icon"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('offer.change-status', $offer->id) }}" class="btn btn-warning btn-xs d-inline" title="Click to active this offer">
                                            <span class="glyphicon glyphicon-arrow-down icon"></span>
                                        </a>
                                    @endif

                                    <a href="{{route('offer.edit',['id'=>$offer->id])}}" class="btn btn-success btn-xs d-inline" title="Click to edit this offer">
                                        <span class="glyphicon glyphicon-edit icon"></span>
                                    </a>
                                    <form method="post" action="{{ route('offer.destroy', ($offer->id)) }}" style="display: inline" title="click to delete this offer">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash icon" onclick="return confirm('Are you sure!!')"></span></button>
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
