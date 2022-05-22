
@extends('frontend.layout.master')

@section('content')
@php
 $invoice  = App\Models\orderdetail::where('id',$last)->first(); 
@endphp
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<center>
            	<h1> Invoice</h1>
            </center>
                <div class="upper p-4">
                    <div class="d-flex justify-content-between">
                        <div class="amount"> <span class="text-primary font-weight-bold">Total Amount</span>
                            <h4>Rs {{$invoice->totalamount+$invoice->deliverycharges}}</h4> <small>Thursday,September 24th</small>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div class="add"> <span class="font-weight-bold d-block">8556 W Purdue Ave</span> <span class="font-weight-bold d-block">Peoria, AZ 98984</span> <small>3 bed2.5 both,2.343 ft'</small> </div> <img src="https://i.imgur.com/HKne8Oc.jpg" width="60" class="rounded-circle">
                        </div>
                    </div>
                    <hr>
                    <div class="delivery">
                    	<center>
                    	<h4>Payment </h4>
                    	</center>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><b>Order Price</b></span> </div> <span class="font-weight-bold">{{$invoice->totalamount}}</span>
                        </div>
                    </div>
                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><b>Discount/Offer</b></span> </div> <span class="font-weight-bold"> 0-30 days</span>
                        </div>
                    </div>
                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><b>Delivery Charges</b> </span> </div> <span class="font-weight-bold">{{$invoice->deliverycharges}}</span>
                        </div>
                    </div>

                      

                      <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><b>Advance Payment </b></span> </div> <span class="font-weight-bold">{{$invoice->advancepayment}}</span>
                        </div>
                    </div>
                      <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><b>Advance Payment Slip </b></span> </div> <span class="font-weight-bold">{{$invoice->advancepayment_transfer_slip}}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="transaction mt-2">
                    	<center>
                    	<h4> Your Details/Delivery Address</h4>
                    </center>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">Name</span> </div> <span class="font-weight-bold">{{$invoice->name}}</span>
                        </div>
                    </div>
                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">Address</span> </div> <span class="font-weight-bold">{{$invoice->address}}</span>
                        </div>
                    </div>
                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">City </span> </div> <span class="font-weight-bold">{{$invoice->city}}</span>
                        </div>
                    </div>

                      <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">District </span> </div> <span class="font-weight-bold">{{$invoice->district}}</span>
                        </div>
                    </div>

                     <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">Tehsil </span> </div> <span class="font-weight-bold">{{$invoice->tehsil}}</span>
                        </div>
                    </div>

                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">Far-Fetched Town/Location  </span> </div> <span class="font-weight-bold">{{$invoice->far_fetched_town}}</span>
                        </div>
                    </div>

                       <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2">Contact # </span> </div> <span class="font-weight-bold">{{$invoice->contactno}}</span>
                        </div>
                    </div>
                </div>



                    <div class="transaction mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"> <i class="fa fa-check-circle-o"></i> <span class="ml-2"><a href="{{route('accept',$invoice->id)}}" class="btn btn-primary float-right">PROCEED</a> </span> </div>
      <span class="font-weight-bold"><a href="{{route('decline',$invoice->id)}}" class="btn btn-primary float-right">DECLINE</a></span>
                        </div>
                    </div>




                    


                  
   


                <div class="lower bg-primary p-4 py-5 text-white d-flex justify-content-between">
                    <div class="d-flex flex-column"> <span>Cost including service charges</span> <small>This nuber may change depending on replair and your home conditions</small> </div>
                    <h3 style="color:white;">Rs {{$invoice->totalamount+$invoice->deliverycharges}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection