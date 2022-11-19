<div>
    @include('livewire.shop.title')
    <section class="section">
        <div class="container">
            <div class="row">

                @include('livewire.shop.sidebar')

                <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="section-title">
                                <h5 class="mb-0">نمایش 1-15 از 47 نتیجه</h5>
                            </div>
                        </div>
                        <!--end col-->



                        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="d-flex justify-content-md-between align-items-center">
                                <div class="form custom-form">
                                    <div class="mb-0">
                                        <select class="form-select form-control" aria-label="Default select example"
                                            id="Sortbylist-job">
                                            <option selected="">مرتب سازی بر اساس آخرین</option>
                                            <option>مرتب سازی بر اساس محبوبیت</option>
                                            <option>مرتب سازی بر اساس رتبه بندی</option>
                                            <option>مرتب سازی بر اساس قیمت: کم به زیاد</option>
                                            <option>مرتب سازی بر اساس قیمت: زیاد به کم</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2">
                                    <a href="shop-grids.html" class="h5 text-muted"><i class="uil uil-apps"></i></a>
                                </div>

                                <div>
                                    <a href="shop-lists.html" class="h5 text-muted"><i class="uil uil-list-ul"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div wire:loading>
                        loading ...
                    </div>
                    <div wire:loading.remove class="row">

                        @foreach ($products as $product)
                            @include('livewire.shop.product-cart', compact('product'))
                        @endforeach


                        <!-- PAGINATION START -->
                        <div class="col-12 mt-4 pt-2">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0)"
                                        aria-label="Previous"><i class="mdi mdi-arrow-left"></i> قبلی </a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)"
                                        aria-label="Next">بعدی
                                        <i class="mdi mdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <!--end col-->
                        <!-- PAGINATION END -->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

</div>
