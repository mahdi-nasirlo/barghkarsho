@if ($product->gallery)
    <link rel="stylesheet" href="/theme/css/tiny-slider.css" />
    <script src="/theme/js/tiny-slider.js"></script>
    <div class="tns-outer" id="tns1-ow">
        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                class="current">4</span> of 5</div>
        <div id="tns1-mw" class="tns-ovh">
            <div style="margin: 0" class="tns-inner" id="tns1-iw">
                <div class="tiny-single-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                    id="tns1" style="transform: translate3d(-60%, 0px, 0px);">
                    @foreach ($product->gallery as $gallery)
                        <div class="tiny-slide tns-item" id="tns1-item{{ $loop->index }}"
                            @if (!$loop->first) aria-hidden="true" @endif tabindex="-1">
                            <img src="{{ $gallery->getUrl() }}" class="img-fluid rounded" alt="">
                        </div>
                    @endforeach

                    {{-- <div class="tiny-slide tns-item" id="tns1-item1" aria-hidden="true" tabindex="-1">
                    <img src="images/shop/product/single-3.jpg" class="img-fluid rounded" alt="">
                </div>
                <div class="tiny-slide tns-item" id="tns1-item2" aria-hidden="true" tabindex="-1">
                    <img src="images/shop/product/single-4.jpg" class="img-fluid rounded" alt="">
                </div>
                <div class="tiny-slide tns-item tns-slide-active" id="tns1-item3">
                    <img src="images/shop/product/single-5.jpg" class="img-fluid rounded" alt="">
                </div>
                <div class="tiny-slide tns-item" id="tns1-item4" aria-hidden="true" tabindex="-1">
                    <img src="images/shop/product/single-6.jpg" class="img-fluid rounded" alt="">
                </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="tns-nav" aria-label="Carousel Pagination">
         @foreach ($product->gallery as $gallery)
             <button type="button" data-nav="{{ $loop->index }}" aria-controls="tns1" style=""
                 aria-label="Carousel Page 1" class="" @if (!$loop->first) tabindex="-1" @endif>
             </button>
         @endforeach
     </div> --}}
        <div id="customize-thumbnails"></div>
    </div>
@endif

{{-- 
    FIXME orderable gallery img
    FIXME condition for add assets
    FIXME fix shop categoryes in admin
--}}
