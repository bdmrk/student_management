@extends('backend.admin_master')

@section('title')
    Edit Syllabus
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center ">  Edit Syllabus</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>['syllabus.update', $syllabus->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    {{ method_field("put") }}
                    <div class="form-group">
                        <label class="control-label col-md-3" >Syllabus Name</label>
                        <div class="col-md-6">
                            <input type="text" name="syllabus_name" class="form-control" value="{{ $syllabus->syllabus_name }}" placeholder="Spring"/>
                            <span class="text-danger">{{$errors->has('syllabus_name') ? $errors->first('syllabus_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Description </label>
                        <div class="col-md-6">
                            <textarea type="text" name="description" class="form-control" > {{ $syllabus->description }}</textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Program</label>
                        <div class="col-md-6">
                            <select name="program" class="form-control program">
                                <option value="">Select Your Program</option>
                                @foreach($programs as $p)
                                    <option @if($syllabus->program_id == $p->id) selected @endif value="{{ $p->id }}">{{ $p->program_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-6">

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