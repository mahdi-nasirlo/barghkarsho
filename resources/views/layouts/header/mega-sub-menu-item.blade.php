@foreach ($categoreis as $category)
    @if ($category->is_visible and $category->isVisible())
        @if ($category->childIsVisible())
            <li class="has-megasubmenu">
                <a class="dropdown-item d-flex justify-content-between" href="#">
                    {{ $category->name }}
                    <img src="\theme\images\menu-back.png" width="12" height="12">
                </a>
                <div class="megasubmenu dropdown-menu">
                    <div class="row">
                        @foreach ($category->children as $parent)
                            <div class="col-6">
                                <a href="{{ $parent->categoryLink() }}">
                                    <h6 class="title">
                                        {{ $parent->name }}
                                        {{-- {{ $parent->name }} --}}
                                    </h6>
                                </a>
                                <ul class="list-unstyled">
                                    @foreach ($parent->children as $child)
                                        <li><a href="{{ $category->categoryLink() }}"> {{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- end col-3 -->
                        @endforeach
                    </div>
            </li>
        @else
            <li><a class="dropdown-item" href="{{ $category->categoryLink() }}"> {{ $category->name }} </a></li>
        @endif
    @endif
@endforeach
