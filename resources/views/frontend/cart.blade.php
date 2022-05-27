@extends('frontend.layout.master')

@section('content')
@php

$userId = auth()->user()->id;
$subTotal = Cart::session($userId)->getSubTotal();
Session::put('oldcart', $subTotal);

@endphp
<h1>{{Session::get('oldcart')}}</h1>
	<main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Men</a></li>
						<li class="breadcrumb-item"><a href="#">Accessories</a></li>
						<li class="breadcrumb-item active" aria-current="page">Classic Crew Neck Sweatshirt</li>
					</ol>
				</div><!-- End .container -->
			</nav>
{{$cartCollection = Cart::getContent()}}
			<div class="page-header">
				<div class="container">
					<h1>Shopping Cart</h1>
				


     @if(Session::has('message'))
}
}
<h4 class="alert {{ Session::get('alert-class', 'alert-info') }}"><b>{{ Session::get('message') }}</b></h4>
@endif
				</div><!-- End .container -->
			</div><!-- End .page-header -->

			<div class="container">
				<div class="row row-sparse">
					<div class="col-lg-8 padding-right-lg">
						<div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="product-col">Product</th>
										<th class="price-col">Price</th>
										<th class="price-col">Size</th>
										<th class="price-col">color</th>
										<th class="price-col">Discounted Price</th>
										<th class="qty-col">Qty</th>
										<th>Subtotal</th>
									</tr>
								</thead>
			
								<tbody>
		

		@foreach($items as $item)

@php
                                        
 $productimages = App\Models\ColourImageProductSize::where('id',$item->id)->get();

 $dealimages = App\Models\deal::where('id',$item->id)->first();
                                         
 @endphp

		<tr class="product-row">
	<td class="product-col">
			
	@php
$colorr =\App\Models\Colour::where('id',$item->color)->first();
@endphp


		<figure class="product-image-container">
@if(isset($colorr))
@forelse ($productimages as $image)
     

<a href="" class="product-image">
		<img src="{{asset('storage/images/productImages/'.$image->image)}}" alt="product">
   </a>
    @break
@empty
    {{-- If for some reason the business has no images, you can put here some kind of placeholder image, using 3rd party services or maybe your own generic image --}}
    
@endforelse

@else

<a href="" class="product-image">
		<img src="{{asset('storage/images/dealimages/'.$dealimages->image_1)}}" alt="product">
   </a>

@endif



	
	  </figure>
	<h2 class="product-title">
	<a href="product.html">{{$item->name}}</a>
	</h2>
	</td>

					
	<td>{{$item->price}}</td>
	@if($item->size=='1')
		<td>Small</td>
		@elseif($item->size=='2')
		<td>Medium</td>
	@elseif($item->size=='3')
		<td>Large</td>
	@elseif($item->size=='4')
		<td>XLarge</td>
		@else 
		<td>- </td>
		@endif
		
		@if(isset($colorr))
		<td><div style="background-color: {{$colorr->colourCode}}; width:25px; height: 25px; font-size: 0;"> </div></td>
     @else 
	 <td>-</td>
		@endif

	
		<td>
	{{$item->attributes->discounted_price}}
</td>


@if(isset($colorr))									
	<td>
	<form action="updateitems/{{$item->id}}" method="post">
	@csrf
	<input class="vertical-quantity form-control" type="text" name ="quantity"value="{{$item->quantity}}"min="1">
	</td>

    <td>{{$item->attributes->discounted_price*$item->quantity}}</td>

	</tr>
	<tr class="product-action-row">
	<td colspan="4" class="clearfix">
    <div class="float-left">
	<a href="#" class="btn-move">Move to Wishlist</a>
	</div><!-- End .float-left -->
											
	<div class="float-right">
	<button type="submit "title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></button>

	</form>
	<a href="deletecartitem/{{$item->id}}" title="Remove product" class="btn-remove icon-cancel"><span class="sr-only">Remove</span></a>
   </div><!-- End .float-right -->
	</td>
	@else
	<td>{{$item->quantity}}</td>
	@endif
	</tr>

									@endforeach
								</tbody>
















<tbody>
		
@php
$cartt = App\Models\cartt::where('user_id', Auth::user()->id)->get();
@endphp
		@foreach($cartt as $cart)



		<tr class="product-row">
	<td class="product-col">
											
		<figure class="product-image-container">


@php
$deal = App\Models\Deal::where('id',$cart->deal_id)->first();
echo $deal->image_1;
@endphp


<a href="" class="product-image">
		<img src="{{asset('storage/images/dealimages/'.$deal->image_1)}}" alt="product">
   </a>





	
	  </figure>
	<h2 class="product-title">
	<a href="product.html">{{$cart->deal_name}}</a>
	</h2>
	</td>

					
	<td>{{$cart->totalprice}}</td>

<td>

	0
</td>
										
	<td>
	  {{$deal->deal}}
	</td>

    <td>{{$cart->totalprice}}</td>

	</tr>
	<tr class="product-action-row">
	<td colspan="4" class="clearfix">
    <div class="float-left">
	<a href="#" class="btn-move">Move to Wishlist</a>
	</div><!-- End .float-left -->
											
	<div class="float-right">
	

	</form>
	<a href="deletecartitem_cart/{{$cart->id}}" title="Remove product" class="btn-remove icon-cancel"><span class="sr-only">Remove</span></a>
   </div><!-- End .float-right -->
	</td>
	</tr>

									@endforeach
								</tbody>



								<tfoot>
									<tr>
		<td colspan="4" class="clearfix">
		<div class="float-left">
		<a href="{{ url('category') }}" class="btn btn-outline-secondary">Continue Shopping</a>
		</div><!-- End .float-left -->

		<div class="float-right">
	<a href="{{route('clearcart')}}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
												<!-- <a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a> -->
			</div><!-- End .float-right -->
										</td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End .cart-table-container -->

				<!-- 		@php

       $cartCollection = Cart::getContent();
      $userId = auth()->user()->id; // or any string represents user identifier
     echo $u = Cart::session($userId)->getContent();
						@endphp -->

						<div class="cart-discount">
							<h4>Apply Discount Code</h4>
							<form action="{{route('promo')}}"method="post">
								@csrf
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" placeholder="Enter discount code"name="promocode"  required>
									<div class="input-group-append">
										<button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
									</div>
								</div><!-- End .input-group -->
							</form>
						</div><!-- End .cart-discount -->
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>Summary</h3>

							<h4>
								<a  class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Order Price</a>
							</h4>

							<div class="collapse" id="total-estimate-section">
								<form action="#">
									<div class="form-group form-group-sm">
										<label>Country</label>
										<div class="select-custom">
											<select class="form-control form-control-sm">
												<option value="USA">United States</option>
												<option value="Turkey">Turkey</option>
												<option value="China">China</option>
												<option value="Germany">Germany</option>
											</select>
										</div><!-- End .select-custom -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-sm">
										<label>State/Province</label>
										<div class="select-custom">
											<select class="form-control form-control-sm">
												<option value="CA">California</option>
												<option value="TX">Texas</option>
											</select>
										</div><!-- End .select-custom -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-sm">
										<label>Zip/Postal Code</label>
										<input type="text" class="form-control form-control-sm">
									</div><!-- End .form-group -->

									<div class="form-group form-group-custom-control">
										<label>Flat Way</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="flat-rate">
											<label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-custom-control">
										<label>Best Rate</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="best-rate">
											<label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->
								</form>
							</div><!-- End #total-estimate-section -->

@php
$sumdiscount = 0;
foreach($items as $item)
{
   $sumdiscount+= $item->attributes->discounted_price*$item->quantity;
}

@endphp
							<table class="table table-totals">
								<tbody>
									<tr>

			<td>Subtotal</td>
			@php
		
			Cart::getContent()->count();
		    $userId = auth()->user()->id;
			$subTotal = Cart::session($userId)->getTotal();
			@endphp
		    <td>${{$subTotal}}</td>
			</tr>

			<tr>
			<td>Tax</td>
			<td>$0.00</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
					<td>Order Total</td>
					@php
					$total = Cart::session($userId)->getSubTotal();
					@endphp
					<td>${{$total}}</td>
					</tr>
					</tfoot>
					</table>
<h4>
								<a  class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">General and Other Deals & Discounts/Offers for Customers</a>
							</h4>

							<table class="table table-totals">
								<tbody>
									<tr>

			<td>Subtotal</td>
			@php
		
			Cart::getContent()->count();
		    $userId = auth()->user()->id;
			$subTotal = Cart::session($userId)->getSubTotal();
			@endphp
		    <td>${{$subTotal}}</td>
			</tr>

			<tr>
			<td>Tax</td>
			<td>$0.00</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
					<td>Order Total</td>
					@php
					$total = Cart::session($userId)->getTotal();
					@endphp
					<td>${{$total}}</td>
					</tr>
					</tfoot>
					</table>



		<h4>
								<a  class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Order Price after General and Other Deals & Discounts/ Offer for Customer </a>
							</h4>

							<table class="table table-totals">
								<tbody>
									<tr>

			<td>Subtotal</td>
			@php
		
			 Cart::getContent()->count();

			 @endphp
	


		    
		    <td>${{$sumdiscount}}</td>
			</tr>

			<tr>
			<td>Tax</td>
			<td>$0.00</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
					<td>Order Total</td>
					
					<td>${{$sumdiscount}}</td>
					</tr>
					</tfoot>
					</table>			
							<div class="checkout-methods">
								<a href="checkoutshipping/{{$sumdiscount}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
								<a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
							</div><!-- End .checkout-methods -->
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->

		@endsection
