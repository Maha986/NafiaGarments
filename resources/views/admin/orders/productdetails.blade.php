@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{ $activePage = 'orderIndex2', $title = 'Orders - Nafia Garments' }}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders</h4>
            </div>

            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Order Product Details</h4>


                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>

                                        <th>Product Color</th>
                                        <th>Product Size </th>
                                        <th>Total Amount</th>
                                        <th>Order_Id</th>
                                        <th>Sale Center</th>
                                        <th>Product Owner</th>
                                        <th>Product Supplier</th>

                                        <th>Created At</th>
                                        <th>Action</th>
                                        <th>Item Return</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $productorder)
                                        <tr>
                                            @php
                                                $p = App\Models\Product::where('id', $productorder->product_id)->first();
                                            @endphp
                                            <td>{{ $productorder->id }}</td>
                                            <td>{{ $p->name }} </td>
                                            <td>{{ $productorder->product_quantity }}</td>


                                            @php
                                                $colorr = \App\Models\Colour::where('id', $productorder->color)->first();
                                            @endphp
                                            @if ($colorr != null)
                                                <td>

                                                    <div
                                                        style="background-color: {{ $colorr->colourCode }}; width:25px; height: 25px; font-size: 0;">
                                                    </div>
                                                @else
                                                <td>-</td>
                                            @endif


                                            </td>
                                            @if ($productorder->size == '1')
                                                <td>Small</td>
                                            @elseif($productorder->size == '2')
                                                <td>Medium</td>
                                            @elseif($productorder->size == '3')
                                                <td>Large</td>
                                            @elseif($productorder->size == '4')
                                                <td>Xlarge</td>
                                            @else
                                                <td>- </td>
                                            @endif
                                            <td>{{ $productorder->total_price }} + {{ $productorder->product_weight }} =
                                                {{ $productorder->product_weight + $productorder->total_price }} </td>
                                            <td>{{ $productorder->order_id }}</td>
                                            @php
                                                $salecenterorder = \App\Models\SaleCenterOrder::where('order_number', $productorder->order_id)->first();
                                                
                                            @endphp

                                            @if ($salecenterorder)
                                                <td>{{ $salecenterorder->salecenter_id }}</td>
                                            @else
                                                <td>No Assign</td>
                                            @endif

                                            @php
                                                $o = App\Models\Owner::where('id', $productorder->product_owner)->first();
                                            @endphp
                                            @if ($o != null)
                                                <td>{{ $o->name }}</td>
                                            @else
                                                <td>-</td>
                                            @endif

                                            @php
                                                $s = App\Models\Supplier::where('id', $productorder->supplier)->first();
                                            @endphp

                                            @if ($s != null)
                                                <td>{{ $s->name }}</td>
                                            @else
                                                <td>-</td>
                                            @endif

                                            <td>{{ $productorder->created_at->diffForHumans() }}</td>


                                            <td>

                                                @php $one = 0 ; @endphp

                                                @php $two = 0 @endphp

                                                @php
                                                    
                                                    $deal = App\Models\ColourImageProductSize::where('product_id', $productorder->product_id)->first();
                                                    if ($deal->deal != null) {
                                                        $salecenter_yes = \App\Models\ProductForSaleCenter::where('product_id', $productorder->product_id)->first();
                                                    } elseif ($deal->deal == null) {
                                                        $salecenter_yes = \App\Models\ProductForSaleCenter::where('product_id', $productorder->product_id)
                                                            ->where('size', $productorder->size)
                                                            ->where('color', $productorder->color)
                                                            ->first();
                                                    }
                                                    
                                                    if ($deal->deal != null) {
                                                        $productowner_yes = \App\Models\ProductForOwner::where('product_id', $productorder->product_id)->first();
                                                    } elseif ($deal->deal == null) {
                                                        $productowner_yes = \App\Models\ProductForOwner::where('product_id', $productorder->product_id)
                                                            ->where('size_id', $productorder->size)
                                                            ->where('color_id', $productorder->color)
                                                            ->first();
                                                    }
                                                @endphp

                                                @php
                                                    $advancepayment = \App\Models\advancepayment::where('order_id', $productorder->order_id)->first();
                                                @endphp

                                                <!-- advancepayment start -->

                                                <!-- agar advance payment he -->
                                              
                                                @if (isset($advancepayment))
                                                    <!-- ye wala -->
                                                    @if ($advancepayment->status == 0)
                                                        <span class="badge badge-warning" style="font-size:15px;"><b>Advance
                                                                Payment Not Approved By Accountant</b></span>
                                                    @elseif($advancepayment->status == 1 || $advancepayment == null)
                                                        @if ($salecenter_yes && $productowner_yes)
                                                            <!-- start -->

                                                            @php $one = 0 ; @endphp
                                                            @php $two = 0 @endphp
                                                            @php
                                                                
                                                                $salecenterorder = \App\Models\SaleCenterOrder::where('order_number', $productorder->order_id)
                                                                    ->where('product_id', $productorder->product_id)
                                                                    ->first();
                                                                
                                                                if ($salecenterorder) {
                                                                    $status = $salecenterorder->status;
                                                                } else {
                                                                    $status = 0;
                                                                }
                                                                
                                                            @endphp


                                                            @php
                                                                
                                                                $productid = \App\Models\Product::where('id', $productorder->product_id)->first();
                                                                
                                                                $riderorder = \App\Models\riderordercustomer::where('order_id', $productorder->order_id)
                                                                    ->where('product_name', $productid->name)
                                                                    ->first();
                                                                
                                                            @endphp

                                                            @if ($riderorder)
                                                                <!-- rider if -->
                                                                @php $one = 0 ; @endphp
                                                                @php $two = 0 @endphp


                                                                @php
                                                                    
                                                                    $productid = \App\Models\Product::where('id', $productorder->product_id)->first();
                                                                    
                                                                    $riderproductorder = \App\Models\riderordercustomer::where('order_id', $productorder->order_id)
                                                                        ->where('product_name', $productid->name)
                                                                        ->first();
                                                                    
                                                                    if ($riderproductorder) {
                                                                        $statuss = $riderproductorder->status;
                                                                    } else {
                                                                        $statuss = 0;
                                                                    }
                                                                    
                                                                @endphp

                                                                @if ($statuss == 4)
                                                                    <!-- when rider confirms -->
                                                                    @php $one = 1; @endphp
                                                                    <!-- <h5><b> Recieved by customer </b></h5> -->
                                                                    @if (!$productorder->order_status == 1)
                                                                        <span class="badge badge-success"
                                                                            style="font-size:15px;"><b>Recieved By
                                                                                Customer</b></span>
                                                                        <a href=" {{ route('closingorder', ['ordernumber' => $productorder->order_id, 'id' => $productorder->id]) }} "
                                                                            class="btn btn-raised btn-raised-info m-1"
                                                                            style="color: white">Close Order </a>
                                                                    @else
                                                                        <span class="badge badge-success"
                                                                            style="font-size:15px;"><b>ORDER
                                                                                CLOSED</b></span>
                                                                        <a href=" {{ route('closingorder_check', ['ordernumber' => $productorder->order_id, 'id' => $productorder->id]) }} "
                                                                            class="btn btn-raised btn-raised-info m-1"
                                                                            style="color: white"> Check Order </a>
                                                                    @endif
                                                                @elseif($statuss == 3)
                                                                    <h5><b> Ready To Go </b></h5>
                                                                @else
                                                                    @php $one = 0 ; @endphp
                                                                    @php $two = 0 @endphp
                                                                    <a href=" {{ route('editassignrider', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $salecenterorder->salecenter_id, 'name3' => $riderorder->id]) }} "
                                                                        class="btn btn-raised btn-raised-success m-1"
                                                                        style="color: white">Reassign Rider </a>
                                                                @endif
                                                                <!--  when rider confirms end -->
                                                            @else
                                                                @php $one = 0 ; @endphp
                                                                @php $two = 0 @endphp

                                                                @if ($status == 3)
                                                                    <!-- ye wala -->
                                                                    @if ($productorder->packing_status == 0)
                                                                        <a href="{{ route('confirmpacking', $productorder->id) }}"
                                                                            class="btn btn-raised btn-raised-success m-1"
                                                                            style="color: white">Confirm Packing</a>
                                                                    @else
                                                                        @php
                                                                            $salereturnn = App\Models\salereturn::where('product_order_number', $productorder->id)->first();
                                                                        @endphp
                                                                        @if ($salereturnn == null)
                                                                            <a href=" {{ route('assignrider', ['id' => $salecenterorder->id, 'name' => $productorder->order_id, 'name2' => $salecenterorder->salecenter_id]) }} "
                                                                                class="btn btn-raised btn-raised-primary m-1"
                                                                                style="color: white">Assign Rider</a>

                                                                            <a href=" {{ route('cour') }} "
                                                                                class="btn btn-raised btn-raised-success m-1"
                                                                                style="color: white">Assign Courier</a>
                                                                        @else
                                                                            <span class="badge badge-warning"
                                                                                style="font-size:15px;"><b>Item
                                                                                    Returned</b></span>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @php $one = 0 ; @endphp
                                                                    @php $two = 0 @endphp

                                                                    @if ($salecenterorder)
                                                                        <!-- start2 -->
                                                                        <a href="{{ route('editassignproduct', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $salecenterorder->id]) }}"
                                                                            class="btn btn-raised btn-raised-success m-1"
                                                                            style="color: white">Reassign Sale Center</a>
                                                                    @else
                                                                        @php $one = 0 ; @endphp
                                                                        @php $two = 0 @endphp

                                                                        <a href=" {{ route('assignproduct', [$productorder['product_id'], $productorder['id']]) }}"
                                                                            class="btn btn-raised btn-raised-primary m-1"
                                                                            style="color: white">Assign Sale Center</a>
                                                                    @endif <!-- endstart2 -->
                                                                @endif <!--  end ye wala -->
                                                            @endif <!--  end rider if -->
                                                        @else
                                                            @php $one = 0 ; @endphp
                                                            @php $two = 0 @endphp

                                                            @php
                                                                $productid = \App\Models\Product::where('id', $productorder->product_id)->first();
                                                                $productid->name;
                                                                
                                                                $riderorderr = \App\Models\riderproductorder::where('order_id', $productorder->order_id)
                                                                    ->where('product_name', $productid->name)
                                                                    ->first();
                                                                
                                                            @endphp

                                                            @if ($riderorderr)
                                                                <!-- module 2 rider -->

                                                                @php
                                                                    
                                                                    $riderorderrr = \App\Models\riderproductorder::where('order_id', $productorder->order_id)
                                                                        ->where('product_name', $productid->name)
                                                                        ->first();
                                                                    
                                                                    if ($riderorderrr) {
                                                                        $statusss = $riderorderrr->status;
                                                                    } 
                                                                    else {
                                                                        $statusss = 0;
                                                                    }
                                                                @endphp


                                                                @php
                                                                    
                                                                    $riderordercustomer = \App\Models\riderordercustomer::where('order_id', $productorder->order_id)
                                                                        ->where('product_name', $productid->name)
                                                                        ->first();
                                                                    
                                                                    if ($riderordercustomer) {
                                                                        $statussss = $riderordercustomer->status;
                                                                    } else {
                                                                        $statussss = 0;
                                                                    }
                                                                @endphp

                                                                @if ($statussss == 4)
                                                                    @if (!$productorder->order_status == 1)
                                                                        <span class="badge badge-success"
                                                                            style="font-size:15px;"><b>Recieved By
                                                                                Customer</b></span>
                                                                        <a href=" {{ route('closingorder', ['ordernumber' => $productorder->order_id, 'id' => $productorder->id]) }} "
                                                                            class="btn btn-raised btn-raised-info m-1"
                                                                            style="color: white">Close Order </a>
                                                                    @else
                                                                        <span class="badge badge-success"
                                                                            style="font-size:15px;"><b>ORDER
                                                                                CLOSED</b></span>
                                                                        <a href=" {{ route('closingorder_check', ['ordernumber' => $productorder->order_id, 'id' => $productorder->id]) }} "
                                                                            class="btn btn-raised btn-raised-info m-1"
                                                                            style="color: white"> Check Order </a>
                                                                    @endif
                                                                @elseif($statussss == 1)
                                                                    <span class="badge badge-secondary"
                                                                        style="font-size:15px;"><b>Recieved By
                                                                            Admin</b></span>
                                                                    <span class="badge badge-warning"
                                                                        style="font-size:15px;"><b>Admin Assigned
                                                                            Rider(pending)</b></span>
                                                                @elseif($statussss == 2)
                                                                    <span class="badge badge-secondary"
                                                                        style="font-size:15px;"><b>Recieved By
                                                                            Admin</b></span>

                                                                    <h5> <b>Admin Assigned Rider(process)</b> </h5>
                                                                @elseif($statussss == 3)
                                                                    <span class="badge badge-success"
                                                                        style="font-size:15px;"><b>Recieved By
                                                                            Admin</b></span>
                                                                    <h5> <b>Admin Assigned Rider(Ready To Dispatch)</b>
                                                                    </h5>
                                                                @endif

                                                                @if ($statusss == 4)
                                                                    <!-- when rider2 confirms -->
                                                                    @php $two = 2 @endphp
                                                                    <div class="row">
                                                                        @if (!$statussss)
                                                                            @if ($productorder->packing_status == 1)
                                                                                <!-- //yewala -->

                                                                                <div class="col-6">

                                                                                    <p> <b>Recieved By Admin/store</b>
                                                                                    <p>
                                                                                        <a href="{{ route('assignrider3', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $productorder->id]) }}"
                                                                                            class="btn btn-raised btn-raised-primary m-1"
                                                                                            style="color: white">Deliver By
                                                                                            Rider</a>

                                                                                        <a href=""
                                                                                            class="btn btn-raised btn-raised-success m-1"
                                                                                            style="color: white">Deliver By
                                                                                            Courier</a>
                                                                                </div>
                                                                            @else
                                                                                <div class="col-6">
                                                                                    <p> <b>Recieved By Store</b>
                                                                                    <p>

                                                                                </div>
                                                                                <div class="col-6">

                                                                                    <a href="{{ route('notrecieve', $riderorderrr) }}"
                                                                                        class="btn btn-raised btn-raised-primary m-1"
                                                                                        style="color: white">Not
                                                                                        Recieved</a>

                                                                                </div>

                                                                                <div class="col-12">
                                                                                    @if ($salecenter_yes == null)
                                                                                        <a href="{{ route('product_salecenter.index') }}"
                                                                                            class="btn btn-raised btn-raised-success m-1"
                                                                                            style="color: white">Add Product
                                                                                            in salecenter</a>
                                                                                    @endif

                                                                                    @if ($productowner_yes == null)
                                                                                        <a href="{{ route('owner.assign') }}"
                                                                                            class="btn btn-raised btn-raised-success m-1"
                                                                                            style="color: white">Add Product
                                                                                            in owner</a>
                                                                                    @endif
                                                                                </div>
                                                                            @endif <!-- yewala end -->
                                                                        @endif
                                                                    </div>


                                                                  </div>
                                                                @else
                                                                    @php $one = 0 ; @endphp

                                                                    <a href="{{ route('editassignrider2', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $riderorderr->id]) }} "
                                                                        class="btn btn-raised btn-raised-success m-1" style="color: white">Reassign Rider
                                                                        2{{ $productorder->product_id }}</a>
                                                                @endif <!-- when rider2 confirms end -->
                                                            @else
                                                                @php $one = 0 ; @endphp
                                                                @php
                                                                    $advancepayment = \App\Models\advancepayment::where('order_id', $productorder->order_id)->first();
                                                                @endphp
                                                                <!-- advancepayment start -->
                                                                
                                                                @if (isset($advancepayment))
                                                                    <!-- ye wala -->
                                                                    @if ($advancepayment->status == 0)
                                                                        <span class="badge badge-warning" style="font-size:15px;"><b>Advance Payment Not Approved By
                                                                                Accountant</b></span>
                                                                    @elseif($advancepayment->status == 1)
                                                                        <!-- confirm order start -->
                                                                        @if ($productorder->confirm_order == '' || $productorder->confirm_order == 0)
                                                                            <a href="{{ route('courier_rider', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $productorder->id]) }}"
                                                                                class="btn btn-raised btn-raised-success m-1" style="color: white">Confirm Process
                                                                            </a>


                                                                            <a href="{{ route('notavailable', ['pro_id' => $productorder->id, 'pro_order_id' => $productorder->order_id, 'pro_weight' => $productorder->product_weight, 'pro_totalprice' => $productorder->total_price]) }}"
                                                                                class="btn btn-raised btn-raised-primary m-1" style="color: white">Not Available</a>
                                                                        @elseif($productorder->confirm_order == 1)
                                                                            <a href="{{ route('assignrider2', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $productorder->id]) }}"
                                                                                class="btn btn-raised btn-raised-success m-1" style="color: white">Pick By Rider</a>


                                                                            <a href="{{ route('notavailable', ['pro_id' => $productorder->id, 'pro_order_id' => $productorder->order_id, 'pro_weight' => $productorder->product_weight, 'pro_totalprice' => $productorder->total_price]) }}"
                                                                                class="btn btn-raised btn-raised-primary m-1" style="color: white">Pick By
                                                                                  Courier</a>
                                                                        @endif
                                                                          <!-- confirm order end -->
                                                                    @endif
                                                                        <!-- ye wala end -->
                                                                @else
                                                                        <!-- confirm order start -->
                                                                        @if ($productorder->confirm_order == '' || $productorder->confirm_order == 0)
                                                                            <a href="{{ route('courier_rider', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $productorder->id]) }}"
                                                                                class="btn btn-raised btn-raised-success m-1" style="color: white">Confirm Process</a>


                                                                            <a href="{{ route('notavailable', ['pro_id' => $productorder->id, 'pro_order_id' => $productorder->order_id, 'pro_weight' => $productorder->product_weight, 'pro_totalprice' => $productorder->total_price]) }}"
                                                                                class="btn btn-raised btn-raised-primary m-1" style="color: white">Not Available</a>
                                                                        @elseif($productorder->confirm_order == 1)
                                                                            <a href="{{ route('assignrider2', ['id' => $productorder->product_id, 'name' => $productorder->order_id, 'name2' => $productorder->id]) }}"
                                                                                class="btn btn-raised btn-raised-success m-1" style="color: white">Pick By Rider </a>


                                                                            <a href="{{ route('notavailable', ['pro_id' => $productorder->id, 'pro_order_id' => $productorder->order_id, 'pro_weight' => $productorder->product_weight, 'pro_totalprice' => $productorder->total_price]) }}"
                                                                                class="btn btn-raised btn-raised-primary m-1" style="color: white">Pick By Courier</a>
                                                                        @endif
                                                                        <!-- confirm order end -->
                                                                @endif
                                                                    <!-- advancepayment end -->
                                                            @endif
                                                                <!--  module 2 rider end -->
                                                        @endif <!-- endstart -->

                                                    @endif
                                                @endif
                                                    <!-- advance payment start goes to end -->


                        </td>
                        @php
                            $salereturnn = App\Models\salereturn::where('product_order_number', $productorder->id)->first();
                        @endphp
                        @if ($productorder->packing_status == 1)
                            @if ($salereturnn == null)
                                <td><a href="{{ route('salereturn_after_order', ['pro_id' => $productorder->id]) }}"
                                        class="btn btn-raised btn-raised-primary m-1" style="color: white">Return</a></td>
                            @else
                                <td> - </td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                        </tr>
                        @endforeach




                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <center>
        <h4> <b> Status </b> </h4>
        @if ($one == 1 && $two == 2)
            <h5> All Products are dispatched</h5>
        @else
            <h5> Pending</h5>
        @endif
    </center>



@endsection
@section('page_css')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/css/plugins/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/plugins/datatables.min.css') }}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    {{-- <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"> --}}
    {{-- <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script> --}}
    {{-- <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script> --}}
    <script src="{{ asset('admin-assets/js/plugins/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/datatables.script.min.js') }}"></script>
@endsection
