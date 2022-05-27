@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'Purchase Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Purchase Order(products)</h4>




            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">

                      
                        <h4 class="card-title mb-3" style="display: inline;">All Purchase Order Report</h4>




                     

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>

                                <tr>
                                   <th>#</th>
                                    <th>Date Of Upload</th>
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                    <th>P.O No</th>
                                    <th>Purchase Date </th>
                                    <th>Batch #</th>
                                    <th>Quantity</th>
                                     <th>Size</th>
                                      <th>Color</th>
                                    <th>Purchase Price</th>
                                    <th>Purchase Discount</th>
                                      <th>Reseller Price</th>

                                    <th>Retail Price</th>
                                    <th>Reseller Commission</th>
                                    <th>Last Update (Date) </th>
                                    



                                </tr>
                                </thead>
                                <tbody>
                              
                            @foreach($products as $product)
                            @php
 $proid = App\Models\Product::where('name',$product->product_name)->first();
$product_id = json_decode($proid,true);



$pro_owner = App\Models\Product::where('name',$product->product_name)->first();
$pro_ownerr = json_decode($pro_owner,true);
@endphp
                         
                                    <tr>
<td>-</td>
<td>-</td>

@if(isset($product_id))
<td>{{$product_id['id']}}</td>
@else 
<td> -</td>
@endif
              
 <td>{{$product->product_name}} </td>


@if(isset($product_id))
                          @php
$salecenter = App\Models\ProductForSaleCenter::where('product_id',$product_id['id'])->first();
@endphp

@if($salecenter!=null)
                         <td>Sale-Center </td>
@else
<td>Pick To Order </td>
@endif

@else 
<td> -</td>
@endif






@if(isset($product_id))
                          @php
$salecenter = App\Models\ProductForSaleCenter::where('product_id',$product_id['id'])->first();
@endphp

@if($salecenter!=null)
                         <td>{{$salecenter->salecenter_id}} </td>
@else
<td>None </td>
@endif

@else 
<td> -</td>
@endif


@if(isset($pro_ownerr))
<td>{{$pro_ownerr['owner']}}</td>
@else 
<td> -</td>
@endif




@if(isset($product_id))
                          @php
$cat_pro = App\Models\CategoryProduct::where('product_id',$product_id)->first();
@endphp

@if($cat_pro!=null)
                         <td>{{$cat_pro->category_id}}/{{$product->product_name}} </td>
@else
<td>None </td>
@endif

@else 
<td> -</td>
@endif


@if(isset($pro_ownerr))
<td>{{$pro_ownerr['supplier']}}</td>
@else 
<td> -</td>
@endif


<td></td>
<td></td>

@php 
 $batchno = App\Models\BatchProduct::where('product_id',$product_id)->first();
$batch = json_decode($batchno,true);
@endphp

@if(isset($batch))
<td>{{$batch['batch_id']}}</td>
@else 
<td> -</td>
@endif

 <td>{{$product->quantity}} </td>
 <td>{{$product->size}} </td>
 <td>{{$product->color}} </td>

 @if(isset($pro_ownerr))
<td>{{$pro_ownerr['purchase_cost']}}</td>
@else 
<td> -</td>
@endif


 @if(isset($pro_ownerr))
<td>{{$pro_ownerr['purchase_discount']}}</td>
@else 
<td> -</td>
@endif


 @if(isset($pro_ownerr))
<td>{{$pro_ownerr['list_price_for_salesman']}}</td>
@else 
<td> -</td>
@endif
                 
                  @if(isset($pro_ownerr))
<td>{{$pro_ownerr['price']}}</td>
@else 
<td> -</td>
@endif
                   
                         @if(isset($pro_ownerr))
<td>{{$pro_ownerr['commission']}}</td>
@else 
<td> -</td>
@endif                              
                                    </tr>

                            @endforeach
        
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date Of Upload</th>
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                    <th>P.O No</th>
                                    <th>Purchase Date </th>
                                    <th>Batch #</th>
                                    <th>Quantity</th>
                                     <th>Size</th>
                                      <th>Color</th>
                                    <th>Purchase Price</th>
                                    <th>Purchase Discount</th>
                                      <th>Reseller Price</th>

                                    <th>Retail Price</th>
                                    <th>Reseller Commission</th>
                                    <th>Last Update (Date) </th>
                                    
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
