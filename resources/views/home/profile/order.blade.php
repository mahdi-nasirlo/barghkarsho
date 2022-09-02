<div class="tab-pane fade bg-white shadow rounded p-4 {{ activeClassProfile('order') }}" id="orders" role="tabpanel"
    aria-labelledby="order-history">
    @if (session()->has('message'))
        <div style="margin-top: 10px" class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div style="margin-top: 10px" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive bg-white shadow rounded">
        <table class="table mb-0 table-center table-nowrap">
            <thead>
                <tr>
                    <th scope="col" class="border-bottom">کد پیگیری پست</th>
                    <th scope="col" class="border-bottom">تاریخ </th>
                    <th scope="col" class="border-bottom">وضعیت</th>
                    <th scope="col" class="border-bottom">مجموع</th>
                    <th scope="col" class="border-bottom">اقدام</th>
                </tr>
            </thead>
            @php
                $orders = auth()->user()->orders;
            @endphp
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->tracking_serial }}</th>
                        <td>{{ jdate()->forge($order->created_at)->ago() }}</td>
                        <td>
                            @switch($key = $order->status)
                                @case($key == 'unpaid')
                                    @if ($order->orderHasPayment())
                                        <span class="text-danger"> پرداخت ناموفق </span>
                                    @else
                                        <span class="text-danger"> در انتظار پرداخت </span>
                                    @endif
                                @break

                                @case($key == 'paid')
                                    <span class="text-success"> پرداخت موفق </span>
                                @break

                                @case($key == 'preparation')
                                    <span class="text-info"> در حال آماده سازی </span>
                                @break

                                @case($key == 'posted')
                                    <span class="text-primary"> پست شد </span>
                                @break

                                @case($key == 'received')
                                    <span class="text-dark"> دریافت شده </span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>{{ $order->price }} هزار تومان <span class="text-muted">برای
                                {{ $order->courses()->count() }} موارد</span></td>
                        <td>

                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#LoginForm"
                                class="text-primary">
                                نمایش <i class="uil uil-arrow-right"></i>
                            </a>

                            @if ($order->canAccessToPayment())
                                <a href="{{ route('cart.address', $order) }}" class="text-success pe-2">
                                    پرداخت
                                </a>
                            @endif


                            <!-- Modal Content Start -->
                            <div class="modal fade" id="LoginForm" tabindex="-1" aria-labelledby="LoginForm-title"
                                style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded shadow border-0">
                                        <div class="modal-header border-bottom">
                                            <h5 class="modal-title" id="LoginForm-title"> نمایش جزئیات </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="بستن"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="bg-white p-3 rounded box-shadow">
                                                @foreach ($order->courses as $course)
                                                    <a href="{{ route('cours.single', $course) }}"
                                                        class="d-flex align-items-center">
                                                        <img src="{{ asset('/storage/' . $course->image) }}"
                                                            class="shadow rounded" style="max-height: 100px;"
                                                            alt="">
                                                        <div class="flex-1 text-start ms-3">
                                                            <h6 class="text-dark mb-0">{{ $course->title }}
                                                            </h6>
                                                            {{-- <p class="text-muted mb-0">230 هزار تومان</p> --}}
                                                        </div>
                                                        <h6 class="text-dark mb-0">
                                                            {{ number_format((int) $course->price) }} تومان
                                                        </h6>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Content End -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end teb pane-->
