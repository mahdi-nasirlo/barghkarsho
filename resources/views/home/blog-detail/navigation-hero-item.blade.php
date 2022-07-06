@if ($category->parent !== null)
    @include('home.blog-detail.navigation-hero-item', ['category' => $category->parent])
@endif
<li class="breadcrumb-item active" aria-current="page">
    <a href="@if ($category->posts->count() > 0) {{ route('article.list', $category) }} @endif">
        {{ $category->name }}
    </a>
</li>
