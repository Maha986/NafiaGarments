@extends('rider.layouts.master')
@section('content')

    <input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Your Pickups</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Pickups</h4>
</br>
                         <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_pickupreport_rider')}}" enctype="multipart/form-data">
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
                                    <th>Order date</th>
                                    <th>Area</th>
                                    <th>Address</th>
                                    <th>Item name</th>
                                    <th>Picture</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                     <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Purchase Price After Discount</th>
                                     <th>Payment Status</th>
                                     <th>Supplier Name</th>
                                     <th>Pickup Status</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                @foreach($orders as $order)
                <tr>
                    @php
                    $orderdetail = App\Models\orderdetail::where('id',$order->id)->first();
                    @endphp

                    @if($orderdetail!=null)
                     <td>{{$orderdetail->created_at}}</td>
                    @else
                    <td>-</td>  
                    @endif

                <td>{{$order->address}}</td>
                <td>{{$order->address}}</td>
                <td>{{ $order->product_name }}</td>
            @php
            $pro = App\Models\Product::where('name',$order->product_name)->first();
            if($pro!=null)
            {
            $colorimage = App\Models\ColourImageProductSize::where('product_id',$pro->id)->where('colour_id',$order->color)->where('size_id',$order->size)->first();

            }
        
            @endphp
            @if( $colorimage!=null)

            <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/productImages/'. $colorimage->image) }}" alt="cnic image not found" />
                </div>
            </td>  

            @else
            <td>-</td> 
            @endif    

            <td>  {{ $order->color }}</td>
            <td>  {{ $order->size}}</td>                 
            <td>  {{ $order->quantity }}</td>
            <td>  {{ $order->description }}</td>
        @if($pro!=null)
            @php
$discount = App\Models\GeneralDiscount::where('product_id',$pro->id)->first();
@endphp

@if($discount!=null)
<td>{{$pro->purchase_cost-$discount->discount}}</td>
@else
<td>No Discount</td>
@endif

@else

<td>-</td>



@endif

<td>?</td>

  @if($pro!=null)
<td>{{$pro->supplier}}</td>
@else
<td>-</td>
@endif


@if($order->status=='4')
<td>  <span class="badge badge-success" style="font-size:15px;">{{ 'Dispatched' }}</span></td>
@elseif($order->status=='3')
<td> <span class="badge badge-warning" style="font-size:15px;">{{ 'Ready To Dispatch' }}</span></td>
@elseif($order->status=='2')
<td><span class="badge badge-secondary" style="font-size:15px;">{{ 'Process' }}</span></td>
@elseif($order->status =='1')
<td> <span class="badge badge-primary" style="font-size:15px;">{{ 'Pending' }}</span></td>
@else
<td> <span class="badge badge-warning" style="font-size:15px;">{{ 'Order Cancelled' }}</span></td>
@endif
                                           
                                        </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Order date</th>
                                    <th>Area</th>
                                    <th>Address</th>
                                    <th>Item name</th>
                                    <th>Picture</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                     <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Purchase Price After Discount</th>
                                     <th>Payment Status</th>
                                     <th>Supplier Name</th>
                                     <th>Pickup Status</th>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>

    <script>

        {{--var i;--}}

        {{--$(document).ready(function() {--}}

        {{--    for(var i=1;i<{{ $count }};i++){--}}

        {{--        $('.js-example-basic-single'+i).select2({--}}
        {{--            dropdownAutoWidth : true,--}}
        {{--            width: 'auto'--}}
        {{--        });--}}

        {{--    }--}}

        {{--});--}}

    </script>
@endsection
