﻿@extends('frontend.layout')
@section('page_title','Shop Filter')

@section('container')
<body>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-30">
            <div class="row">
                <div class="col-lg-12">
                    <a class="shop-filter-toogle" href="#">
                        <span class="fi-rs-filter mr-5"></span>
                        Filters
                        <i class="fi-rs-angle-small-down angle-down"></i>
                        <i class="fi-rs-angle-small-up angle-up"></i>
                    </a>
                    <div class="shop-product-fillter-header">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                                <div class="card">
                                    <h5 class="mb-30">By Categories</h5>
                                    @php
                                        // prx($product);
                                    @endphp
                                    <div class="categories-dropdown-wrap font-heading">
                                        <ul>
                                            @foreach ($left_categories_slug as $cat_slug)
                                                <li>
                                                    <a href="{{url('category/'.$cat_slug->category_slug)}}"> <img src="{{asset('storage/media/category/'.$cat_slug->category_image)}}" alt="" />{{$cat_slug->category_name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                                <div class="card">
                                    <h5 class="mb-30">By Vendors</h5>
                                    <div class="d-flex">
                                        <div class="custome-checkbox mr-80">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Aldi</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                            <label class="form-check-label" for="exampleCheckbox2"><span>Adidas</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                            <label class="form-check-label" for="exampleCheckbox3"><span>Burbe</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox4" value="" />
                                            <label class="form-check-label" for="exampleCheckbox4"><span>Chanel</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox5" value="" />
                                            <label class="form-check-label" for="exampleCheckbox5"><span>Prada</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox6" value="" />
                                            <label class="form-check-label" for="exampleCheckbox6"><span>Kroger</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox7" value="" />
                                            <label class="form-check-label" for="exampleCheckbox7"><span>Traders</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox8" value="" />
                                            <label class="form-check-label" for="exampleCheckbox8"><span>Publix</span></label>
                                        </div>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                            <label class="form-check-label" for="exampleCheckbox11"><span>Harris</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                            <label class="form-check-label" for="exampleCheckbox21"><span>Costco</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                            <label class="form-check-label" for="exampleCheckbox31"><span>Targets</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox41" value="" />
                                            <label class="form-check-label" for="exampleCheckbox41"><span>Green Tea</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox51" value="" />
                                            <label class="form-check-label" for="exampleCheckbox51"><span>iSnack</span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox61" value="" />
                                            <label class="form-check-label" for="exampleCheckbox61"><span>Pambox</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                                <div class="card">
                                    <h5 class="mb-30">By Tags</h5>
                                    <div class="sidebar-widget widget-tags">
                                        <ul class="tags-list">
                                            <li class="hover-up">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Milk</a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Smoothie</a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Fruit</a>
                                            </li>
                                            <li class="hover-up mr-0">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Salad</a>
                                            </li>
                                            <li class="hover-up mr-0">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                                            </li>
                                            <li class="hover-up mr-0 mb-0">
                                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-5 mb-sm-5">
                                <div class="card">
                                    <h5 class="mb-10">By Price</h5>
                                    <div class="sidebar-widget price_range range">
                                        <div class="price-filter mb-20">
                                            <div class="price-filter-inner">
                                                <form action="">
                                                    <div id="slider-range" class="mb-20"></div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                                        <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                                                    </div>
                                                    <a type="button" class="btn btn-info mt-10" onclick="sort_price_filter()">Filter</a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox211" value="" />
                                            <label class="form-check-label" for="exampleCheckbox211"><span>$0.00 - $20.00 </span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox22" value="" />
                                            <label class="form-check-label" for="exampleCheckbox22"><span>$20.00 - $40.00 </span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox23" value="" />
                                            <label class="form-check-label" for="exampleCheckbox23"><span>$40.00 - $60.00 </span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox24" value="" />
                                            <label class="form-check-label" for="exampleCheckbox24"><span>$60.00 - $80.00 </span></label>
                                            <br />
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox25" value="" />
                                            <label class="form-check-label" for="exampleCheckbox25"><span>Over $100.00</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{$count}}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <select onchange="sort_by()" id="sort_by_value">
                                            <option value="">Featured</option>
                                            <option value="price_asc">Price: Low to High</option>
                                            <option value="price_desc">Price: High to Low</option>
                                            <option value="name">Name</option>
                                            <option value="date">Release Date</option>
                                            {{-- <li value="price_asc"><a href="#">Avg. Rating</a></li> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @if(isset($product[0]))
                        @foreach($product as $productArr)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
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
                                    <h2><a href="shop-product-right.html">{{$productArr->name}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">Unilever</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{$product_attr[$productArr->id][0]->mrp}}</span>
                                            <span class="old-price">${{$product_attr[$productArr->id][0]->price}}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$product_attr[$productArr->id][0]->size}}','{{$product_attr[$productArr->id][0]->color}}')"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <input type="hidden" id="qty" value="1"/>
                    <form id="fromAddToCart">
                        @csrf
                        <input type="hidden" name="size_id" id="size_id">
                        <input type="hidden" name="color_id" id="color_id">
                        <input type="hidden" name="pqty" id="pqty">
                        <input type="hidden" name="product_id" id="product_id">
                    </form>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Deals Of The Day</h3>
                            <a class="show-all" href="shop-grid-right.html">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="{{asset('frontend/assets/imgs/banner/banner-5.png')}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a></h2>
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
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="{{asset('frontend/assets/imgs/banner/banner-6.png')}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a></h2>
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
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="{{asset('frontend/assets/imgs/banner/banner-7.png')}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
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
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="{{asset('frontend/assets/imgs/banner/banner-8.png')}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
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
                    </section>
                    <!--End Deals-->
                </div>
            </div>
        </div>
    </main>
    <form id="categoryFilter">
        <input type="hidden" name="sort" id="sort">
        <input type="hidden" name="filter_price_start" id="filter_price_start" value="{{$filter_price_start}}">
        <input type="hidden" name="filter_price_end" id="filter_price_end" value="{{$filter_price_end}}">
    </form>
@endsection
@push('slider')
<script src="{{asset('frontend/assets/js/plugins/slider-range.js')}}"></script>
@endpush
@push('script')
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
@endpush
