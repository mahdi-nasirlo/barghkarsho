@extends('layouts.template-master')

@section('script')
@endsection

@section('content')
    @include('home.blog-list.hero')

    <!-- Blog Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                @include('home.blog-list.blog-list')


                @include('home.blog-list.sidebar', [
                    'cats' => \App\Models\Category::latest()->get(),
                ])

            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Blog End -->
@endsection
