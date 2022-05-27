@extends('frontend.layout.master')
@section('content')





   @include('frontend.layout.partials.top_side_categories_slider_sidebanner')



            <section class="container">
                <h2 class="section-title ls-n-10 text-center pt-2 m-b-4">Shop By Category</h2>

                <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider">
                    @php
                    $category = App\Models\Category::where('parent_id',0)->get();
                    @endphp  

                    @foreach( $category as $cat) 
                    <div class="product-category">
                        <a href="{{url('category')}}">

                            <figure>
                                <img src="assets/images/categories/category-1.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>{{$cat->title}}</h3>
                                 <h3>{{$cat->id}}</h3>
                                <span><mark class="count">8</mark> products</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-2.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Bags</h3>
                                <span><mark class="count">4</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-3.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Electronics</h3>
                                <span><mark class="count">8</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-4.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Fashion</h3>
                                <span><mark class="count">11</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-5.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Headphone</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-6.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Shoes</h3>
                                <span><mark class="count">4</mark> products</span>
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="product-category">
                        <a href="category.html">
                            <figure>
                                <img src="assets/images/categories/category-1.jpg">
                            </figure>
                            <div class="category-content">
                                <h3>Sunglasses</h3>
                                <span><mark class="count">8</mark> products</span>
                            </div>
                        </a>
                    </div> -->
                </div>
            </section>
  @php
    $menubanner = App\Models\menubanner::all();
     
 @endphp
            <section class="bg-gray banners-section text-center">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner banner banner-sm-vw mb-2">

                                <img src="/images/banner2/{{$menubanner[0]->value}}">
                                <div class="banner-layer banner-layer-bottom text-left">
                                    <h3 class="m-b-2">Sunglasses Sale</h3>
                                    <h4 class="m-b-3">See all and find yours</h4>
                                    <a href="category.html" class="btn  btn-primary" role="button">Shop By Glasses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner banner banner-sm-vw mb-2">
                               <img src="/images/banner2/{{$menubanner[1]->value}}">
                                <div class="banner-layer banner-layer-top ">
                                    <h3 class="mb-0">Cosmetics Trends</h3>
                                    <h4 class="m-b-4">Browse in all our categories</h4>
                                    <a href="category.html" class="btn  btn-primary" role="button">Shop By Cosmetics</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner banner banner-sm-vw mb-2">
                               <img src="/images/banner2/{{$menubanner[2]->value}}">
                                <div class="banner-layer banner-layer-middle">
                                    <h3 class="text-white m-b-1">Fashion Summer Sale</h3>
                                    <h4 class="text-white m-b-4">Browse in all our categories</h4>
                                    <a href="category.html" class="btn btn-light bg-white" role="button">Shop By Fashion</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner banner banner-sm-vw mb-2">
                               <img src="/images/banner2/{{$menubanner[3]->value}}">
                                <div class="banner-layer banner-layer-bottom banner-layer-boxed">
                                    <h3 class="m-b-2">UP TO 70% IN ALL BAGS</h3>
                                    <h4 class="mb-0">Starting at $99</h4>
                                    <a href="category.html" class="btn  btn-primary" role="button">Shop By Bags</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>









            <section class="container pb-3 mb-1">
                <h2 class="section-title ls-n-10 text-center pb-2 m-b-4">Featured Products</h2>

                <div class="row py-4">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-10.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-30%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-11.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-12.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-20%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-1.jpg">
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-2.jpg">
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-3.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-4.jpg">
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-5.jpg">
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-6.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-7.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-40%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-8.jpg">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-10%</span>
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-9.jpg">
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div>
                
                <hr class="mt-3 mb-6">

                <div class="row feature-boxes-container pt-2">
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-earphones-alt"></i>

                            <div class="feature-box-content">
                                <h3 class="text-uppercase">Customer Support</h3>
                                <h5>Need Assistence?</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-credit-card"></i>

                            <div class="feature-box-content">
                                <h3 class="text-uppercase">Secured Payment</h3>
                                <h5>Safe & Fast</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-action-undo"></i>

                            <div class="feature-box-content">
                                <h3 class="text-uppercase">Free Returns</h3>
                                <h5>Easy & Free</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-shipping"></i>

                            <div class="feature-box-content">
                                <h3 class="text-uppercase">Free Shipping</h3>
                                <h5>Orders Over $99</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row .feature-boxes-container-->
            </section>
    <!-- block  service-->
    <div class="container ">
        <div class="block-service-opt1">
            <div class="clearfix">
                @foreach($services as $service)
                    <?php $s = explode("~",$service->value) ?>
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                                <span class="icon {{ $s[2] }}" style="font-size: 3em;"></span>
                        <strong class="title"> {{ $s[0] }} </strong>
                        <span>{{ $s[1] }}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- block  service-->


  

    <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 40px; padding-top:30px;">

       


        <!-- Banner -->
        
       

    </div>

    <!-- block  showcase-->
    

    <!-- block  hot categories-->
    
@endsection

@section('page_css')

    <link rel="stylesheet" href="{{asset('frontend/css/toastr.css')}}" />

@endsection

@section('page_script')

    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

@endsection



