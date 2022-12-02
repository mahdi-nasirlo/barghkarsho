{{-- <div>
    @if ($cartItems->count() > 0) --}}
{{-- <div>
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Name</th>
                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-right md:table-cell"> price</th>
                            <th class="hidden text-right md:table-cell"> Remove </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                <img src"{{ asset('/storage/' . $item['item']->) }}" class="w-20 rounded" alt="Thumbnail">
                            </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item['item']->title }}</p>
                                    </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="h-10 w-28">
                                        <div class="relative flex flex-row w-full h-8">
                                            <livewire:cart.cart-update :item='$item' :key="$item['id']">
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        ${{ $item['item']->price }}
                                    </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        ${{ $item['item']->price * $item['quantity'] }}
                                    </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <a href="#" class="px-4 py-2  bg-red-600"
                                        wire:click.prevent="removeCart('{{ $item['id'] }}')">x</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div>
                    Total: ${{ Cart::getTotal() }}
                </div>
                <div class="mt-5">
                    <a href="#" class="px-6 py-2 text-red-800 bg-red-300" wire:click.prevent="clearAllCart">Remove
                        {{ $cartItems->sum(function ($item) {
                            return $item['quantity'] * $item['item']->price;
                        }) }}
                    </a>
                </div>

            </div>
        </div> --}}
{{-- <div class="cart-table table-responsive max-mb-30">
            <table class="table">
                <thead>
                    <tr>
                        <th class="pro-thumbnail">تصویر</th>
                        <th class="pro-title">محصول</th>
                        <th class="pro-price">قیمت</th>
                        <th class="pro-quantity">تعداد</th>
                        <th class="pro-subtotal">مجموع</th>
                        <th class="pro-remove">حذف شده</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img
                                        src="{{ asset('/storage/' . $item['item']->image) }}" alt="محصول"></a>
                            </td>
                            <td class="pro-title"><a href="#">{{ $item['item']->title }}</a></td>
                            <td class="pro-price"><span>{{ number_format($item['item']->price) }} تومان </span></td>
                            <td class="pro-quantity">
                                @if (Cart::isNeedDelivery($item))
                                    <livewire:cart.cart-update :item='$item' :key="$item['id']">
                                    @else
                                        <span>----</span>
                                @endif
                            </td>
                            <td class="pro-subtotal"><span>{{ number_format($item['item']->price * $item['quantity']) }}
                                    تومان </span>
                            </td>
                            <td class="pro-remove">
                                <a href="#" wire:click.prevent="removeCart('{{ $item['id'] }}')">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row max-mb-n30">

            <div class="col-lg-8 col-12 max-mb-30">
                @php
                    $checkDelivery = Cart::isNeedDelivery();
                @endphp
                <livewire:cart.cart-address :checkDelivery='$checkDelivery'> --}}
{{-- <!-- محاسبه حمل و نقل -->
                <div class="calculate-shipping">
                    <h4>محاسبه حمل و نقل</h4>
                    <form action="#">
                        <div class="row max-mb-n30">
                            <div class="col-md-6 col-12 max-mb-30">
                                <select>
                                    <option>بنگلادش</option>
                                    <option>چین</option>
                                    <option>ایران</option>
                                    <option>افغانستان</option>
                                    <option>ژاپن</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 max-mb-30">
                                <select>
                                    <option>داهاکا</option>
                                    <option>برزیل</option>
                                    <option>کولیا</option>
                                    <option>کوملیت</option>
                                    <option>شیتان</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 max-mb-30">
                                <input type="text" placeholder="کد پستی">
                            </div>
                            <div class="col-md-6 col-12 max-mb-30">
                                <button class="btn btn-primary btn-hover-secondary">تخمین زدن</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
<!-- Discount Coupon -->
{{-- <div class="discount-coupon">
                        <h4>کد کوپن تخفیف</h4>
                        <form action="#">
                            <div class="row max-mb-n30">
                                <div class="col-md-6 col-12 max-mb-30">
                                    <input type="text" placeholder="کد تخفیف">
                                </div>
                                <div class="col-md-6 col-12 max-mb-30">
                                    <button class="btn btn-primary btn-hover-secondary">اعمال کد</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
{{-- </div>

            <!-- Cart Summary -->
            <div class="col-lg-4 col-12 max-mb-30 d-flex">
                <div class="cart-summary">
                    <div class="cart-summary-wrap">
                        <h4>خلاصه سبد خرید</h4>
                        @if (Cart::isNeedDelivery())
                            <p>جمع کل <span>{{ Cart::totalPrice(false) }} تومان </span></p>
                        @endif
                        <p>
                            هزینه حمل و نقل
                            @if (Cart::isNeedDelivery())
                                <span> {{ number_format(config('app.delivery_price')) }} تومان </span>
                            @else
                                <span> ---- </span>
                            @endif
                        </p>

                        <h2>
                            مبلغ نهایی
                            <span>
                                {{ Cart::totalPrice() }}
                                تومان
                            </span>
                        </h2>
                    </div>
                    <div class="cart-summary-button">
                        @if (auth()->user())
                            <button wire:click="payment" class="btn btn-primary btn-hover-secondary">پرداخت</button>
                            <button class="btn btn-primary btn-hover-secondary">بروزرسانی سبد خرید</button>
                        @else
                            <a href="{{ redirectToLogin() }}" class="w-100 btn btn-primary btn-hover-secondary">
                                برای ادامه فرایند خرید وارد
                                شوید.
                            </a>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="section section-padding-bottom">
            <div class="container">
                <div class="cart-empty-content">
                    <span class="icon"><i class="fal fa-shopping-cart"></i></span>
                    <h3 class="title">سبد خرید شما در حال حاضر خالی است.</h3>
                    <p>شما می توانید تمام محصولات موجود را بررسی کرده و مقداری از آنها را در فروشگاه خریداری کنید.</p>
                    <a href="shop.html" class="btn btn-primary btn-hover-secondary">برگشت به فروشگاه</a>
                </div>
            </div>
        </div>
    @endif
</div> --}}
<div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive bg-white shadow">
                <table class="table table-center table-padding mb-0">
                    <thead>
                        <tr>
                            <th class="border-bottom py-3"></th>
                            <th class="border-bottom py-3">عکس شاخص </th>
                            <th class="border-bottom ps-6">محصول </th>
                            <th class="border-bottom text-center py-3">قیمت </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            @if ($cartItem->getModel() instanceof \App\Models\Shop\Product)
                                <tr class="shop-list">
                                    <td class="h6"><a href="#"
                                            wire:click.prevent="removeCart('{{ $cartItem->getHash() }}')"
                                            class="text-danger">X</a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('product.singe', $cartItem->getModel()) }}">
                                            <img src="{{ asset('/storage/' . $cartItem->getModel()->cover) }}"
                                                class="shadow rounded" style="max-width: 200px;"
                                                alt="{{ $cartItem->getModel()->name }}">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <h6 class="mb-0 me-3">
                                                <a href="{{ route('cours.single', $cartItem->getModel()) }}">
                                                    {{ $cartItem->getModel()->title }}
                                                </a>
                                            </h6>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <del class="text-danger">{{ number_format($cartItem->getModel()->price) }}</del>
                                        {{ number_format($cartItem->getModel()->discounted_price) }} تومان
                                    </td>
                                </tr>
                            @else
                                <tr class="shop-list">
                                    <td class="h6"><a href="#"
                                            wire:click.prevent="removeCart('{{ $cartItem->getHash() }}')"
                                            class="text-danger">X</a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('cours.single', $cartItem->getModel()) }}">
                                            <img src="{{ asset('/storage/' . $cartItem->getModel()->image) }}"
                                                class="shadow rounded" style="max-width: 200px;"
                                                alt="{{ $cartItem->getModel()->title }}">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <h6 class="mb-0 me-3">
                                                <a href="{{ route('cours.single', $cartItem->getModel()) }}">
                                                    {{ $cartItem->getModel()->title }}
                                                </a>
                                            </h6>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <del
                                            class="text-danger">{{ number_format($cartItem->getModel()->price) }}</del>
                                        {{ number_format($cartItem->getModel()->discounted_price) }} تومان
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
