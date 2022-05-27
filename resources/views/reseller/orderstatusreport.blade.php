@extends('reseller.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Order-Status</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Your order status</h4>

                                   <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_orderstatus_reseller')}}" enctype="multipart/form-data">
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
                                    <th>Sell order date</th>
                                    <th>Product Name</th>
                                    <th>Category route</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>City</th>
                                <th>Resaller Price</th>
                                <th>Retail Price</th>
                              
                                <th>Order Status</th>
                                <th>Order Dispatch Date</th>
                                   <th>Order Delivery Date</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($orders as $order)
                                    <tr>
                                    
                                        
                @php
                $productorder=App\Models\productorderdetail::where('order_id',$order->id)->get();
                @endphp
                @foreach($productorder as $or)
               <tr>
                <td>{{$or->order_id}} </td>
                <td>{{$or->created_at}} </td>
                <td>{{$or->product_id}} </td>
                <td> </td>
                <td> {{$or->product_quantity}} </td>
                  <td> {{$or->size}} </td>
                    <td> {{$or->color}} </td>
                    <td> {{$order->city}} </td>
                    @php
                    $product = App\Models\Product::where('id',$or->product_id)->first();
                    @endphp
                     <td> {{$product->list_price_for_salesman}} </td>
                      <td> {{$product->price}} </td>
                      

                       @if($or->confirm_order == '1' && $or->order_status = '1' && $or->packing_status == '1' )
                         <td>Order dispatch & closed </td>

                       @elseif($or->confirm_order == '1' && $or->packing_status == '1' )
                         <td>Order packing done  </td>

                        @elseif($or->confirm_order == '1'  )
                         <td>Order Confirm  </td>

                         @else
                          <td>Pending </td>
                       @endif

                       @php 
                       $closeorder = App\Models\closingorder::where('order_number',$or->order_id)->first();
                       @endphp

                       @if($closeorder!=null)
                       <td>{{ $closeorder->created_at}} </td>
                       @else
                       <td>Order Not Dispatched </td>
                       @endif
                   
                    @if($closeorder!=null)
                       <td>{{ $closeorder->created_at}} </td>
                       @else
                       <td>Order Not Dispatched </td>
                       @endif
            </tr>

               
                @endforeach

                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                
                                 
<th>Sell order #</th>
                                    <th>Sell order date</th>
                                    <th>Product Name</th>
                                    <th>Category route</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>City</th>
                                <th>Resaller Price</th>
                                <th>Retail Price</th>
                              
                                <th>Order Status</th>
                                <th>Order Dispatch Date</th>
                                   <th>Order Delivery Date</th>
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
