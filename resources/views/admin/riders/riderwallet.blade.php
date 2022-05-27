@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'riderIndex', $title = 'Riders - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>Rider Wallet</h4>
</br>
                <div class="row">
@php
 $wallet_pay = App\Models\riderwallet::all()->sum('cash_payable');

 $wallet_recieve = App\Models\riderwallet::all()->sum('cash_recievable'); 

@endphp
                            <div class="col-6">
                            <h5>Rider Total Amount Payable : <b>{{$wallet_pay}}</b> </h5>
                            </div>

                            <div class="col-6"style="text-align:right;">
                                <h5>
                            Rider Total Amount Recievable : <b>{{$wallet_recieve}} </b>
                        </h5>
                            </div>

                        </div>
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
                                    <th>Cash Payable</th>
                                    <th>Cash Recievable</th>
                                    


                                    <th>Created At</th>
                                    <th>Actions</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                              
                        @foreach($riderorder as $order)

  <tr>
                                        <td>#</td>
                    <td>{{$order->rider_id}}</td>
                    <td>{{$order->product}}</td>
                    <td>{{$order->order_id}}</td>
                    <td>{{$order->cash_payable}}</td>
                    <td>{{$order->cash_recievable}}</td>
                                     
                     <td>{{$order->created_at}}</td>
        <td>
    <a href="{{route('riderwalletupdate',$order->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
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
                                    <th>Cash Payable</th>
                                    <th>Cash Recievable</th>
                                    


                                    <th>Created At</th>
                                    <th>Actions</th>
                            
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
