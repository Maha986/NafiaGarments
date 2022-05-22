@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'orderIndex2', $title = 'Orders-Advance Pyament - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
               <h1>Order-Advance-Payment</h1>
                @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif



            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Advance Payments</h4>
                       


<div style="float:right; margin-right: 1%;">
                            <a href="{{route('advancepayment_confirmation')}}" class="btn btn-raised btn-raised-success m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add Advance Payment</a>
                            <br> <br>
                        </div>



                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Payment Recieved</th>
                                    <th>Transaction Id</th>
                                    <th>Bank Details</th>
                                     <th>Amount</th>
                                       <th>Transaction Date</th>
                                       <th>Status</th>

                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($advance as $advancepayment)
                                    <tr>
                                     
                                        <td>{{$advancepayment->id}} </td>
                                        <td>{{$advancepayment->order_id}}</td>
                                        <td>{{$advancepayment->payment_recieved}}</td>
                                        <td>{{$advancepayment->transaction_id}}</td>
                                        <td>{{$advancepayment->bank_details}}</td>
                                         <td>{{$advancepayment->amount}}</td>
                                        
                                          <td>{{$advancepayment->transaction_date}}</td>
                                       

            

    
         
                                         @if($advancepayment->status == 1)
                                          <td>Approved</td>
                                          @else
                                        <td>Disapproved</td>
                                        @endif
                                    
                                        <td>{{$advancepayment->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('advancepayment_edit',$advancepayment->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

                                            <a href="{{route('advancepayment_delete',$advancepayment->id)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></a>
                                         
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Payment Recieved</th>
                                    <th>Transaction Id</th>
                                    <th>Bank Details</th>
                                     <th>Amount</th>
                                       <th>Transaction Date</th>
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
