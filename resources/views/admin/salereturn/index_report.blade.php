@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Sale Returns</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-3" style="padding-left: 40px;">
                <a href="{{route('lastyearsalereturn')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Year (Sale-Return)</a>
            </div>


             <div class="col-3">
                <a href="{{route('lastmonthsalereturn')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Month (Sale-Return)</a>
            </div>

 <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_salereturn')}}" enctype="multipart/form-data">
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
  
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Sale Returns</h4>
                        
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order_Number</th>
                                      <th>Order_Date</th>
                                    <th>Product_Name</th>
                                    <th>Reason</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Sale-Center</th>
                                    <th>Category Route</th>
                                    <th>Inventory_type</th>
                                    <th>Reseller/Customer</th>
                                    <th>City</th>
                                    <th>Purchase Price</th>
                                      <th>Discount</th>
                                    <th>Purchase Price After Discount</th>
                                    <th>Reseller Price</th>
                                    <th>Retail Price</th>
                                    <th>Profit/Loss</th>
                                    <th>Courier/Rider</th>
                                    <th>Return Date</th>

                                    <th>Created At</th>
                            
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($salereturn as $Sale_return)
                                    <tr>
                                        <td>{{$Sale_return->id}}</td>
                                        <td>{{$Sale_return->order_number}}</td>
                                          <td>{{$Sale_return->order_date}}</td>



@php
$pro = App\Models\Product::where('id',$Sale_return->product_id)->first();
$prod = json_decode($pro,true);
@endphp



@if(isset($prod))
<td>{{$prod['name']}}</td>
@else 
<td> -</td>
@endif</td>





                                                                                <td>
                                            {{$Sale_return->reason}}

                                        </td>
                                        <td>
                                            {{$Sale_return->amount}}

                                        </td>
                                        <td>{{$Sale_return->quantity}}</td>

                                          <td>{{$Sale_return->sale_center}}</td>

                            <td>{{$Sale_return->category_route}}</td>
                              <td>{{$Sale_return->inventory_type}}</td>

                              <td>{{$Sale_return->reseller_or_customer}}</td>


                              <td>{{$Sale_return->city}}</td>
@php


$discount = App\Models\GeneralDiscount::where('product_id',$Sale_return->product_id)->first();
$gen_dis = json_decode($discount,true);

@endphp

                              <td>{{$Sale_return->purchase_price}}</td>


@if(isset($gen_dis))

<td>$gen_dis['discount']}}</td>
@else 
<td>No Discount</td>
@endif




@if(isset($prod))
@if(isset($gen_dis))

<td>{{$prod['purchase_cost']-$gen_dis['discount']}}</td>
@else 
<td>{{$prod['purchase_cost']}}</td>
@endif
@endif



                       

                          <td>{{$Sale_return->reseller_price}}</td>

                           <td>{{$Sale_return->retail_price}}</td>

                            <td>{{$Sale_return->profit_or_loss}}</td>

                             <td>{{$Sale_return->courier_or_rider}}</td>

                              <td>{{$Sale_return->return_date}}</td>


                                    
                                        <td>{{$Sale_return->created_at->diffForHumans()}}</td>
                                      
                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                 <th>#</th>
                                    <th>Order_Number</th>
                                      <th>Order_Date</th>
                                    <th>Product_Name</th>
                                    <th>Reason</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Sale-Center</th>
                                    <th>Category Route</th>
                                    <th>Inventory_type</th>
                                    <th>Reseller/Customer</th>
                                    <th>City</th>
                                    <th>Purchase Price</th>
                                     <th>Discount</th>
                                    <th>Purchase Price After Discount</th>

                                    <th>Reseller Price</th>
                                    <th>Retail Price</th>
                                    <th>Profit/Loss</th>
                                    <th>Courier/Rider</th>
                                    <th>Return Date</th>

                                    <th>Created At</th>
                                  
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
