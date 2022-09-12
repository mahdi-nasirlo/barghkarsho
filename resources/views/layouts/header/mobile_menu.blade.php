 <style>
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
                         درخواست تعمیرکار
                     </span>
                 </a>
             </li>
         @endif

         @if (count($categoreis) > 0)
             <li class="headersection">
                 <input type="checkbox" id="article" />
                 <label for="article">مجله تخصصی تعمیرات</label>
                 <ul>
                     @include('layouts.header.mobile_menu_item', ['categoreis' => $categoreis])
                 </ul>
             </li>
         @endif

         @if (count($courses) > 0)
             <li class="headersection">
                 <input type="checkbox" id="coursesMenu" />
                 <label for="coursesMenu">دوره های آموزشی</label>
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
                 <label for="coursesMenu">لینک های مفید</label>
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
                 <label for="userPanel"> پنل کاربری </label>
                 <ul>
                     @auth
                         @if (auth()->user()->canAccessFilament())
                             <li>
                                 <a class="dropdown-item rounded text-danger" href="{{ route('filament.pages.dashboard') }}">
                                     <i class="text-danger uil uil-user align-middle me-1">
                                     </i> پنل مدیریت</a>
                             </li>
                         @endif
                     @endauth
                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'dashboard']) }}"><i
                                 class="uil uil-user align-middle me-1"></i> حساب کاربری</a>
                     </li>

                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'order']) }}"><i
                                 class="uil uil-clipboard-notes align-middle me-1"></i> سفارشات من </a>
                     </li>

                     <li>
                         <a class="dropdown-item text-dark" href="{{ route('profile', ['tab' => 'address']) }}">
                             <i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> آدرس </a>
                     </li>

                     <li>
                         <button class="dropdown-item text-dark"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                 class="uil uil-sign-out-alt align-middle me-1"></i> خروج </button>
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
                     ورود
                 </a>
             </li>
         @endguest

         <li>
             <a href="{{ route('cart.') }}">
                 سبد خرید
             </a>
         </li>
     </ul>
 </div>
