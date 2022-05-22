@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'dealIndex', $title = 'Deals - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Deals</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Deal</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create deals'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('deal.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Deal</a>
                            <br> <br>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Deal</th>
                                     <th>Deal Name</th>
                                    <th>Product 1</th>
                                    <th>Product 2</th>
                                    <th>Product 3</th>
                                    <th>Product 4</th>
                                    <th>Product 5</th>

                                 <th>Deal Image 1 </th>
                               <th>Deal Image 2 </th>
                                  <th>Deal Image 3 </th>
                                  
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
                                @foreach($deals as $deal)
                                    <tr>
                                        <td>{{$deal->id}}</td>
                                        <td>{{$deal->deal}}</td>

                                        <td>{{$deal->dealname}}</td>

                                        <td>{{$deal->product_id}}</td>
                                        <td>{{$deal->product_id_2}}</td>
                                        <td>{{$deal->product_id_3}}</td>
                                        <td>{{$deal->product_id_4}}</td>
                                        <td>{{$deal->product_id_5}}</td>
                                        <td>
    <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/dealimages/'.$deal->image_1) }}" alt="cnic image not found" />
                </div>   
                                        </td>
                                        <td>
         <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/dealimages/'.$deal->image_2) }}" alt="cnic image not found" />
                </div> 
                                        </td>
                                        <td>
                                    @php $product = \App\Models\Product::where('id',$deal->product_id)->first() @endphp
                     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/dealimages/'.$deal->image_3) }}" alt="cnic image not found" />
                </div> 
                                            
                                        </td>
                                        
                                        <td>{{$deal->discount}}</td>
                                        <td>{{$deal->start_date}}</td>
                                        <td>{{$deal->end_date}}</td>
                                        <td>{{$deal->deal_for}}</td>
                                        @php

                                            if($deal->deal_for == "customer"){

                                                $customer = \App\Models\Customer::where('id',$deal->specific_deal_for)->first();

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
                                            else if($deal->deal_for == "reseller"){

                                                $reseller = \App\Models\Reseller::where('id',$deal->specific_deal_for)->first();

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
                                        <td>{{$deal->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$deal->created_at->diffForHumans()}}</td>
                                        <td>



<a href="{{route('dealshow',$deal->id)}}" class="btn btn-raised btn-raised-success m-1" style="color: white"><i class="far fa-eye font-weight-bold">  </i></a>







                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit deals'))
                                            <a href="{{route('deal.edit',$deal)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete deals'))
                                            <form method="POST" action="{{route('deal.destroy',$deal)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                 class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('deals status'))
                                                @if($deal->status == 0)
                                                    <form method="POST" action="{{route('deal.status',$deal)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="deal" value="deal"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($deal->status == 1)
                                                    <form method="POST" action="{{route('deal.status',$deal)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="deal" value="deal"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
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
                                    <th>Deal</th>
                                    <th>Product 1</th>
                                    <th>Product 2</th>
                                    <th>Product 3</th>
                                    <th>Product 4</th>
                                    <th>Product 5</th>

                                 <th>Deal Image 1 </th>
                               <th>Deal Image 2 </th>
                                  <th>Deal Image 3 </th>
                                  
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
