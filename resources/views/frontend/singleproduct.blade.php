@extends('frontend.layout.master')

@section('content')

    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
@if(Auth::user()!=null)
            <ol class="breadcrumb no-hide">
              
            </ol><!-- Block  Breadcrumb-->
@endif

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="product-media media-horizontal">
                                <?php $c_code = null ?>
                                    <?php $colour_cips =  \App\Models\ColourImageProductSize::where('product_id',$product->id)->get() ?>
                                    @foreach($colour_cips as $c)
                                        <?php $colours = \App\Models\Colour::where('id',$c->colour_id)->get()?>
                                        @foreach($colours as $colour)
                                            @if($c_code !== $colour->colourCode)
                                                @if(!empty($single_colour))
                                                        <?php $image_cips_first =  \App\Models\ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$single_colour->id)->first() ?>
                                                    @else
                                                        <?php $image_cips_first =  \App\Models\ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$colour->id)->first() ?>
                                                @endif
                                              
                                                @if(!empty($single_colour))
                                                        <?php $image_cips =  \App\Models\ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$single_colour->id)->get() ?>
                                                    @else
                                                        <?php $image_cips =  \App\Models\ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$colour->id)->get() ?>
                                                @endif
                                                 
                                                <?php $c_code = $colour->colourCode ?>
                                            @endif
                                            @break
                                        @endforeach
                                        @break
                                    @endforeach
                            </div><!-- image product -->
                        </div>


                    </div>

                    <!-- product tab info -->

                
                    <!-- product tab info -->

                    <!-- block-related product -->
                    

                    <!-- block-Upsell Products -->
                 

                </div><!-- Main Content -->

                <!-- Sidebar -->
               
        </div>


    </main><!-- end MAIN -->









































































        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Electronics</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Headsets</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
             @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 main-content">
                        <div class="product-single-container product-single-default">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 product-single-gallery">
                                    <div class="product-slider-container">
                                        <div class="product-single-carousel owl-carousel owl-theme">
                                            <!-- <div class="product-item">
                                                <img class="product-single-image" src="{{ asset('storage/images/productImages/'.$image_cips_first->image) }}" data-zoom-image="assets/images/products/zoom/product-1-big.jpg"/>
                                            </div> -->
                                          <!--   <div class="product-item">
                                                <img class="product-single-image" src="assets/images/products/zoom/product-2.jpg" data-zoom-image="assets/images/products/zoom/product-2-big.jpg"/>
                                            </div> -->
                                           <!--  <div class="product-item">
                                                <img class="product-single-image" src="assets/images/products/zoom/product-3.jpg" data-zoom-image="assets/images/products/zoom/product-3-big.jpg"/>
                                            </div> --> 
                                            @foreach($image_cips as $image)
                                            <div class="product-item">
                                                <img class="product-single-image" src="{{ asset('storage/images/productImages/'.$image->image) }}" data-zoom-image="assets/images/products/zoom/product-4-big.jpg"/>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- End .product-single-carousel -->
                                        <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </div>
                                    <div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
                                        @foreach($image_cips as $image)
                                        <div class="owl-dot">
                                            <img src="{{ asset('storage/images/productImages/'.$image->image) }}"/>
                                        </div>
                                        @endforeach
                                        <!-- <div class="owl-dot">
                                            <img src="assets/images/products/zoom/product-2.jpg"/>
                                        </div> -->
                                       <!--  <div class="owl-dot">
                                            <img src="assets/images/products/zoom/product-3.jpg"/>
                                        </div> -->
                                       <!--  <div class="owl-dot">
                                            <img src="assets/images/products/zoom/product-4.jpg"/>
                                        </div> -->
                                    </div>
                                </div><!-- End .col-lg-7 -->

                                <div class="col-lg-5 col-md-6 product-single-details">
                                    <h1 class="product-title">       {{ $product->name }}</h1>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->

                                        <a href="#" class="rating-link">( 6 Reviews )</a>
                                    </div><!-- End .ratings-container -->

                                    <hr class="short-divider">

                                    <div class="price-box">
                                        <span class="old-price">$81.00</span>
                                        <span class="product-price">$       {{ $product->price }}</span>
                                    </div><!-- End .price-box -->

                                    <div class="product-desc">
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                    </div><!-- End .product-desc -->

                                    <ul class="single-info-list">
                                        <li>AVAILABILITY: <strong>AVAILABLE</strong></li>
                                        <li>SKU: <strong>123456789</strong></li>
                                    </ul>

                                    <div class="product-filters-container">
                                        <div class="product-single-filter">
                                           @if(session('message'))
                                           <div>{{session('message')}}</div>
                                           @endif
                                            <form action="hello" method="post">
                                                @csrf
                                               
                                            <label>Colors:</label>
                                          <!--   <ul class="config-swatch-list">
                                                <li class="active">
                                                    <a href="#" style="background-color: #0188cc;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #ab6e6e;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #ddb577;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #6085a5;"></a>
                                                </li>
                                            </ul> -->
    <select class="input form-control" id="inlineFormCustomSelectPref"name="color"required>
        
    <option selected>Choose Color...</option>

     @foreach($image_cips as $image)
     @php
               $colourrr = App\Models\Colour::where('id',$image->colour_id)->first();
               @endphp
    <option value="{{ $colourrr->id }}" style="background-color:{{ $colourrr->colourCode }};">
 </option>



       @endforeach
  </select>

  <hr class="divider">

<div class="product-action">
  <div class="product-single-filter">
  <label>Quantity:</label>
<input class=" form-control" type="number" name="quantity"max="99"min="1"required>
                                            <!-- <input class=" form-control" type="text" name="userid"> -->
     <input class=" form-control" type="hidden" name="productid"value="{{$product->id}}">

     <input class=" form-control" type="hidden" name="weight"value="{{$product->product_weight}}">
@php


 $discount = App\Models\GeneralDiscount::where('product_id',$product->id)->first();
if(isset($discount))
{
 $discount_decimal = $discount->discount/100;


 
 $dis = $product->price*$discount_decimal;

 $discounted_value = $product->price-$dis;
}
@endphp

@if(isset($discounted_value))
     <input class=" form-control" type="hidden" name="discount"value="{{$discounted_value}}">
@else 
  <input class=" form-control" type="hidden" name="discount"value="{{$product->price}}">
@endif

                                        </div><!-- End .product-single-qty -->

<hr class="divider">
 <div class="product-single-filter">
         <label>Size:</label>
       <select class="input form-control @error('size') is-invalid @enderror" name="size" id="size"placeholder="Select Size"required>
              @php $sizes = App\Models\Size::all();

               @endphp

               @foreach($image_cips as $image)

               @php
               $image_size = App\Models\Size::where('id',$image->size_id)->first();
               @endphp
                                       
                                            <option value="{{$image->size_id}}">
                                                {{$image_size->sizeName}}
                                            </option>
                                      
                @endforeach
                                    </select>
                                </div>

 <input class=" form-control" type="hidden" name="supp"value="{{$product->vendor}}">

                                        <button  class="btn btn-dark add-cart">Add to Cart</button>
                                        </div><!-- End .product-single-filter -->
                                    </div><!-- End .product-filters-container -->

                                   <!--  <hr class="divider"> -->

                                    
                                        <!-- <a href="cart.html" class="btn btn-dark add-cart" title="Add to Cart">Add to Cart</a> -->
                                    
                                </form>
                                    </div><!-- End .product-action -->

                                    <hr class="divider mb-1">

                                    <div class="product-single-share">
                                        <label class="sr-only">Share:</label>

                                        <div class="social-icons mr-2">
                                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                        </div><!-- End .social-icons -->

                                        <a href="{{route('addtowishlist',$product->id)}}" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
                                    </div><!-- End .product single-share -->
                                </div><!-- End .product-single-details -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                        <div class="product-single-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        <ul>
                                            <li><i class="fa fa-check-circle"></i>Any Product types that You want - Simple, Configurable</li>
                                            <li><i class="fa fa-check-circle"></i>Downloadable/Digital Products, Virtual Products</li>
                                            <li><i class="fa fa-check-circle"></i>Inventory Management with Backordered items</li>
                                        </ul>
                                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                                    <div class="product-desc-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <div class="product-tags-content">
                                        <form action="#">
                                            <h4>Add Your Tags:</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm" required>
                                                <input type="submit" class="btn btn-dark" value="Add Tags">
                                            </div><!-- End .form-group -->
                                        </form>
                                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                    </div><!-- End .product-tags-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                    <div class="product-reviews-content">
                                        <div class="row">












<!-- code of review  -->

@php $reviews =  \App\Models\Review::where('product_id',$product->id)->get() @endphp
                                        @php $count = 0 @endphp
                    <div class="card">
                  <div class="card-body">
                  @foreach($reviews as $review)
                 @php $user = \App\Models\User::where('id',$review->user_id)->first() @endphp

              @if(!empty($user))
                <div class="row">
                  <div class="col-md-1">
                 <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                </div>
        <div class="col-md-11">
                      <p style="float: left;">
           <a class="float-left"><strong>{{ $user->name }}</strong></a>
             @for($i=0;$i<$review->rating;$i++)
            <span class="float-right"><i class="fa fa-star" style="color: #ff9900"></i></span>
             @endfor
        </p>
    <p class="text-secondary" style="float: right;">{{ $review->created_at->diffForHumans() }}</p>

            <div class="clearfix"></div>
             <p> {{ $review->comment }} </p>
            @if(Auth::check())
           @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('review reply'))
         <p>
         <a class="float-right btn btn-outline-primary ml-2" id="show_reply{{$count}}"> <i class="fa fa-reply"></i> Reply</a>
        </p>
         @endif
     @endif
    </div>
 </div>
  @endif


        <div class="card card-inner" style="display: none" id="show{{$count}}">
     <div class="card-body">
    <div class="row">
 <div class="col-md-1"></div>
     <div class="col-md-6">
     <form accept-charset="UTF-8" action="{{ route('reply') }}" method="post">
     @csrf
 <input type="hidden" name="review" value="{{$review->id}}">
<textarea class="form-control animated" cols="50" name="reply" placeholder="Enter your reply here..." rows="1"></textarea>

    <div class="text-right" style="margin-top: 10px; margin-bottom: 10px">
     <input class="btn btn-danger btn-sm" type="reset" value="Reset" />
    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
      @php $count++ @endphp
    @php $replies = \App\Models\ReviewReply::where('id',$review->id)->get() @endphp
      @foreach($replies as $reply)
     @php $user = \App\Models\User::where('id',$reply->user_id)->first() @endphp
 @if(!empty($user))
            <div class="card card-inner">
            <div class="card-body">
        <div class="row">
         <div class="col-md-1">
           <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
    </div>
  <div class="col-md-11">
   <div style="overflow: hidden;">
     <p style="float: left;"><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong> {{ $user->name }}</strong></a></p>
          <p style="float: right;" class="text-secondary">{{ $reply->created_at->diffForHumans() }}</p>
         </div>
                    <p>{{ $reply->reply }}</p>
            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>








<!-- end code review -->











                                            <div class="col-xl-7">
                                                <h2 class="reviews-title">       {{ $product->name }}</h2>

                                                <ol class="comment-list">
                                                    <li class="comment-container">
                                                        <div class="comment-avatar">
                                                            <img src="assets/images/avatar/avatar1.jpg" width="65" height="65" alt="avatar"/>
                                                        </div><!-- End .comment-avatar-->

                                                        <div class="comment-box">
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->

                                                            <div class="comment-info mb-1">
                                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                            </div><!-- End .comment-info -->

                                                            <div class="comment-text">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                            </div><!-- End .comment-text -->
                                                        </div><!-- End .comment-box -->
                                                    </li><!-- comment-container -->

                                                    <li class="comment-container">
                                                        <div class="comment-avatar">
                                                            <img src="assets/images/avatar/avatar2.jpg" width="65" height="65" alt="avatar"/>
                                                        </div><!-- End .comment-avatar-->

                                                        <div class="comment-box">
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->

                                                            <div class="comment-info mb-1">
                                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                            </div><!-- End .comment-info -->

                                                            <div class="comment-text">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                            </div><!-- End .comment-text -->
                                                        </div><!-- End .comment-box -->
                                                    </li><!-- comment-container -->
                                                        
                                                    <li class="comment-container">
                                                        <div class="comment-avatar">
                                                            <img src="assets/images/avatar/avatar3.jpg" width="65" height="65" alt="avatar"/>
                                                        </div><!-- End .comment-avatar-->

                                                        <div class="comment-box">
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->

                                                            <div class="comment-info mb-1">
                                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                            </div><!-- End .comment-info -->

                                                            <div class="comment-text">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                            </div><!-- End .comment-text -->
                                                        </div><!-- End .comment-box -->
                                                    </li><!-- comment-container -->
                                                </ol><!-- End .comment-list -->
                                            </div>

                                            <div class="col-xl-5">
                                                <div class="add-product-review">
                                                    <form action="#" class="comment-form m-0">
                                                        <h3 class="review-title">Add a Review</h3>

                                                        <div class="rating-form">
                                                            <label for="rating">Your rating</label>
                                                            <span class="rating-stars">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>

                                                            <select name="rating" id="rating" required="" style="display: none;">
                                                                <option value="">Rate…</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very poor</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Your Review</label>
                                                            <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                                        </div><!-- End .form-group -->


                                                        <div class="row">
                                                            <div class="col-md-6 col-xl-12">
                                                                <div class="form-group">
                                                                    <label>Your Name</label>
                                                                    <input type="text" class="form-control form-control-sm" required>
                                                                </div><!-- End .form-group -->
                                                            </div>

                                                            <div class="col-md-6 col-xl-12">
                                                                <div class="form-group">
                                                                    <label>Your E-mail</label>
                                                                    <input type="text" class="form-control form-control-sm" required>
                                                                </div><!-- End .form-group -->
                                                            </div>
                                                        </div>

                                                        <input type="submit" class="btn btn-dark ls-n-15" value="Submit">
                                                    </form>
                                                </div><!-- End .add-product-review -->
                                            </div>
                                        </div>
                                    </div><!-- End .product-reviews-content -->
                                </div><!-- End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-single-tabs -->
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-product col-lg-3 mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                        <h4>FREE<br>SHIPPING</h4>
                                    </li>
                                    <li>
                                        <i class="icon-us-dollar"></i>
                                        <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                    </li>
                                    <li>
                                        <i class="icon-online-support"></i>
                                        <h4>ONLINE<br>SUPPORT 24/7</h4>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="widget">
                                <a href="#">
                                    <img src="assets/images/banners/banner-sidebar.jpg" class="w-100" alt="Banner Desc">
                                </a>
                            </div><!-- End .widget -->

                            <div class="widget widget-featured">
                                <h3 class="widget-title">Featured</h3>
                                
                                <div class="widget-body">
                                    <div class="owl-carousel widget-featured-products">
                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-1.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-2.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-3.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div><!-- End .featured-col -->

                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-4.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-5.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-6.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h5 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h5>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .ratings-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div><!-- End .featured-col -->
                                    </div><!-- End .widget-featured-slider -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .widget -->
                        </div>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="products-section">
                <div class="container">
                    <h2></h2>

                    <div class="products-slider owl-carousel owl-theme dots-top">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-1.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-3.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-4.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-5.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-6.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-1.jpg">
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
                                </div><!-- End .ratings-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .products-slider -->
                </div><!-- End .container -->
            </div><!-- End .products-section -->
        </main><!-- End .main -->

@endsection


@section('page_css')

    <style>
        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars
        {
            margin: 10px 0;
            font-size: 24px;
            color: #ff9900;
        }

        .card-inner{
            margin-left: 4rem;
        }
    </style>

    <link rel="stylesheet" href="{{asset('frontend/css/toastr.css')}}" />

@endsection


@section('page_script')

    <script>

        (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

        var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

        $(function(){

            $('#new-review').autosize({append: "\n"});

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value){
               ratingsField.val(value);
            });
        });

    </script>

    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

    <script>

        $(document).ready(function(){
            for (let i=0; i < {{$count}}; i++) {
                $("#show_reply"+i).on('click', function () {
                    $("#show"+i).toggle();
                });
            }


        });

    </script>









@endsection
