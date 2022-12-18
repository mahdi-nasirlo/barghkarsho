{{-- @php
    $banner = \App\Models\Banner::where('collection', 'small-banner')->first();
@endphp --}}

@if ($banner)
    <img style="height: 100%;object-fit: cover;border-radius: 7px; {{ $style ?? '' }}" src="/storage/{{ $banner->path }}"
        alt="">
@endif
