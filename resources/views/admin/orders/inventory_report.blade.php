@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'Inventory Report - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Inventory Report</h4>
            </div>


        </div>







        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Product Inventories In Salecenter</h4>

                          <div class="row mb-4">

  <div class="row">
            <div class="col-3" style="padding-left: 40px;">
                <!-- <a href="" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Year (Purchase-Return)k</a> -->
            </div>


             <div class="col-3">
                <!-- <a href="" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Month (Purchase-Return)k</a> -->
            </div>

             <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('tofrom_inventoryreport')}}" enctype="multipart/form-data">
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
                                    <th>Date Of Upload</th>
                                     <th>In-Ward Date(date of posting) </th>
                                      <th>Purchase Date</th>
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                    <th>P.O No</th>
                                  
                                    <th>Batch #</th>
                                    <th>Batch Date</th>
                                    <th>Batch Owner Name</th>
                                    <th>Transportation Cost</th>
                                    <th>Labour Cost</th>
                                    <th>Other Cost 1</th>
                                     <th>Other Cost 2</th>
                                    <th>Total Items</th>
                                     <th>Total Sold</th>
                                      <th>Items Stock</th>
                                       <th>Items In Stock Value</th>
                                       <th>Items Sold Value</th>
                                    
                                    



                                </tr>
                                </thead>
                                <tbody>
                              
                          
                         @foreach($products as $pro)
                         @php
                          $product_uploaddate = App\Models\Product::where('id',$pro->product_id)->first()->created_at;

                        $product_id = App\Models\Product::where('id',$pro->product_id)->first()->id;
                               

                          $product_name = App\Models\Product::where('id',$pro->product_id)->first()->name;

                           $product_owner = App\Models\Product::where('id',$pro->product_id)->first()->owner;
                           
                              $product_supplier = App\Models\Product::where('id',$pro->product_id)->first()->supplier;

                            $product_price = App\Models\Product::where('id',$pro->product_id)->first()->price;


                           $cat_id = App\Models\CategoryProduct::where('product_id',$pro->product_id)->first()->category_id;

                           $batch_date = App\Models\Batch::where('id',$pro->batch_id)->first()->date;

                           $batch_owner = App\Models\Batch::where('id',$pro->batch_id)->first()->owner;

                         $batch_transportation_cost = App\Models\Batch::where('id',$pro->batch_id)->first()->transportation_cost;

                           $batch_labour_cost = App\Models\Batch::where('id',$pro->batch_id)->first()->labour_cost;

                           $batch_cost_one = App\Models\Batch::where('id',$pro->batch_id)->first()->other_cost_one;


                          $batch_cost_two = App\Models\Batch::where('id',$pro->batch_id)->first()->other_cost_two;
                         
                         @endphp

                                    <tr>
                        <td></td>
                        <td>{{$product_uploaddate}}</td>
                        <td> </td>
                        <td>{{$pro->created_at}}</td>
                         <td>{{$product_id}}</td>
                          <td>{{$product_name}}</td>
                          <td>Sale Center</td>

                          @php 
$salecenter = App\Models\SaleCenter::where('id',$pro->salecenter_id)->first();
$salecentername = json_decode($salecenter,true);
@endphp

@if(isset($salecentername))
<td>{{$salecentername['name']}}</td>
@else 
<td> -</td>
@endif


                           <td>{{$product_owner}}</td>
                         <td>{{ $cat_id}}/{{$product_name}}</td>
                         <td>{{$product_supplier}}</td>
                            <td>-</td>
                             <td>{{$pro->batch_id}}</td>
                            <td>{{$batch_date}}</td>
                            <td>{{$batch_owner}}</td>
                            <td>{{ $batch_transportation_cost}}</td>
                              <td>{{ $batch_labour_cost}}</td>

                              @if( $batch_cost_one!=null)
                               <td>{{$batch_cost_one}}</td>
                               @else
                               <td>-</td>
                               @endif

                                @if( $batch_cost_two!=null)
                               <td>{{$batch_cost_two}}</td>
                               @else
                               <td>-</td>
                               @endif
                                 
                                 <td>{{$pro->quantity-$pro->sold}}</td>

                                 <td>{{$pro->sold}}</td>

                                 <td>{{$pro->quantity}}</td>

                                 <td>{{$product_price*$pro->quantity}} </td>
                                 <td>{{$product_price*$pro->sold}} </td>

                                      
                                    </tr>

                       @endforeach
        
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Date Of Upload</th>
                                     <th>In-Ward Date(date of posting) </th>
                                      <th>Purchase Date</th>
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                    <th>P.O No</th>
                                   
                                    <th>Batch #</th>
                                    <th>Batch Date</th>
                                    <th>Batch Owner Name</th>
                                    <th>Transportation Cost</th>
                                    <th>Labour Cost</th>
                                    <th>Other Cost 1</th>
                                     <th>Other Cost 2</th>
                                    <th>Total Items</th>
                                     <th>Total Sold</th>
                                      <th>Items Stock</th>
                                       <th>Items In Stock Value</th>
                                       <th>Items Sold Value</th>
                                    
                                    
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
