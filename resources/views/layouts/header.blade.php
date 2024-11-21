 <!-- ==========Preloader Overlay Starts Here========== -->
 <div class="overlayer">
     <div class="loader">
         <div class="loader-inner"></div>
     </div>
 </div>
 <div class="scrollToTop active "><i class="fas fa-angle-up"></i></div>
 <div class="overlay"></div>
 <div class="overlayTwo"></div>
 <!-- ==========Preloader Overlay Ends Here========== -->


 <!-- ==========Header Section Starts Here========== -->
 <header>
     <div class="header-top">
         <div class="container">
             <div class="header-top-area">
                 <ul class="left">
                   
                     <li>
                         <a href="#"><i class="fas fa-phone-alt"></i> {{ $basicInfo->mobile }}</a>
                     </li>
                     <li>
                         <i class="fas fa-map-marker-alt"></i> {{ $basicInfo->address }}
                     </li>
                 </ul>
                 <ul class="social-icons">
                     <li>
                         <a href="{{ $basicInfo->fbLink }}"><i class="fab fa-facebook-messenger"></i></a>
                     </li>
                     <li>
                         <a href="#"><i class="fab fa-twitter"></i></a>
                     </li>
                     <li>
                         <a href="#"><i class="fab fa-vimeo-v"></i></a>
                     </li>
                     <li>
                         <a href="{{ $basicInfo->instraLink }}"><i class="fab fa-instagram"></i></a>
                     </li>
                    
                   
                 </ul>
             </div>
         </div>
     </div>
     <div class="header-bottom">
         <div class="container-fluid">
             <div class="header-wrapper ">
                 <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('public/upload/' . $basicInfo->favIcon) }}" style="max-height: 90px;" width="100%" alt="logo1">
                    </a>

                 </div>
                 <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('public/frontend_assets/css/img/abacus_text_log.png') }}" style="max-height: 200px;" width="320px" alt="logo1">
                    </a>
                 </div>

                 @php
               $menus = DB::table('menus')
                        ->leftJoin('sub_menus', function ($join) {
                            $join->on('menus.id', '=', 'sub_menus.menu_id')
                                ->where('sub_menus.status', '=', '0'); // Filter submenus with status 0
                        })
                        ->select('menus.name as menu_name', 'menus.id as menu_slug', 'sub_menus.submenu as submenu_name', 'sub_menus.slug as submenu_slug')
                        ->where('menus.mstatus', '1')
                        ->orderBy('menus.id', 'asc')
                        ->orderBy('sub_menus.submenu', 'asc')
                        ->get();
                 $menuItems = [];
                 // @dd($menus);
                 foreach ($menus as $menu) {
                     if (!array_key_exists($menu->menu_name, $menuItems)) {
                         $menuItems[$menu->menu_name] = [
                             'slug' => $menu->menu_slug,
                             'sub_menus' => [],
                         ];
                     }

                     if (!is_null($menu->submenu_name)) {
                         $menuItems[$menu->menu_name]['sub_menus'][] = [
                             'name' => $menu->submenu_name,
                             'slug' => $menu->submenu_slug,
                         ];
                     }
                 }

                 $album = DB::table('albumes')
                     ->orderBy('albumes.id', 'asc')
                     ->get();
             @endphp
                 <div class="menu-area">
                     <ul class="menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @foreach ($menuItems as $menuName => $menuData)
                        @if (count($menuData['sub_menus']) > 0)
                         <li>
                             <a href="#">{{ $menuName }}</a>
                             <ul class="submenu">
                                @foreach ($menuData['sub_menus'] as $submenu)
                                 <li>
                                    <a
                                    href="{{ url($menuData['slug']) . '/' . $submenu['slug'] }}">{{ $submenu['name'] }}</a>
                                 </li>
                                 @endforeach
                             </ul>
                         </li>
                         @else
                         <li><a href="">{{ $menuName }}</a></li>
                     @endif
                 @endforeach
                 <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                 @php

                     $data = DB::table('contents')
                         ->where('id', '=', 10)
                         ->first();
                 @endphp

                     
                     </ul>
                     <div class="search-button">
                         {{-- <a href="#">
                             <i class="fas fa-search"></i>
                         </a> --}}
                     </div>
                     
                     <div class="header-bar d-lg-none">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                     <div class="ellepsis-bar d-lg-none">
                         <i class="fas fa-ellipsis-h"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- ==========Header Section Ends Here========== -->

