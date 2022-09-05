@extends('layouts.template-master')

@section('script')
@endsection

@section('content')
    @include('home.page.hero')

    <!-- Blog Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                {!! $page->content !!}
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Blog End -->
@endsection
