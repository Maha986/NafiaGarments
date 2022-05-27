@extends('admin.layouts.master')

@section('content')
    <input type="hidden" value="{{$activePage = 'orderIndex', $title = 'Order Show - Nafia Garments'}}">

    @php $user = \App\Models\User::where('id',$orders[0]->user_id)->first() @endphp
    @php $user_billing = \App\Models\Billing::where('user_id',$orders[0]->user_id)->where('order_number',$orders[0]->order_number)->first() @endphp
    @php $city = \App\Models\City::where('id',$user_billing->city)->first() @endphp
        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                <div class="d-sm-flex mb-5" data-view="print"><span class="m-auto"></span>
{{--                                <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>--}}

                                    <?php $assigncourier = \App\Models\courierorder::where('order_number', $orders[0]->order_number)->first(); ?>


                                    @if($assigncourier !== null)

                                        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice" data-toggle="modal" data-target="#myModal">Reassign Courier Company</button>


                                    @else
                                        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice" data-toggle="modal" data-target="#myModal">Assign Courier Company</button>
                                    @endif

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h4 class="modal-title">Assign Courier Company</h4>

                                            </div>
                                            <div class="modal-body">

                                                <div class="container">

                                                    <form action="couriercompany" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="email">Select Courier Company </label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="courier">

                                                                @foreach($checkcourier as $courier)
                                                                    <option value="{{ $courier->id }}">{{$courier->courier_name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">

                                                            <input type="hidden" class="form-control" id="pwd"  name="trackcode" value="{{ $orders[0]->order_number }}"readonly>
                                                        </div>
                                                        <div class="form-group">

                                                            <input type="hidden" class="form-control" id="pwd"  name="customerid" value="{{ $user->id }}"readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="pwd">Track Order Number </label>
                                                            <input type="text" class="form-control" id="pwd"  name="trackordernumber" >
                                                        </div>

                                                        @if($assigncourier !== null)

                                                            <input type="hidden" name="reassign_courier" value="{{ $assigncourier->id }}">
                                                        @endif

                                                        <button type="submit" class="btn btn-default">Add</button>
                                                    </form>

                                                </div>





                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- modal end -->


                                <!-- -===== Print Area =======-->
                                <div id="print-area">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="font-weight-bold">Order Info</h4>
                                            <p>#{{ $orders[0]->order_number }}</p>
                                        </div>
                                        <div class="col-md-6 text-sm-right">
                                            <p>
                                                <strong>Order status: </strong>
                                                @if($orders[0]->status == 1)

                                                    Pending

                                                @elseif($orders[0]->status == 2)

                                                   Process

                                                @elseif($orders[0]->status == 3)

                                                   Shipment

                                                @elseif($orders[0]->status == 4)

                                                    delivered

                                                @elseif($orders[0]->status == 5)

                                                    canceled

                                                @endif
                                            </p>
                                            <p>
                                                <strong>Order date: </strong>
                                                {{ $orders[0]->created_at->format('d M, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 border-top"></div>
                                    <div class="row mb-5">
                                        <div class="col-md-6 mb-3 mb-sm-0">
                                            <h5 class="font-weight-bold">Customer Info</h5>
                                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Customer Name </p><span> {{ $user->name }}</span>
                                            <br><br>
                                            <p class="text-primary mb-1"><i class="fas fa-at"></i> Email </p><span> {{ $user->email }}</span>
                                            <br><br>
                                            <p class="text-primary mb-1"><i class="fas fa-mobile-alt"></i> Contact </p><span> {{ $user_billing->contact }}</span>
                                        </div>
                                        <div class="col-md-6 text-sm-right">
                                            <h5 class="font-weight-bold">Billing Info</h5>
                                            <p class="text-primary mb-1"><i class="fas fa-money-check-alt"></i> Payment Method</p><span>{{ $orders[0]->payment_type }}</span>
                                            <br><br>
                                            <p class="text-primary mb-1"><i class="fad fa-mailbox"></i> Postal Code </p><span>{{ $user_billing->postal_code }}</span>
                                            <br><br>
                                            <p class="text-primary mb-1"><i class="fas fa-city"></i>  City </p><span>{{ $city->name }}</span>
                                            <br><br>
                                            <p class="text-primary mb-1"><i class="fas fa-address-card"></i> Full Address </p>
                                                <span style="white-space: pre-line">{{ $user_billing->address }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-hover mb-4">
                                                <thead class="bg-gray-300">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Item Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Colour</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Sale Center</th>
                                                    <th scope="col">Sale Center Status</th>
                                                    <th scope="col">Assign Order</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $count = 1 @endphp
                                                @foreach($orders as $order)
                                                    <form method="POST" action="{{route('sale_center_order.assign')}}">
                                                        @csrf
                                                        <input type="hidden" name="order_number" value="{{ $orders[0]->order_number }}">
                                                        <tr>
                                                            <th scope="row">{{$order->id}}</th>
                                                            <td>
                                                                @php $product = \App\Models\Product::where('id',$order->product_id)->first() @endphp

                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                {{ $product->name }}
                                                            </td>
                                                            <td>

                                                                {{ $order->quantity }}

                                                                <input type="hidden" name="quantity" value="{{ $order->quantity }}">

                                                            </td>
                                                            <td>
                     @php $colour = \App\Models\Colour::where('id',2)->first() @endphp

        <div style="background-color: {{ $colour->colourCode }}; width:25px; height: 25px; font-size: 0;">

                                                                </div>

                                                                <input type="hidden" name="colour_id" value="{{ $colour->id }}">

                                                            </td>
                                                            <td>
                                                                @php $size = \App\Models\Size::where('id',$order->size_id)->first() @endphp

                                                                {{ $size->sizeName }}

                                                                <input type="hidden" name="size_id" value="{{ $size->id }}">
                                                            </td>
                                                                @php $sale_center = \App\Models\SaleCenterOrder::where('order_number',$orders[0]->order_number)
                                                                                ->where('product_id',$product->id)
                                                                                ->first();
                                                                @endphp
                                                            <td>
                                                                @if(!empty($sale_center))
                                                                    @php $sc = \App\Models\SaleCenter::where('id',$sale_center->salecenter_id)->first() @endphp

                                                                    {{ $sc->name }}
                                                                @else
                                                                    Not Assigned
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!empty($sale_center))
                                                                        @if($sale_center->status == 1)

                                                                            <span class="badge badge-primary" style="font-size:15px;">{{ 'Pending' }}</span>

                                                                        @elseif($sale_center->status == 2)

                                                                            <span class="badge badge-secondary" style="font-size:15px;">{{ 'Process' }}</span>

                                                                        @elseif($sale_center->status == 3)

                                                                            <span class="badge badge-warning" style="font-size:15px;">{{ 'Shipment' }}</span>

                                                                        @elseif($sale_center->status == 4)

                                                                            <span class="badge badge-success" style="font-size:15px;">{{ 'delivered' }}</span>

                                                                        @endif
                                                                    @else
                                                                        Not Defined
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @php $salecenters = \App\Models\SaleCenter::all(); @endphp

                                                                <select class="form-control js-example-basic-single{{ $count }}  @error('salecenter_id') is-invalid @enderror" name="salecenter_id">
                                                                    <option selected disabled> Select SaleCenter </option>
                                                                    @foreach($salecenters as $index=>$salecenter)
                                                                        @php
                                                                            ${"$sale_center"} = \App\Models\SaleCenterOrder::where('salecenter_id',$salecenter->id)
                                                                            ->where('product_id',$product->id)
                                                                            ->where('order_number',$orders[0]->order_number)
                                                                            ->first();

                                                                            if(!empty(${"$sale_center"})){
                                                                                continue;
                                                                            }
                                                                        @endphp
                                                                        <option value="{{ $salecenter->id }}">{{ $salecenter->name  }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('salecenter_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </td>
                                                            <td>
                                                                @if(!empty($sale_center))

                                                                    <input type="hidden" name="reassign" value="reassign">

                                                                    <button type="submit"  class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                                            class="nav-icon font-weight-bold"></i> Reassign </button>
                                                                    @else
                                                                    <button type="submit"  class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                                            class="nav-icon font-weight-bold"></i> Assign </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </form>
                                                    @php $count++; @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
@php
    $sumofquantity = DB::table('Orders')->where('order_number', $orders[0]->order_number)->sum('quantity');
    @endphp

             <div class="col-md-12">
                <div class="invoice-summary">
                 <p>Sub total: <span>{{ $orders[0]->sub_total_amount }}</span></p>
                    <p>Discount: <span>{{ $orders[0]->discount }}</span></p>


                      @php
                 $delivery_total=$orders[0]->delivery_charges*$product->product_weight*$sumofquantity;
                $deliv = $orders[0]->delivery_charges; 
                    @endphp
                <p>Delivery Charges: <span>{{  $deliv }}</span></p>
                <p>Total Delivery Charges: <span>{{  $delivery_total }}</span></p>
              <h5 class="font-weight-bold">Grand Total: <span>{{ $orders[0]->sub_total_amount+$delivery_total }}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==== / Print Area =====-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of main-content -->
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-5"> </div>
            <div class="col-sm-2">
                <a href="{{route('order.index')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                class="nav-icon font-weight-bold"></i>Go Back</a>
            </div>
            <div class="col-sm-5"> </div>
        </div>
@endsection

@section('page_css')
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        var i;

        $(document).ready(function() {

            for(var i=1;i<{{ $count }};i++){

                $('.js-example-basic-single'+i).select2({
                    dropdownAutoWidth : true,
                    width: 'auto'
                });

            }

        });

    </script>
@endsection
