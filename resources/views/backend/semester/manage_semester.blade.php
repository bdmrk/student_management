@extends('backend.admin_master')

@section('title')
    ManageSemester
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"> Manage Semester </h4>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL NO</th>
                            <th>Semester</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($semesters as $semester)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$semester->semester_name}}</td>
                                <td>{{$semester->start_date}}</td>
                                <td>{{$semester->end_date}}</td>
                                <td>{{$semester->status ==1 ? 'Active' : 'Inactive'}}</td>
                                <td>

                                    @if($semester->status ==1)
                                        <a href="{{ route('semester.change-status', $semester->id) }}" class="btn btn-info btn-xs d-inline " title="Click to inactive this semester">
                                            <span class="glyphicon glyphicon-arrow-up icon"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('semester.change-status', $semester->id) }}" class="btn btn-warning btn-xs d-inline " title="Click to active this semester">
                                            <span class="glyphicon glyphicon-arrow-down icon"></span>
                                        </a>
                                    @endif

                                    <a href="{{route('semester.edit',['id'=>$semester->id])}}" class="btn btn-success btn-xs d-inline " title="Click to edit this semester">
                                        <span class="glyphicon glyphicon-edit icon"></span>
                                    </a>
                                    <form method="post" action="{{ route('semester.destroy', ($semester->id)) }}" style="display: inline" title="Click to delete this semester">
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
