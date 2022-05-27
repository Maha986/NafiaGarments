@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'orderIndex2', $title = 'Orders - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders</h4>
                @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif

<form method="post" action="{{route('selectfield_order')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="">
                                <label><strong>Select Field :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                             <option value="id">order_id</option>

                             <option value="name">order_name</option>
                  <option value="address">Address</option>
                                  <option value="city">City</option>
                                  <option value="district">district</option>
                                   <option value="tehsil">tehsil</option>
                                    <option value="location">location</option>
                                  <option value="contactno">Contact no</option>
                                   <option value="special_delivery_instruction">special_delivery_instruction</option>
                                <option value="far_fetched_town">far_fetched_town</option>

                                 <option value="urgentdelivery">urgentdelivery</option>

                                  <option value="delivery_required_before">delivery_required_before</option>

                                    
                                     <option value="totalamount">totalamount</option>

                                      <option value="deliverycharges">deliverycharges</option>

                                 <option value="advancepayment">advancepayment</option>

                                  <option value="advancepayment_transfer_slip">advancepayment_transfer_slip</option>

                                   <option value="cashofdeliveryamount">cashofdeliveryamount</option>

                                     <option value="amount_to_be_charged_to_customer">amount_to_be_charged_to_customer</option>

                <option value="amount_to_be_charged_to_customer_reseller">amount_to_be_charged_to_customer_reseller</option>   

                <option value="resellerprofit">resellerprofit</option>  

                 <option value="refundable_amount_after_delivery">refundable_amount_after_delivery</option>

                    <option value="advance_payment_from_commission_balance">advance_payment_from_commission_balance</option>  



                                   </select>
                            </div>

                            <div class="" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </form>

            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Orders</h4>
                       
  <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>






<div style="float:right; margin-right: 1%;">
                            <a href="{{route('advancepayment_index')}}" class="btn btn-raised btn-raised-success m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Advance Payment</a>
                            <br> <br>
                        </div>






                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Order_name</th>
                                    <th>Special Delivery Instruction</th>
                                    <th>Order Price</th>
                                     <th>Total Delivery Charges</th>

                                     <th>Total Amount</th>
                                     <th>Address</th>
                                     <th>City</th>
                                     <th>District</th>
                                     <th>Tehsil</th>
                                     <th>Location</th>
                                       <th>Far_Fetched_Town</th>
                        <th>Urgent Delivery</th>
                          <th>Delivery Required Before</th>
                          <th>Advance Payment</th>
                          <th>Advance Payment Transfer Slip</th>
                          <th>Cash of delivery amount</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($orders as $order)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$order->id}} </td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->special_delivery_instruction}}</td>
                                        <td>
                                            {{$order->totalamount}}

                                        </td>

                <td>
                 
                <form class="forms-sample" method="POST" action="{{ route('edit_DC') }}" enctype="multipart/form-data">
                            @csrf()
                <input type="number"  name="edit_dc" class="form-control form-control " id="description" value="{{$order->deliverycharges}}" autocomplete="description" autofocus />
                <input type="hidden"  name="id" class="form-control form-control "  value="{{$order->id}}" autofocus />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
       

               </td>

            <td>
            {{$order->totalamount+$order->deliverycharges}}

             </td>
             <td>{{$order->address}} </td>
               <td>{{$order->city}} </td>
                 <td> {{$order->district}}</td>
                   <td>{{$order->tehsil}} </td>
                     <td> {{$order->location}}</td>
   <td> {{$order->far_fetched_town}}</td>
      <td> {{$order->urgentdelivery}}</td>
         <td> {{$order->delivery_required_before}}</td>

        <td>{{$order->advancepayment}}</td>
         <td>
  <div style="width:75px; height: 75px; font-size: 0;">
    <img src="{{ asset('storage/images/transferslips'.$order->advancepayment_transfer_slip) }}" alt=" image not found" />
                </div>


         </td>
          <td>{{$order->cashofdeliveryamount}}</td>
                                        
                                    
                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="orderproductdetails_delete/{{$order->id}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></a>

                                            

                                           <!--  <form method="POST" action="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form> -->
                                             <a href="orderproductdetails/{{$order->id}}" class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                        class="far fa-eye font-weight-bold"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Order_name</th>
                                    <th>Special Delivery Instruction</th>
                                    <th>Order Price</th>
                                     <th>Total Delivery Charges</th>

                                     <th>Total Amount</th>
                                     <th>Address</th>
                                     <th>City</th>
                                     <th>District</th>
                                     <th>Tehsil</th>
                                     <th>Location</th>
                                       <th>Far_Fetched_Town</th>
                        <th>Urgent Delivery</th>
                          <th>Delivery Required Before</th>
                          <th>Advance Payment</th>
                          <th>Advance Payment Transfer Slip</th>
                          <th>Cash of delivery amount</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
