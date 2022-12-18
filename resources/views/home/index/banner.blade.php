@foreach ($banners as $banner)
    <div class="col-12 col-sm-6 mt-3">
        @include('home.index.small-banner', [
            'banner' => $banner,
            'style' => 'max-height: 220px;width:100%',
        ])
    </div>
@endforeach
