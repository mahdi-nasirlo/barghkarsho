<div>
    @php
        $cart = Jackiedo\Cart\Facades\Cart::name('shopping');
        $countOfCart = (int) $cart->getDetails()->items_count;
        $totalPrice = (int) $cart->getDetails()->total;
    @endphp
    <style>
        .cartBtn {
            background-color: #555;
            color: white;
            text-decoration: none;
            padding: 15px 26px;
            position: relative;
            display: inline-block;
            border-radius: 2px;
        }

        .cartBtn:hover {
            background: red;
        }

        .cartBtn .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 5px 8px;
            border-radius: 50%;
            background: var(--orange);
            color: white;
        }
    </style>
    <li class="has-submenu parent-menu-item d-flex ms-1">
        <div class="dropdown">
            <button type="button" class="btn px-3 py-1 mt-3 btn-soft-primary cartBtn" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="uil uil-shopping-cart align-middle icons"></i>

                @if ($countOfCart)
                    <span class="badge">{{ $countOfCart }}</span>
                @endif
            </button>
            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow-sm rounded border-0 mt-3 p-4"
                style="width: 350px; margin: 0px;">
                @if ($countOfCart)
                    <div class="pb-4">
                        @foreach ($carts as $cart)
                            <a href="{{ route('cours.single', $cart->getModel()) }}" class="d-flex align-items-center">
                                <img src="{{ asset('/storage/' . $cart->getModel()->image) }}" class="shadow rounded"
                                    style="max-height: 30px;" alt="">
                                <div class="flex-1 text-start ms-3">
                                    <h6 class="text-dark mb-0">{{ $cart->getModel()->title }}</h6>
                                    @if ($cart->getModel()->discountItem)
                                        <p class="text-muted mb-0">{{ number_format((int) $cart->getModel()->price) }}
                                            هزار
                                            تومان</p>
                                    @endif
                                </div>
                                <h6 class="text-dark mb-0">
                                    {{ number_format((int) $cart->getModel()->discounted_price) }} تومان
                                </h6>
                            </a>
                        @endforeach
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                        <h6 class="text-dark mb-0">مجموع (تومان):</h6>
                        <h6 class="text-dark mb-0">{{ number_format($totalPrice) }} تومان</h6>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="{{ route('cart.') }}" class="btn btn-primary me-2">نمایش سبد خرید </a>
                        <a href="javascript:void(0)" class="btn btn-primary">پرداخت </a>
                    </div>
                @else
                    <div style=" display: flex;flex-direction: column;align-content: center;"
                        class="cart-empty-content">
                        <span class="icon text-center"><i style="font-size: 70px;display: flex;justify-content: center;"
                                class="uil uil-shopping-cart align-middle icons"></i></span>
                        <h6 class="title text-center">سبد خرید شما در حال حاضر خالی است.</h6>
                    </div>
                @endif
            </div>
    </li>
</div>
