@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'orderIndex', $title = 'Order - Nafia Garments'}}">
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
                                    <th>Order Num</th>
                                    <th>Order Type</th>
                                    <th>Customer</th>
                                    <th>Payment Type</th>
                                    <th>Order Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 1 @endphp
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_number}}</td>
                                        <td>{{$order->order_type}}</td>
                                        <td>
                                            @php
                                                $user = \App\Models\User::where('id',$order->user_id)->first();

                                                if(!empty($user)){

                                                    $user_name = $user->name;

                                                    echo $user_name;

                                                }
                                            @endphp

                                        </td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>
                                            @if($order->status == 1)

                                                <span class="badge badge-primary" style="font-size:15px;">{{ 'Pending' }}</span>

                                            @elseif($order->status == 2)

                                                <span class="badge badge-secondary" style="font-size:15px;">{{ 'Process' }}</span>

                                            @elseif($order->status == 3)

                                                <span class="badge badge-warning" style="font-size:15px;">{{ 'Shipment' }}</span>

                                            @elseif($order->status == 4)

                                                <span class="badge badge-success" style="font-size:15px;">{{ 'delivered' }}</span>

                                            @elseif($order->status == 5)

                                                <span class="badge badge-danger" style="font-size:15px;">{{ 'canceled' }}</span>

                                            @endif

                                        </td>
                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('view orders'))
                                                <a href="{{route('order.show',$order)}}" class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                        class="far fa-eye font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit orders') AND $order->status !== 5)
                                            <a href="{{route('order.edit',$order)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete orders'))
                                            <form method="POST" action="{{route('order.destroy',$order)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @php $salecenters = \App\Models\SaleCenter::all(); @endphp
                                            @php
                                                foreach($salecenters as $salecenter){
                                                    $sale_center = \App\Models\SaleCenterOrder::where('salecenter_id',$salecenter->id)
                                                    ->where('order_number',$order->order_number)
                                                    ->first();

                                                    if(!empty($sale_center)){
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <form method="POST" action="{{ route('sale_center_order.assign') }}">
                                            @csrf
                                            <!-- Button trigger modal -->
                                                @if(!empty($sale_center))

                                                    <input type="hidden" name="reassign_full_order" value="reassign_full_order">
                                                    <button type="button"  class="btn btn-raised btn-raised-success m-1" data-toggle="modal" data-target="#exampleModalCenter{{ $count }}" style="color: white"><i
                                                            class="nav-icon fa fa-tasks font-weight-bold"> </i> Reassign Full Order</button>
                                                @else
                                                    <input type="hidden" name="assign_full_order" value="assign_full_order">
                                                    <button type="button"  class="btn btn-raised btn-raised-success m-1" data-toggle="modal" data-target="#exampleModalCenter{{ $count }}" style="color: white"><i
                                                            class="nav-icon fa fa-tasks font-weight-bold"> </i> Assign Full Order</button>
                                                @endif
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Sale Centers</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="order_number" value="{{ $order->order_number }}">
                                                                    @php $salecenters = \App\Models\SaleCenter::all(); @endphp

                                                                    <select class="form-control js-example-basic-single{{ $count }} @error('salecenter_id') is-invalid @enderror" id="selectSaleCenter" name="salecenter_id">
                                                                        <option selected disabled> Select SaleCenter </option>
                                                                        @foreach($salecenters as $salecenter)
                                                                            @php
                                                                                $sale_center = \App\Models\SaleCenterOrder::where('salecenter_id',$salecenter->id)
                                                                                ->where('order_number',$order->order_number)
                                                                                ->first();

                                                                                if(!empty($sale_center)){

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
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Order Num</th>
                                    <th>Order Type</th>
                                    <th>Customer</th>
                                    <th>Payment Type</th>
                                    <th>Order Status</th>
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
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection
@section('page_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>

    <script>

        var i;

        $(document).ready(function() {

            for(var i=1;i<{{ $count }};i++){

                $('.js-example-basic-single'+i).select2({
                    dropdownParent: $('#exampleModalCenter'+i)
                });

            }

        });

    </script>

@endsection
