@extends('backend.admin_master')

@section('title')
    Edit Course
@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Edit Course</h3>
                </div>
                <div class="panel-body">
                        <div class="row">
                                <div class="col-md-9 pull-right">
                                    @include('backend.includes.message')
                                </div>
                            </div>
                    {{Form::open(['route'=>['course.update',$course->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    {{ method_field("put") }}
                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Title</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ $course->course_name }}" name="course_name" class="form-control" placeholder="Object Oriented Programming"/>
                            <span class="text-danger">{{$errors->has('course_name') ? $errors->first('course_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Code</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ $course->course_code }}" name="course_code" class="form-control" placeholder="OPP-203"/>
                            <span class="text-danger">{{$errors->has('course_code') ? $errors->first('course_code') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-md-3" >Course Credit</label>
                            <div class="col-md-6">
                            <input type="text"  value="{{ $course->course_credit }}" name="course_credit" class="form-control" placeholder="3"/>
                                <span class="text-danger">{{$errors->has('course_credit') ? $errors->first('course_credit') : ''}}</span>
                            </div>
                        </div>
                        

                    <div class="form-group">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" name="description"  rows="5" class="form-control">{{ $course->description }}</textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3">Prerequisite</label>
                        <div class="col-md-6">
                            <select name="prerequisite_course_id[]" multiple class="form-control select2 prerequisite">
                                @foreach($courses as $aCourse)
                                    <option value="{{ $aCourse->id }}" @if(in_array($aCourse->id, $prerequisiteCourseIds)) selected @endif>{{ $aCourse->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-6">
                            <label><input type="radio"  checked name="status" value="1"/>Active</label>
                            <label><input type="radio"  name="status" value="0"/>Inactive</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" value="Update Course" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>


    $(".program").change(function(){
        
        var id = $(this).val();
        var hitUrl = "{{ url('/admin/ajax/get-syllabus') }}/" + id;
        if (id != '') {
            $.get(hitUrl, function(response){
                if(response) {
                    $(".syllabus").html(response);
                } 
            });
        } else {
            $(".syllabus").html('');
        }
    });

    $(document).ready(function() {
        $('.select2').select2();
    });
</script>



@endsection


