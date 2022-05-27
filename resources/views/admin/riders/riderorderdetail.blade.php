@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'riderIndex', $title = 'Riders - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Riders</h4>
                                        @if (Session::get('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  @endif
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Rider</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create riders'))
                      
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rider </th>
                                    <th>Product Name</th>
                                    <th>Order Number</th>
                                    <th>Date Of Delivery</th>
                                    <th>Delivery Address</th>
                                    <th>Cash</th>


                                    <th>Created At</th>
                                    <th>Actions</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($riderorder as $rider)

                                @php

                               $ridername = App\Models\Rider::where('id',$rider->id)->first();
                                @endphp

                                

                                    <tr>
                                        <td>
                                            {{$rider->id}}

                              

                                        </td>
                                        <td>
                                @php
                             $ridernamee = App\Models\Rider::where('id',$rider_idi)->first();
                                @endphp

                                              {{ $ridernamee->name}}

                                        </td>
                                        <td>{{$rider->product_name}}</td>
                                        <td>
                                           {{$rider->order_id}}

                                        </td>
                                        <td>{{$rider->date}}</td>
                                        <td>{{$rider->address}}</td>
                                        <td>{{$rider->cash}}</td>
                                         <td>{{$rider->created_at->diffForHumans()}}</td>
                                         <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit riders'))
                                            <a href="{{route('editriderpickups',$rider->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            
                                        </td>

                                       
                                       
                                        
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Rider </th>
                                    <th>Product Name</th>
                                    <th>Order Number</th>
                                    <th>Date Of Delivery</th>
                                    <th>Delivery Address</th>
                                    <th>Cash</th>


                                    <th>Created At</th>
                                    <th>Actions </th>
                            
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
