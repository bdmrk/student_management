@extends('teacher.teacher_master')

@section('title')
    Marks Entry
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class=""> Courses </h3>
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
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Semester</th>
                                    <th>Syllabus</th>
                                </tr>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{ $offer->course->course_code }}</td>
                                        <td>{{ $offer->course->course_name }}</td>
                                        <td>{{ $offer->semester->semester_name }}</td>
                                        <td>{{ $offer->syllabus->syllabus_name }}</td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection