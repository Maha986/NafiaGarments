@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Carts</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                       
                       

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                   
                                    <th>Cart</th>
                                    <th>Checkout</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                               @foreach($cuser as $user)
                                    <tr>
                                      
                                        <td>
                                        </td>
                                        <td>
                                          {{$user->user_id}}</td>
                                    
        <td><a href="{{route('admincart',$user->reseller_id)}}" class="btn btn-raised btn-raised-success m-1" style="color: white">View Cart</a></td>
                                        <td>
                                            <form method="get" action="{{route('checkoutadmincart',$user->reseller_id)}}">
                                                @csrf
                                                
                                                <button type="submit"  class="btn btn-raised btn-raised-success m-1" style="color: white">Checkout</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                               @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Name</th>
                                   
                                    <th>Cart</th>
                                    <th>Checkout</th>
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
