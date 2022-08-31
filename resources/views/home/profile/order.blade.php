<div class="tab-pane fade bg-white shadow rounded p-4 {{ activeClassProfile('order') }}" id="orders" role="tabpanel"
    aria-labelledby="order-history">
    @if (session()->has('message'))
        <div style="margin-top: 10px" class="alert alert-success">
            {{ session('message') }}
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
                                    <span class="text-danger"> پرداخت ناموفق </span>
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
                        <td><a href="javascript:void(0)" class="text-primary">
                                نمایش <i class="uil uil-arrow-right"></i></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end teb pane-->
