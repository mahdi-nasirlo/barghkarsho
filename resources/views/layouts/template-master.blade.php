<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <meta name="copyright" content="برق کارشو - brarghkarsho" />
    <meta name="language" content="fa" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="website" content="https://www.barghkarsho.com/" />
    <meta name="Version" content="v1" />

    <!-- favicon -->
    <link rel="shortcut icon" href="/theme/images/favicon.ico">
    {{-- <!-- Bootstrap --> --}}
    <link href="/theme/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/theme/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/theme/unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Main Css -->
    <link href="/theme/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="/theme/css/colors/default.css" rel="stylesheet" id="color-opt">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @livewireStyles

</head>

<body>
    <div class="mb-5">
        @include('layouts.header.index', [
            'courses' => \App\Models\Shop\Course::all()->where('inventory', '>', 0)->where('published_at', '<', now()),
            'categoreis' => \App\Models\Blog\Category::all()->where('is_visible', true)->where('parent_id', 0),
        ])
    </div>
    @yield('content')

    {{-- <div style="margin-top: 300px"> --}}
    @include('layouts.footer.index')
    {{-- </div> --}}

    <!-- javascript -->
    <script src="/theme/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <script src="/theme/js/feather.min.js"></script>
    <!-- Switcher -->
    <script src="/theme/js/switcher.js"></script>
    <!-- Main Js -->
    <script src="/theme/js/plugins.init.js"></script>
    <!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="/theme/js/app.js"></script>
    <script src="{{ asset('/js/home.js') }}"></script>
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    {{-- @include('sweetalert::alert') --}}
    @livewireScripts

    {{-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts /> --}}
</body>

</html>
