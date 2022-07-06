@extends('layouts.template-master')

@section('script')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>


    <!-- favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
@endsection

@section('content')
    @include('home.blog-detail.hero')

    <!-- Blog STart -->
    <section style="padding: 60px 0">
        <div class="container-sm">
            <div class="row">

                @include('home.blog-detail.blog-content')

                @include('home.blog-detail.sidebar', [
                    'cats' => \App\Models\Blog\Category::latest()->get(),
                ])

            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Blog End -->
@endsection
