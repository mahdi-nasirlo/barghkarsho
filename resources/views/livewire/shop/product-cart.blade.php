    <div class="card shop-list border-0 position-relative">
        <ul style="padding-right: 0px; top: 5px;right: 7px" class="label list-unstyled mb-0">
            @if ($product->discountItem)
                <li>
                    <a href="javascript:void(0)" class="badge badge-link rounded-pill bg-soft-danger">
                        - {{ $product->discountItem->percent }}%
                    </a>
                </li>
            @endif
            @if ($product->cover_tag)
                @foreach ($product->cover_tag as $item)
                    <li>
                        <a href="javascript:void(0)"
                            class="badge badge-link rounded-pill {{ $item['color'] }}">{{ $item['name'] }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="shop-image position-relative overflow-hidden rounded shadow">
            <a href="{{ route('product.single', $product) }}">
                <img src="{{ $product->getCoverUrl() }}" class="img-fluid" alt=""></a>
            @if ($product->cover_hover)
                <a href="{{ route('product.single', $product) }}" class="overlay-work">
                    <img src="/storage/{{ $product->cover_hover }}" class="img-fluid" alt="">
                </a>
            @endif
            @if (!$product->inventory)
                <div class="overlay-work">
                    <div class="py-2 bg-soft-dark rounded-bottom out-stock">
                        <h6 class="mb-0 text-center">تمام شده</h6>
                    </div>
                </div>
            @else
                <ul class="list-unstyled shop-icons">
                    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview"
                            class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-eye icons">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg></a></li>
                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shopping-cart icons">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg></a></li>
                </ul>
            @endif
        </div>
        <div style="display: flex !important;flex-direction: column;align-items: center;"
            class="card-body content pt-3 p-2">
            <a href="{{ route('product.single', $product) }}" class="text-warning product-name h6 mb-0 text-center">
                {{ $product->name }}
            </a>
            <div class="mt-3">
                <h6 class="text-muted small fst-italic mb-0">
                    @if ($product->discountItem)
                        {{ number_format($product->discounted_price) }} <del
                            class="text-danger ms-1">{{ number_format($product->price) }}</del> تومان
                    @else
                        {{ number_format($product->price) }} تومان
                    @endif
                </h6>

                @if ($product->rate)
                    <ul style="display: flex; flex-direction: row" class="list-unstyled text-warning mb-0">

                        @for ($i = 0; $i < 5; $i++)
                            <li class="list-inline-item"><i
                                    class="mdi mdi-star @if ($i > $product->rate - 1) mdi-star-outline @endif"></i>
                            </li>
                        @endfor
                    </ul>
                @endif

            </div>
        </div>
    </div>
    {{-- <div class="card shop-list border-0 position-relative">
    <ul class="label list-unstyled mb-0">
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">ویژه ها </a></li>
    </ul>
    <div class="shop-image position-relative overflow-hidden rounded shadow">
        <a href="{{ route('product.single', $product) }}">
            <img src="images/shop/product/s1.jpg" class="img-fluid" alt=""></a>
        <a href="{{ route('product.single', $product) }}" class="overlay-work">
            <img src="images/shop/product/s-1.jpg" class="img-fluid" alt="">
        </a>
        <ul class="list-unstyled shop-icons">
            <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart icons">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></a></li>
            <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview"
                    class="btn btn-icon btn-pills btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-eye icons">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg></a></li>
            <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-shopping-cart icons">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg></a></li>
        </ul>
    </div>
    <div class="card-body content pt-4 p-2">
        <a href="{{ route('product.single', $product) }}" class="text-dark product-name h6">تی شرت بردان </a>
        <div class="d-flex justify-content-between mt-1">
            <h6 class="text-muted small fst-italic mb-0 mt-1">16000 تومان<del class="text-danger ms-2">21000 تومان</del>
            </h6>
            <ul class="list-unstyled text-warning mb-0">
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
            </ul>
        </div>
    </div>
</div> --}}
