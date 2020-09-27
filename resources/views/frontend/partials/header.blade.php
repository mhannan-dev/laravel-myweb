<header>
    <!-- Header Start -->
    <div class="header-area">
            <div class="main-header  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('frontend.index') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                            <li><a href="{{ route('frontend.about') }}">About</a></li>
                                            <li><a href="{{ route('frontend.services') }}">Services</a></li>
                                            <li><a href="{{ route('frontend.portfolio') }}">Portfolio</a></li>
                                            <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                                            <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Header End -->
</header>
