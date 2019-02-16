@extends('backend.admin_master')

@section('title')
    Add Course
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Create Course</h3>
                </div>
                <div class="panel-body">
                        <div class="row">
                                <div class="col-md-9 pull-right">
                                    @include('backend.includes.message')
                                </div>
                            </div>
                    {{Form::open(['route'=>'course.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Title</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ old('course_name') }}" name="course_name" class="form-control" placeholder="Object Oriented Programming"/>
                            <span class="text-danger">{{$errors->has('course_name') ? $errors->first('course_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Code</label>
                        <div class="col-md-6">
                        <input type="text" value="{{ old('course_code') }}" name="course_code" class="form-control" placeholder="OPP-203"/>
                            <span class="text-danger">{{$errors->has('course_code') ? $errors->first('course_code') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-md-3" >Course Credit</label>
                            <div class="col-md-6">
                            <input type="text" value="{{ old('course_credit') }}" name="course_credit" class="form-control" placeholder="3"/>
                                <span class="text-danger">{{$errors->has('course_credit') ? $errors->first('course_credit') : ''}}</span>
                            </div>
                        </div>
                        

                    <div class="form-group">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" name="description"  rows="5" class="form-control"> </textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="control-label col-md-3">Program</label>
                            <div class="col-md-6">
                                <select name="program" class="form-control program">
                                    <option value="">Select Your Program</option>
                                    @foreach($programs as $p)
                                        <option value="{{ $p->id }}">{{ $p->program_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                            <label class="control-label col-md-3">Syllabus</label>
                            <div class="col-md-6">
                                <select name="syllabus" class="form-control syllabus">
                                   
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
                            <input type="submit" value="Create Syllabus" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
<script>


    $(".program").change(function(){
        
        var id = $(this).val();
      
        var hitUrl = "{{ url('/admin/ajax/get-syllabus') }}/" + id;
        
        if (id != '') {
            $.get(hitUrl, function(response){
               // alert(response);
                if(response) {
                    $(".syllabus").html(response);
                } 
            });
        } else {
            $(".syllabus").html('');
        }
    });
</script>

@endsection