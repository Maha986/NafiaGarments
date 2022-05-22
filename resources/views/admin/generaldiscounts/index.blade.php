@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'generaldiscountIndex', $title = 'Offers - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All General Discounts</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Product Discount</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create general discounts'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('product_discount.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Product Discount</a>
                            <br> <br>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>General Discount</th>
                                    <th>Product</th>
                                    <th>Discount</th>
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
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->general_discount}}</td>
                                        <td>
                                            @php $p = \App\Models\Product::where('id',$product->product_id)->first() @endphp
                                            {{ $p->name }}
                                        </td>
                                        <td>{{$product->discount}}%</td>
                                        <td>{{$product->start_date}}</td>
                                        <td>{{$product->end_date}}</td>
                                        <td>{{$product->deal_for}}</td>
                                        @php

                                            if($product->deal_for == "customer"){

                                                $customer = \App\Models\Customer::where('id',$product->specific_deal_for)->first();

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
                                        else if($product->deal_for == "reseller"){

                                            $reseller = \App\Models\Reseller::where('id',$product->specific_deal_for)->first();

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
                                        <td>{{$product->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit general discounts'))
                                            <a href="{{route('product_discount.edit',$product)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete general discounts'))
                                            <form method="POST" action="{{route('product_discount.destroy',$product)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('general discounts status'))
                                                @if($product->status == 0)
                                                    <form method="POST" action="{{route('product_discount.status',$product)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="product" value="product"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($product->status == 1)
                                                    <form method="POST" action="{{route('product_discount.status',$product)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="product" value="product"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
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
                                    <th>General Discount</th>
                                    <th>Product</th>
                                    <th>Discount</th>
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


{{--        category --}}


        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;"> Category Discount </h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create general discounts'))
                            <div style="float:right; margin-right: 1%;">
                                <a href="{{route('category_discount.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                        class="nav-icon font-weight-bold"></i>Add New Category Discount</a>
                                <br> <br>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>General Discount</th>
                                    <th>Category</th>
                                    <th>Discount</th>
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
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->general_discount}}</td>
                                            <td>
                                                @php $c = \App\Models\Category::where('id',$category->category_id)->first() @endphp
                                                {{ $c->title }}
                                            </td>
                                            <td>{{$category->discount}}%</td>
                                            <td>{{$category->start_date}}</td>
                                            <td>{{$category->end_date}}</td>
                                            <td>{{$category->deal_for}}</td>
                                            @php

                                                if($category->deal_for == "customer"){

                                                    $customer = \App\Models\Customer::where('id',$category->specific_deal_for)->first();

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
                                            else if($category->deal_for == "reseller"){

                                                $reseller = \App\Models\Reseller::where('id',$category->specific_deal_for)->first();

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
                                            <td>{{$category->status == '1' ? 'Active':'InActive'}}</td>
                                            <td>{{$category->created_at->diffForHumans()}}</td>
                                            <td>
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit general discounts'))
                                                    <a href="{{route('category_discount.edit',$category)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                            class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete general discounts'))
                                                    <form method="POST" action="{{route('category_discount.destroy',$category)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                                    </form>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('general discounts status'))
                                                    @if($category->status == 0)
                                                        <form method="POST" action="{{route('category_discount.status',$category)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="category" value="category"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                    class="nav-icon font-weight-bold"></i> Active </button>
                                                        </form>
                                                    @elseif($category->status == 1)
                                                        <form method="POST" action="{{route('category_discount.status',$category)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="category" value="category"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
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
                                    <th>General Discount</th>
                                    <th>Category</th>
                                    <th>Discount</th>
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

        {{--        Customer --}}


{{--        <div class="row mb-4">--}}
{{--            <div class="col-md-12 mb-4">--}}
{{--                <div class="card text-left">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title mb-3" style="display: inline;"> Customer Discount </h4>--}}
{{--                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create general discounts'))--}}
{{--                            <div style="float:right; margin-right: 1%;">--}}
{{--                                <a href="{{route('customer_discount.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i--}}
{{--                                        class="nav-icon font-weight-bold"></i>Add New Customer Discount</a>--}}
{{--                                <br> <br>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>General Discount</th>--}}
{{--                                    <th>Customer</th>--}}
{{--                                    <th>Discount</th>--}}
{{--                                    <th>Start Date</th>--}}
{{--                                    <th>End Date</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($customers as $customer)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$customer->id}}</td>--}}
{{--                                        <td>{{$customer->general_discount}}</td>--}}
{{--                                        <td>--}}
{{--                                            @php $c = \App\Models\User::where('id',$customer->customer_id)->first() @endphp--}}
{{--                                            {{ $c->name }}--}}
{{--                                        </td>--}}
{{--                                        <td>{{$customer->discount}}%</td>--}}
{{--                                        <td>{{$customer->start_date}}</td>--}}
{{--                                        <td>{{$customer->end_date}}</td>--}}
{{--                                        <td>{{$customer->status == '1' ? 'Active':'InActive'}}</td>--}}
{{--                                        <td>{{$customer->created_at->diffForHumans()}}</td>--}}
{{--                                        <td>--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit general discounts'))--}}
{{--                                                <a href="{{route('customer_discount.edit',$customer)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i--}}
{{--                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></a>--}}
{{--                                            @endif--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete general discounts'))--}}
{{--                                                <form method="POST" action="{{route('customer_discount.destroy',$customer)}}">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i--}}
{{--                                                            class="nav-icon i-Close-Window font-weight-bold"></i></button>--}}
{{--                                                </form>--}}
{{--                                            @endif--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('general discounts status'))--}}
{{--                                                @if($customer->status == 0)--}}
{{--                                                    <form method="POST" action="{{route('customer_discount.status',$customer)}}">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" name="customer" value="customer"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i--}}
{{--                                                                class="nav-icon font-weight-bold"></i> Active </button>--}}
{{--                                                    </form>--}}
{{--                                                @elseif($customer->status == 1)--}}
{{--                                                    <form method="POST" action="{{route('customer_discount.status',$customer)}}">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" name="customer" value="customer"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i--}}
{{--                                                                class="nav-icon font-weight-bold"></i> InActive </button>--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>General Discount</th>--}}
{{--                                    <th>Customer</th>--}}
{{--                                    <th>Discount</th>--}}
{{--                                    <th>Start Date</th>--}}
{{--                                    <th>End Date</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        {{--        Reseller --}}


{{--        <div class="row mb-4">--}}
{{--            <div class="col-md-12 mb-4">--}}
{{--                <div class="card text-left">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title mb-3" style="display: inline;"> Reseller Discount </h4>--}}
{{--                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create offers'))--}}
{{--                            <div style="float:right; margin-right: 1%;">--}}
{{--                                <a href="{{route('reseller_discount.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i--}}
{{--                                        class="nav-icon font-weight-bold"></i>Add New Reseller Discount</a>--}}
{{--                                <br> <br>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>General Discount</th>--}}
{{--                                    <th>Reseller</th>--}}
{{--                                    <th>Discount</th>--}}
{{--                                    <th>Start Date</th>--}}
{{--                                    <th>End Date</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($resellers as $reseller)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$reseller->id}}</td>--}}
{{--                                        <td>{{$reseller->general_discount}}</td>--}}
{{--                                        <td>--}}
{{--                                            @php $r = \App\Models\Reseller::where('id',$reseller->reseller_id)->first() @endphp--}}
{{--                                            {{ $r->name }}--}}
{{--                                        </td>--}}
{{--                                        <td>{{$reseller->discount}}%</td>--}}
{{--                                        <td>{{$reseller->start_date}}</td>--}}
{{--                                        <td>{{$reseller->end_date}}</td>--}}
{{--                                        <td>{{$reseller->status == '1' ? 'Active':'InActive'}}</td>--}}
{{--                                        <td>{{$reseller->created_at->diffForHumans()}}</td>--}}
{{--                                        <td>--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit general discounts'))--}}
{{--                                                <a href="{{route('reseller_discount.edit',$reseller)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i--}}
{{--                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></a>--}}
{{--                                            @endif--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete general discounts'))--}}
{{--                                                <form method="POST" action="{{route('reseller_discount.destroy',$reseller)}}">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i--}}
{{--                                                            class="nav-icon i-Close-Window font-weight-bold"></i></button>--}}
{{--                                                </form>--}}
{{--                                            @endif--}}
{{--                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('general discounts status'))--}}
{{--                                                @if($reseller->status == 0)--}}
{{--                                                    <form method="POST" action="{{route('reseller_discount.status',$reseller)}}">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" name="reseller" value="reseller"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i--}}
{{--                                                                class="nav-icon font-weight-bold"></i> Active </button>--}}
{{--                                                    </form>--}}
{{--                                                @elseif($reseller->status == 1)--}}
{{--                                                    <form method="POST" action="{{route('reseller_discount.status',$reseller)}}">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" name="reseller" value="reseller"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i--}}
{{--                                                                class="nav-icon font-weight-bold"></i> InActive </button>--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>General Discount</th>--}}
{{--                                    <th>Reseller</th>--}}
{{--                                    <th>Discount</th>--}}
{{--                                    <th>Start Date</th>--}}
{{--                                    <th>End Date</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

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
