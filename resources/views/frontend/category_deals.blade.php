@extends('frontend.layout.master')

@section('content')

    <!-- MAIN -->

    

   <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-md-4">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container mb-3">
                <div class="row row-sparse">
                    <div class="col-lg-9 main-content">
                        <!-- <div class="category-banner">
                            <img class="slide-bg" src="assets/images/banners/banner-1.jpg" alt="banner" width="1500" height="320">
                            <div class="category-slide-content">
                                <h2 class="m-b-3">Winter Fashion Trends</h2>
                                <h3 class="text-uppercase m-b-4">Up to 30% off on Jackets</h3>

                                <h5 class="text-uppercase d-inline-block mb-0">Starting at<span class="coupon-sale-text"><sup>$</sup>199<sup>99</sup></span></h5>
                                <a href="category.html" class="btn btn-dark btn-xl" role="button">Shop Now</a>
                            </div>
                           
                        </div> -->
                        <!-- End .category-slide -->




   <!-- images categori -->
   @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif


                    <div class="category-view">
                        <div class="owl-carousel "
                             data-nav="true"
                             data-dots="false"
                             data-margin="0"
                             data-items='1'
                             data-autoplayTimeout="700"
                             data-autoplay="true"
                             data-loop="true">
                            <div class="item " >
                                <a href="#"><img src="{{ asset('frontend/images/media/category-images1.jpg') }}" alt="category-images"></a>
                            </div>
                            <div class="item " >
                                <a href="#"><img src="{{ asset('frontend/images/media/category-images2.jpg') }}" alt="category-images"></a>
                            </div>
                        </div>
                    </div><!-- images categori -->

                        <nav class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div><!-- End .select-custom -->

                                    
                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-left -->      

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div><!-- End .layout-modes -->
                            </div><!-- End .toolbox-right -->
                        </nav>






                 <div class="row">
                          
                     




 @foreach($catagories  as $cat)

  


                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">


                                <div class="product-default inner-quickview inner-icon">
                                    <figure>

                                          

                                           



       <a href="{{route('single_product_deals',$cat)}}">
     <img src="{{asset('storage/images/dealimages/'.$cat->image_1)}}" style="height:170px; width:auto; max-width:340px;">
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
                                                <a href="category.html" class="product-category"></a>
                                            </div>
                                        </div>
                                       >

                                        <h2 class="product-title">
                                            <a href="{{route('single_product',$cat)}}"><b>{{$cat->deal}}</b></a>
                                        </h2>
                                    
                                        <h2 class="product-title">
                                            <a href="{{route('single_product',$cat)}}">{{$cat->dealname}}</a>
                                        </h2>
                                   
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->

                                     
                                        <div class="price-box">
                                           
                                               <span class="old-price">${{$cat->price}}</span>
                                      
                                          
                                            <span class="product-price">${{$cat->totalprice}}</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->


                                </div>
                            </div>
@endforeach
                   
                         
                            



                          


                                                      
                            

                           
                            <!--  -->
                           
                            
                        </div>

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .main-content -->

                     <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            
                              <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                            <form action="{{route('pricefilter_all')}}"method="post">
                                            @csrf
                                          
         <div class="price-slider-wrapper">
         <div id="price-slider"></div><!-- End #price-slider -->
             </div><!-- End .price-slider-wrapper -->

         <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">


     <div class="form-group required-field">
                    <label for="contact-email">Price To</label>
                                <input type="number" class="form-control"min="0" id="contact-email" name="start" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="contact-email">Price From</label>
                                <input type="number" class="form-control" id="contact-email" name="end"min="0" required>
                            </div><!-- End .form-group -->

                                              <button class="btn btn-primary float-right">FILTER</button><!-- End .filter-price-text -->
                                            </div><!-- End .filter-price-action -->
                                        </form>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                           <!--  <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Size</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                    
 <li>
    <form action="{{route('sizefilter_all')}}"
    method ="post">
    @csrf
     <input type="hidden" name="sizeid" value="1">
    <button class="btn btn-success ">Small</button>
</form>
</li>

 <li>
    <form action="{{route('sizefilter_all')}}"method ="post">
        @csrf
     <input type="hidden" name="sizeid" value="2">
    <button class="btn btn-success ">Medium</button>
</form>
</li>

 <li>
    <form action="{{route('sizefilter_all')}}"method ="post">
        @csrf
     <input type="hidden" name="sizeid" value="3">
    <button class="btn btn-success ">Large</button>
</form>
</li>

 <li>
    <form action="{{route('sizefilter_all')}}"method ="post">
        @csrf
     <input type="hidden" name="sizeid" value="4">
    <button class="btn btn-success ">Extra Large</button>
</form>
</li>
                                        </ul>
                                    </div>

                                </div>
                              
                            </div>

 -->
                          
















<!-- 

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true" aria-controls="widget-body-6">Color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-6">
                                    <div class="widget-body">
                                        <ul class="config-swatch-list">
                        <li class="active">
                          <a href="#" style="background-color: #1645f3;"></a>
                           <form action="{{route('sizefilter',1)}}"method ="post">
        @csrf

        <input type="hidden" name="colorid" value="1">
                          <button>Blue</button>
                      </form>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #f11010;"></a>
                                                  <form action="{{route('colorfilter',1)}}"method ="post">
        @csrf

        <input type="hidden" name="colorid" value="2">
                          <button>Red</button>
                      </form>
                                            </li>
                                <li>
                     <a href="#" style="background-color: #fe8504;"></a>
                                                 <form action="{{route('colorfilter',1)}}"method ="post">
        @csrf

        <input type="hidden" name="colorid" value="3">
                          <button>Orange</button>
                      </form>
                                            </li>
                                            <li>
             <a href="#" style="background-color: #2da819;"></a>
                                                  <form action="{{route('colorfilter',1)}}"method ="post">
        @csrf

        <input type="hidden" name="colorid" value="4">
                          <button>Green</button>
                      </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main><!-- End .main -->


@endsection
