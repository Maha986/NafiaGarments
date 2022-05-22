@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = '', $title = 'Order Advance Payment  - Nafia Garments'}}">
                  

    <div class="main-content">
        <div class="breadcrumb">
            <h1>Order-Advance-Payment</h1> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Advance Payment</div>
                        <form class="forms-sample" method="POST" action="{{ route('advancepayment_update',$advance->id) }}" enctype="multipart/form-data">
                            @csrf()
                          

                                      
                                                          
                                                             
                                                             
                            </div>

                                            <div class="col-md-12 form-group mb-3">
                                    <label for="bankdetails">Order_ID</label>
                                    <input type="number"  name="orderid" class="form-control form-control @error('orderid') is-invalid @enderror" id="orderid" type="number" placeholder="orderid" value="{{$advance->order_id}}" autocomplete="orderid" autofocus />
                                    @error('orderid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                                     <div class="col-md-12 form-group mb-3">
                                    <label for="description">Payment Recieved</label>
                                    <input type="number"  name="paymentrecieved" class="form-control form-control @error('paymentrecieved') is-invalid @enderror" id="description" type="text" placeholder="Enter Paymentrecieved" value="{{$advance->payment_recieved}}" autocomplete="paymentrecieved" autofocus />
                                    @error('paymentrecieved')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                                     <div class="col-md-12 form-group mb-3">
                                    <label for="description">Transaction ID</label>
                                    <input type="number"  name="transaction" class="form-control form-control @error('transaction') is-invalid @enderror" id="transaction" type="number" placeholder="Enter transaction id" value="{{$advance->transaction_id}}" autocomplete="transaction" autofocus />
                                    @error('transaction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                                     <div class="col-md-12 form-group mb-3">
                                    <label for="bankdetails">Bank Details</label>
                                    <input type="text"  name="bankdetails" class="form-control form-control @error('bankdetails') is-invalid @enderror" id="bankdetails" type="text" placeholder="Enter bankdetails" value="{{$advance->bank_details}}" autocomplete="description" autofocus />
                                    @error('bankdetails')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                                     <div class="col-md-12 form-group mb-3">
                                    <label for="description">Amount</label>
                                    <input type="number"  name="amount" class="form-control form-control @error('amount') is-invalid @enderror" id="amount" type="number" placeholder="Enter amount" value="{{$advance->amount}}" autocomplete="description" autofocus />
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                         <div class="col-md-12 ">
                                          <label for="firstName1">Transaction Date</label>
                                         <input class="form-control" id="date" name="date" value="{{$advance->date}}" type="date"/>
                          </div>
                                                      </br>

                                                        <div class="form-group-custom-control">
                                
                        <label for="deal_for">Status </label>
                                    <select class="form-control @error('far') is-invalid @enderror" id="status" name="status">
                                       
                                  
                                    
                 <option value="1">Approved </option>
                 <option value="0">Disapproved </option>
                                     
                                        
                                    </select>       <!-- End .custom-checkbox -->
                            </div><!-- End .form-group -->
                   
                            </br>
                         
                           
                              
                               
                            <div class="form-group" style="margin-left:1%;">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection
@section('page_css')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection

