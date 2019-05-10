@extends('backend.admin_master')


@section('title')
Manage Courses
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center"> Manage Courses </h4>
            </div>
            <div class="panel-body">
                <div class="col-md-9 pull-right">
                    @include('backend.includes.message')
                </div>
                <table class="table table-bordered">
                    <tr class="bg-primary">
                        <th>SL NO</th>
                        <th>Course</th>
                        <th>Code</th>
                        <th>Credit</th>
                        <th>Syllabus</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_credit}}</td>
                        <td>{{$course->syllabus->syllabus_name}}</td>
                        <td>{{$course->syllabus->program->program_name}}</td>
                        <td>{{$course->status ==1 ? 'Active' : 'Inactive'}}</td>
                        <td>

                            @if($course->status ==1)
                            <a href="{{ route('course.change-status', $course->id) }}" class="btn btn-info btn-xs d-inline" title="Click to inactive this course">
                                <span class="glyphicon glyphicon-arrow-up icon "></span>
                            </a>
                            @else
                            <a href="{{ route('course.change-status', $course->id) }}" class="btn btn-warning btn-xs d-inline" title=" Click to active this course">
                                <span class="glyphicon glyphicon-arrow-down icon"></span>
                            </a>
                            @endif

                            <a href="{{route('course.edit',['id'=>$course->id])}}" class="btn btn-success btn-xs d-inline" title="Click to edit this course">
                                <span class="glyphicon glyphicon-edit icon"></span>
                            </a>
                            <form method="post" action="{{ route('course.destroy', ($course->id)) }}" style="display:inline" title="click to delete this course">
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
