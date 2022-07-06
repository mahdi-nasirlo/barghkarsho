<div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 pb-2">
    <div class="card blog rounded border-0 shadow">
        <div class="position-relative">
            <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top card-img-top-index rounded-top"
                alt="..." />
            <div class="overlay rounded-top bg-dark"></div>
        </div>
        <div class="card-body content">
            <h5>
                <a style="font-size: 17px" href="{{ route('article.single', $post) }}"
                    class="card-title title text-dark">
                    {{ $post->title }}
                </a>
            </h5>
            <div class="post-meta d-flex justify-content-between mt-3">
                <ul class="list-unstyled mb-0 ps-0">
                    <li class="list-inline-item me-2 mb-0">
                        <a href="javascript:void(0)" class="text-muted like"><i
                                class="uil uil-eye me-1"></i>{{ $post->view }}</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)" class="text-muted comments"><i
                                class="uil uil-comment me-1"></i>{{ $post->comments->count() }}</a>
                    </li>
                </ul>
                <a href="{{ route('article.single', $post) }}" class="text-muted readmore">ادامه
                    مطلب
                    <i class="uil uil-angle-left-b align-middle"></i></a>
            </div>
        </div>
        <div class="author">
            <small class="text-light user d-block"><i class="uil uil-user"></i>{{ $post->user->name }}</small>
            <small class="text-light date"><i class="uil uil-calendar-alt"></i>
                {{ \Morilog\Jalali\Jalalian::forge($post->updated_at)->format('%A, %d %B %Y') }}
            </small>
        </div>
    </div>
</div>
