@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'Purchase Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders(products)</h4>



   <!-- end of row-->
       





            </div>


        </div>


        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Orders Report</h4>

                         <div class="row mb-4">

  <div class="row">
            <div class="col-3" style="padding-left: 40px;">
                <a href="{{route('lastmonthorder')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Year (Purchase-Return)</a>
            </div>


             <div class="col-3">
                <a href="{{route('lastyearorder')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Month (Purchase-Return)</a>
            </div>

             <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_orderreport')}}" enctype="multipart/form-data">
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







        </div>

                      

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Number</th>
                                    <th>Order_Date</th>
                                    <th>Product_Name</th>
                                      <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Inventory_Type</th>
                                    <th>Quantity</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Sale-Center</th>
                                    <th>Reseller/Customer</th>
                                    <th>City</th>
                                    <th>Purchase Price</th>
                                    <th>Discount</th>
                                    <th>Purchase Price After Discount</th>
                                    <th>Reseller Price</th>
                                    <th>Retail Price</th>
                                    <th>Contact Details</th>

                                    <th>Order-Status</th>
                                     <th>Order-Dispatch Date</th>
                                  <th>Order Delivery Date</th>
                                    <th>Sale Discount</th>
                                    <th>Actual Sell Price</th>
                                    <th>Agreed Delivery Charges</th>
                                 <th>Actual Delivery Charges</th>
                                    <th>Loss/Gain-Delivery Charges</th>
                                       <th>Comission Amount</th>
                                          <th>Courier/Rider</th>
                                          <th>Courier Invoice Number</th>
                                              <th>Invoice Date</th>
                                        <th>Amount</th>
                                    <th>Profit/Loss</th>



                                </tr>
                                </thead>
                                <tbody>
                              
                               @foreach($products as $product)
                         
                                    <tr>
                          <td> </td>
                          <td> {{$product->order_id}}  </td>
                     <td> {{$product->created_at}}  </td>

                     @php
                     $prod = App\Models\Product::where('id',$product->product_id)->first();
                     $productt = json_decode( $prod,true);
                     @endphp
                   @if(  $productt!=null)
<td> {{  $productt['name']}}  </td>
@else 
<td> -  </td>
@endif

                   @if(  $productt!=null)
<td> {{  $productt['owner']}}  </td>
@else 
<td> -  </td>
@endif
                        @php
                   $category = App\Models\CategoryProduct::where('product_id',$product->product_id)->first();
                         @endphp

                         @if(isset($category))
                         <td> {{$category->category_id}}/{{$product->product_id}}  </td>
                         @else 
                           <td> None </td>
                         @endif
@php
$salecenter = App\Models\ProductForSaleCenter::where('product_id',$product->product_id)->first();
@endphp

@if($salecenter!=null)
                         <td>Sale-Center </td>
@else
<td>Pick To Order </td>
@endif

             <td>{{$product->product_quantity}} </td>
             <td>{{$product->color}} </td>
            <td>{{$product->size}} </td>
             

@if($salecenter!=null)
                         <td>{{$salecenter->salecenter_id}} </td>
  @else 
   <td>None </td>
 @endif

@php
$reseller = App\Models\ResellerUser::where('user_id', $product->user_id)->first();
@endphp

@if($reseller!=null)
<td> Reseller  </td>
@else 
<td> Customer  </td>
@endif

@php 
$ordercity = App\Models\orderdetail::where('id',$product->order_id)->first()->city;
@endphp
<td>{{$ordercity}}</td>

@php 
$purchasepriceofproduct = App\Models\Product::where('id',$product->product_id)->first();
$purchase = json_decode($purchasepriceofproduct,true);
@endphp

@if(isset($purchase))
<td>{{$purchase['purchase_cost']}}</td>
@else 
<td> -</td>
@endif




@php
$discount = App\Models\GeneralDiscount::where('product_id',$product->product_id)->first();
@endphp

@if(isset($purchase))
<td>{{$purchase['purchase_discount']}}</td>
@else 
<td> -</td>
@endif





@php 
$purchasepriceafterdiscount = App\Models\Product::where('id',$product->product_id)->first();
$purchaseafterdiscount = json_decode($purchasepriceafterdiscount,true);
@endphp

@if(isset($purchaseafterdiscount))
<td>{{$purchaseafterdiscount['purchase_discount']}} </td>
@else 
<td> -</td>
@endif

@php 
$resellerpriceproduct = App\Models\Product::where('id',$product->product_id)->first();
$reseller = json_decode($resellerpriceproduct,true);

@endphp

@if(isset($reseller))
<td>{{$reseller['list_price_for_salesman']}} </td>
@else 
<td> -</td>
@endif


@php 
$retailpriceproduct = App\Models\Product::where('id',$product->product_id)->first();
$retail = json_decode($retailpriceproduct,true);

@endphp

@if(isset($retail))
<td>{{$retail['price']}} </td>
@else 
<td> -</td>
@endif


@php 
 $orderr = App\Models\orderdetail::where('id',$product->order_id)->first();
$orderrr = json_decode($orderr,true);

@endphp

@if(isset($orderrr))
<td>{{$orderrr['contactno']}} </td>
@else 
<td> -</td>
@endif




 @if($product->confirm_order == '1')
 <td>Approved </td>
 @else 
<td>Pending </td>
@endif

 <td> - </td>
  <td> - </td>
 @if($discount!=null)
<td> {{$discount->discount}} </td>
@else
<td> NO DISCOUNT </td>
@endif
    <td> {{$product->total_price}}</td>
     <td> {{$product->product_weight}}</td>
      <td> {{$product->product_weight}}</td>
       <td> {{$product->total_price}}</td>
@php 
$comission = App\Models\Product::where('id',$product->product_id)->first();
$comission1 = json_decode($comission,true);

@endphp

@if(isset($comission1))
<td>{{$comission1['commission_amount']}} </td>
@else 
<td> -</td>
@endif

@php

$riderorder = App\Models\riderordercustomer::where('order_id',$product->order_id)->first();

@endphp

@if($riderorder!=null)
<td> Rider </td>
@else 
<td> - </td>


@endif
<td> - </td>
<td>- </td>
 <td> {{$product->total_price}}</td>
<td>- </td>
                                      
                                    </tr>
                              @endforeach
        
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Number</th>
                                    <th>Order_Date</th>
                                    <th>Product_Name</th>
                                        <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Inventory_Type</th>
                                    <th>Quantity</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Sale-Center</th>
                                    <th>Reseller/Customer</th>
                                    <th>City</th>
                                    <th>Purchase Price</th>
                                    <th>Discount</th>
                                    <th>Purchase Price After Discount</th>
                                    <th>Reseller Price</th>
                                    <th>Retail Price</th>
                                    <th>Contact Details</th>
                                    <th>Order-Status</th>
                                     <th>Order-Dispatch Date</th>
                                  <th>Order Delivery Date</th>
                                    <th>Sale Discount</th>
                                    <th>Actual Sell Price</th>
                                    <th>Agreed Delivery Charges</th>
                                 <th>Actual Delivery Charges</th>
                                    <th>Loss/Gain-Delivery Charges</th>
                                       <th>Comission Amount</th>
                                          <th>Courier/Rider</th>
                                          <th>Courier Invoice Number</th>
                                              <th>Invoice Date</th>
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
