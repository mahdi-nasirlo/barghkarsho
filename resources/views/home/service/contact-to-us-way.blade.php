<div class="container mb-5">
    <div class="row">
        <div class="col-6">
            <div class="card border-0 text-center features feature-clean">
                <div class="icons text-primary text-center mx-auto">
                    <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                </div>
                <div class="content mt-3">
                    <h5 class="fw-bold">تلفن </h5>
                    <a href="tel:{{ $information['mobile_support']['content'] }}"
                        class="text-primary">{{ $information['mobile_support']['content'] }}</a>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="card border-0 text-center features feature-clean">
                <div class="icons text-primary text-center mx-auto">
                    <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                </div>
                <div class="content mt-3">
                    <h5 class="fw-bold">موقعیت </h5>
                    <p class="text-muted">
                        {{ $information['location_text']['content'] }}
                    </p>
                    <a href="{{ $information['location']['content'] }}" data-type="iframe"
                        class="video-play-icon text-primary lightbox">نمایش در گوگل</a>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>