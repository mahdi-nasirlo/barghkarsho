 {{-- <style>
     /* (A) LIST TO MENU */
     .tree,
     .headersection ul {
         list-style: none;
         padding: 0;
         margin: 0;
     }

     .tree {
         background: #fbfbfb;
         border: 1px solid #d2d2d275;
         border-radius: 2px
     }

     .tree li {
         border-bottom: 1px solid #d2d2d2;
         padding: 15px 10px;
     }

     .tree li:last-child {
         border: 0;
     }

     /* (B) SUB-headerSECTIONS */
     /* (B1) TOGGLE SHOW/HIDE */
     .headersection ul {
         display: none;
     }

     .headersection input:checked~ul {
         display: block;
     }

     /* (B2) HIDE CHECKBOX */
     .headersection input[type=checkbox] {
         display: none;
     }

     /* (B3) ADD EXPAND/COLLAPSE ICON  */
     .headersection {
         position: relative;
         padding-left: 35px !important;
     }

     .headersection label:after {
         content: "\0002B";
         position: absolute;
         top: 0;
         left: 0;
         padding: 10px;
         text-align: center;
         font-size: 30px;
         color: #f00;
         transition: all 0.5s;
     }

     .headersection input:checked~label:after {
         color: #23c37a;
         transform: rotate(45deg);
     }

     /* (B4) SUB-headerSECTION ITEMS */
     .headersection ul {
         margin-top: 10px;
     }

     .headersection ul li {
         color: #d43d3d;
     }

     /* DOES NOT MATTER */
     .tree {
         font-size: 18px;
     }

     /* @media only screen and (max-width: 990px) {
         #navigation {
             justify-content: end;
             display: flex !important;
             align-items: center display: block !important;
         }
     } */


     /* @media only screen and (min-width: 990px) {
         #navigation {
             display: none !important;
         }
     } */
 </style>
 <div style="top:107px !important; 100vh;display: none !important;padding: 10px 15px;max-height: none;" id="navigation">

     <ul class="tree">
         @if (!request()->routeIs('home'))
             <li>
                 <a class="px-0" href="{{ route('service') }}">
                     <span class="border px-2 py-1 rounded">
                         ?????????????? ????????????????
                     </span>
                 </a>
             </li>
         @endif

         @if (count($categoreis) > 0)
             <li class="headersection">
                 <input type="checkbox" id="article" />
                 <label for="article">???????? ?????????? ??????????????</label>
                 <ul>
                     @include('layouts.header.mobile_menu_item', ['categoreis' => $categoreis])
                 </ul>
             </li>
         @endif

         @if (count($courses) > 0)
             <li class="headersection">
                 <input type="checkbox" id="coursesMenu" />
                 <label for="coursesMenu">???????? ?????? ????????????</label>
                 <ul>
                     @foreach ($courses as $item)
                         <li>
                             <a href="{{ route('cours.single', $item) }}"> {{ $item->title }} </a>
                         </li>
                     @endforeach
                 </ul>
             </li>
         @endif

         @php
             $pages = \App\Models\Page::all();
         @endphp

         @if ($pages->count())
             <li class="headersection">
                 <input type="checkbox" id="coursesMenu" />
                 <label for="coursesMenu">???????? ?????? ????????</label>
                 <ul>
                     @foreach ($pages as $page)
                         <li>
                             <a href="{{ route('pages', $page) }}"> {{ $page->name }} </a>
                         </li>
                     @endforeach
                 </ul>
             </li>
         @endif

         @auth
             <li class="headersection">
                 <input type="checkbox" id="userPanel" />
                 <label for="userPanel"> ?????? ???????????? </label>
                 <ul>
                     @auth
                         @if (auth()->user()->canAccessFilament())
                             <li>
                                 <a class="dropdown-item rounded text-danger" href="{{ route('filament.pages.dashboard') }}">
                                     <i class="text-danger uil uil-user align-middle me-1">
                                     </i> ?????? ????????????</a>
                             </li>
                         @endif
                     @endauth
                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'dashboard']) }}"><i
                                 class="uil uil-user align-middle me-1"></i> ???????? ????????????</a>
                     </li>

                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'order']) }}"><i
                                 class="uil uil-clipboard-notes align-middle me-1"></i> ?????????????? ???? </a>
                     </li>

                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'address']) }}">
                             <i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> ???????? </a>
                     </li>

                     <li>
                         <button class="dropdown-item text-dark"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                 class="uil uil-sign-out-alt align-middle me-1"></i> ???????? </button>
                         <form id="logout-form" action="{{ route('filament.auth.logout') }}" method="POST"
                             style="display: none;">
                             @csrf
                         </form>
                     </li>

                 </ul>
             </li>
         @endauth

         @guest
             <li style="display: flex;justify-content: space-between;flex-direction: row-reverse;">
                 <i class="uil uil-arrow-left d-flex align-items-center"></i>
                 <a class="px-1" href="{{ route('filament.auth.login') }}">
                     ????????
                 </a>
             </li>
         @endguest

         <li>
             <a href="{{ route('cart.') }}">
                 ?????? ????????
             </a>
         </li>
     </ul>
 </div> --}}

 <div class="zeynep right">
     <div class="d-flex">
         <a class="logo" href="/">
             <img src="http://localhost:8000/theme/4lKigFHb7apnVK4fIAijoXeoFusyhJ-metaZWxjdHJvbWFfcGFnZS0wMDAxLnBuZw==-.png"
                 alt="Logo" height="100">
         </a>
     </div>

     <ul>
         @auth
             @if (auth()->user()->canAccessFilament())
                 <li>
                     <a href="{{ route('filament.pages.dashboard') }}">
                         <i class="text-danger uil uil-user align-middle me-1">
                         </i>
                         ?????? ????????????
                     </a>
                 </li>
             @endif
             <li class="has-submenu">
                 <a href="#" data-submenu="panel">?????? ????????????</a>

                 <div id="panel" class="submenu">
                     <div class="submenu-header">
                         <a href="#" data-submenu-close="panel">?????? ????????</a>
                     </div>

                     <label>?????? ????????????</label>

                     <ul>
                         <li>
                             <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'dashboard']) }}"><i
                                     class="uil uil-user align-middle me-1"></i> ???????? ????????????</a>
                         </li>

                         <li>
                             <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'order']) }}"><i
                                     class="uil uil-clipboard-notes align-middle me-1"></i> ?????????????? ???? </a>
                         </li>

                         <li>
                             <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'address']) }}">
                                 <i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> ???????? </a>
                         </li>
                     </ul>
                 </div>
             </li>
         @endauth
         @guest
             <li>
                 <a class="px-1 d-flex justify-content-between bg-soft-warning" href="{{ route('filament.auth.login') }}">
                     ???????? / ?????? ??????
                     <i class="uil uil-arrow-left d-flex align-items-center"></i>
                 </a>
             </li>
         @endguest
         <livewire:cart.cart-header />
         @if (!request()->routeIs('home'))
             <li>
                 <a class="text-warning " href="{{ route('service') }}">
                     <img width="25px" src="\theme\images\Repairs-icon.png" alt="">
                     ?????????????? ?????????? ??????
                 </a>
             </li>
         @endif

         @if (count($shopCategoies) > 0)
             @include('layouts.header.mobile_menu_item', [
                 'categoreis' => $shopCategoies,
                 'parentName' => '?????? ????????',
                 'title' => '??????????????',
                 'id' => 'products',
             ])
         @endif

         @if (count($categoreis) > 0)
             @include('layouts.header.mobile_menu_item', [
                 'categoreis' => $categoreis,
                 'parentName' => '?????? ????????',
                 'title' => '???????? ?????????? ??????????????',
                 'id' => 'articles',
             ])
         @endif

         @if ($pages->count())
             <li class="has-submenu">
                 <a href="#" data-submenu="pages">???????? ?????? ????????</a>

                 <div id="pages" class="submenu">
                     <div class="submenu-header">
                         <a href="#" data-submenu-close="pages">?????? ????????</a>
                     </div>

                     <label>???????? ?????? ????????</label>

                     <ul>
                         @foreach ($pages as $page)
                             <li>
                                 <a href="{{ route('pages', $page) }}">
                                     {{ $page->name }}
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </li>
         @endif
         @auth
             <li class="d-flex justify-content-between bg-soft-blue py-2" style="position: absolute;bottom: 0;width: 100%">
                 <span>
                     {{ auth()->user()->name }} ?????? ??????????
                 </span>
                 <button style="width: 24%" class="dropdown-item text-dark p-0 w-10"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                         class="uil uil-sign-out-alt align-middle me-1"></i> ???????? </button>
                 <form id="logout-form" action="{{ route('filament.auth.logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
             </li>
         @endauth
     </ul>
 </div>

 <div class="zeynep-overlay"></div>
