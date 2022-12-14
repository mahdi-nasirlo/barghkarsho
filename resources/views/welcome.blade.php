@extends('layouts.template-master')

@section('script')
    <script src="/theme/js/tiny-slider.js"></script>
@endsection

@section('head')
    <style>
        .disabled-pagination .tns-nav {
            display: none;
        }

        .disabled-pagination #tns2-mw {
            border-radius: 7px;
        }
    </style>
@endsection

@section('content')

    @php
        $banners = \App\Models\Banner::all();
        $carouselBanner = $banners->where('collection', 'carousel');
        $smallBanner = $banners->where('collection', 'small-banner');
        $mediumBanner = $banners->where('collection', 'medium-banner');
        $categoriesBanner = $banners->where('collection', 'categories-banner');
    @endphp
    @if ($carouselBanner->count() > 0 and
        $smallBanner->count() > 0 and
        $mediumBanner->count() > 1 and
        $categoriesBanner->count() > 1)
        <section class="container-lg px-2 px-md-4">
            <div style="margin-top: 120px">
                <div>
                    <div class="title-heading">
                        <div class="row gx-2">
                            <div class="col-9">
                                @include('home.index.carousel', ['banners' => $carouselBanner])
                            </div>
                            <div class="col-3">
                                @include('home.index.small-banner', [
                                    'banner' => $smallBanner->first(),
                                ])
                            </div>
                            @include('home.index.banner', [
                                'banners' => $mediumBanner,
                            ])
                            <div class="col-12">
                                @include('home.index.categories', [
                                    'banners' => $categoriesBanner,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="container-lg">
            <div style="margin-top: 165px">
                <div class="title-heading mt-4">
                    <h1 class="heading mb-3">???????? ?????????? <span class="text-orange typewrite" data-period="2000"
                            data-type="[ &quot;??????????&quot;, &quot;??????????????&quot;, &quot;??????????&quot]"><span class="wrap">
                                ?????????? ?? ??????????????</span></span> ?????? ?????????????? </h1>
                    <p style="line-height: 12px" class="para-desc text-muted text-light">
                        {!! $information['index_short_desc']['content'] !!}
                    </p>
                    <div class="mt-4 d-flex justify-content-center justify-content-sm-end">
                        <a href="javascript:void(0)" class="p-2 me-2 btn-cours rounded">
                            ???????? ?????? ??????????????
                            <i class="uil uil-video"></i>
                        </a>
                        <a href="{{ route('service') }}" class="p-2 btn-request rounded">
                            ?????????????? ?????????? ??????
                        </a>
                    </div>
                    <div class="mt-4 d-flex justify-content-center justify-content-sm-end">
                        <div class="support d-flex align-items-center">
                            <span class="px-2">
                                ???????????? ???? ???????????????? ??????
                            </span>
                            @foreach (\Spatie\Permission\Models\Role::all()->where('name', 'super_admin')->first()->users as $admin)
                                <div class="avatar mx-auto bg-white">
                                    <a href="tel:{{ $admin->mobile }}">
                                        <img width="30"
                                            src="{{ $admin->avatar ? asset('/storage/' . $admin->avatar) : asset('/theme/images/support-img.png') }}"
                                            class="rounded-circle img-fluid" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif





    <section class="future-section">
        <div class="container-lg">
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center flex-column">

                    <div class="d-flex justify-content-center">
                        <img width="60" src="{{ asset('/theme/images/Untitled-1.png') }}" class="" />
                    </div>

                    <div class="text-center text-white font-weight-bold">?????????????? ??????????</div>

                    <div style="" class="text-white px-4 pt-3">
                        {!! $information['index_section_2_1']['content'] !!}
                    </div>

                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 d-flex justify-content-center flex-column">

                    <div class="d-flex justify-content-center">
                        <img width="60" src="{{ asset('/theme/images/course-sertificate-icon.png') }}" class="" />
                    </div>

                    <div class="text-center text-white font-weight-bold">?????????? ?????? ??????????????</div>

                    <div style="" class="text-white px-4 pt-3">
                        {!! $information['index_section_2_2']['content'] !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: 50px; padding-bottom: 40px" class="container-lg">
        <div>
            <strong class="text-gray-600">
                ?????????? ???????? ?????????? ???? {{ env('APP_NAME') }}
            </strong>

            <div class="">
                <div class="row container-lg">
                    <div class="pt-5 col-12 col-md-6 d-flex align-items-start">
                        <div class="row d-flex justify-content-center">
                            <div style="width: auto; height: auto;" class="col-12">
                                <div class="avatar bg-blue-500 rounded-circle">
                                    <img width="60" src="{{ asset('/theme/images/jack-parcking-icon.png') }}"
                                        class="rounded-circle img-fluid" />
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column">
                                <strong class="text-gray-600 text-center text-center">???? ?????? ????????????????</strong>
                                <div class="text-center" style="font-size: 12px">
                                    {!! $information['index_section_3_1']['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 pt-md-5 col-12 col-md-6 d-flex align-items-start">
                        <div class="row d-flex justify-content-center">
                            <div style="width: auto" class="col-12">
                                <div class="avatar bg-blue-500 rounded-circle">
                                    <img width="60" src="{{ asset('/theme/images/cctv-icon.png') }}"
                                        class="rounded-circle img-fluid" />
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column">
                                <strong class="text-gray-600 text-center"> ????????????????</strong>
                                <div class="text-center" style="font-size: 12px">
                                    {!! $information['index_section_3_2']['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5 pt-md-5 col-12 col-md-6 d-flex align-items-start">
                        <div class="row d-flex justify-content-center">
                            <div style="width: auto; height: auto;" class="col-12">
                                <div class="avatar bg-blue-500 rounded-circle">
                                    <img width="60" src="{{ asset('/theme/images/burglar alarm.png') }}"
                                        class="rounded-circle img-fluid" />
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column">
                                <strong class="text-gray-600 text-center">???????????? ?? ??????????</strong>
                                <div class="text-center" style="font-size: 12px">
                                    {!! $information['index_section_3_3']['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 pt-md-5 col-12 col-md-6 d-flex align-items-start">
                        <div class="row d-flex justify-content-center">
                            <div style="width: auto" class="col-12">
                                <div class="avatar bg-blue-500 rounded-circle">
                                    <img width="60" src="{{ asset('/theme/images/Video door opener.png') }}"
                                        class="rounded-circle img-fluid" />
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column">
                                <strong class="text-gray-600 text-center"> ?????? ?????????? ???????????? </strong>
                                <div class="text-center" style="font-size: 12px">
                                    {!! $information['index_section_3_4']['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    @if ($posts->count() == 4)
        <section style="margin-top: 80px" class="bg-light pt-4">
            <div class="container-xxl">
                <strong>?????????? ????????????</strong>

                <div class="row pt-2">

                    @foreach ($posts as $post)
                        @include('home.index-cart', ['post' => $post])
                    @endforeach
                    <!--end col-->
                </div>
            </div>
        </section>
    @endif
@endsection
