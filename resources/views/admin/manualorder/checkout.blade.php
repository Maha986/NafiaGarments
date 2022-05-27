@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Checkout Order</h1>
          
          
               
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        


      
  


                      
                         <form method="POST" action="{{route('checkoutadminpost',$userid)}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">

                   




                  


                          

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Name</label>
                                    <input type="name"  name="name" class="form-control form-control-rounded @error('name') is-invalid @enderror" id="exampleInputEmail2" type="name" placeholder="Enter name" value="" required/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Address</label>
                                    <input type="text"  name="address" class="form-control form-control-rounded @error('address') is-invalid @enderror" id="exampleInputEmail2"  placeholder="Enter address" required/>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">City </label>
                                    <input type="text" name="city"  class="form-control form-control-rounded" id="city" placeholder="city" /required>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="district">District </label>
                                    <input type="text" name="district"  class="form-control form-control-rounded" id="district" placeholder="district" /required>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="district">Tehsil </label>
                                    <input type="text" name="tehsil"  class="form-control form-control-rounded" id="tehsil" placeholder="tehsil" /required>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Near-Location</label>
                                    <input type="text"  name="location" class="form-control form-control-rounded @error('location') is-invalid @enderror" id="location" type="text" placeholder="Enter your location" value="" autocomplete="location" autofocus  /required>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Contact No</label>
                                    <input type="text"  name="contact" class="form-control form-control-rounded @error('contact') is-invalid @enderror" id="contact" type="text" placeholder="Enter your contact number" value="" autocomplete="contact" autofocus /required>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Special Delivery Instruction</label>
                                    <input type="text"  name="deliveryinstruction" class="form-control form-control-rounded @error('deliveryinstruction') is-invalid @enderror" id="deliveryinstruction" type="text" placeholder="Enter your delivery instruction number" value="" autocomplete="deliveryinstruction" autofocus /required>
                                    @error('deliveryinstruction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="role">Urgent Delivery</label>
                                    <select class="form-control form-control-rounded @error('urgentdelivery') is-invalid @enderror" id="urgentdelivery" name="urgentdelivery" required>
                                     
                                        <option value="" >Yes</option>
                                        <option value="" >No</option>



                                        
                                        
                                       
                                    </select>
                                    @error('urgentdelivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label for="far">Far_Fetched_Town</label>
                                    <select class="form-control form-control-rounded @error('far') is-invalid @enderror" id="far" name="far" required>
                                     
                                        <option value="" >Yes</option>
                                        <option value="" >No</option>



                                        
                                        
                                       
                                    </select>
                                    @error('far')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Delivery Required Before</label>
                                    <input type="date"  name="deliverybefore" class="form-control form-control-rounded @error('deliverybefore') is-invalid @enderror" id="deliverybefore" type="date" placeholder="Enter your delivery before instruction number" value="" autocomplete="deliverybefore" autofocus /required>
                                    @error('deliverybefore')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        @php
                             $total = Cart::session($userid)->getTotal();
                        @endphp
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="Total Amount">Total Amount</label>
                                    <input type="number"  name="totalamount" class="form-control form-control-rounded @error('totalamount') is-invalid @enderror" id="totalamount" type="number" placeholder="Enter your total amount" value="{{ $total}}" autocomplete="totalamount" autofocus /required>
                                    @error('totalamount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                 <div class="col-md-6 form-group mb-3">
                                    <label for="Delivery Charges">Delivery Charges</label>
                                    <input type="number"  name="deliverycharges" class="form-control form-control-rounded @error('deliverycharges') is-invalid @enderror" id="deliverycharges" type="number" placeholder="Enter your delivery charges" value="" autocomplete="delivery charges" autofocus /required>
                                    @error('deliverycharges')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                   <div class="col-md-6 form-group mb-3">
                                    <label for="Advance Payment">Advance Payment</label>
                                    <input type="number"  name="advancepayment" class="form-control form-control-rounded @error('advancepayment') is-invalid @enderror" id="advancepayment" type="number" placeholder="Enter your advance payment" value="" autocomplete="advancepayment" autofocus /required>
                                    @error('advancepayment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
<div class="col-md-6 form-group mb-3">
                                    <label for="advancepaymentslip">Transfer Slip Screen-Shot</label>
                                    <input type="file" id="file-input"    name="advancepaymentslip" class="form-control form-control @error('advancepaymentslip') is-invalid @enderror"  value="" autocomplete="advancepaymentslip" autofocus/required>
                                    @error('advancepaymentslip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                             
                               <div class="col-md-6 form-group mb-3">
                                    <label for="Cash Of Delivery Amount">Cash Of Delivery Amount</label>
                                    <input type="number"  name="cashofdeliveryamount" class="form-control form-control-rounded @error('cashofdeliveryamount') is-invalid @enderror" id="cashofdeliveryamount" type="number" placeholder="Enter your cash of delivery amount" value="" autocomplete="cashofdeliveryamount" autofocus /required>
                                    @error('cashofdeliveryamount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>







                                    
                                   
                                
                             
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </div>


                            </div>
                        </form>
                      
                      <!--   <div class="col-md-12"style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">CHECKOUT</button>
                                </div> -->
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
