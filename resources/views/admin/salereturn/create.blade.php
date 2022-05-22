@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'saleCenterIndex', $title = 'Create Sale Center - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Sale Returns</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Sale Return</div>
                        <form class="forms-sample" method="POST" action="{{ route('salereturn.store') }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                
                                <!-- <div class="col-md-6 form-group mb-3">
                                  <label>Order </label>                    

                                  <select class="form-control" name="ordername"required>
                        <option selected disabled> Select Order </option>
                  
@php  $orders = App\Models\orderdetail::all() @endphp
@foreach($orders as $order)

                 <option value="{{$order->id}}">{{$order->name}}</option>
        
@endforeach

                     </select>
                                </div> -->
      {{$orderdetail}}                       
@if(isset($orderdetail))
 @php 
$salecenterr = App\Models\salecenterorder::where('order_number',$orderdetail->order_id)->where('product_id',$orderdetail->product_id)->where('owner_id',$orderdetail->product_owner)->where('size_id',$orderdetail->size)->where('colour_id',$orderdetail->color)->first();
$productt_batch = App\Models\Product::where('id',$orderdetail->product_id)->first()->batch_id;
@endphp
                                <input type="hidden" name="ordername" value="{{$orderdetail->order_id}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="product_order_number" value="{{$orderdetail->id}}"class="form-control form-control"  autocomplete="product_order_number" autofocus/>
                                <input type="hidden" name="productid" value="{{$orderdetail->product_id}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="salecenter" value="{{$salecenterr->salecenter_id}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="color" value="{{$orderdetail->color}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="size" value="{{$orderdetail->size}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="quantity" value="{{$orderdetail->product_quantity}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="batch" value="{{$productt_batch}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="amount" value="{{$orderdetail->total_price}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                                <input type="hidden" name="owner" value="{{$orderdetail->product_owner}}"class="form-control form-control"  autocomplete="productid" autofocus/>
                             
                                                        
@endif

                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnProduct_id"> Product_Id</label>
                                    <input type="text"  name="productid" class="form-control form-control @error('productid') is-invalid @enderror" id="salereturnProduct_id" placeholder="Enter Product_Id" value="" autocomplete="productid" autofocus/>
                                    @error('productid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->



                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Batch </label>

                                    <input type="number"  name="quantity" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->


                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Sale Center</label>

                                    <input type="number"  name="salecenter" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->


                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Color</label>

                                    <input type="number"  name="quantity" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Size</label>

                                    <input type="number"  name="size" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->








                                <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnReason">Reason</label>

                                    <input type="text"  name="reason" class="form-control form-control @error('reason') is-invalid @enderror" id="salereturnReason" placeholder="Enter Sale Center Adress" value="" autocomplete="reason" autofocus/>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

 <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Amount</label>

                                    <input type="text"  name="amount" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="salereturnAmount">Quantity</label>

                                    <input type="number"  name="quantity" class="form-control form-control @error('amount') is-invalid @enderror" id="salereturnAmount" placeholder="Enter Sale Return Amount" value="" autocomplete="amount" autofocus/>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                
<div class="col-md-6 form-group mb-3">
                                    <label for="salereturnReason">Profit/Loss on return</label>

                                    <input type="text"  name="profitloss" class="form-control form-control @error('reason') is-invalid @enderror" id="salereturnReason" placeholder="Enter Sale Center Adress" value="" autocomplete="reason" autofocus/>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


<div class="col-md-6 form-group mb-3">
                                    <label for="salereturnReason">Return Date</label>

                                    <input type="date"  name="returndate" class="form-control form-control @error('reason') is-invalid @enderror" id="salereturnReason" placeholder="Enter Sale Center Adress" value="" autocomplete="reason" autofocus/>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


<div class="col-md-6 form-group mb-3">
                                    <label for="salereturnReason">Courier / Rider</label>

                                    <input type="text"  name="courierrider" class="form-control form-control @error('reason') is-invalid @enderror" id="salereturnReason" placeholder="Enter Sale Center Adress" value="" autocomplete="reason" autofocus/>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection


@section('page_css')
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
