@extends('frontend.layout')
@section('page_title','Shop Filter')

@section('container')
<body>
    <main class="main">
        <div class="container mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="shop-product-fillter pt-2">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{$count}}</strong> items for you!</p>
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
                </div>
            </div>
        </div>
    </main>
@push('script')
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
@endpush
@endsection