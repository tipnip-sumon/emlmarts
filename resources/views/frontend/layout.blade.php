<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title','Website')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/slider-range.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
    <script>
        PRODUCT_IMAGE = '{{asset("storage/media/")}}';
    </script>
</head>
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
                    @php
                    $url = current_url();
                    $category_list = getTopNavCat();
                    // prx($category_list['categories']);
                    @endphp
                    <a href="{{$url}}">
                        {{Config::get('constants.site_name')}} 
                        {{-- <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /> --}}
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                <option>All Categories</option>
                                @foreach ($category_list as $cat_list)
                                <option>{{$cat_list->category_name}}</option>
                                @endforeach
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
                                @php
                                    $getAddToCartTotalItem = getAddToCartTotalItem();
                                    $totalItemCount = count($getAddToCartTotalItem);
                                    $totalAmount=0;
                                @endphp
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                    <span class="pro-count blue">{{$totalItemCount}}</span>
                                </a>
                                <a href="{{route('frontend.cart')}}"><span class="lable">Cart</span></a>
                                {{-- @if ($totalItemCount>0) --}}
                                <div class="cart-dropdown-wrap cart-dropdown-hm2" id="cartBox">
                                    <ul>
                                        @foreach ($getAddToCartTotalItem as $cartItem)
                                        @php
                                        // prx($cartItem);
                                            $totalAmount=$totalAmount+($cartItem->price)*($cartItem->qty);
                                        @endphp
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{asset('storage/media/'.$cartItem->attr_image)}}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">{{$cartItem->name}}</a></h4>
                                                <h4><span>{{$cartItem->qty}} × </span>${{$cartItem->price}}</h4>
                                            </div>
                                            {{-- <div class="shopping-cart-delete">
                                                <a href="#" onclick="deleteAddToCart('{{$cartItem->products_id}}','{{$cartItem->size}}','{{$cartItem->color}}','{{$cartItem->attr_id}}')"><i class="fi-rs-cross-small"></i></a>
                                            </div> --}}
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>${{$totalAmount}}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('frontend.cart')}}" class="outline">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}
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
                                <ul>
                                    @foreach ($category_list as $item)
                                    <li>
                                        <a href="{{url('category/'.$item->category_slug)}}"> <img src="{{asset('storage/media/category/'.$item->category_image)}}" alt="" />{{$item->category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    {{-- <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a href="http://" class="sub-menu">
                                        {!! getTopNavCat() !!}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
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
                                <span class="pro-count white">20</span>
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
@section('container')

@show
<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome grocery store website template</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-email-2.svg')}}" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-clock.svg')}}" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s>
                    <h4 class=" widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="{{route('frontend.cart')}}">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help Ticket</a></li>
                        <li><a href="#">Shipping Details</a></li>
                        <li><a href="#">Compare products</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Corporate</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Become a Vendor</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">Farm Business</a></li>
                        <li><a href="#">Farm Careers</a></li>
                        <li><a href="#">Our Suppliers</a></li>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Promotions</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popular</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Milk & Flavoured Milk</a></li>
                        <li><a href="#">Butter and Margarine</a></li>
                        <li><a href="#">Eggs Substitutes</a></li>
                        <li><a href="#">Marmalades</a></li>
                        <li><a href="#">Sour Cream and Dips</a></li>
                        <li><a href="#">Tea & Kombucha</a></li>
                        <li><a href="#">Cheese</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                    <h4 class="widget-title">Install App</h4>
                    <p class="">From App Store or Google Play</p>
                    <div class="download-app">
                        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('frontend/assets/imgs/theme/app-store.jpg')}}" alt="" /></a>
                        <a href="#" class="hover-up mb-sm-2"><img src="{{asset('frontend/assets/imgs/theme/google-play.jpg')}}" alt="" /></a>
                    </div>
                    <p class="mb-20">Secured Payment Gateways</p>
                    <img class="" src="{{asset('frontend/assets/imgs/theme/payment-method.png')}}" alt="" />
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Nest</strong> - HTML Ecommerce Template <br />All rights reserved</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                    <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                </div>
                <div class="hotline d-lg-inline-flex">
                    <img src="{{asset('frontend/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
</footer>   

<!-- Vendor JS-->
<script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/wow.js')}}"></script>
@stack('slider')
<script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
@stack('script')
<script src="{{asset('frontend/assets/js/shop.js')}}"></script>
</body>

</html>