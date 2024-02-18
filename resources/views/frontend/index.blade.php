@extends('frontend.layout')
@section('page_title','Index')
@section('yield')

@endsection
@section('container')
    <body>
        <!-- Modal -->
        <header class="header-area header-style-1 header-height-2">
            <div class="mobile-promotion">
                <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
            </div>
            <div class="header-top header-top-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-info">
                                <ul>
                                    <li><a href="page-about.htlm">About Us</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="shop-wishlist.html">Wishlist</a></li>
                                    <li><a href="shop-order.html">Order Tracking</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="text-center">
                                <div id="news-flash" class="d-inline-block">
                                    <ul>
                                        <li>100% Secure delivery without contacting the courier</li>
                                        <li>Supper Value Deals - Save more with coupons</li>
                                        <li>Trendy 25silver jewelry, save up 35% off today</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-info header-info-right">
                                <ul>
                                    <li>Need help? Call Us: <strong class="text-brand"> + 1800 900</strong></li>
                                    <li>
                                        <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-fr.png')}}" alt="" />Français</a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-dt.png')}}" alt="" />Deutsch</a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-ru.png')}}" alt="" />Pусский</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-fr.png')}}" alt="" />INR</a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-dt.png')}}" alt="" />MBP</a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-ru.png')}}" alt="" />EU</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="">
                                {{Config::get('constants.site_name')}} 
                                {{-- <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /> --}}
                            </a>
                        </div>
                        <div class="header-right">
                            <div class="search-style-2">
                                <form action="#">
                                    <select class="select-active">
                                        <option>All Categories</option>
                                    </select>
                                    <input type="text" placeholder="Search for items..." />
                                </form>
                            </div>
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    <div class="search-location">
                                        <form action="#">
                                            <select class="select-active">
                                                <option>Your Location</option>
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>Arizona</option>
                                                <option>Delaware</option>
                                                <option>Florida</option>
                                                <option>Georgia</option>
                                                <option>Hawaii</option>
                                                <option>Indiana</option>
                                                <option>Maryland</option>
                                                <option>Nevada</option>
                                                <option>New Jersey</option>
                                                <option>New Mexico</option>
                                                <option>New York</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a href="shop-compare.html">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                                            <span class="pro-count blue">3</span>
                                        </a>
                                        <a href="shop-compare.html"><span class="lable ml-0">Compare</span></a>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a href="shop-wishlist.html">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                            <span class="pro-count blue">6</span>
                                        </a>
                                        <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="shop-cart.html">
                                            <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                            <span class="pro-count blue">2</span>
                                        </a>
                                        <a href="shop-cart.html"><span class="lable">Cart</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                        <h4><span>1 × </span>$800.00</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-2.jpg')}}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="shop-product-right.html">Corduroy Shirts</a></h4>
                                                        <h4><span>1 × </span>$3200.00</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>$4000.00</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="shop-cart.html" class="outline">View cart</a>
                                                    <a href="shop-checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a href="page-account.html">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}}" />
                                        </a>
                                        <a href="page-account.html"><span class="lable ml-0">Account</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                                </li>
                                                <li>
                                                    <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                                </li>
                                                <li>
                                                    <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                                </li>
                                                <li>
                                                    <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                                </li>
                                                <li>
                                                    <a href="page-login.html"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="index.html"><img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            <div class="main-categori-wrap d-none d-lg-block">
                                <a class="categories-button-active" href="#">
                                    <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                                    <i class="fi-rs-angle-down"></i>
                                </a>
                                <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                    <div class="d-flex categori-dropdown-inner">
                                        {{-- {!! getTopNavCat() !!} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="http://" class="sub-menu">
                                                {!! getTopNavCat() !!}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="hotline d-none d-lg-flex">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                            <p>1900 - 888<span>24/7 Support Center</span></p>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.html">
                                        <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count white">4</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count white">2</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                                    <h3><span>1 × </span>$800.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-4.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                    <h3><span>1 × </span>$3500.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$383.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.html">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End header-->
        <main class="main">
            <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="deal" style="background-image: url('{{asset('frontend/assets/imgs/banner/popup-1.png')}}')">
                                <div class="deal-top">
                                    <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                                </div>
                                <div class="deal-content detail-info">
                                    <h4 class="product-title"><a href="shop-product-right.html" class="text-heading">Organic fruit for your family's health</a></h4>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">$38</span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15">26% Off</span>
                                                <span class="old-price font-md ml-15">$52</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="deal-bottom">
                                    <p class="mb-20">Hurry Up! Offer End In:</p>
                                    <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                                        <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span>
                                    </div>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 rates)</span>
                                        </div>
                                    </div>
                                    <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick view -->
            <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-2.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-1.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-3.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-4.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-5.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-6.jpg')}}" alt="product image" />
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('frontend/assets/imgs/shop/product-16-7.jpg')}}" alt="product image" />
                                            </figure>
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image" /></div>
                                            <div><img src="{{asset('frontend/assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image" /></div>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <span class="stock-status out-stock"> Sale Off </span>
                                        <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand">$38</span>
                                                <span>
                                                    <span class="save-price font-md color3 ml-15">26% Off</span>
                                                    <span class="old-price font-md ml-15">$52</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="detail-extralink mb-30">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul>
                                                <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                                <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="home-slider position-relative mb-30">
                <div class="container">
                    <div class="home-slide-cover mt-30">
                        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                            @foreach ($home_banner as $list)
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset('storage/media/banner/'. $list->image)}})">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40">{!! $list->btn_txt !!}</h1>
                                    <p class="mb-65">Sign up for the daily newsletter</p>
                                    <form class="form-subcriber d-flex" action="{{route('frontend/subscribe')}}" method="POST">
                                        @csrf  
                                        <input type="email" id="email" name="email" placeholder="Your emaill address" />
                                        <button class="btn" type="submit">@if(session('message'))Subscribed @else Subscribe @endif</button>
                                    </form>
                                    @error('email')
                                        <div class="mb-4">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
            </section>
            <!--End hero slider-->
            <section class="popular-categories section-padding">
                <div class="container wow animate__animated animate__fadeIn">
                    <div class="section-title">
                        <div class="title">
                            <h3>Featured Categories</h3>
                            @foreach ($home_categories as $list) 
                            <ul class="list-inline nav nav-tabs links">
                                <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">{{ $list->category_name }}</a></li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                    </div>
                    <div class="carausel-10-columns-cover position-relative">
                        <div class="carausel-10-columns" id="carausel-10-columns">
                            @foreach ($home_categories as $list)
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="{{asset('storage/media/category/'.$list->category_image)}}" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">{{ $list->category_name }}</a></h6>
                                <span>26 items</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!--End category slider-->
            <section class="banners mb-25">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <img src="{{asset('frontend/assets/imgs/banner/banner-1.png')}}" alt="" />
                                <div class="banner-text">
                                    <h4>
                                        Everyday Fresh & <br />Clean with Our<br />
                                        Products
                                    </h4>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <img src="{{asset('frontend/assets/imgs/banner/banner-2.png')}}" alt="" />
                                <div class="banner-text">
                                    <h4>
                                        Make your Breakfast<br />
                                        Healthy and Easy
                                    </h4>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-md-none d-lg-flex">
                            <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                <img src="{{asset('frontend/assets/imgs/banner/banner-3.png')}}" alt="" />
                                <div class="banner-text">
                                    <h4>The best Organic <br />Products Online</h4>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End banners-->
            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>Popular Products</h3>
                        <ul class="nav nav-tabs links" role="tablist">
                            @foreach ($home_categories as $list)
                                <li class="nav-item" role="presentation">
                                    <a href="#cat{{$list->id}}" class="nav-link active">{{ $list->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" >
                        @php
                        $loop_count=1;
                        @endphp
                        @foreach($home_categories as $list)
                            @php
                                $cat_class="";
                                if($loop_count==1){
                                    $cat_class="active"; 
                                    $loop_count++;
                                }
                            @endphp
                            <div class="tab-pane fade show {{$cat_class}}" id="cat{{$list->id}}">
                                <div class="row product-grid-4">
                                    @if(isset($home_categories_products[$list->id][0]))
                                        @foreach($home_categories_products[$list->id] as $productArr)
                                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s" >
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="#">
                                                                <img class="default-img" src="{{asset('storage/media/'.$productArr->image)}}" alt="" />
                                                                <img class="hover-img" src="{{asset('storage/media/'.$productArr->image)}}" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                        </div>
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <div class="product-category">
                                                            <a href="shop-grid-right.html">Snack</a>
                                                        </div>
                                                        <h2><a href="#">{{$productArr->name}}</a></h2>
                                                        <div class="product-rate-cover">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                        </div>
                                                        <div>
                                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                                        </div>
                                                        <div class="product-card-bottom">
                                                            <div class="product-price">
                                                                <span>$28.85</span>
                                                                <span class="old-price">$32.8</span>
                                                            </div>
                                                            <div class="add-cart">
                                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                    @else
                                        <li>
                                            <figure>
                                                No data found
                                            <figure>
                                        <li>   
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Products Tabs-->
            <section class="section-padding pb-5">
                <div class="container">
                    <div class="section-title wow animate__animated animate__fadeIn">
                        <h3 class="">Daily Best Sells</h3>
                        <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                            <div class="banner-img style-2">
                                <div class="banner-text">
                                    <h2 class="mb-100">Bring nature into your home</h2>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            <div class="tab-content" id="myTabContent-1">
                                <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                    <div class="carausel-4-columns-cover arrow-center position-relative">
                                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-1-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-1-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Seeds of Change Organic Quinoa, Brown</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-5-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-5-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">Save 35%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">All Natural Italian-Style Chicken Meatballs</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-2-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-2-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Angie’s Boomchickapop Sweet and womnies</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-3-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-3-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="best">Best sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Foster Farms Takeout Crispy Classic </a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-4-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-4-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Blue Diamond Almonds Lightly Salted</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                        </div>
                                    </div>
                                </div>
                                <!--End tab-pane-->
                                <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                                    <div class="carausel-4-columns-cover arrow-center position-relative">
                                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-10-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-10-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Canada Dry Ginger Ale – 2 L Bottle</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-15-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-15-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">Save 35%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Encore Seafoods Stuffed Alaskan</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-12-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-12-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Gorton’s Beer Battered Fish </a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-13-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-13-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="best">Best sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Haagen-Dazs Caramel Cone Ice</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-14-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-14-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Italian-Style Chicken Meatball</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                                    <div class="carausel-4-columns-cover arrow-center position-relative">
                                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                                        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-7-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-7-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Perdue Simply Smart Organics Gluten Free</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-8-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-8-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">Save 35%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Seeds of Change Organic Quinoa</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-9-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-9-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Signature Wood-Fired Mushroom</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-13-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-13-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="best">Best sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Simply Lemonade with Raspberry Juice</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="#">
                                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/product-14-1.jpg')}}" alt="" />
                                                            <img class="hover-img" src="{{asset('frontend/assets/imgs/shop/product-14-2.jpg')}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">Hodo Foods</a>
                                                    </div>
                                                    <h2><a href="#">Organic Quinoa, Brown, & Red Rice</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: 90/120</span>
                                                    </div>
                                                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>
                                            <!--End product Wrap-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End tab-content-->
                        </div>
                        <!--End Col-lg-9-->
                    </div>
                </div>
            </section>
            <!--End Best Sales-->
            <section class="section-padding pb-5">
                <div class="container">
                    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{asset('frontend/assets/imgs/banner/banner-5.png')}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="#">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{asset('frontend/assets/imgs/banner/banner-6.png')}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="#">Perdue Simply Smart Organics Gluten Free</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$24.85</span>
                                                <span class="old-price">$26.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{asset('frontend/assets/imgs/banner/banner-7.png')}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="#">Signature Wood-Fired Mushroom and Caramelized</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$12.85</span>
                                                <span class="old-price">$13.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                            <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{asset('frontend/assets/imgs/banner/banner-8.png')}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="#">Simply Lemonade with Raspberry Juice</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$15.85</span>
                                                <span class="old-price">$16.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Deals-->
            <section class="section-padding mb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                            <div class="product-list-small animated animated">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-1.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Nestle Original Coffee-Mate Coffee Creamer</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-2.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Nestle Original Coffee-Mate Coffee Creamer</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Nestle Original Coffee-Mate Coffee Creamer</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                            <div class="product-list-small animated animated">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-4.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Organic Cage-Free Grade A Large Brown Eggs</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-5.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Seeds of Change Organic Quinoa, Brown, & Red Rice</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-6.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Naturally Flavored Cinnamon Vanilla Light Roast Coffee</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                            <div class="product-list-small animated animated">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-7.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Pepperidge Farm Farmhouse Hearty White Bread</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-8.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Organic Frozen Triple Berry Blend</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-9.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Oroweat Country Buttermilk Bread</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                            <div class="product-list-small animated animated">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-10.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Foster Farms Takeout Crispy Classic Buffalo Wings</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-11.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">Angie’s Boomchickapop Sweet & Salty Kettle Corn</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="#"><img src="{{asset('frontend/assets/imgs/shop/thumbnail-12.jpg')}}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">All Natural Italian-Style Chicken Meatballs</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End 4 columns--> 
        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
@endsection