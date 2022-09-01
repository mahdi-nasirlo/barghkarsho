<div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
    <div class="rounded shadow-lg p-4">
        <div class="d-flex mb-4 justify-content-between">
            <h5> آیتم {{ $order->courses->count() }}</h5>
            <a href="{{ route('profile', ['tab' => 'order']) }}" class="text-muted h6">نمایش جزئیات</a>
        </div>
        <div class="table-responsive">
            <table class="table table-center table-padding mb-0">
                <tbody>
                    <tr>
                        <td class="h6 border-0">مجموع </td>
                        <td class="text-end fw-bold border-0">{{ number_format($order->price - env('DELIVERY_price')) }}
                            تومان</td>
                    </tr>
                    <tr>
                        <td class="h6">هزینه حمل و نقل</td>
                        <td class="text-end fw-bold"> {{ number_format(env('DELIVERY_price')) ?? 'رایگان' }} تومان</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="h5 fw-bold">مجموع </td>
                        <td class="text-end text-primary h4 fw-bold">
                            {{ number_format($order->price) }} تومان</td>
                    </tr>
                </tbody>
            </table>


            <div class="mt-4 pt-2">
                <livewire:cart.payment-btn :order="$order" />
            </div>
        </div>
    </div>
</div>
