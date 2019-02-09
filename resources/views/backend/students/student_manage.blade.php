<<<<<<< HEAD
=======
@extends('backend.admin_master')

@section('title')
ManageStudent
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center"> Manage Student </h4>
            </div>
            <div class="panel-body">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table class="table table-bordered">
                    <tr class="bg-primary">
                        <th>SL NO</th>
                        <th>Student Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($students as $student)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->contact_number}}</td>
                        <td>{{$student->email}}</td>
                        <td> <img src="{{URL::to($student->student_photo)}}" style="height:80px; width: 80px;"> </td>
                        <td>{{$student->status ==1 ? 'Active' : 'Inactive'}}</td>
                        <td>

                            @if($student->status ==1)
                            <a href="{{ route('student.change-status', $student->id) }}" class="btn btn-info btn-xs pull-left">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                            @else
                            <a href="{{ route('student.change-status', $student->id) }}" class="btn btn-warning btn-xs pull-left">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                            @endif

                            <a href="{{route('students.show',['id'=>$student->id])}}" class="btn btn-primary btn-xs pull-left">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>

                            <a href="{{route('students.edit',['id'=>$student->id])}}" class="btn btn-success btn-xs pull-left">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <form method="post" action="{{ route('students.destroy', ($student->id)) }}">
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
>>>>>>> kausar
