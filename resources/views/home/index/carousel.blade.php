{{-- @php
    $products = \App\Models\Banner::all()->where('collection', 'carousel');
@endphp --}}
{{--  @if ($products) --}}

<link rel="stylesheet" href="/theme/css/tiny-slider.css" />
<script src="/theme/js/tiny-slider.js"></script>
<div class="tns-outer disabled-pagination" id="tns2-ow">
    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide
        <span class="current">1 to 4</span> of 8
    </div>
    <div id="tns2-mw" class="tns-ovh">
        <div class="tns-inner" id="tns2-iw">
            <div class="tiny-five-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns2"
                style="transform: translate3d(0%, 0px, 0px);">
                @foreach ($banners as $banner)
                    <div class="tiny-slide tns-item tns-slide-active" id="tns2-item{{ $loop->index }}">
                        <img style="max-height: 320px;object-fit: cover; width: 100%" src="/storage/{{ $banner->path }}"
                            alt="">
                    </div>
                @endforeach
                {{-- </div></div></div><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns2" style="" aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button><button type="button" data-nav="1" aria-controls="tns2" style="" aria-label="Carousel Page 2" class="" tabindex="-1"></button><button type="button" data-nav="2" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 3"></button><button type="button" data-nav="3" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 4"></button><button type="button" data-nav="4" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 5"></button><button type="button" data-nav="5" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 6"></button><button type="button" data-nav="6" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 7"></button><button type="button" data-nav="7" tabindex="-1" aria-controls="tns2" style="display:none" aria-label="Carousel Page 8"></button></div></div> --}}
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
{{-- @endif --}}
