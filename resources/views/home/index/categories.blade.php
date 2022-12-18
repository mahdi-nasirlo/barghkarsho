<div class="col-lg-12 mt-4">
    <div class="tns-outer disabled-pagination" id="tns1-ow">
        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">2
                to 4</span> of 6</div>
        <div id="tns1-mw" class="tns-ovh">
            <div class="tns-inner w-100" id="tns1-iw">
                <div class="tiny-three-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                    id="tns1" style="transform: translate3d(-16.6667%, 0px, 0px);">
                    @foreach ($banners as $banner)
                        <div class="tiny-slide tns-item" id="tns1-item{{ $loop->index }}" aria-hidden="true"
                            tabindex="-1">
                            <div class="d-flex m-2">
                                <div
                                    class="w-100 card border-0 text-center features feature-clean course-feature p-4 overflow-hidden shadow">
                                    <div class="icons text-primary text-center mx-auto">
                                        <img width="80" height="80" src="/storage/{{ $banner->path }}"
                                            alt="">
                                    </div>
                                    <div class="card-body p-0 mt-4">
                                        <a href="{{ route('product.list', $banner->bannerable) }}"
                                            class="title h5 text-dark ">
                                            {{ $banner->bannerable->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns1"
                style="" aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button><button
                type="button" data-nav="1" aria-controls="tns1" style="" aria-label="Carousel Page 2"
                class="" tabindex="-1"></button><button type="button" data-nav="2" tabindex="-1"
                aria-controls="tns1" style="display:none" aria-label="Carousel Page 3"></button><button type="button"
                data-nav="3" tabindex="-1" aria-controls="tns1" style="display:none"
                aria-label="Carousel Page 4"></button><button type="button" data-nav="4" tabindex="-1"
                aria-controls="tns1" style="display:none" aria-label="Carousel Page 5"></button><button type="button"
                data-nav="5" tabindex="-1" aria-controls="tns1" style="display:none"
                aria-label="Carousel Page 6"></button></div> --}}
    </div>
</div>
