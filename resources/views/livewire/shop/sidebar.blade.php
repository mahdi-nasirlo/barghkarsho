<div class="col-lg-3 col-md-4 col-12">
    <div class="card border-0 sidebar sticky-bar">
        <div class="card-body p-0">
            <!-- SEARCH -->
            <div class="widget">
                <form role="search" method="get">
                    <div class="input-group mb-3 border rounded">
                        <input wire:model='search' type="text" id="s" name="s"
                            class="form-control border-0" placeholder="جستجوی کلمه کلیدی...">
                        <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit"><i
                                class="uil uil-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- SEARCH -->

            <!-- Categories -->
            @if ($shopCategory->hasChilde())
                <div class="widget mt-4 pt-2">
                    <h5 class="widget-title">دسته بندیها </h5>
                    <ul class="list-unstyled mt-4 mb-0 blog-categories">
                        @foreach ($shopCategory->children as $item)
                            <li><a href="jvascript:void(0)">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Categories -->

            <!-- color -->

            {{-- @foreach ($shopCategory->attributes as $attribute)
                <div class="bg-light mt-4 p-3 pt-2 rounded-2 widget">
                    <h5 class="widget-title">{{ $attribute->name }}</h5>
                    <ul class="list-unstyled mt-4 mb-0 blog-categories">
                        @foreach ($attribute->values as $item)
                            <li>
                                <input name="ss" wire:model='filter' type="checkbox"
                                    value="{{ $item }}.{{ $attribute->name }}">
                                <a href="jvascript:void(0)">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach --}}

            <div class="accordion mt-4 pt-2" id="buyingquestion">
                @php
                    $attributes = \App\Models\Shop\Attribute::with(['products.category'])
                        ->whereHas('products.category', function ($q) use ($shopCategory) {
                            $q->where('id', $shopCategory->id);
                        })
                        ->get();
                @endphp
                @foreach ($attributes as $attribute)
                    <div class="accordion-item rounded pt-2">
                        <h2 class="accordion-header" id="heading_{{ $attribute->id }}">
                            <button class="accordion-button border-0 bg-light collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse_{{ $attribute->id }}"
                                aria-expanded="false" aria-controls="collapse_{{ $attribute->id }}">
                                {{ $attribute->name }}
                            </button>
                        </h2>
                        <div id="collapse_{{ $attribute->id }}" class="accordion-collapse border-0 collapse"
                            aria-labelledby="heading_{{ $attribute->id }}" data-bs-parent="#buyingquestion"
                            style="">
                            <div class="accordion-body text-muted bg-white d-flex flex-column">
                                @php
                                    $attributeValue = $attribute->values ?? ['دارد', 'ندارد'];
                                @endphp
                                @foreach ($attributeValue as $item)
                                    <div class="form-check form-check-inline">
                                        <div class="mb-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" wire:model='filter'
                                                    value="{{ $item }}.{{ $attribute->name }}"
                                                    id="flexCheckDefault_{{ $item }}">
                                                <label class="form-check-label"
                                                    for="flexCheckDefault_{{ $item }}">
                                                    {{ $item }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Top Products -->
            <div class="widget mt-4 pt-2">
                <h5 class="widget-title">محصولات برتر </h5>
                <ul class="list-unstyled mt-4 mb-0">
                    <li class="d-flex align-items-center">
                        <a href="javascript:void(0)">
                            <img src="images/shop/product/s1.jpg" class="img-fluid avatar avatar-small rounded shadow"
                                style="height:auto;" alt="">
                        </a>
                        <div class="flex-1 content ms-3">
                            <a href="javascript:void(0)" class="text-dark h6">تی شرت </a>
                            <h6 class="text-muted small fst-italic mb-0 mt-1">18000 تومان <del
                                    class="text-danger ms-2">22000 تومان</del> </h6>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mt-2">
                        <a href="javascript:void(0)">
                            <img src="images/shop/product/s3.jpg" class="img-fluid avatar avatar-small rounded shadow"
                                style="height:auto;" alt="">
                        </a>
                        <div class="flex-1 content ms-3">
                            <a href="javascript:void(0)" class="text-dark h6">ساعت </a>
                            <h6 class="text-muted small fst-italic mb-0 mt-1">18000 تومان <del
                                    class="text-danger ms-2">22000 تومان</del> </h6>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mt-2">
                        <a href="javascript:void(0)">
                            <img src="images/shop/product/s6.jpg" class="img-fluid avatar avatar-small rounded shadow"
                                style="height:auto;" alt="">
                        </a>
                        <div class="flex-1 content ms-3">
                            <a href="javascript:void(0)" class="text-dark h6">فنجان قهوه </a>
                            <h6 class="text-muted small fst-italic mb-0 mt-1">18000 تومان <del
                                    class="text-danger ms-2">22000 تومان</del> </h6>
                        </div>
                    </li>
                    <li class="d-flex align-items-center mt-2">
                        <a href="javascript:void(0)">
                            <img src="images/shop/product/s8.jpg" class="img-fluid avatar avatar-small rounded shadow"
                                style="height:auto;" alt="">
                        </a>
                        <div class="flex-1 content ms-3">
                            <a href="javascript:void(0)" class="text-dark h6">چهارپایه چوبی</a>
                            <h6 class="text-muted small fst-italic mb-0 mt-1">18000 تومان <del
                                    class="text-danger ms-2">22000 تومان</del> </h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end col-->
