@extends('backend.admin_master')

@section('title')
    Update Syllabus
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center ">  Update Syllabus</h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                    {{Form::open(['route'=>['syllabus.update', $syllabus->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    {{ method_field("put") }}
                    <div class="form-group">
                        <label class="control-label col-md-4" >Syllabus Name</label>
                        <div class="col-md-8">
                            <input type="text" name="syllabus_name" class="form-control" value="{{ $syllabus->syllabus_name }}" placeholder="Spring"/>
                            <span class="text-danger">{{$errors->has('syllabus_name') ? $errors->first('syllabus_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Description </label>
                        <div class="col-md-8">
                            <textarea type="text" name="description" class="form-control" > {{ $syllabus->description }}</textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-md-8">

                            @if($syllabus->status)
                                <label><input type="radio"  checked name="status" value="1"/>Active</label>
                                <label><input type="radio"  name="status" value="0"/>Inactive</label>
                            @else
                                <label><input type="radio"   name="status" value="1"/>Active</label>
                                <label><input type="radio" checked name="status" value="0"/>Inactive</label>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" value="Update" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection