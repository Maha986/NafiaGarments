@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'Purchase Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
              <h4>View All Purchase Returns</h4>



   <!-- end of row-->
       





            </div>


        </div>


        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Purchase Returns Report</h4>

                         <div class="row mb-4">

  <div class="row">
                <div class="col-3" style="padding-left: 40px;">
                <a href="{{route('lastyearpurchasereturn')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Year (Purchase-Return)</a>
            </div>


              <div class="col-3">
                <a href="{{route('lastmonthpurchasereturn')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Month (Purchase-Return)</a>
            </div>

             <div class="col-6">
  <form class="forms-sample" method="POST" action="{{route('tofrom_purchasereturn')}}" enctype="multipart/form-data">
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
                                   <th>Purchase Order Number</th>
                                       <th>Purchase Number Date</th>
                                    <th>SaleCenter</th>
                                     <th>Product Name</th>
                                   

                                    
                                    
                                    <th>Product Quantity</th>
                                    <th>Return Amount</th>
                                
                                    <th>Purchae price after discount</th>
                                    <th>rider</th>
                                     <th>Category Route</th>
                                       <th>Inventory Type</th>
                                           <th>Return Reason</th>
                                              <th>Payment Adjustment</th>
                                    <th>Created At</th>



                                </tr>
                                </thead>
                                <tbody>
                              
                                 @foreach($purchasereturn as $purchase_return)
                         
                                    <tr>
                                        <td></td>
                                   <td>{{$purchase_return->purchase_order_number}}</td>
                         <td>{{$purchase_return->purchaseorder_date}} </td>           
@php
$sale = App\Models\SaleCenter::where('id',$purchase_return->salecenter_id)->first();

$salecentername = json_decode($sale,true);
@endphp

@if(isset($salecentername))
<td>{{$salecentername['name']}}</td>
@else 
<td> -</td>
@endif

    


@php
$pro = App\Models\Product::where('id',$purchase_return->product)->first();
$prod = json_decode($pro,true);
@endphp



@if(isset($prod))
<td>{{$prod['name']}}</td>
@else 
<td> -</td>
@endif</td>


      <td>{{$purchase_return->product_quantity}}</td>
            <td>{{$purchase_return->amount}}</td>


@php


$discount = App\Models\GeneralDiscount::where('product_id',$purchase_return->product)->first();
$gen_dis = json_decode($discount,true);

@endphp

@if(isset($prod))
@if(isset($gen_dis))

<td>{{$prod['purchase_cost']-$gen_dis['discount']}}</td>
@else 
<td>{{$prod['purchase_cost']}}</td>
@endif
@endif


@php
$rider = App\Models\Rider::where('id',$purchase_return->rider)->first();

$ridera = json_decode($rider,true);
@endphp

@if(isset($ridera ))
<td>{{$ridera ['name']}}</td>
@else 
<td> -</td>
@endif


   <td>
                                            {{$purchase_return->category_route}}

                                        </td>
     <td>
                                            {{$purchase_return->inventory_type}}
                                        </td>

                                         <td>
                                            {{$purchase_return->return_reason}}
                                        </td>

                                           <td>
                                            {{$purchase_return->payment_adjustment}}
                                        </td>

                                    
                                        <td>{{$purchase_return->created_at->diffForHumans()}}</td>




                                    </tr>

                                    @endforeach
                          
        
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>#</th>
                                   <th>Purchase Order Number</th>
                                       <th>Purchase Number Date</th>
                                    <th>SaleCenter</th>
                                     <th>Product Name</th>
                                    

                                    
                                    
                                    <th>Product Quantity</th>
                                    <th>Return Amount</th>
                                
                                    <th>Purchae price after discount</th>
                                    <th>rider</th>
                                     <th>Category Route</th>
                                       <th>Inventory Type</th>
                                           <th>Return Reason</th>
                                              <th>Payment Adjustment</th>
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
