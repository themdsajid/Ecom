<!-- Header -->
<header class=" z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1">
        <div class="container">
            <div class="d-flex align-items-center">
                <nav class="navbar navbar-light navbar-expand-md bg-white justify-content-md-center justify-content-start d-lg-none d-sm-flex"
                    style="margin-left: 0;padding-left: 0;">
                    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse"
                        data-target="#collapsingNavbar3" aria-expanded="true">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse justify-content-between align-items-center w-100"
                        id="collapsingNavbar3"
                        style="position: fixed; background: rgb(255, 255, 255); top: 71px; padding-left: 10px;">
                        <ul class="navbar-nav mx-auto text-md-center text-left">
                            {{-- @foreach ($menuTags as $menuTag)
                                <li class="nav-item">
                                    <a class="nav-link fs-16" href="{{ route($menuTag->slug) }}"
                                        style="color: #000;font-weight:600">{{$menuTag->page_name}}</a>
                                </li>
                            @endforeach --}}
                            {{-- @foreach ($menuTags as $menuTag)
                                <li class="nav-item">
                                    <a class="nav-link fs-16" href="{{ route($menuTag->slug) }}"
                                        style="color: #000;font-weight:600">{{ $menuTag->page_name }}</a>
                                </li>
                            @endforeach --}}


                            <li class="nav-item">
                                <a class="nav-link fs-16"
                                    href="https://novamaxindia.com/public/uploads/all/7EgdhwXagGUOsn13OFdm7Ma9hzC4y7FXz7t691SQ.pdf"
                                    style="color: #000;font-weight:600">E-Catalogue</a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-10px mr-3 ml-0" href="index.html">
                        <img src= {{asset($addLogo->file)}}   alt="NOVAMAX | AIR COOLERS"
                            class="mw-100 h-30px h-md-60px" height="60">
                        {{-- <img src="uploads/all/Phej0WBfbNGGoBrPK134UvBO95kO3GVBAREWaIN6.svg"
                            alt="NOVAMAX | AIR COOLERS" class="mw-100 h-30px h-md-60px" height="60"> --}}
                    </a>
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle"
                        data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="https://www.novamaxindia.com/search" method="GET"
                            class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle"
                                    data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i
                                            class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search"
                                        name="keyword" placeholder="Search" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                            style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        <a href="compare.html" class="d-flex align-items-center text-reset">
                            <i class="la la-refresh la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1">
                                <span class="badge badge-primary badge-inline badge-pill">0</span>
                                <span class="nav-box-text d-none d-xl-block opacity-70">Compare</span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        <a href="users/login.html" class="d-flex align-items-center text-reset">
                            <i class="la la-heart-o la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1">
                                <span class="badge badge-primary badge-inline badge-pill">0</span>
                                <span class="nav-box-text d-none d-xl-block opacity-70">Wishlist</span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="d-lg-block align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100"
                            data-toggle="dropdown" data-display="static">
                            <i class="la la-shopping-cart la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1">
                                <span class="badge badge-primary badge-inline badge-pill cart-count">0</span>
                                <span class="nav-box-text d-none d-xl-block opacity-70">Cart</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">

                            <div class="text-center p-3">
                                <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                <h3 class="h6 fw-700">Your Cart is empty</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-lg-block align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100"
                            data-toggle="dropdown" data-display="static">
                            <i class="la la-user la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1 d-none d-xl-block">Account</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs p-0 stop-propagation">
                            <div class="px-3 py-3 fs-15 border-top d-flex justify-content-between">
                                <span class="fw-600"><a href="users/login.html">Login</a></span>
                                <span class="fw-600"><a href="users/registration.html">Register</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border-top border-gray-200 py-1 d-none d-md-flex">
        <div class="container">
            <nav
                class="navbar navbar-light navbar-expand-md bg-white justify-content-md-center justify-content-start">
                <button class="navbar-toggler ml-1" type="button" data-toggle="collapse"
                    data-target="#collapsingNavbar2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-between align-items-center w-100"
                    id="collapsingNavbar2">
                    <ul class="navbar-nav mx-auto text-md-center text-left">
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('Desert') }}"
                                style="color: #000;padding:0 1rem">Desert Coolers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('Commercial-Coolers') }}"
                                style="color: #000;padding:0 1rem">Commercial Coolers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16"
                                href="https://novamaxindia.com/public/uploads/all/7EgdhwXagGUOsn13OFdm7Ma9hzC4y7FXz7t691SQ.pdf"
                                style="color: #000;padding:0 1rem">E-Catalogue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('Our-Blog') }}"
                                style="color: #000;padding:0 1rem">Our
                                Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('Video-Gallery') }}"
                                style="color: #000;padding:0 1rem">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('Contact-Us') }}"
                                style="color: #000;padding:0 1rem">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-16" href="{{ route('B2B-Registration') }}"
                                style="color: #000;padding:0 1rem">B2B Registration</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
