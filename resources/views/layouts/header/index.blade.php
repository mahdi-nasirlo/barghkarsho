@include('layouts.header.topheader')
<header id="topnav" class="defaultscroll sticky bg-white border-bottom">
    <div class="container-xl">
        <!-- Logo container-->
        <div>
            <a class="logo" href="/">
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
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="btn my-3 btn-soft-primary px-3 py-1" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="uil uil-user align-middle icons"></i>
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3"
                                style="width: 200px; margin: 0px;">

                                @if (auth()->user()->canAccessFilament())
                                    <a class="dropdown-item border border-danger rounded text-danger"
                                        href="{{ route('filament.pages.dashboard') }}">
                                        <i class="text-danger uil uil-user align-middle me-1">
                                        </i> پنل مدیریت</a>
                                @endif

                                <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'dashboard']) }}"><i
                                        class="uil uil-user align-middle me-1"></i> حساب کاربری</a>
                                <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'order']) }}"><i
                                        class="uil uil-clipboard-notes align-middle me-1"></i> سفارشات من </a>
                                <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'address']) }}">
                                    <i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> آدرس </a>
                                <div class="dropdown-divider my-3 border-top"></div>
                                <button class="dropdown-item text-dark"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="uil uil-sign-out-alt align-middle me-1"></i> خروج </button>
                                <form id="logout-form" action="{{ route('filament.auth.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <i style="transform: scaleX(-1)" class="uil uil-arrow-right d-flex align-items-center"></i>
                        <a class="px-1" href="{{ route('filament.auth.login') }}">
                            ورود
                        </a>
                    @endauth
                </li>

                <livewire:cart.cart-header />

            </ul>
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</header>
