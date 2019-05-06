@extends('backend.admin_master')

@section('title')
    Update Offer
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Update Offer</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>
                    {{Form::open(['route'=>['offer.update', $offer->id], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-md-3">Program</label>
                        <div class="col-md-6">
                            <select name="program" class="form-control program">

                                <option value="">Select Your Program</option>
                                @foreach($programs as $p)

                                    <option @if($offer->syllabus->program_id == $p->id) selected @endif value="{{ $p->id }}">{{ $p->program_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('program') ? $errors->first('program') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Syllabus</label>
                        <div class="col-md-6">
                            <select name="syllabus" class="form-control syllabus">
                                <option value="">Select Syllabus</option>
                                @foreach($syllabuses as $sy)
                                    <option @if($offer->syllabus_id == $sy->id) selected @endif value="{{ $sy->id }}">{{ $sy->syllabus_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('syllabus') ? $errors->first('syllabus') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Course</label>
                        <div class="col-md-6">
                            <select name="course" class="form-control course">
                                <option value="">Select Course</option>
                                @foreach($course as $c)
                                    <option @if($offer->course_id == $c->id) selected @endif value="{{ $c->id }}">{{ $c->course_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('course_name') ? $errors->first('course_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Semester</label>
                        <div class="col-md-6">
                            <select name="semester" class="form-control semester">
                                <option value="">Select Semester</option>
                                @foreach($semester as $s)

                                    <option @if($offer->semester_id == $s->id) selected @endif value="{{ $s->id }}">{{ $s->semester_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('semester') ? $errors->first('semester') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Teacher</label>
                        <div class="col-md-6">
                            <select name="teacher" class="form-control">
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $t)
                                    <option @if($offer->teacher_id == $t->id) selected @endif value="{{ $t->id }}">{{ $t->full_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('teacher') ? $errors->first('teacher') : ''}}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3" >Course Fee</label>
                        <div class="col-md-6">
                            <input type="text" value="{{ $offer->course_fee }}" name="course_fee" class="form-control" placeholder="Tk. 5000/-"/>
                            <span class="text-danger">{{$errors->has('course_fee') ? $errors->first('course_fee') : ''}}</span>
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
                            <input type="submit" value="Update Offer" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
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

        $(".syllabus").change(function(){

            var id = $(this).val();

            var hitUrl = "{{ url('/admin/ajax/get-prerequisite-course-by-syllabus-id') }}/" + id;

            if (id != '') {
                $.get(hitUrl, function(response){
                    // alert(response);
                    if(response) {
                        $(".course").html(response);
                    } else{
                        $(".course").html('');
                    }
                });
            } else {
                $(".course").html('');
            }
        });
    </script>

@endsection