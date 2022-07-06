@foreach ($categoreis as $category)
    @if ($category->is_visible and $category->isVisible())
        <li class="has-submenu parent-menu-item">
            <a href="{{ $category->categoryLink() }}">
                {{ $category->name }}
            </a>
            @if ($category->childIsVisible())
                <span class="submenu-arrow"></span>
                <ul style="display: block" class="submenu">
                    @include('layouts.header.article-sub-item', ['categoreis' => $category->children])
                </ul>
            @endif
        </li>
    @endif
@endforeach
