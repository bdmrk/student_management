@extends('backend.admin_master')

@section('title')
ManageSyllabus
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center"> Manage Syllabus </h4>
            </div>
            <div class="panel-body">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table class="table table-bordered">
                    <tr class="bg-primary">
                        <th>SL NO</th>
                        <th>Syllabus</th>
                        <th>Description</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($syllabuses as $syllabus)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$syllabus->syllabus_name}}</td>
                        <td>{{$syllabus->description}}</td>
                        <td>{{$syllabus->program->program_name}}</td>
                        <td>{{$syllabus->status ==1 ? 'Active' : 'Inactive'}}</td>
                        <td>

                            @if($syllabus->status ==1)
                            <a href="{{ route('syllabus.change-status', $syllabus->id) }}" class="btn btn-info btn-xs pull-left">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                            @else
                            <a href="{{ route('syllabus.change-status', $syllabus->id) }}" class="btn btn-warning btn-xs pull-left">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                            @endif

                            <a href="{{route('syllabus.edit',['id'=>$syllabus->id])}}" class="btn btn-success btn-xs pull-left">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <form method="post" action="{{ route('syllabus.destroy', ($syllabus->id)) }}">
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
