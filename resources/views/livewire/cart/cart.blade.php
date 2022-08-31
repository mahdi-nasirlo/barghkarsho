<div>
    @include('home.cart.hero')
    <!-- Start -->
    @php
        $cart = Jackiedo\Cart\Facades\Cart::name('shopping');
        $count = $cart->getDetails()->items_count;
        $cartTotalPrice = $cart->getDetails()->total;
    @endphp
    @if ($count)
        <section class="section">
            <div class="container">

                <livewire:cart.cart-list />


                <div class="row">
                    <div class="col-lg-4 col-md-6 ms-auto mt-4 pt-2">
                        <div class="table-responsive bg-white rounded shadow">
                            <table class="table table-center table-padding mb-0">
                                <tbody>
                                    <tr>
                                        <td class="h6">مجموع </td>
                                        <td class="text-center fw-bold">{{ number_format($cartTotalPrice) }} تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="h6">هزینه پست </td>
                                        <td class="text-center fw-bold">{{ number_format(env('DELIVERY_PRICE')) }} تومان
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="h6">مجموع </td>
                                        <td class="text-center fw-bold">
                                            {{ number_format($cartTotalPrice + env('DELIVERY_PRICE')) }} تومان</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 pt-2 text-end">
                            <button wire:click='payment' class="btn btn-primary">ادامه به پرداخت </button>
                            <a href="javascript:void(0)" class="btn btn-soft-primary ms-2">بروز رسانی سبد</a>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end section-->
        <!-- End -->
    @else
        <div class="section section-padding-bottom">
            <div class="container">
                <div style=" display: flex;flex-direction: column;align-content: center;" class="cart-empty-content">
                    <span class="icon text-center"><i style="font-size: 296px;display: flex;justify-content: center;"
                            class="uil uil-shopping-cart align-middle icons"></i></span>
                    <h3 class="title text-center">سبد خرید شما در حال حاضر خالی است.</h3>

                    <a style="margin: 0 auto" href="shop.html" class="btn btn-primary btn-hover-secondary mx-auto">برگشت
                        به فروشگاه</a>
                </div>
            </div>
        </div>
    @endif


</div>
