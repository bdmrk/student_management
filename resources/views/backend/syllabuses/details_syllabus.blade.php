@extends('backend.admin_master')

@section('title')
    View Syllabus Content
@endsection

@section('body')

    <h2 class="text-center">{{ $syllabus->syllabus_name }}</h2>

    <p class="text-justify"> {{ $syllabus-> description }}</p>
    @stop