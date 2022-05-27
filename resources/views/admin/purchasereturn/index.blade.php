@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'Purchase Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Purchase Returns</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Purchase Returns</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('purchasereturn')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Purchase Return</a>
                            <br> <br>
                        </div>

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>salecenter_id</th>
                                    <th>Product_Id</th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Product Quantity</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($purchasereturn as $purchase_return)
                                    <tr>
                                        <td>{{$purchase_return->id}}</td>
                                        <td>{{$purchase_return->salecenter_id}}</td>
                                        <td>{{$purchase_return->product}}</td>

                                        <td>{{$purchase_return->color}}</td>
                                        <td>{{$purchase_return->size}}</td>
                                        <td>
                                            {{$purchase_return->product_quantity}}

                                        </td>
                                        <td>
                                            {{$purchase_return->amount}}

                                        </td>

                                        <td>
                                            {{$purchase_return->return_reason}}

                                        </td>
                                    
                                        <td>{{$purchase_return->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('purchasereturn.edit',$purchase_return)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            <form method="POST" action="{{route('purchasereturn.destroy',$purchase_return)}}">
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
                                    <th>salecenter_id</th>
                                    <th>Product_Id</th>
                                    <th>Product Quantity</th>
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
