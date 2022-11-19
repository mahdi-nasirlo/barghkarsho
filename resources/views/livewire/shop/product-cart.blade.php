<div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
    <div class="card shop-list border-0 position-relative">
        <div class="shop-image position-relative overflow-hidden rounded shadow">
            <a href="shop-product-detail.html"><img src="{{ $product->cover }}" class="img-fluid" alt=""></a>
            <div class="overlay-work">
                <div class="py-2 bg-soft-dark rounded-bottom out-stock">
                    <h6 class="mb-0 text-center">تمام شده</h6>
                </div>
            </div>
        </div>
        <div class="card-body content pt-4 p-2">
            <a href="shop-product-detail.html" class="text-dark product-name h6">
                {{ $product->name }}
            </a>
            <div class="d-flex justify-content-between mt-1">
                <h6 class="text-muted small fst-italic mb-0 mt-1">
                    {{ number_format($product->price) }} تومان
                    {{-- <del class="text-danger ms-2">
                        25000 تومان
                    </del> --}}
                </h6>
                <ul style="display: flex; flex-direction: row" class="list-unstyled text-warning mb-0">
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
<!--
