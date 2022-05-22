@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Sale Returns</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Sale Returns</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('salereturn.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Sale Return</a>
                            <br> <br>
                        </div>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order_Number</th>
                                    <th>Product_Id</th>
                                    <th>Reason</th>
                                    <th>Amount</th>
                                      <th>Quantity</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($salereturn as $Sale_return)
                                    <tr>
                                        <td>{{$Sale_return->id}}</td>
                                        <td>{{$Sale_return->order_number}}</td>
                                        <td>{{$Sale_return->product_id}}</td>
                                        <td>
                                            {{$Sale_return->reason}}

                                        </td>
                                        <td>
                                            {{$Sale_return->amount}}

                                        </td>
                                        <td>
                                            {{$Sale_return->quantity}}

                                        </td>
                                    
                                        <td>{{$Sale_return->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('salereturn.edit',$Sale_return)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            <form method="POST" action="{{route('salereturn.destroy',$Sale_return)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Number</th>
                                    <th>Product_Id</th>
                                    <th>Reason</th>
                                    <th>Amount</th>
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
