@extends('owner.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders</h4>
             
            </div>


        </div>


        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Your Orders</h4>
                      <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_orderreport_owner')}}" enctype="multipart/form-data">
    @csrf
                 
             <div class="input-group"> 
                <label> <b>From Date :</b> </label>
    <input type="date" name = "from" class="form-control" placeholder="Start"/>
    <span class="input-group-addon">-</span>
      <label> <b>To Date : </b></label>
    <input type="date" name = "to" class="form-control" placeholder="End"/>
<button type="submit">Search</button>

                                </form>
</div>

                      </div>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                 
<th>Sell order #</th>
                                    <th>Sale order date</th>
                          
                                     <th>Product Name</th>
                                      <th>Category Route</th>
                                    
                                    <th>Inventory Type</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Salecenter</th>
                                 <th>Name of reseller/customer</th>
                                         <th>City</th>
                                     <th>Purchase price</th>
                                <th>discount</th>
                                        <th>purchase price after discount</th>
                                      <th>Reseller price</th>
                                              <th>Retail Price</th>
                                                      <th>Contact Details</th>
                                                  <th>Product Owner</th>
                                                    <th>Order status</th>
                                                      <th>order dispatch date</th>

                                                  <th>Order delivery date</th>
                                                   <th>Sell Discount</th>
                                                  <th>Actual Sell Price</th>
                                                     <th>Agreed delivery charges</th>
                                                        <th>Actual delivery charges</th>
                                                 <th>Loss/Gain of delivery charges</th>
                                               <th>Commission Amount</th>
                                                  <th>Courier/Rider</th>
                                                     <th>Cn #</th>
                                                   <th>Courier invoice #</th>
                                           <th>Courier Invoice Date</th>
                                              <th>Amount</th>
                                                 <th>Profit/Loss</th>

                                   
                                   
                                </tr>
                                </thead>
                                <tbody>
                                  
                                @foreach($owners as $owner)
                           
                                   <tr>
                                
                    @php

                    if(isset($from))
                    {
                $pro = App\Models\productorderdetail::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->where('product_id',$owner->product_id)->get();
                    }
                    else
                    {
                   $pro = App\Models\productorderdetail::where('product_id',$owner->product_id)->get();
                    }
                    

                   
                    @endphp

                     @foreach($pro as $pro_sales)
               <tr>
            <td> {{$pro_sales->order_id}}</td>
             <td> {{$pro_sales->created_at}}</td>
              <td> {{$pro_sales->product_id}}</td>
              <td></td>
               @php
    $salecenter = App\Models\ProductForSaleCenter::where('product_id',$pro_sales->product_id)->first();
    @endphp

    @if(  $salecenter!=null )
    <td>Sale-center</td>
    @else
  <td>Pick-to-order</td>
    @endif

    <td>{{$pro_sales->product_quantity}}</td>
    <td>{{$pro_sales->size}}</td>
    <td>{{$pro_sales->color}}</td>

       @if(  $salecenter!=null )
    <td>{{$salecenter->salecenter_id}}</td>
    @else
  <td>-</td>
    @endif

    
    @php
    $order = App\Models\orderdetail::where('id',$pro_sales->order_id)->first();
    @endphp

      @if(  $order!=null )
    <td>{{$order->name}}</td>
    @else
  <td>-</td>
    @endif

    @if(  $order!=null )
    <td>{{$order->city}}</td>
    @else
  <td>-</td>
    @endif

    @php
    $pro = App\Models\Product::where('id',$pro_sales->product_id)->first();
    @endphp



    @if(  $pro!=null )
    <td>{{$pro->price}}</td>
    @else
  <td>-</td>
    @endif

    @php
$discount = App\Models\GeneralDiscount::where('product_id',$pro_sales->product_id)->first();
@endphp

     @if(  $discount!=null )
    <td>{{$discount->discount}}</td>
    @else
  <td>-</td>
    @endif







        @if(  $discount!=null )
    <td>{{$pro->price-$discount->discount}}</td>
    @else
  <td>-</td>
    @endif



   @if(  $pro!=null )
    <td>{{$pro->list_price_for_salesman}}</td>
    @else
  <td>-</td>
    @endif


      @if(  $pro!=null )
    <td>{{$pro->price}}</td>
    @else
  <td>-</td>
    @endif

         @if(  $order!=null )
    <td>{{$order->contactno}}</td>
    @else
  <td>-</td>
    @endif

    <td> </td>

           @if( $pro_sales->order_status=='1' )
         
    <td>Order dispatched</td>
    @else
  <td>pending</td>
    @endif

@php
$close = App\Models\closingorder::where('order_number',$pro_sales->order_id)->first();
@endphp

      @if(  $close!=null  )
         
    <td>{{$close->created_at}}</td>
    @else
  <td>Not Dispatch</td>
    @endif

@php 
 if(  $pro!=null )
 {
   $deliverydate = App\Models\riderordercustomer::where('order_id',$pro_sales->order_id)->where('product_name',$pro->name)->first();
  $deliverydate_json = json_decode($deliverydate,true);
    
 }
 else
 {
  $deliverydate = '';
 }


@endphp



 @if( $deliverydate!=null )
         
    <td>{{$deliverydate_json['date']}}</td>
    @else
  <td>-</td>
    @endif
             
     @if(  $discount!=null )
    <td>{{$pro_sales->product_quantity*$discount->discount}}%</td>
    @else
  <td>No discount</td>
    @endif

      @if(  $pro!=null )
    <td>{{$pro->price*$pro_sales->product_quantity}}</td>
    @else
  <td>-</td>
    @endif
<td> ? </td>
@if($pro_sales->product_weight=='0')
 <td>Free Delivery </td>
@else
    <td>{{$pro_sales->product_weight}}</td>
@endif
<td>?</td>
   @if(  $pro!=null )
    <td>{{$pro->commission_amount*$pro_sales->product_quantity}}</td>
    @else
  <td>-</td>
    @endif

 @if( $deliverydate!=null )
         
    <td>Rider</td>
    @else
  <td>-</td>
    @endif

    <td> </td>
    <td> </td>

<td> </td>

 @if( $pro!=null )
    <td>{{$pro->price*$pro_sales->product_quantity+$pro_sales->product_weight}}</td>
    @else
  <td>-</td>
    @endif

 
               </tr>
               @endforeach
                                   </tr>
                                
                                @endforeach 
                              
                                 

                                </tbody>
                                <tfoot>
                                <tr>
<th>Sell order #</th>
                                    <th>Sale order date</th>
                          
                                     <th>Product Name</th>
                                      <th>Category Route</th>
                                    
                                    <th>Inventory Type</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Salecenter</th>
                                 <th>Name of reseller/customer</th>
                                         <th>City</th>
                                     <th>Purchase price</th>
                                <th>discount</th>
                                        <th>purchase price after discount</th>
                                      <th>Reseller price</th>
                                              <th>Retail Price</th>
                                                      <th>Contact Details</th>
                                                  <th>Product Owner</th>
                                                    <th>Order status</th>
                                                      <th>order dispatch date</th>

                                                  <th>Order delivery date</th>
                                                   <th>Sell Discount</th>
                                                  <th>Actual Sell Price</th>
                                                     <th>Agreed delivery charges</th>
                                                        <th>Actual delivery charges</th>
                                                 <th>Loss/Gain of delivery charges</th>
                                               <th>Commission Amount</th>
                                                  <th>Courier/Rider</th>
                                                     <th>Cn #</th>
                                                   <th>Courier invoice #</th>
                                           <th>Courier Invoice Date</th>
                                              <th>Amount</th>
                                                 <th>Profit/Loss</th>
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
