@extends('teacher.teacher_master')

@section('title')
    Marks Entry
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class=""> Marks Entry </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>

                    <div class="row">
                        <div lass="col-md-12">
                            <table class="table">
                                <tr>
                                    <th>Student Name</th>
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th>Semester</th>
                                    <th>Incourse Mark</th>
                                    <th>Final Mark</th>
                                    <th>CGPA</th>
                                    <th>Grade</th>
                                    <th>Status</th>
                                </tr>

                                @foreach($courses as $course)
                                    <form action="" class="markEntryform" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $course->id }}" name="enrolled_course_id">
                                        <tr>
                                            <td>{{ $course->student->full_name }}</td>
                                            <td>{{ $course->offer->course->course_name }}</td>
                                            <td>{{ $course->status }}</td>
                                            <td>{{ $course->enroll->semester->semester_name }}</td>
                                            <td><input type="text" name="incourse_mark"></td>
                                            <td><input type="text" name="final_mark"></td>
                                            <td>{{ $course->cgpa }}</td>
                                            <td>{{ $course->grade }}</td>
                                            <td><input type="submit" class=" btn-sm btn btn-info" value="Save"> </td>
                                        </tr>
                                    </form>

                                @endforeach
                               

                            </table>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.markEntryform').submit(function (e) {
            e.preventDefault();
            var formData = $( this ).serializeArray();
            var hitUrl = "{{ route('save-mark') }}"
            $.post(hitUrl, formData, function (data) {
                alert(data.message);
            });
        });

    </script>
@endsection