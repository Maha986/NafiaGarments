@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'deliverychargesIndex', $title = 'Delivery Charges - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View Express Delivery Charges</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Delivery Charge</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create delivery charges'))
                            <!-- <div style="float:right; margin-right: 1%;">
                                <a href="{{route('delivery_charges.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                        class="nav-icon font-weight-bold"></i>Add New Delivery Charge</a>
                                <br> <br>
                            </div> -->


                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('deliverychargesindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                               
                                    <th>Charges</th>
                                    <th>Additional Charges</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($delivery as $d)
                                    <tr>
                                        <td>#</td>
                                       
                                        <td>{{$d->charges}}</td>
                                        <td>{{$d->additional_charges}}</td>
                                        <td>{{$d->created_at}}</td>
                                        <td> <a href="{{route('express_delivery_edit',$d->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Edit</a></td>
                                      
                                    </tr>
                             @endforeach
                                

                                </tbody>
                                <tfoot>
                                <tr>
                                <th>#</th>
                                
                                    <th>Charges</th>
                                    <th>Additional Charges</th>
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
{{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
{{--    --}}{{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
