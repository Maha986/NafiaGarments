@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'offerIndex', $title = 'Offers - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Offers</h4>
            </div>

             <div style="float:right; margin-right: 50%; ">
                            <a href="{{route('buy_1_get_1_offer_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Buy one get one free</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create offers'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('buy_1_get_1_offer.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Buy 1 Get 1 Offer</a>
                            <br> <br>
                        </div>

                       



                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($buy_1_get_1_frees as $buy_1_get_1_free)
                                    <tr>
                                        <td>{{$buy_1_get_1_free->id}}</td>
                                        <td>{{$buy_1_get_1_free->offer}}</td>
                                        <td>
                                            @php $product = \App\Models\Product::where('id',$buy_1_get_1_free->product_id)->first() @endphp
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            @php $size = \App\Models\Size::where('id',$buy_1_get_1_free->size_id)->first() @endphp
                                            {{ $size->sizeName }}
                                        </td>
                                        <td>{{$buy_1_get_1_free->start_date}}</td>
                                        <td>{{$buy_1_get_1_free->end_date}}</td>
                                        <td>{{$buy_1_get_1_free->deal_for}}</td>
                                        @php

                                            if($buy_1_get_1_free->deal_for == "customer"){

                                                $customer = \App\Models\Customer::where('id',$buy_1_get_1_free->specific_deal_for)->first();

                                                if(!empty($customer)){

                                                @endphp

                                                <td>{{$customer->name}}</td>

                                                @php
                                                }
                                                else{

                                                    @endphp

                                                    <td> </td>

                                                    @php

                                                }

                                            }
                                            else if($buy_1_get_1_free->deal_for == "reseller"){

                                                $reseller = \App\Models\Reseller::where('id',$buy_1_get_1_free->specific_deal_for)->first();

                                                if(!empty($reseller)){

                                                    @endphp

                                                    <td>{{$reseller->name}}</td>

                                                    @php
                                                }
                                                else{

                                                    @endphp

                                                    <td> </td>

                                                    @php

                                                }

                                            }

                                        @endphp
                                        <td>{{$buy_1_get_1_free->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$buy_1_get_1_free->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit offers'))
                                            <a href="{{route('buy_1_get_1_offer.edit',$buy_1_get_1_free)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete offers'))
                                            <form method="POST" action="{{route('buy_1_get_1_offer.destroy',$buy_1_get_1_free)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('offers status'))
                                                @if($buy_1_get_1_free->status == 0)
                                                    <form method="POST" action="{{route('buy_1_get_1_offer.status',$buy_1_get_1_free)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="buy_1_get_1_offer" value="buy_1_get_1_offer"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($buy_1_get_1_free->status == 1)
                                                    <form method="POST" action="{{route('buy_1_get_1_offer.status',$buy_1_get_1_free)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="buy_1_get_1_offer" value="buy_1_get_1_offer"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> InActive </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{--        free delivery--}}


        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;"> Free Delivery </h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create offers'))
                            <div style="float:right; margin-right: 1%;">
                                <a href="{{route('free_delivery.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                        class="nav-icon font-weight-bold"></i>Add New Free Delivery</a>
                                <br> <br>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Start Date</th>
                                    <th>End Date
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($free_deliveries as $free_delivery)
                                        <tr>
                                            <td>{{$free_delivery->id}}</td>
                                            <td>{{$free_delivery->offer}}</td>
                                            <td>
                                                @php $product = \App\Models\Product::where('id',$free_delivery->product_id)->first() @endphp
                                                {{ $product->name }}
                                            </td>
                                            <td>{{$free_delivery->start_date}}</td>
                                            <td>{{$free_delivery->end_date}}</td>
                                            <td>{{$free_delivery->deal_for}}</td>
                                            @php

                                                if($free_delivery->deal_for == "customer"){

                                                    $customer = \App\Models\Customer::where('id',$free_delivery->specific_deal_for)->first();

                                                    if(!empty($customer)){

                                            @endphp

                                            <td>{{$customer->name}}</td>

                                            @php
                                                }
                                                else{

                                            @endphp

                                            <td> </td>

                                            @php

                                                }

                                            }
                                            else if($free_delivery->deal_for == "reseller"){

                                                $reseller = \App\Models\Reseller::where('id',$free_delivery->specific_deal_for)->first();

                                                if(!empty($reseller)){

                                            @endphp

                                            <td>{{$reseller->name}}</td>

                                            @php
                                                }
                                                else{

                                            @endphp

                                            <td> </td>

                                            @php

                                                }

                                            }

                                            @endphp
                                            <td>{{$free_delivery->status == '1' ? 'Active':'InActive'}}</td>
                                            <td>{{$free_delivery->created_at->diffForHumans()}}</td>
                                            <td>
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit offers'))
                                                <a href="{{route('free_delivery.edit',$free_delivery)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete offers'))
                                                <form method="POST" action="{{route('free_delivery.destroy',$free_delivery)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                                </form>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('offers status'))
                                                    @if($free_delivery->status == 0)
                                                        <form method="POST" action="{{route('free_delivery.status',$free_delivery)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="free_delivery" value="free_delivery"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                    class="nav-icon font-weight-bold"></i> Active </button>
                                                        </form>
                                                    @elseif($free_delivery->status == 1)
                                                        <form method="POST" action="{{route('free_delivery.status',$free_delivery)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="free_delivery" value="free_delivery"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                    class="nav-icon font-weight-bold"></i> InActive </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        voucher code --}}


        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;"> Voucher Code </h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create offers'))
                            <div style="float:right; margin-right: 1%;">
                                <a href="{{route('voucher_code.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                        class="nav-icon font-weight-bold"></i>Add New Voucher Code</a>
                                <br> <br>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Product_Size</th>
                                    <th>Code</th>
                                    <th>Minimum Amount</th>
                                    <th>Discount</th>
                                    <th>No of times</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($voucher_codes as $voucher_code)
                                    <tr>
                                        <td>{{$voucher_code->id}}</td>
                                        <td>{{$voucher_code->offer}}</td>

<td>
 @php
  
  $product = App\Models\ColourImageProductSize::where('id',$voucher_code->product_id)->first();

 @endphp
    {{ $product->id}}</td>
<td>{{$voucher_code->size_id}}</td>


                                        <td>{{$voucher_code->code}}</td>
                                        <td>{{$voucher_code->min_amount}}</td>
                                        <td>{{$voucher_code->discount}}</td>
                                        <td>{{$voucher_code->no_of_times}}</td>
                                        <td>{{$voucher_code->start_date}}</td>
                                        <td>{{$voucher_code->end_date}}
                                        <td>{{$voucher_code->deal_for}}</td>
                                        @php

                                            if($voucher_code->deal_for == "customer"){

                                                $customer = \App\Models\Customer::where('id',$voucher_code->specific_deal_for)->first();

                                                if(!empty($customer)){

                                        @endphp

                                        <td>{{$customer->name}}</td>

                                        @php
                                            }
                                            else{

                                        @endphp

                                        <td> </td>

                                        @php

                                            }

                                        }
                                        else if($voucher_code->deal_for == "reseller"){

                                            $reseller = \App\Models\Reseller::where('id',$voucher_code->specific_deal_for)->first();

                                            if(!empty($reseller)){

                                        @endphp

                                        <td>{{$reseller->name}}</td>

                                        @php
                                            }
                                            else{

                                        @endphp

                                        <td> </td>

                                        @php

                                            }

                                        }

                                        @endphp
                                        <td>{{$voucher_code->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$voucher_code->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit offers'))
                                            <a href="{{route('voucher_code.edit',$voucher_code)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete offers'))
                                            <form method="POST" action="{{route('voucher_code.destroy',$voucher_code)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('offers status'))
                                                @if($voucher_code->status == 0)
                                                    <form method="POST" action="{{route('voucher_code.status',$voucher_code)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="voucher_code" value="voucher_code"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($voucher_code->status == 1)
                                                    <form method="POST" action="{{route('voucher_code.status',$voucher_code)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="voucher_code" value="voucher_code"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> InActive </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Offer</th>
                                    <th>Product</th>
                                    <th>Product_Size</th>
                                    <th>Code</th>
                                    <th>Minimum Amount</th>
                                    <th>Discount</th>
                                    <th>No of times</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Deal For</th>
                                    <th>Specific Deal For</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
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
