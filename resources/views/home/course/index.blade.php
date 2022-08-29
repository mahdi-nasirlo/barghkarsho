@extends('layouts.template-master')

@section('script')
    {{-- <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script> --}}


    <!-- favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
@endsection

@section('content')
    @include('home.course.hero', ['cours' => $cours])
    @include('home.course.future')
    @include('home.course.price')
    @include('home.course.content')
    @include('home.course.common-question')
    @include('home.course.similar', ['papular' => \App\Models\Course::all()->take(6)])
    <div class="container-xxl">
        @include('layouts.comment.comment-form', ['commentable' => $cours])
        @include('layouts.comment.index', [
            'comments' => $cours->comments->where('is_visible', true),
            'commentable' => $cours,
        ])
    </div>
@endsection
