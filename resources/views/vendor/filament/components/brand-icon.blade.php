{{-- @if (filled($brand = config('filament.brand')))
    <div @class([
        'text-xl font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{
            \Illuminate\Support\Str::of($brand)
                ->snake()
                ->upper()
                ->explode('_')
                ->map(fn (string $string) => \Illuminate\Support\Str::substr($string, 0, 1))
                ->take(2)
                ->implode('')
        }}
    </div>
@endif --}}

<img src="http://localhost:8000/theme/4lKigFHb7apnVK4fIAijoXeoFusyhJ-metaZWxjdHJvbWFfcGFnZS0wMDAxLnBuZw==-.png"
    alt="Logo" class="h-10">
