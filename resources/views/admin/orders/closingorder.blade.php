@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">






 <div class="card-title mb-2">Order Closing</div>
                        <form class="forms-sample" method="POST" action="{{ route('closeorder_post') }}" enctype="multipart/form-data">
                            @csrf()
                           

                                      
                                                          
                                                             
                                         <div class="row">   
                                         <div class="col-4">
                                         	<div class="card-title mb-3">Order# :{{$order->id}} </div>
                                         </div>   
                                         <div class="col-4">
                                         	<div class="card-title mb-3">Order Date : {{$order->created_at}} </div>
                                         </div>   
                                         <div class="col-4">
                                         	<div class="card-title mb-3">Customer/Reseller : {{$order->name}}</div>
                                         </div>           

                           <div class="col-12">
                                         	
                                         </div>   
                         
                                                     <div class="col-md-6 form-group mb-3">
                                    <label for="description">Actual Delivery Charges</label>
                                    <input type="text"  name="actual_dc" class="form-control form-control @error('actual_dc') is-invalid @enderror" id="description" type="text" placeholder="Enter Actual Delivery Charges" value="" autocomplete="actual_dc" autofocus />
                                    @error('actual_dc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                                 <div class="col-md-6 form-group mb-3">
                                    <label for="description">Courier Invoice # / Loadsheet # </label>
                                    <input type="text"  name="courierloadsheet_number" class="form-control form-control @error('courierloadsheet_number') is-invalid @enderror" id="description" type="text" placeholder="Enter Number" value="" autocomplete="courierloadsheet_number" autofocus />
                                    @error('courierloadsheet_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                               

<input type="hidden" name="productorderid" value="{{$id}}">

<input type="hidden" name="orderid" value="{{$order->id}}">

<!-- <input type="text" name="cosign">
<input type="text" name="city">
<input type="text" name="tehsil">
<input type="text" name="district"> -->

                                                     <div class="col-md-12 form-group mb-3">

                       <button type="submit" class="btn btn-primary">Close Order</button>  
                                   
                                </div>

                            </div>

                            </form>


@endsection