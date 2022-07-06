@if ($related->count() > 0)
    <div class="card shadow rounded border-0 mt-3">
        <div class="card-body py-1 pt-2">
            <h5 class="card-title mb-3">پست های مرتبط :</h5>

            <div class="row">
                @foreach ($related as $item)
                    @include('home.post-cart', ['post' => $item])
                    <!--end col-->
                @endforeach
            </div>
            <!--end row-->
        </div>
    </div>
@endif
