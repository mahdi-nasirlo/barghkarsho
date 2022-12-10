<section class="section pb-0">
    <style>
        .tns-nav button {
            background: rgba(255, 147, 58, 0.578) !important;
        }

        .tns-nav button.tns-nav-active {
            background: rgb(255, 132, 0) !important;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
    </style>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                @include('livewire.shop.product-gallery')
            </div>
            <!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-md-4">
                    <h4 class="title mt-3">
                        {{ $product->name }}
                    </h4>
                    <h5 class="text-muted">{{ number_format($product->price) }} تومان <del class="text-danger ms-2">25000
                            تومان</del>
                    </h5>
                    <ul class="list-unstyled text-warning h5 mb-0">
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    </ul>

                    @if ($product->short_desc)
                        <h5 class="mt-4 py-2">بررسی:</h5>
                        <p class="text-muted">
                            {{ $product->short_desc }}
                        </p>
                    @endif

                    <ul class="list-unstyled text-muted">
                        {{-- @if ($product->short_information)
                            @foreach ($product->short_information as $attribute)
                                <li class="mb-0"><span class="text-primary h5 me-2">
                                        <i class="uil uil-check-circle align-middle">
                                        </i>
                                    </span>
                                    {{ $attribute['name'] }}
                                </li>
                            @endforeach
                        @endif --}}
                    </ul>

                    <div class="row mt-4 pt-2">
                        <!--end col-->
                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                            <div
                                class="d-flex shop-list align-items-center justify-content-center justify-content-md-center mt-3">
                                <h6 class="mb-0">تعداد: </h6>
                                <div class="qty-icons ms-3">
                                    <button wire:click='decrement'
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                        class="btn btn-icon btn-soft-primary minus">-</button>
                                    <input wire:model='count' min="1" max="{{ $product->inventory }}"
                                        name="quantity" value="1" type="number"
                                        class="btn btn-icon btn-soft-primary qty-btn quantity">
                                    <button wire:click='increment'
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        class="btn btn-icon btn-soft-primary plus">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div
                                class="d-flex align-items-center justify-content-center justify-content-md-center mt-3">
                                <a href="javascript:void(0)" class="btn btn-primary">
                                    اکنون بخرید
                                </a>
                                <a wire:click='addToCart' class="btn btn-soft-primary ms-2">افزودن به سبد</a>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

    <div class="container mt-100 mt-60 mb-4">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden"
                    id="pills-tab" role="tablist">
                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill"
                            href="#description" role="tab" aria-controls="description" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">توضیحات </h6>
                            </div>
                        </a>
                        <!--end nav link-->
                    </li>
                    <!--end nav item-->

                    @if ($product->attributes()->count())
                        <li class="nav-item m-1">
                            <a class="nav-link py-2 px-5 rounded" id="additional-info" data-bs-toggle="pill"
                                href="#additional" role="tab" aria-controls="additional" aria-selected="false">
                                <div class="text-center">
                                    <h6 class="mb-0">اطلاعات تکمیلی</h6>
                                </div>
                            </a>
                            <!--end nav link-->
                        </li>
                        <!--end nav item-->
                    @endif

                    <li class="nav-item m-1">
                        <a class="nav-link py-2 px-5 rounded" id="review-comments" data-bs-toggle="pill" href="#review"
                            role="tab" aria-controls="review" aria-selected="false">
                            <div class="text-center">
                                <h6 class="mb-0">نظرات </h6>
                            </div>
                        </a>
                        <!--end nav link-->
                    </li>
                    <!--end nav item-->
                </ul>

                <div class="tab-content mt-5" id="pills-tabContent">
                    <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-data">
                        <p class="text-muted mb-0">
                            {!! $product->content !!}
                        </p>
                    </div>

                    <div class="card border-0 tab-pane fade" id="additional" role="tabpanel"
                        aria-labelledby="additional-info">
                        <table class="table">
                            <tbody>
                                {{-- @if ($product->attributes()->count())
                                    @foreach ($product->attributes as $attribute)
                                        <tr>
                                            <td style="width: 100px;">{{ $attribute->name }}</td>
                                            <td class="text-muted">{{ $attribute->pivot->value }}</td>
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table>
                    </div>

                    {{-- 
    TODO make lazy load for comment
--}}
                    <div class="card shad p-3 rounded tab-pane fade" id="review" role="tabpanel"
                        aria-labelledby="review-comments">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="media-list list-unstyled mb-0 ps-0">
                                    @include('livewire.shop.each-comment')
                                </ul>
                            </div>
                            <!--end col-->
                            <livewire:shop.comment :product='$product' />
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->

        {{-- <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">محصولات اخیر</h5>
            </div>
            <!--end col-->

            <div class="col-12 mt-4">
                <div class="tns-outer" id="tns2-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                            class="current">6 to 7</span> of 8</div>
                    <div id="tns2-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns2-iw">
                            <div class="tiny-four-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                id="tns2" style="transform: translate3d(-62.5%, 0px, 0px);">
                                <div class="tiny-slide tns-item" id="tns2-item0" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <ul class="label list-unstyled mb-0">
                                            <li><a href="javascript:void(0)"
                                                    class="badge badge-link rounded-pill bg-danger">داغ </a></li>
                                        </ul>
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s1.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-1.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">تی
                                                شرت بردان </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">16000 تومان<del
                                                        class="text-danger ms-2">21000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item1" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s2.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-2.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">کیسه
                                                خرید </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">21000 تومان <del
                                                        class="text-danger ms-2">25000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item2" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <ul class="label list-unstyled mb-0">
                                            <li><a href="javascript:void(0)"
                                                    class="badge badge-link rounded-pill bg-warning">ویژه </a></li>
                                        </ul>
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s3.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-3.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">ساعت
                                                الگنت </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">50000 تومان <span
                                                        class="text-success ms-1">30% تخفیف</span> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item3" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s4.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-4.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">کفش
                                                های گاه به گاه </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">18000 تومان <del
                                                        class="text-danger ms-2">22000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item4" aria-hidden="true" tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <ul class="label list-unstyled mb-0">
                                            <li><a href="javascript:void(0)"
                                                    class="badge badge-link rounded-pill bg-warning">ویژه </a></li>
                                        </ul>
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s5.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-5.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">هدفون
                                            </a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">30000 تومان</h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item tns-slide-active" id="tns2-item5">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s6.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-6.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">لیوان
                                                زیبا</a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">4500 تومان <del
                                                        class="text-danger ms-2">6500 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item tns-slide-active" id="tns2-item6">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s7.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-7.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html" class="text-dark product-name h6">هدفون
                                                سونی</a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">9000 تومان <span
                                                        class="text-success ms-2">20% تخفیف</span> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tiny-slide tns-item" id="tns2-item7" aria-hidden="true"
                                    tabindex="-1">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <ul class="label list-unstyled mb-0">
                                            <li><a href="javascript:void(0)"
                                                    class="badge badge-link rounded-pill bg-success">ویژه ها </a></li>
                                        </ul>
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="shop-product-detail.html"><img src="images/shop/product/s8.jpg"
                                                    class="img-fluid" alt=""></a>
                                            <a href="shop-product-detail.html" class="overlay-work">
                                                <img src="images/shop/product/s-8.jpg" class="img-fluid"
                                                    alt="">
                                            </a>
                                            <ul class="list-unstyled shop-icons">
                                                <li><a href="javascript:void(0)"
                                                        class="btn btn-icon btn-pills btn-soft-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-heart icons">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-product-detail.html"
                                                        class="btn btn-icon btn-pills btn-soft-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye icons">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3">
                                                            </circle>
                                                        </svg></a></li>
                                                <li class="mt-2"><a href="shop-cart.html"
                                                        class="btn btn-icon btn-pills btn-soft-warning"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-shopping-cart icons">
                                                            <circle cx="9" cy="21" r="1">
                                                            </circle>
                                                            <circle cx="20" cy="21" r="1">
                                                            </circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="shop-product-detail.html"
                                                class="text-dark product-name h6">چهارپایه چوبی</a>
                                            <div class="d-flex justify-content-between mt-1">
                                                <h6 class="text-muted small fst-italic mb-0 mt-1">22000 تومان <del
                                                        class="text-danger ms-2">25000 تومان</del> </h6>
                                                <ul class="list-unstyled text-warning mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0"
                            aria-controls="tns2" style="" aria-label="Carousel Page 1" class=""
                            tabindex="-1"></button><button type="button" data-nav="1" aria-controls="tns2"
                            style="" aria-label="Carousel Page 2" class=""
                            tabindex="-1"></button><button type="button" data-nav="2" aria-controls="tns2"
                            style="" aria-label="Carousel Page 3 (Current Slide)"
                            class="tns-nav-active"></button><button type="button" data-nav="3" tabindex="-1"
                            aria-controls="tns2" style="" aria-label="Carousel Page 4"></button><button
                            type="button" data-nav="4" tabindex="-1" aria-controls="tns2"
                            style="display: none;" aria-label="Carousel Page 5"></button><button type="button"
                            data-nav="5" tabindex="-1" aria-controls="tns2" style="display: none;"
                            aria-label="Carousel Page 6"></button><button type="button" data-nav="6"
                            tabindex="-1" aria-controls="tns2" style="display: none;"
                            aria-label="Carousel Page 7"></button><button type="button" data-nav="7"
                            tabindex="-1" aria-controls="tns2" style="display: none;"
                            aria-label="Carousel Page 8"></button></div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div> --}}
        <!--end container-->

        {{-- <div class="container-fluid mt-100 mt-60 px-0">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-left fea icon-sm">
                                        <line x1="19" y1="12" x2="5" y2="12">
                                        </line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></span>
                                <span class="text-muted d-none d-md-inline-block">توسعه وب </span>
                                <img src="images/work/6.jpg" class="avatar avatar-small rounded shadow ms-2"
                                    style="height:auto;" alt="">
                            </a>

                            <a href="index.html" class="btn btn-lg btn-pills btn-icon btn-soft-primary"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-home icons">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a>

                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <img src="images/work/7.jpg" class="avatar avatar-small rounded shadow me-2"
                                    style="height:auto;" alt="">
                                <span class="text-muted d-none d-md-inline-block">طراحی وب</span>
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right fea icon-sm">
                                        <line x1="5" y1="12" x2="19" y2="12">
                                        </line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></span>
                            </a>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>
        <!--end div-->
    </div> --}}
</section>
