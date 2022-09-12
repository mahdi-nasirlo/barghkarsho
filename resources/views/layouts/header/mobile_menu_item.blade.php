@foreach ($categoreis as $category)
    @if ($category->is_visible and $category->isVisible())
        @if ($category->childIsVisible())
            <li class="headersection">
                <input type="checkbox" id="{{ $category->id }}" />
                <label for="{{ $category->id }}">
                    <a href="{{ $category->categoryLink() }}">
                        {{ $category->name }}
                    </a>
                </label>
                <ul>
                    @include('layouts.header.mobile_menu_item', ['categoreis' => $category->children])
                </ul>
            </li>
        @else
            <li>
                <a href="{{ $category->categoryLink() }}">
                    {{ $category->name }}
                </a>
            </li>
        @endif
    @endif
@endforeach
