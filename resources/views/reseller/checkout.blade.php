@extends('reseller.layouts.master')
@section('content')
    <input type="hidden" value="{{ $activePage = 'cartIndex' , $title='Reseller Checkout - Nafia Garments' }}">

    <div class="main-content">
        <div class="breadcrumb">
            <h1>CHECKOUT</h1>
        </div>

        @php $user_id = auth()->user()->id @endphp

        @php $reseller_id = \App\Models\ResellerUser::where('user_id',$user_id)->first() @endphp

        @php $reseller = \App\Models\Reseller::where('id',$reseller_id->reseller_id)->first() @endphp

        <div class="row">
            <div class="col-md-12">
                <form class="forms-sample" method="POST" action="{{ route('order') }}">
                    @csrf()
                    <input type="hidden" name="reseller_cart" value="reseller_cart">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">1. BILLING INFOMATIONS</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="customerName">Name</label>
                                    <input type="text"  name="name" class="form-control form-control @error('name') is-invalid @enderror" id="customerName  " type="text" placeholder="Enter your Customer name" value="{{ $reseller->name }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="resellerEmail">Email</label>
                                    <input type="email"  name="email" class="form-control form-control @error('email') is-invalid @enderror" id="resellerEmail" type="text" placeholder="Enter email" value="{{ $reseller->email }}" readonly autocomplete="email" autofocus />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text"  name="address" class="form-control form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address Here" value="{{ $reseller->address }}" autocomplete="address" autofocus/>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                @php $countries = \App\Models\Country::all() @endphp

                                <div class="col-md-4 form-group mb-3">
                                    <label for="country">Country</label>
                                    <select class="input form-control @error('country') is-invalid @enderror" name="country" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">
                                                {{$country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group mb-3">
                                    <label for="state">Province</label>
                                    <select class="input form-control @error('state') is-invalid @enderror" name="state" id="state"></select>
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group mb-3">
                                    <label for="city">City</label>
                                    <select class="input form-control @error('city') is-invalid @enderror" name="city" id="city"></select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="customerContact">Postal Code</label>
                                    <input type="text"  name="postal_code" class="form-control form-control @error('postal_code') is-invalid @enderror" id="postal_code" placeholder="Enter postal code" value="{{ old('postal_code') }}" autocomplete="postal_code" autofocus/>
                                    @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="customerContact">Contact Number</label>
                                    <input type="text"  name="contact" class="form-control form-control @error('contact') is-invalid @enderror" id="customerContact" placeholder="Enter contact number" value="{{ $reseller->contact }}" autocomplete="contact" autofocus/>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>

                    <!-- Payment Information section -->

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">2. PAYMENT INFORMATION</div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="radio_button_1">
                                    <input checked="" class="@error('cod') is-invalid @enderror" name="cod" value="cash on delivery" id="radio_button_1" type="radio">
                                    Cash On Delivery
                                </label>
                                @error('cod')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Order Information section -->

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">3. ORDER REVIEW</div>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Unit price</th>
                                    <th>Discount</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Auth::check())

                                    @php $user_id = Auth::user()->id @endphp

                                    @php $cart = \App\Models\ResellerCart::where('user_id',$user_id)->get() @endphp


                                        @php $total_price = 0; @endphp
                                        @php $total_single_product = 0; @endphp
                                        @php $pack_of_two = 0; @endphp
                                        @php $pack_of_three = 0; @endphp
                                        @php $pack_of_two_discount = 0; @endphp
                                        @php $pack_of_three_discount = 0; @endphp
                                        @php $delivery_charges = 0; @endphp
                                        @php $buy_one_get_one_discount = 0; @endphp
                                        @php $free_delivery = 0; @endphp
                                        @php $general_product_discount = 0; @endphp
                                        @php $general_category_discount = 0; @endphp
                                        @php $offer_promo_code_discount = 0; @endphp
                                        @php $discount = 0; @endphp
                                        @foreach($cart as $c)
                                            <tr>

                                                @php $product = \App\Models\Product::where('id',$c->product_id)->first() @endphp

                                                @php $product_img = \App\Models\ColourImageProductSize::where('product_id',$product->id)
                                                        ->where('colour_id',$c->colour_id)
                                                        ->where('size_id',$c->size_id)
                                                        ->first()
                                                @endphp

                                                <td class="cart_product">
                                                    <a href="#"><img
                                                            src="{{ asset('storage/images/productImages/'.$product_img->image) }}"
                                                            alt="Product"></a>
                                                </td>
                                                <td class="cart_description">
                                                    <p class="product-name"><a href="#">{{ $product->name }}</a></p>
                                                    <small class="cart_ref">SKU : {{ $product->sku_code }}</small><br>
                                                    @php $colour = \App\Models\Colour::where('id',$c->colour_id)->first() @endphp
                                                    <small> Color : {{ $colour->colourCode }}</small><br>
                                                    <div
                                                        style="background-color: {{ $colour->colourCode }}; width:25px; height: 25px; font-size: 0;"></div>
                                                    @php $size = \App\Models\Size::where('id',$c->size_id)->first() @endphp
                                                    <small><a href="#">Size : {{ $size->sizeName }}</a></small>
                                                </td>
                                                <td class="price"><span>{{$product->list_price_for_salesman}} Rs/-</span></td>
                                                @for($i=0;$i<$c->quantity;$i++)

                                                    @php $total_single_product = $total_single_product + $product->list_price_for_salesman @endphp

                                                @endfor
                                                @php $bool = true; @endphp
                                                @php

                                                    $reseller = \App\Models\ResellerUser::where('user_id',auth()->user())->first();

                                                        if(!is_null($reseller)){

                                                            $reseller = $reseller->id;

                                                    }

                                                    $offer_product = \App\Models\Offer::where('product_id',$product->id)
                                                    ->where('size_id',$size->id)
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                    if(!empty($offer_product) && $offer_product->offer == "Buy One Get One Free"){

                                                        if($c->quantity % 2 == 0 || $c->quantity % 2 == 1){

                                                            $buy_one_get_one_discount = $product->list_price_for_salesman;
                                                        }

                                                        if($c->quantity == 1){

                                                            $c->quantity = 2;

                                                            $c->save();

                                                            $total_single_product = $total_single_product + $product->list_price_for_salesman;

                                                            $buy_one_get_one_discount = $product->list_price_for_salesman;
                                                        }

                                                @endphp
                                                <td> {{ $offer_product->offer }} </td>
                                                @php
                                                    $bool = false;
                                                }
                                                @endphp
                                                @php

                                                    $deal_product = \App\Models\Deal::where('product_id',$product->id)
                                                    ->where('size_id',$size->id)
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                    if(!empty($deal_product) && $deal_product->deal == "pack_of_two"){

                                                        for($i=0;$i<$c->quantity;$i++){

                                                            $pack_of_two++;

                                                            if($pack_of_two == 2){

                                                                $pack_of_two_discount = $pack_of_two_discount + ($product->list_price_for_salesman * ($deal_product->discount / 100));

                                                                $pack_of_two = 0;

                                                            }

                                                        }

                                                @endphp
                                                <td> {{ $deal_product->deal }} </td>
                                                @php
                                                    $bool = false;
                                                }

                                                if(!empty($deal_product) && $deal_product->deal == "pack_of_three"){

                                                    for($i=0;$i<$c->quantity;$i++){

                                                        $pack_of_three++;

                                                        if($pack_of_three == 3){

                                                            $pack_of_three_discount = $pack_of_three_discount + ($product->list_price_for_salesman * ($deal_product->discount / 100));

                                                            $pack_of_three = 0;
                                                        }
                                                    }

                                                @endphp
                                                <td> {{ $deal_product->deal }} </td>
                                                @php
                                                    $bool = false;
                                                }

                                                @endphp

                                                @php
                                                    $general_product = \App\Models\GeneralDiscount::where('product_id',$product->id)
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                    if(!empty($general_product) && $general_product->general_discount == "Product"){

                                                        $general_product_discount = $general_product_discount + ($total_single_product * ($general_product->discount / 100));

                                                @endphp
                                                <td> {{ $general_product->general_discount }} </td>
                                                @php
                                                    $bool = false;
                                                }
                                                @endphp

                                                @php

                                                    $category_product = \App\Models\CategoryProduct::where('product_id',$product->id)->first();

                                                    $general_category = \App\Models\GeneralDiscount::where('category_id',$category_product->category_id)
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                    if(!empty($general_category) && $general_category->general_discount == "Category"){

                                                        $general_category_deal_product = \App\Models\Deal::where('product_id',$product->id)
                                                        ->where('size_id',$size->id)
                                                        ->where('status',1)
                                                        ->where('deal_for','reseller')
                                                        ->where('specific_deal_for',$reseller)
                                                        ->first();

                                                        $general_category_offer_product = \App\Models\Offer::where('product_id',$product->id)
                                                        ->where('size_id',$size->id)
                                                        ->where('status',1)
                                                        ->where('deal_for','reseller')
                                                        ->where('specific_deal_for',$reseller)
                                                        ->first();

                                                        $general_category_product = \App\Models\GeneralDiscount::where('product_id',$product->id)
                                                        ->where('status',1)
                                                        ->where('deal_for','reseller')
                                                        ->where('specific_deal_for',$reseller)
                                                        ->first();

                                                        if(empty($general_category_deal_product) && empty($general_category_offer_product) && empty($general_category_product)){

                                                            $general_category_discount = $general_category_discount + ($product->list_price_for_salesman * ($general_category->discount / 100));

                                                @endphp
                                                <td> {{ $general_category->general_discount }} </td>
                                                @php
                                                    $bool = false;
                                                }
                                            }

                                                @endphp

                                                @php
                                                    $offer_category = \App\Models\offer::where('product_id',$product->id)
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                    if(!empty($offer_category) && $offer_category->offer == "Free Delivery"){

                                                    $offer_category_free_delivery = \App\Models\offer::where('product_id',$product->id)
                                                    ->where('offer','Free Delivery')
                                                    ->where('status',1)
                                                    ->where('deal_for','reseller')
                                                    ->where('specific_deal_for',$reseller)
                                                    ->first();

                                                @endphp
                                                <td> {{ $offer_category->offer }} </td>
                                                @php
                                                    $bool = false;
                                                }
                                                @endphp

                                                @if($bool == true)

                                                    <td> — </td>

                                                @endif
                                                <td class="qty"> {{ $c->quantity }} </td>

                                                <td class="price">
                                            <span>

                                                {{ $total_single_product = $total_single_product - $buy_one_get_one_discount}} Rs/-

                                            </span>
                                                </td>
                                                <td class="action">
                                                    <a href="{{route('reseller_cart.destroy',$c)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i></a>
                                                </td>
                                            </tr>

                                            @for($i=0;$i<$c->quantity;$i++)

                                                @php $total_price = $total_price + $product->list_price_for_salesman @endphp

                                            @endfor

                                            @php $total_price= $total_price - $buy_one_get_one_discount; @endphp

                                            @php $buy_one_get_one_discount=0; @endphp
                                            @php $total_single_product = 0; @endphp

                                        @endforeach

                                        @php
                                            if(session('vouchercode')){

                                                $offer_promo_code_discount = $offer_promo_code_discount + ($total_price * (session('vouchercode')['discount'] / 100));
                                            }
                                        @endphp

                                        @php $discount = $offer_promo_code_discount + $pack_of_two_discount + $pack_of_three_discount + $general_product_discount + $general_category_discount; @endphp


                                        </tbody>
                                <tfoot>
                                <tr>
                                <tr>
                                    <td colspan="3" rowspan="4"></td>
                                    <td colspan="3">Total products (tax incl.)</td>
                                    <td colspan="2">{{ $total_price }} Rs/-</td>
                                    <input type="hidden" name="sub_total_amount" value="{{$total_price }}" />
                                </tr>
                                @php $total_price = $total_price - $discount; @endphp
                                <tr>
                                    @if($offer_promo_code_discount !== 0)
                                        <td colspan="3"> Other Discount + Coupon Discount</td>
                                    @else
                                        <td colspan="3"> Discount </td>
                                    @endif
                                    <td colspan="2">{{ $discount }} Rs/-</td>
                                        <input type="hidden" name="discount" value="{{$discount}}" />
                                </tr>

                                @php
                                    $offer_category = \App\Models\offer::where('product_id',$product->id)
                                    ->where('status',1)
                                    ->first();

                                    if(!empty($offer_category_free_delivery) AND $offer_category_free_delivery->offer == "Free Delivery"){

                                @endphp
                                <tr>
                                    <td colspan="3"> Delivery Charges <Charges></Charges> </td>
                                    <td colspan="2" id=""> 0 Rs/-</td>
                                    <input type="hidden" name="delivery_charges" value="{{0}}" />
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td colspan="2"><strong>{{ $total_price }} Rs/-</strong></td>
                                </tr>
                                <input type="hidden" name="total_amount" value="{{  $total_price }}" />
                                @php
                                    }
                                    else{
                                @endphp
                                <tr id="deliverycharge"> </tr>
                                @php
                                    }
                                @endphp
                                </tr>
                                </tfoot>
                            </table>
                            @endif
                            <div class="col-md-12">
                                <button type="submit" style="float: right" class="btn btn-primary">Place Order</button>
                            </div>
                    </div>
                </div>

                </form>
            </div>
        </div><!-- end of main-content -->
    </div>

@endsection

@section('page_css')

    <link rel="stylesheet" href="{{asset('frontend/css/toastr.css')}}" />

@endsection

@section('page_script')

    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var country_id = this.value;
                $("#state").html('');
                $.ajax({
                    url: "{{url('states')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var state_id = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('cities')}}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('#city').on('change', function () {
                var city_id = this.value;
                $("#deliverycharge").html('');
                $("#deliverychargeafter").empty();
                $.ajax({
                    url: "{{url('citydeliverycharges')}}",
                    type: "POST",
                    data: {
                        city_id: city_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        if(jQuery.isEmptyObject(result.delivery_charges)){
                            $('#deliverycharge').html('<td colspan="3"> Delivery Charges <Charges></Charges> </td>\n' +
                                '                                        <td colspan="2" id="">' + 300 + ' Rs/- </td>');
                            $("#deliverycharge").after('<tr id="deliverychargeafter">\n' +
                                '                                            <td colspan="3"><strong>Total</strong></td>\n' +
                                '                                            <td colspan="2"><strong>' + ({{ $total_price }} + 300) +' Rs/-</strong></td>\n' +
                                '                                        </tr>' +
                                '<input type="hidden" name="total_amount" value="{{  $total_price + 300 }}" />'+
                                '<input type="hidden" name="delivery_charges" value="{{ 300  }}" />');
                        }
                        else{
                            $('#deliverycharge').html('<td colspan="3"> Delivery Charges <Charges></Charges> </td>\n' +
                                '                                        <td colspan="2" id="">' + result.delivery_charges.delivery_charge + ' Rs/- </td>'+
                            '<input type="hidden" name="delivery_charges" value="'+ result.delivery_charges.delivery_charge +'" />');
                            $("#deliverycharge").after('<tr id="deliverychargeafter">\n' +
                                '                                            <td colspan="3"><strong>Total</strong></td>\n' +
                                '                                            <td colspan="2"><strong>' + ({{ $total_price }} + result.delivery_charges.delivery_charge) +' Rs/-</strong></td>\n' +
                                '                                        </tr>' +
                                '<input type="hidden" name="total_amount" value="'+ ({{ $total_price }} + result.delivery_charges.delivery_charge) +'" />');
                        }
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

@endsection
