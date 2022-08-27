@include('layouts.header.topheader')
<header id="topnav" class="defaultscroll sticky bg-white border-bottom">
    <div class="container-xl">
        <!-- Logo container-->
        <div>
            <a class="logo" href="index.html">
                <img src="/theme/images/logo-dark.png" height="24" alt="">
            </a>
        </div>
        <!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div style=" justify-content: end" id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-content-end">
                @if (!request()->routeIs('home'))
                    <li class="has-submenu parent-parent-menu-item">
                        <a class="px-0" href="{{ route('service') }}">
                            <span class="border px-2 py-1 rounded">
                                درخواست تعمیرکار
                            </span>
                        </a>
                    </li>
                @endif
                @if (count($categoreis) > 0)
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">مجله تخصصی تعمیرات </a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            @include('layouts.header.article-sub-item', ['categoreis' => $categoreis])
                        </ul>
                    </li>
                @endif
                @if (count($courses) > 0)
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">دوره های آموزشی </a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            @foreach ($courses as $item)
                                <li class="has-submenu parent-menu-item">
                                    <a href="{{ route('cours.single', $item) }}"> {{ $item->title }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">راهنمای
                    </a><span class="menu-arrow"></span>
                </li>
                <li class="has-submenu parent-menu-item d-flex">
                    @auth
                        <button style="background: none;color: black;border: none"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            خروج
                        </button>

                        <form id="logout-form" action="{{ route('filament.auth.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    @else
                        <i style="transform: scaleX(-1)" class="uil uil-arrow-right d-flex align-items-center"></i>
                        <a class="px-1" href="{{ route('filament.auth.login') }}">
                            ورود
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</header>
