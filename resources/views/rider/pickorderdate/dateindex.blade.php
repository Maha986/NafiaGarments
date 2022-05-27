@extends('rider.layouts.master')
@section('content')

    <input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Orders</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Order</h4>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Item Name</th>
                                   
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                @foreach($orders as $order)
                <tr>
                                            <td>{{$order->id}}</td>
                                            <td>

                                                {{$order->order_id}}

                                            </td>
                                            <td>
                                                


                                                {{ $order->product_name }}
                                            </td>
                                           
                                            <td>
                                                @php $colour = \App\Models\Colour::where('id',2)->first() @endphp

                                                <div style="background-color: {{ $colour->colourCode }}; width:25px; height: 25px; font-size: 0;">

                                                </div>



                                            </td>
                                            <td>
                                                {{--@php $size = \App\Models\Size::where('id',$order->size_id)->first() @endphp--}}

                                               karna he 


                                            </td>

                                            <td>
                                                @if($order->status == 1)

                                                    <span class="badge badge-primary" style="font-size:15px;">{{ 'Pending' }}</span>

                                                @elseif($order->status == 2)

                                                    <span class="badge badge-secondary" style="font-size:15px;">{{ 'Process' }}</span>

                                                @elseif($order->status == 3)

                                                    <span class="badge badge-warning" style="font-size:15px;">{{ 'Ready To Dispatch' }}</span>

                                                @elseif($order->status == 4)

                                                    <span class="badge badge-success" style="font-size:15px;">{{ 'Dispatched' }}</span>

                                                @endif

                                            </td>
                                            <td>{{$order->created_at->diffForHumans()}}</td>
                                            
                                        </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Item Name</th>
                                 
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                  
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
