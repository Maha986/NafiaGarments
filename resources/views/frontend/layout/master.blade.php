<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kute-themes.com/html/kuteshop/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2020 16:14:34 GMT -->

<head>
    <title>KuteShop - Multi-Purpose Ecommerce HTML Template</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style CSS -->


    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/icons/favicon.ico')}}">



    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">

    <style>
        /* Navbar links */


        /* Page content */


        /* The sticky class is added to the navbar with JS when it reaches its scroll position */
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: white;
        }

        /* Add some top padding to the page content to prevent sudden quick movement (as the navigation bar gets a new position at the top of the page (position:fixed and top:0) */
        .sticky+.content {
            padding-top: 60px;
        }
    </style>
</head>


<body
    class="cms-index-index index-opt-1 catalog-category-view catalog-product-view catalog-view_op1 page-order page-contact">

    <div class="page-wrapper2" style="padding-top: 5px;"">
        <!-- <nav class="toolbox">
            <div class="toolbox-left">
                <div class="toolbox-item toolbox-sort"> -->
                    <!-- <a href="index-2.html" class="logo">
                        <img src="assets/images/logo.png" alt="Porto Logo">
                    </a> -->
                    <button id="back-button" class="mobile-menu-toggler" type="button" onclick="document.getElementsByClassName('page-wrapper2')[0].style.display='none';
                        ">
                            <i class="icon-back"></i>
                        </button>
                    <nav class="main-nav" style="display: block;">
                        <ul class="menu menu2">
                            <li>
                                <a href="/">Home</a>
                            </li>

                            <li>

                                <a href="{{url('category')}}" class="submenu"> <b
                                        class="caret caret-right"></b>CATEGORIES</a>

                                <ul class="submenu">

                                    @php
                                    $categories = App\Models\Category::where('parent_id','0')->get();
                                    @endphp
                                    @foreach($categories as $cat)
                                    <li><a href="" style="padding-left:10px;" data-toggle="dropdown">
                                            {{$cat->title}}
                                        </a>
                                        @php
                                        $parent = App\Models\Category::where('parent_id',$cat->id)->get();
                                        @endphp



                                        @if($parent!=null)


                                        <ul class="submenu">

                                            @foreach($parent as $par)
                                            <li><a href="{{route('cat.sub',$par->id)}}" style="padding-left:10px;">
                                                    {{$par->title}}
                                                </a>


                                                @php
                                                $parent2 = App\Models\Category::where('parent_id',$par->id)->get();
                                                @endphp


                                                @if($parent!=null)


                                                <ul class="submenu">

                                                    @foreach($parent2 as $par2)
                                                    <li><a href="{{route('cat3', ['id' => $par2->id])}}"
                                                            style="padding-left:10px;">
                                                            {{$par2->title}}
                                                        </a>


                                                    </li>

                                                    @endforeach

                                                </ul>
                                                @else
                                                <p>dd</p>

                                                @endif


                                            </li>

                                            @endforeach

                                        </ul>

                                        @endif
                                    </li>
                                    @endforeach

                                </ul>

                            </li>
                            <li>
                                <a href="product.html">Products</a>
                                <ul class="submenu">
                                    <li>
                                    <a href="#" data-toggle="dropdown">Variations 1</a>
                                    <ul class="submenu">
                                        <li><a href="product.html">Horizontal Thumbs</a></li>
                                        <li><a href="product-full-width.html">Vertical Thumbnails</a></li>
                                        <li><a href="product.html">Inner Zoom</a></li>
                                        <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                        <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" data-toggle="dropdown">Variations 2</a>
                                    <ul class="submenu">
                                        <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                        <li><a href="product-simple.html">Simple Product</a></li>
                                        <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" data-toggle="dropdown">Product Layout Types</a>
                                    <ul class="submenu">
                                        <li><a href="product.html">Default Layout</a></li>
                                        <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                        <li><a href="product-full-width.html">Full Width Layout</a></li>
                                        <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                        <li><a href="product-sticky-both.html">Sticky Both Side Info</a></li>
                                        <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                    </ul>
                                </li>
                                </ul>
                                <!-- <div class="megamenu"> -->
                                <!-- <div class="row"> -->
                                <!-- <div class="column"> -->
                                <!-- <div class="col-lg-3"> -->
                                <!-- <a href="#" class="nolink">Variations 1</a>
                                        <ul class="submenu">
                                            <li><a href="product.html">Horizontal Thumbs</a></li>
                                            <li><a href="product-full-width.html">Vertical Thumbnails</a></li>
                                            <li><a href="product.html">Inner Zoom</a></li>
                                            <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                            <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                        </ul> -->
                                <!-- </div> -->
                                <!-- End .col-lg-4 -->
                                <!-- <div class="col-lg-3"> -->
                                <!-- <a href="#" class="nolink">Variations 2</a>
                                        <ul class="submenu">
                                            <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                            <li><a href="product-simple.html">Simple Product</a></li>
                                            <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                        </ul> -->
                                <!-- </div> -->
                                <!-- End .col-lg-4 -->
                                <!-- <div class="col-lg-3"> -->
                                <!-- <a href="#" class="nolink">Product Layout Types</a>
                                        <ul class="submenu">
                                            <li><a href="product.html">Default Layout</a></li>
                                            <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                            <li><a href="product-full-width.html">Full Width Layout</a></li>
                                            <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                            <li><a href="product-sticky-both.html">Sticky Both Side Info</a></li>
                                            <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                        </ul> -->
                                <!-- </div> -->
                                <!-- End .col-lg-4 -->

                                <!-- <div class="col-lg-3 p-0">
                                        <img src="assets/images/menu-bg.png" alt="Menu banner" class="product-promo">
                                    </div> -->
                                <!-- End .col-lg-4  -->
                                <!-- </div> -->
                                <!-- End .row -->
                                <!-- </div> -->
                                <!-- End .megamenu -->
                            </li>

                            <li>
                                <a href="{{route('deals-discount')}}">Deals & Discount</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="#">Dashboard</a>
                                        <ul>
                                            <li><a href="{{route('dasboardcustomer')}}">Dashboard</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="Login.html">Login</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="{{url('blog')}}">Blog</a></li>
                                    <li><a href="Blog_Post.html">Blog Post</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('order') }}">Order</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">My Accounts</a>
                                <ul>

                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Compare</a></li>

                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
                                    @else

                                    @php

                                    $role = Auth::user()->roles->first();

                                    $permissions = \Spatie\Permission\Models\Permission::all();

                                    foreach($permissions as $permission){

                                    $item = DB::table('role_has_permissions')
                                    ->where('permission_id',$permission->id)
                                    ->where('role_id',$role->id)
                                    ->first();

                                    if(!empty($item)){

                                    break;
                                    }
                                    }

                                    if(!empty($item)){

                                    @endphp

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard')
                                            }}</a>
                                    </li>

                                    @php

                                    }
                                    else if($role->name == "reseller"){

                                    @endphp

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('reseller.dashboard') }}">{{ __('Dashboard')
                                            }}</a>
                                    </li>

                                    @php

                                    }
                                    else if($role->name == "salecenter"){

                                    @endphp

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('salecenter.dashboard') }}">{{
                                            __('Dashboard') }}</a>
                                    </li>

                                    @php

                                    }
                                    else if($role->name == "rider"){

                                    @endphp

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('rider.dashboard') }}">{{ __('Dashboard')
                                            }}</a>
                                    </li>

                                    @php

                                    }
                                    else if($role->name == "customer"){

                                    @endphp

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('customer.dashboard') }}">{{ __('My Profile')
                                            }}</a>
                                    </li>

                                    @php

                                    }

                                    @endphp


                                    <li>
                                        <div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>

                                    @endguest
                                </ul>
                            </li>
                            <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                        </ul>
                    </nav>
                <!-- </div>
            </div>
        </nav> -->

    </div>

    <div class="page-wrapper">

        <!-- HEADER -->
        <header class="header header-transparent" id="navbar">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="index-2.html" class="logo">
                            <img src="assets/images/logo.png" alt="Porto Logo">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                <li>

                                    <a href="{{url('category')}}" class="submenu"> <b
                                            class="caret caret-right"></b>CATEGORIES</a>

                                    <ul class="submenu">

                                        @php
                                        $categories = App\Models\Category::where('parent_id','0')->get();
                                        @endphp
                                        @foreach($categories as $cat)
                                        <li><a href="" style="padding-left:10px;" data-toggle="dropdown">
                                                {{$cat->title}}
                                            </a>
                                            @php
                                            $parent = App\Models\Category::where('parent_id',$cat->id)->get();
                                            @endphp



                                            @if($parent!=null)


                                            <ul class="submenu">

                                                @foreach($parent as $par)
                                                <li><a href="{{route('cat.sub',$par->id)}}" style="padding-left:10px;">
                                                        {{$par->title}}
                                                    </a>


                                                    @php
                                                    $parent2 = App\Models\Category::where('parent_id',$par->id)->get();
                                                    @endphp


                                                    @if($parent!=null)


                                                    <ul class="submenu">

                                                        @foreach($parent2 as $par2)
                                                        <li><a href="{{route('cat3', ['id' => $par2->id])}}"
                                                                style="padding-left:10px;">
                                                                {{$par2->title}}
                                                            </a>


                                                        </li>

                                                        @endforeach

                                                    </ul>
                                                    @else
                                                    <p>dd</p>

                                                    @endif


                                                </li>

                                                @endforeach

                                            </ul>

                                            @endif



                                        </li>
                                        @endforeach







                                    </ul>

                                </li>
                                <li>
                                    <a href="product.html">Products</a>
                                    <div class="megamenu megamenu-fixed-width">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href="#" class="nolink">Variations 1</a>
                                                <ul class="submenu">
                                                    <li><a href="product.html">Horizontal Thumbs</a></li>
                                                    <li><a href="product-full-width.html">Vertical Thumbnails</a></li>
                                                    <li><a href="product.html">Inner Zoom</a></li>
                                                    <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                    <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                                </ul>
                                            </div><!-- End .col-lg-4 -->
                                            <div class="col-lg-3">
                                                <a href="#" class="nolink">Variations 2</a>
                                                <ul class="submenu">
                                                    <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                                    <li><a href="product-simple.html">Simple Product</a></li>
                                                    <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                                </ul>
                                            </div><!-- End .col-lg-4 -->
                                            <div class="col-lg-3">
                                                <a href="#" class="nolink">Product Layout Types</a>
                                                <ul class="submenu">
                                                    <li><a href="product.html">Default Layout</a></li>
                                                    <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                    <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                    <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                    <li><a href="product-sticky-both.html">Sticky Both Side Info</a>
                                                    </li>
                                                    <li><a href="product-sticky-info.html">Sticky Right Side Info</a>
                                                    </li>
                                                </ul>
                                            </div><!-- End .col-lg-4 -->

                                            <div class="col-lg-3 p-0">
                                                <img src="assets/images/menu-bg.png" alt="Menu banner"
                                                    class="product-promo">
                                            </div><!-- End .col-lg-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li>





                                <li>
                                    <a href="{{route('deals-discount')}}">Deals & Discount</a>
                                </li>




                                <li>
                                    <a href="#">Pages</a>
                                    <ul>
                                        <!-- <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="#">Checkout</a>
                                            <ul>
                                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                                <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                                <li><a href="checkout-review.html">Checkout Review</a></li>


                                            </ul>
                                        </li>





<li><a href="#">Dashboard</a>
                                            <ul>
                                                <li><a href="dashboard.html">Dashboard</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                            </ul>
                                        </li>












                                        <li><a href="#">Dashboard</a>
                                            <ul>
                                                <li><a href="dashboard.html">Dashboard</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single.html">Blog Post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#" class="login-link">Login</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li> -->

                                        <li><a href="#">Dashboard</a>
                                            <ul>
                                                <li><a href="{{route('dasboardcustomer')}}">Dashboard</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="Login.html">Login</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="{{url('blog')}}">Blog</a></li>
                                        <li><a href="Blog_Post.html">Blog Post</a></li>
                                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ route('order') }}">Order</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">My Accounts</a>
                                    <ul>

                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Compare</a></li>

                                        @guest
                                        @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @endif

                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                        @else

                                        @php

                                        $role = Auth::user()->roles->first();

                                        $permissions = \Spatie\Permission\Models\Permission::all();

                                        foreach($permissions as $permission){

                                        $item = DB::table('role_has_permissions')
                                        ->where('permission_id',$permission->id)
                                        ->where('role_id',$role->id)
                                        ->first();

                                        if(!empty($item)){

                                        break;
                                        }
                                        }

                                        if(!empty($item)){

                                        @endphp

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard')
                                                }}</a>
                                        </li>

                                        @php

                                        }
                                        else if($role->name == "reseller"){

                                        @endphp

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('reseller.dashboard') }}">{{
                                                __('Dashboard') }}</a>
                                        </li>

                                        @php

                                        }
                                        else if($role->name == "salecenter"){

                                        @endphp

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('salecenter.dashboard') }}">{{
                                                __('Dashboard') }}</a>
                                        </li>

                                        @php

                                        }
                                        else if($role->name == "rider"){

                                        @endphp

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('rider.dashboard') }}">{{ __('Dashboard')
                                                }}</a>
                                        </li>

                                        @php

                                        }
                                        else if($role->name == "customer"){

                                        @endphp

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('customer.dashboard') }}">{{ __('My
                                                Profile') }}</a>
                                        </li>

                                        @php

                                        }

                                        @endphp


                                        <li>
                                            <div>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>

                                        @endguest
                                    </ul>
                                </li>
                                <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                            </ul>
                        </nav>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button" onclick="document.getElementsByClassName('page-wrapper2')[0].style.display='inline-block';
                        ">
                            <i class="icon-menu"></i>
                        </button>

                        <a href="{{ route('login') }}" class="header-icon"><i class="icon-user-2"></i> </a>



                        @if($user_id = Auth::user())

                        @php $user_id = Auth::user()->id; @endphp

                        @php $wishlist = App\Models\wishlist::where('user_id',$user_id)
                        ->get();

                        $count = App\Models\wishlist::where('user_id',$user_id)->count();
                        @endphp



                        <div class="dropdown cart-dropdown">



                            <a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-wishlist-2"></i>
                                <span class="cart-count badge-circle">{{$count}}</span>

                            </a>


                            <div class="dropdown-menu">
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-header">
                                        <span>{{$count}} Items</span>

                                        <a href="{{url('viewcart')}}" class="float-right">Your Wishlist</a>

                                    </div><!-- End .dropdown-cart-header -->
                                    @foreach($wishlist as $wish)
                                    <div class="dropdown-cart-products">


                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a
                                                        href="{{route('single_product',$wish->product_name)}}">{{$wish->product_name}}</a>
                                                </h4>

                                                <!--  <span class="cart-product-info">
             <span class="cart-product-qty"></span>
                                                    70
                                                </span> -->
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="assets/images/products/cart/product-2.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                                                <a href="{{ route('deletewishlist',$wish->id) }}"
                                                    class="btn-remove icon-cancel" title="Remove Product"
                                                    id="deleteCompany" data-id="{{ $wish->id }}"></a>

                                                <script>
                                                    $(document).ready(function () {

                                                        $("body").on("click", "#deleteCompany", function (e) {

                                                            if (!confirm("Do you really want to do this?")) {
                                                                return false;
                                                            }

                                                            e.preventDefault();
                                                            var id = $(this).data("id");
                                                            // var id = $(this).attr('data-id');
                                                            var token = $("meta[name='csrf-token']").attr("content");
                                                            var url = e.target;

                                                            $.ajax(
                                                                {
                                                                    url: url.href, //or you can use url: "company/"+id,
                                                                    type: 'DELETE',
                                                                    data: {
                                                                        _token: token,
                                                                        id: id
                                                                    },
                                                                    success: function (response) {

                                                                        $("#success").html(response.message)

                                                                        Swal.fire(
                                                                            'Remind!',
                                                                            'Company deleted successfully!',
                                                                            'success'
                                                                        )
                                                                    }
                                                                });
                                                            return false;
                                                        });


                                                    });
                                                </script>


                                            </figure>
                                        </div><!-- End .product -->

                                    </div><!-- End .cart-product -->

                                    @endforeach



                                    <!-- <div class="dropdown-cart-action">
                     <a href="{{url('checkoutshipping')}}" class="btn btn-primary btn-block">Checkout</a>
                        </div><!- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                        @endif



































                        <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="{{route('all_products_search')}}" method="get">
                                @csrf
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="search" id="q"
                                        placeholder="I'm searching for..." required="">

                                    <button class="btn bg-dark icon-search-3" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div>

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count badge-circle">{{\Cart::getContent()->count()}}</span>

                            </a>























                            <div class="dropdown-menu">
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-header">
                                        <span>{{\Cart::getContent()->count()}} Items</span>

                                        <a href="{{url('viewcart')}}" class="float-right">View Cart</a>
                                    </div><!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">

                                        @foreach(Cart::getContent() as $item)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{$item->name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    x $35.00
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">


                                                @php

                                                $productimages =
                                                App\Models\ColourImageProductSize::where('product_id',$item->id)->get();

                                                @endphp

                                                @forelse ($productimages as $image)
                                                <a href="">

                                                    <img src="{{asset('storage/images/productImages/'.$image->image)}} "
                                                        style="width: 100px;">
                                                </a>

                                                @break

                                                @empty
                                                {{-- If for some reason the business has no images, you can put here
                                                some kind of placeholder image, using 3rd party services or maybe your
                                                own generic image --}}

                                                @endforelse

                                                <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </div><!-- End .product -->
                                        @endforeach
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{url('checkoutshipping')}}"
                                            class="btn btn-primary btn-block">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
        </br></br> </br></br></br>



        <script>
            // When the user scrolls the page, execute myFunction
            window.onscroll = function () { myFunction() };

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        </script>


        <!-- header-top -->
        {{-- @include('frontend.layout.partials.top_header') --}}
        <!-- header-top -->

        <!-- header-content -->
        {{-- @include('frontend.layout.partials.header_content') --}}
        <!-- header-content -->

        <!-- header-nav -->


        <!-- MAIN -->
        <main class="site-main">

            <!--  Popup Newsletter-->
            {{-- <div class="modal fade popup-newsletter" id="popup-newsletter" tabindex="-1" role="dialog">--}}
                {{-- <div class="modal-dialog" role="document">--}}
                    {{-- <div class="modal-content" style="background-image: url(images/media/ind/Popup.jpg);">--}}
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>--}}
                        {{-- <div class="block-newletter">--}}
                            {{-- <div class="block-title">signup for our newsletter & promotions</div>--}}
                            {{-- <div class="block-content">--}}
                                {{-- <p class="text-title">GET <span>50% <span>off</span></span></p>--}}
                                {{-- <form>--}}
                                    {{-- <label>on your next purchase</label>--}}
                                    {{-- <div class="input-group">--}}
                                        {{-- <input type="text" placeholder="Enter your email..."
                                            class="form-control">--}}
                                        {{-- <span class="input-group-btn">--}}
                                            {{-- <button type="button"
                                                class="btn btn-subcribe"><span>Subscribe</span></button>--}}
                                            {{-- </span>--}}
                                        {{-- </div>--}}
                                    {{-- </form>--}}
                                {{-- </div>--}}
                            {{-- <div class="checkbox btn-checkbox">--}}
                                {{-- <label>--}}
                                    {{-- <input type="checkbox"><span>Dont’s show this popup again!</span>--}}
                                    {{-- </label>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}



                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div><!--  Popup Newsletter-->--}}



            @yield('content')

        </main><!-- end MAIN -->

        <!-- FOOTER -->
        <!-- <footer class="site-footer footer-opt-1">

        <div class="container">
            <div class="footer-column">

                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-6 col">
                        <?php $logo = DB::table('home_settings')
                            ->where([
                                ['key', '=', 'logo'],
                                ['status', '=', 1],
                            ])->first();

                        if(!empty($logo)){

                            $logo = $logo->value;
                        }
                        ?>
                        <strong class="logo-footer">
                            <a href="#"><img src="{{asset('storage/images/logos/'.$logo)}}" alt="logo"></a>
{{--                            <a href="#"><img src="images/media/index1/logo-footer.png" alt="logo"></a>--}}
                        </strong>

                        <table class="address">
                            <tr>
                                <td><b>Address:  </b></td>
                                <td>
                                    <?php
                                        $address = DB::table('home_settings')
                                            ->where([
                                                ['key', '=', 'address'],
                                                ['status', '=', 1],
                                            ])->first();

                                        if(!empty($address)){

                                            echo $address->value;
                                        }
                                    ?>
{{--                                    {{ DB::table('home_settings')--}}
{{--                                        ->where([--}}
{{--                                            ['key', '=', 'address'],--}}
{{--                                            ['status', '=', 1],--}}
{{--                                        ])->first()->value }}--}}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Phone: </b></td>
                                <td>
                                    <?php
                                        $phone = DB::table('home_settings')
                                            ->where([
                                                ['key', '=', 'phone'],
                                                ['status', '=', 1],
                                            ])->first();

                                        if(!empty($phone)){

                                            echo $phone->value;
                                        }
                                    ?>
{{--                                    {{ DB::table('home_settings')--}}
{{--                                        ->where([--}}
{{--                                            ['key', '=', 'phone'],--}}
{{--                                            ['status', '=', 1],--}}
{{--                                        ])->first()->value }}--}}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>
                                    <?php
                                        $email = DB::table('home_settings')
                                            ->where([
                                                ['key', '=', 'email'],
                                                ['status', '=', 1],
                                            ])->first();

                                        if(!empty($email)){

                                            echo $email->value;
                                        }
                                    ?>
{{--                                    {{ DB::table('home_settings')--}}
{{--                                        ->where([--}}
{{--                                            ['key', '=', 'email'],--}}
{{--                                            ['status', '=', 1],--}}
{{--                                        ])->first()->value }}--}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-6 col">
                        <div class="links">
                            <h3 class="title">Company</h3>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-6 col">
                        <div class="links">
                            <h3 class="title">My Account</h3>
                            <ul>
                                <li><a href="#">My Order</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">My Credit Slip</a></li>
                                <li><a href="#">My Addresses</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-6 col">
                        <div class="links">
                            <h3 class="title">Support</h3>
                            <ul>
                                <li><a href="#">New User Guide</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Report Spam</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-6 col">
                        <div class="block-newletter">
                            <div class="block-title">NEWSLETTER</div>
                            <div class="block-content">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Your Email Address">
                                        <span class="input-group-btn">
                                            <button class="btn btn-subcribe" type="button"><span>ok</span></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="block-social">
                            <div class="block-title">Let’s Socialize </div>
                            <div class="block-content">
                                <a href="#" class="sh-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="sh-pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                <a href="#" class="sh-vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                <a href="#" class="sh-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="sh-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-methods">
                <div class="block-title">
                    Accepted Payment Methods
                </div>
                <div class="block-content">
                    <img alt="payment" src="images/media/index1/payment1.png">
                    <img alt="payment" src="images/media/index1/payment2.png">
                    <img alt="payment" src="images/media/index1/payment3.png">
                    <img alt="payment" src="images/media/index1/payment4.png">
                    <img alt="payment" src="images/media/index1/payment5.png">
                    <img alt="payment" src="images/media/index1/payment6.png">
                    <img alt="payment" src="images/media/index1/payment7.png">
                    <img alt="payment" src="images/media/index1/payment8.png">
                    <img alt="payment" src="images/media/index1/payment9.png">
                    <img alt="payment" src="images/media/index1/payment10.png">
                </div>
            </div>

            <div class="footer-links">


                <ul class="links">
                    <li><strong class="title">HOT SEARCHED KEYWORDS:</strong></li>
                    <li><a href="#">Xiaomi Mi3 </a></li>
                    <li><a href="#">Digiflip Pro XT 712 Tablet</a></li>
                    <li><a href="#">Mi 3 Phones  </a></li>
                    <li><a href="#">Iphone 6 Plus  </a></li>
                    <li><a href="#">Women's Messenger Bags</a></li>
                    <li><a href="#">Wallets   </a></li>
                    <li><a href="#">Women's Clutches   </a></li>
                    <li><a href="#">Backpacks Totes</a></li>
                </ul>



                <ul class="links">
                    <li><strong class="title">tvs: </strong></li>
                    <li><a href="#">Sony TV  </a></li>
                    <li><a href="#"> Samsung TV  </a></li>
                    <li><a href="#">LG TV  </a></li>
                    <li><a href="#">Panasonic TV  </a></li>
                    <li><a href="#"> Onida TV  </a></li>
                    <li><a href="#"> Toshiba TV  </a></li>
                    <li><a href="#"> Philips TV</a></li>
                    <li><a href="#">Micromax TV</a></li>
                    <li><a href="#">LED TV </a></li>
                    <li><a href="#">  LCD TV  </a></li>
                    <li><a href="#">Plasma TV </a></li>
                    <li><a href="#">3D TV    </a></li>
                    <li><a href="#">Smart TV </a></li>
                </ul>



                <ul  class="links">
                    <li><strong class="title">MOBILES: </strong></li>
                    <li><a href="#">Moto E </a></li>
                    <li><a href="#"> Samsung Mobile </a></li>
                    <li><a href="#">Micromax Mobile</a></li>
                    <li><a href="#">Nokia Mobile </a></li>
                    <li><a href="#"> HTC Mobile </a></li>
                    <li><a href="#">Sony Mobile  </a></li>
                    <li><a href="#"> Apple Mobile  </a></li>
                    <li><a href="#"> LG Mobile  </a></li>
                    <li><a href="#">Karbonn Mobile</a></li>
                </ul>


                <ul class="links">
                    <li><strong class="title">LAPTOPS:</strong></li>
                    <li><a href="#">Apple Laptop  </a></li>
                    <li><a href="#">Acer Laptop </a></li>
                    <li><a href="#">Samsung Laptop</a></li>
                    <li><a href="#">Lenovo Laptop </a></li>
                    <li><a href="#">Sony Laptop</a></li>
                    <li><a href="#">Dell Laptop</a></li>
                    <li><a href="#">Asus Laptop </a></li>
                    <li><a href="#">  Toshiba Laptop</a></li>
                    <li><a href="#">LG Laptop </a></li>
                    <li><a href="#">HP Laptop</a></li>
                    <li><a href="#">Notebook</a></li>
                </ul>



                <ul class="links">
                    <li><strong class="title">WATCHES:</strong></li>
                    <li><a href="#">FCUK Watches</a></li>
                    <li><a href="#">Titan Watches  </a></li>
                    <li><a href="#">  Casio Watches </a></li>
                    <li><a href="#">  Fastrack Watches </a></li>
                    <li><a href="#">Timex Watches </a></li>
                    <li><a href="#">Fossil Watches</a></li>
                    <li><a href="#">Diesel Watches  </a></li>
                    <li><a href="#"> Luxury Watches</a></li>
                </ul>


                <ul class="links">
                    <li><strong class="title">FOOTWEAR: </strong></li>
                    <li><a href="#">Shoes  </a></li>
                    <li><a href="#">Casual Shoes </a></li>
                    <li><a href="#"> Sports Shoes </a></li>
                    <li><a href="#">Formal Shoes </a></li>
                    <li><a href="#"> Adidas Shoes  </a></li>
                    <li><a href="#">Gas Shoes</a></li>
                    <li><a href="#"> Puma Shoes</a></li>
                    <li><a href="#">Reebok Shoes </a></li>
                    <li><a href="#">Woodland Shoes  </a></li>
                    <li><a href="#">Red tape Shoes</a></li>
                    <li><a href="#">Nike Shoes</a></li>
                </ul>

            </div>

            <div class="footer-bottom">
                <div class="links">
                    <ul>
                        <li><a href="#">    Company Info – Partnerships    </a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Online Shopping </a></li>
                        <li><a href="#">Promotions </a></li>
                        <li><a href="#">My Orders  </a></li>
                        <li><a href="#">Help  </a></li>
                        <li><a href="#">Site Map </a></li>
                        <li><a href="#">Customer Service </a></li>
                        <li><a href="#">Support  </a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Most Populars </a></li>
                        <li><a href="#">Best Sellers  </a></li>
                        <li><a href="#">New Arrivals  </a></li>
                        <li><a href="#">Special Products  </a></li>
                        <li><a href="#"> Manufacturers     </a></li>
                        <li><a href="#">Our Stores   </a></li>
                        <li><a href="#">Shipping      </a></li>
                        <li><a href="#">Payments      </a></li>
                        <li><a href="#">Payments      </a></li>
                        <li><a href="#">Refunds  </a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Terms & Conditions  </a></li>
                        <li><a href="#">Policy      </a></li>
                        <li><a href="#">Policy      </a></li>
                        <li><a href="#"> Shipping     </a></li>
                        <li><a href="#">Payments      </a></li>
                        <li><a href="#">Returns      </a></li>
                        <li><a href="#">Refunds      </a></li>
                        <li><a href="#">Warrantee      </a></li>
                        <li><a href="#">FAQ      </a></li>
                        <li><a href="#">Contact  </a></li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                Copyright © Kutethemes. All Rights Reserved. Designed by <a href="http://kutethemes.com/" target="_blank">Kutethemes.com</a>
            </div>

        </div>

    </footer> -->
        <!-- end FOOTER -->

        <footer class="footer">
            <div class="footer-top">
                <div class="container top-border d-flex align-items-center justify-content-between flex-wrap">
                    <div class="footer-left widget-newsletter d-md-flex align-items-center">
                        <div class="widget-newsletter-info">
                            <h5 class="widget-newsletter-title text-uppercase m-b-1">subscribe newsletter</h5>
                            <p class="widget-newsletter-content mb-0">Get all the latest information on Events, Sales
                                and Offers.</p>
                        </div>
                        <form action="#">
                            <div class="footer-submit-wrapper d-flex">
                                <input type="email" class="form-control" placeholder="Email address..." size="40"
                                    required>
                                <button type="submit" class="btn btn-dark btn-sm">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="footer-right">
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div><!-- End .social-icons -->
                    </div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="contact-widget">
                                            <h4 class="widget-title">ADDRESS</h4>
                                            <a href="#">1234 Street Name, City, England</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="contact-widget email">
                                            <h4 class="widget-title">EMAIL</h4>
                                            <a href="mailto:mail@example.com">mail@example.com</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="contact-widget">
                                            <h4 class="widget-title">PHONE</h4>
                                            <a href="#">Toll Free (123) 456-7890</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="contact-widget">
                                            <h4 class="widget-title">WORKING DAYS/HOURS</h4>
                                            <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="links link-parts row">
                                    <div class="link-part col-xl-4">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                    </div>
                                    <div class="link-part col-xl-8">
                                        <li><a href="#">Orders History</a></li>
                                        <li><a href="#">Advanced Search</a></li>
                                    </div>
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title">Main Features</h4>
                                <ul class="links link-parts row">
                                    <div class="link-part col-xl-6">
                                        <li><a href="#">Super Fast WordPress Theme</a></li>
                                        <li><a href="#">1st Fully working Ajax Theme</a></li>
                                        <li><a href="#">33 Unique Shop Layouts</a></li>
                                    </div>
                                    <div class="link-part col-xl-6">
                                        <li><a href="#">Powerful Admin Panel</a></li>
                                        <li><a href="#">Mobile &amp; Retina Optimized</a></li>
                                    </div>
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container top-border d-flex align-items-center justify-content-between flex-wrap">
                    <p class="footer-copyright mb-0 py-3 pr-3">Porto eCommerce. &copy; 2020. All Rights Reserved</p>
                    <img class="py-3" src="assets/images/payments.png" alt="payment image">
                </div>
            </div>
        </footer>

        <!--back-to-top  -->
        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>

    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>

    <!-- sticky -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

    <!-- OWL CAROUSEL Slider -->
    <script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>

    <!-- Boostrap -->
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

    <!-- Countdown -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>

    <!--jquery Bxslider  -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>

    <!-- actual -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.actual.min.js')}}"></script>

    <!-- Chosen jquery-->
    <script type="text/javascript" src="{{asset('frontend/js/chosen.jquery.min.js')}}"></script>

    <!-- parallax jquery-->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.parallax-1.1.3.js')}}"></script>

    <!-- elevatezoom -->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.elevateZoom.min.js')}}"></script>

    <!-- fancybox -->
    <script src="{{asset('frontend/js/fancybox/source/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('frontend/js/fancybox/source/helpers/jquery.fancybox-media.js')}}"></script>
    <script src="{{asset('frontend/js/fancybox/source/helpers/jquery.fancybox-thumbs.js')}}"></script>

    <!-- arcticmodal -->
    <script src="{{asset('frontend/js/arcticmodal/jquery.arcticmodal.js')}}"></script>

    <!-- Main -->
    <script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>

    @yield('page_script')
    <script>
        @if (Session:: has('message'))
        var type = "{{ Session::get('alert-type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}", {
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 80000
                });
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}", {
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    timeOut: 8000
                });
                break;
        }
        @endif

        $(window).resize(()=>{
            if($(window).width()>=991)
            {
                document.getElementsByClassName('page-wrapper2')[0].style.display='none';
    document.getElementsByClassName('page-wrapper')[0].style.transform='translateX(-0px)';
            }
        })
        
    </script>

    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>


    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.min.js')}}"></script>



</body>

<!-- Mirrored from kute-themes.com/html/kuteshop/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2020 16:17:31 GMT -->

</html>