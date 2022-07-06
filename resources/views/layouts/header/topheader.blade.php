<div class="topHeader">
    <div class=" container-xl d-flex justify-content-between">
        <div class="d-flex">
            <div class="d-flex">
                <span>
                    <i class="uil uil-phone"></i>
                    تلفن پشتیبانی
                </span>
                <span class="d-none d-sm-flex px-1">
                    {{ $information['mobile_support']['content'] }}
                    -
                </span>
            </div>
            <div class="px-1" style="direction: rtl">
                {{ $information['phone_support']['content'] }}
            </div>
        </div>

        <div class="">
            <a class="text-white d-flex" href="{{ $information['location']['content'] }}">
                <i class="uil uil-location-point"></i>
                نشانی
                <span class="d-none d-sm-flex">
                    {{ env('APP_NAME') }}
                </span>
            </a>
        </div>
    </div>
</div>
