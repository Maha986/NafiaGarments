<div class="header-content">
    <div class="container">

        <div class="row">

            <div class="col-md-3 nav-left">

            <?php $logo = DB::table('home_settings')
                ->where([
                    ['key', '=', 'logo'],
                    ['status', '=', 1],
                ])->first();

            if(!empty($logo)){

                $logo = $logo->value;
            }
            ?>

                <!-- logo -->
                <strong class="logo">
                    <a href="{{ '/' }}"><img src="{{asset('storage/images/logos/'.$logo)}}" alt="logo"></a>
{{--                    <a href="#"><img src=" {{asset('frontend/images/media/index1/logo.png')}}" alt="logo"></a>--}}
                </strong>

            </div>

            @if(Auth::check())

                @php $user_id = Auth::user()->id @endphp

                @php $cart = \App\Models\Cart::where('user_id',$user_id)->get() @endphp

            @endif

            <div class="nav-right">

                <!-- block mini cart -->
                <div class="block-minicart dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="cart-icon"></span>
                        <span class="counter qty">
                            <span class="cart-text">Shopping Cart</span>
                            <span class="counter-number">@if(Auth::check()) {{ count($cart) }} @else 0 @endif</span>
{{--                            class="counter-label"--}}
                            <span> @if(Auth::check()) {{ count($cart) }} @else 0 @endif <span>Items</span></span>
{{--                            <span class="counter-price">--}}
{{--                                @if(Auth::check())--}}

{{--                                        @php $total_price = 0; @endphp--}}

{{--                                        @foreach($cart as $c)--}}

{{--                                            @php $product = \App\Models\Product::where('id',$c->product_id)->first() @endphp--}}

{{--                                                @for($i=0;$i<$c->quantity;$i++)--}}

{{--                                                    @php $total_price = $total_price + $product->price @endphp--}}

{{--                                                @endfor--}}

{{--                                        @endforeach--}}

{{--                                        {{ $total_price }}--}}

{{--                                    @else--}}
{{--                                        0.00--}}
{{--                                @endif--}}
{{--                            </span>--}}
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <form>
                            <div  class="minicart-content-wrapper" >
                                <div class="subtitle">
                                    You have @if(Auth::check()) {{ count($cart) }} @else 0 @endif item(s) in your cart
                                </div>
                                <div class="minicart-items-wrapper">
                                    <ol class="minicart-items">
                                        @if(Auth::check())

                                            @php $total_single_product = 0; @endphp

                                            @foreach($cart as $c)

                                                @php $product = \App\Models\Product::where('id',$c->product_id)->first() @endphp

                                                @php $product_img = \App\Models\ColourImageProductSize::where('product_id',$product->id)
                                                    ->where('colour_id',$c->colour_id)
                                                    ->where('size_id',$c->size_id)
                                                    ->first()
                                                @endphp

                                            <li class="product-item">
                                                <a class="product-item-photo" href="#" title="The Name Product">
                                                    <img class="product-image-photo" src="{{ asset('storage/images/productImages/'.$product_img->image) }}" alt="Product Image">
{{--                                                    <img class="product-image-photo" src=" {{asset('frontend/images/media/index1/minicart.jpg')}}" alt="The Name Product">--}}
                                                </a>
                                                <div class="product-item-details">
                                                    <strong class="product-item-name">
                                                        <a href="#">{{ $product->name }}</a>
                                                    </strong>
                                                    <div class="product-item-price">
    {{--                                                        <span class="price">--}}

    {{--                                                            @for($i=0;$i<$c->quantity;$i++)--}}

    {{--                                                                @php $total_single_product = $total_single_product + $product->price @endphp--}}

    {{--                                                            @endfor--}}

    {{--                                                                {{ $total_single_product }}--}}

    {{--                                                                @php $total_single_product = 0; @endphp--}}

    {{--                                                        </span>--}}
                                                    </div>
                                                    <div class="product-item-qty">
                                                        <span class="label">Qty: </span ><span class="number"> {{ $c->quantity }} </span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                            <a class="action delete" href="{{route('cart.destroy',$c)}}" title="Remove item">
                                                                <span>Remove</span>
                                                            </a>
                                                    </div>
                                                </div>
                                            </li>

                                            @endforeach
                                        @endif
                                    </ol>
                                </div>
                                @if(Auth::check())
{{--                                <div class="subtotal">--}}
{{--                                    <span class="label">Total</span>--}}
{{--                                    <span class="price">{{ $total_price }}</span>--}}
{{--                                </div>--}}
                                    <div class="actions">
                                        <!-- <a class="btn btn-viewcart" href="">
                                                <span>Shopping bag</span>
                                            </a> -->
{{--                                        <button class="btn btn-checkout" type="button" title="Check Out">--}}
{{--                                            <span>Checkout</span>--}}
{{--                                        </button>--}}
                                            <a class="btn btn-checkout" href="{{ route('checkout') }}">
                                                <span>Checkout</span>
                                            </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="nav-mind">

                <!-- block search -->
                <div class="block-search">
                    <div class="block-title">
                        <span>Search</span>
                    </div>
                    <div class="block-content">
                        <div class="categori-search  ">
                            <select data-placeholder="All Categories" class="categori-search-option">
                                <option>All Categories</option>
                                <option>Fashion</option>
                                <option>Tops Blouses</option>
                                <option>Clothing</option>
                                <option>Furniture</option>
                                <option>Bathtime Goods</option>
                                <option>Shower Curtains</option>
                            </select>
                        </div>
                        <div class="form-search">
                            <form>
                                <div class="box-group">
                                    <input type="text" class="form-control" placeholder="i'm Searching for...">
                                    <button class="btn btn-search" type="button"><span>search</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>



