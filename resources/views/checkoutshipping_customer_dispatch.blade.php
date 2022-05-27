 @extends('frontend.layout.master')

@section('content')

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

			<div class="page-header">
				<div class="container">
					<h1>Checkout</h1>
				</div><!-- End .container -->
			</div><!-- End .page-header -->

			<div class="container">
				<ul class="checkout-progress-bar">
					<li class="active">
						<span>Shipping</span>
					</li>
					<li>
						<span>Review &amp; Payments</span>
					</li>
				</ul>
				<div class="row row-sparse">
					<div class="col-lg-8 padding-right-lg">
						<ul class="checkout-steps">
							<li>
								<h2 class="step-title">Shipping Address</h2>

								<!--  -->

								<form action="{{route('shippingcheckout',$total)}}" method="post"enctype="multipart/form-data">
									@csrf
									<div class="form-group required-field">
										<label> Name </label>
										<input type="text" class="form-control" name="naam" required>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label>Address</label>
										<input type="text" class="form-control"name="address" required>
									</div><!-- End .form-group -->
                               <div class="row">
                               	<div class="col-4">
								<div class="form-group">
                                    <label for="deal_for">City</label>
                                    <select class="form-control @error('city') is-invalid @enderror" id="city" name="city">
                                        <option selected disabled> Select Deal For </option>
                                    @php

                                    $cities = App\Models\City::all();
                                     @endphp
                                     @foreach($cities as $city)
                 <option value="{{$city->id}}">{{$city->name}} </option>
                                      @endforeach
                                        
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
<div class="col-4">
                                	<div class="form-group required-field">
										<label>District </label>
										<input type="text" class="form-control"name="district" required>
									</div>
								</div>

								<div class="col-4">

										<div class="form-group required-field">
										<label>Tehsil </label>
										<input type="text" class="form-control"name="tehsil" required>
									</div>
								</div>

							</div>

									<div class="form-group required-field">
										<label>Near By Location </label>
										<input type="text" class="form-control"name="nearlocation" required>
										
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label>Contact No  </label>
										<input type="number" class="form-control"name="contactno" required>
									</div><!-- End .form-group -->

								

									<div class="form-group required-field">
										<label>Special Delivery Instruction </label>
										<input type="text" class="form-control"name="deliveryinstruction" required>
									</div><!-- End .form-group -->

  <div class="row">
  	<div class="col-6">

  	<div class="form-group-custom-control">
								
						<label for="deal_for">Far_Fetched_Town</label>
                                    <select class="form-control @error('far') is-invalid @enderror" id="far" name="far">
                                       
                                  
                                    
                 <option value="1">Yes </option>
                 <option value="0">No </option>
                                     
                                        
                                    </select>		<!-- End .custom-checkbox -->
							</div><!-- End .form-group -->
</div>

<div class="col-6">
	<div class="form-group-custom-control">
								
						<label for="deal_for">Urgent Delivery</label>
                                    <select class="form-control @error('urgent') is-invalid @enderror" id="urgent" name="urgent">
                                       
                                  
                                    
                 <option value="1">Yes </option>
                 <option value="0">No </option>
                                     
                                        
                                    </select>		<!-- End .custom-checkbox -->
							</div>
	</div>
</div>
   


  	
  	

  </br>

  


<div class="form-group required-field">
										<label>Delivery Required Before </label>
										<input type="date" class="form-control" name="deliveryrequire"required>
									</div>

									<!-- <div class="form-group required-field">
										<label>Total Amount </label>
										<h4>$ {{$total}}</h4>
									</div> -->


									<div class="form-group required-field">
										<label>Amount to be charged to Customer   </label>
										<input type="text" class="form-control" name="amountcharge"required>
									</div>


									<div class="form-group required-field">
										<label>Reseller Profit </label>
										<input type="text" class="form-control" name="resellerprofit"required>
									</div>


<div class="row">
	<div class="col-6">
									<div class="form-group required-field">
										<label>Advance Payment </label>
										<input type="text" class="form-control" name="advancepayment"required>
									</div>
								</div>

								<div class="col-md-6 form-group mb-3">
                                    <label for="riderimage">Transfer Slip Screen-Shot</label>
                                    <input type="file" id="file-input"    name="img1" class="form-control form-control @error('img1') is-invalid @enderror"  value="" autocomplete="img1" autofocus/>
                                    @error('img1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

</div>


									<div class="form-group required-field">
										<label>Refundable Amount After Delivery </label>
										<input type="text" class="form-control" name="refundableamount"required>
									</div>

									<div class="form-group-custom-control">
								
						<label for="deal_for">Adjust Advance payment from Commission Balance </label>
                                    <select class="form-control @error('far') is-invalid @enderror" id="far" name="advancecommission">
                                       
                                  
                                    
                 <option value="1">Yes </option>
                 <option value="0">No </option>
                                     
                                        
                                    </select>		<!-- End .custom-checkbox -->
							</div>

@php $user_id = Auth::user()->id;
     $user_role = Auth::user()->name;
@endphp
										<input type="hidden" name="userid"value={{$user_id}}>


										<input type="text" name="userrole"value={{$user_role}}>


										<div class="form-group-custom-control">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
									<label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
								</div><!-- End .custom-checkbox -->
							</div><!-- End .form-group -->

									

									<button class="btn btn-primary float-right">CHECK-OUT</button>

									<!-- <div class="form-group">
										<label>Country</label>
										<div class="select-custom">
											<select class="form-control">
												<option value="USA">United States</option>
												<option value="Turkey">Turkey</option>
												<option value="China">China</option>
												<option value="Germany">Germany</option>
											</select>
										</div> -->
									<

									
								</form>
							</li>

							
						</ul>
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="order-summary">
							<h3>Summary</h3>

							<h4>
								<a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">2 products in Cart</a>
							</h4>

							<div class="collapse" id="order-cart-section">
								<table class="table table-mini-cart">
									<tbody>
										<tr>
											<td class="product-col">
												<figure class="product-image-container">
	<a href="product.html" class="product-image">
														<img src="assets/images/products/product-1.jpg" alt="product">
													</a>
												</figure>
												<div>
													<h2 class="product-title">
														<a href="product.html">Running Sneakers</a>
													</h2>

													<span class="product-qty">Qty: 4</span>
												</div>
											</td>
											<td class="price-col">$17.90</td>
										</tr>

										<tr>
											<td class="product-col">
												<figure class="product-image-container">
													<a href="product.html" class="product-image">
														<img src="assets/images/products/product-2.jpg" alt="product">
													</a>
												</figure>
												<div>
													<h2 class="product-title">
														<a href="product.html">Men's Apt</a>
													</h2>

													<span class="product-qty">Qty: 4</span>
												</div>
											</td>
											<td class="price-col">$7.90</td>
										</tr>
									</tbody>	
								</table>
							</div><!-- End #order-cart-section -->
						</div><!-- End .order-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->

				<!-- <div class="row row-sparse">
					<div class="col-lg-8">
						<div class="checkout-steps-action">
							<a href="{{url('checkoutreview')}}" class="btn btn-primary float-right">CHECK-OUT</a>
						</div>
					</div>
				</div> -->
				<!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->
@endsection