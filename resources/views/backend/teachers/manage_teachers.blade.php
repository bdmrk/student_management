@extends('backend.admin_master')

@section('title')
  Manage Teachers
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">   Manage Teachers </h4>

                </div>


                <div class="panel-body table-responsive">
                    <div class="row">
                        <div class="col-md-9 pull-left">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <tr class="bg-primary">
                            <th>SL NO</th>
                            <th>Teacher's Name</th>
                            <th>Designation</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$teacher->full_name}}</td>
                                <td>{{$teacher->designation}}</td>
                                <td>{{$teacher->contact_number}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>
                                    <img src="{{asset($teacher->teacher_photo)}}" alt="photo" height="100" width="100">
                                </td>
                                <td>{{$teacher->gender}}</td>
                                <td>{{$teacher->status ==1 ? 'Active' : 'Inactive'}}</td>
                                
                                <td>
                                    <a href="#" class="btn btn-success btn-xs pull-left">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>

                                    <a href="{{route('teachers.edit',['id'=>$teacher->id])}}" class="btn btn-success btn-xs pull-left">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <form method="post" action="{{ route('teachers.destroy', ($teacher->id)) }}">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button class="btn btn-danger btn-xs pull-left"> <span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure!!')"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $teachers->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
