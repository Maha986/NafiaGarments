@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'resellerIndex', $title = 'Resellers - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Resellers</h4>
            </div>


 <form method="post" action="{{route('selectfield_reseller')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="">
                                <label><strong>Select Field :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                             <option value="name">name</option>
                            
                                  <option value="address">Address</option>
                                  <option value="city">City</option>
                                  <option value="area">Area</option>
                                  <option value="contact">Contact</option>
                                   <option value="cnic_no">Cnic_Number</option>
                                <option value="messaging_service_name">messaging_service_name</option>
                                 <option value="messaging_service_no">messaging_service_no</option>
                                  <option value="email">Email</option>
                                   <option value="social_media_name_1">social_media_name_1</option>
                                   <option value="link_1">link 1</option>
                                       <option value="social_media_name_2">social_media_name_2</option>
                                        <option value="link_2">link 2</option>
                                 
                                    
                                    
                                     <option value="bank_account_title">bank_account_title</option>
                                      <option value="bank_name">bank_name</option>
                                 <option value="bank_branch">bank_branch</option>
                                  <option value="account_or_iban_no">account_or_iban_no</option>

                                   <option value="money_transfer_no">money_transfer_no</option>

                                     <option value="money_transfer_service">money_transfer_service</option>

                                                                 </select>
                            </div>

                            <div class="" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </form>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Reseller</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create resellers'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('reseller.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Resellers</a>
                            <br> <br>
                        </div>

     <div style="float:right; margin-right: 1%;">
                            <a href="{{route('resellerindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>



                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                     <th>#</th>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Area</th>
                                    <th>Cnic #</th>
                                    <th>Cnic Image1</th>
                                    <th>Cnic Image2</th>
                                    <th>Email</th>
                                    <th>Messaging Service Number</th>
                                     <th>Messaging Service Name</th>
                                      <th>Social Media Name 1</th>
                                       <th>Link 1</th>

                                         <th>Social Media Name 2</th>
                                       <th>Link 2</th>
                            <th>Bank Account Title</th>
                               <th>Bank Name</th>
                                <th>Bank Branch</th>

                                  <th>account # /iban #</th>

                                  <th>Money Transfer Number</th>
                                  <th>Money Transfer Service</th>


                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($resellers as $reseller)
                                    <tr>
                                        <td>{{$reseller->id}}</td>
                                        <td>{{$reseller->name}}</td>
                                        <td>{{$reseller->business_name}}</td>
                 <td>{{$reseller->contact}}</td>
                 <td>{{$reseller->address}}</td>
                     <td>{{$reseller->city}}</td>
                     <td>{{$reseller->area}}</td>
                <td>{{$reseller->cnic_no}}</td>
                                        <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/resellerImages/'.$reseller->cnic_front) }}" alt="cnic image not found" />
                </div>

                                        </td>

                    <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/resellerImages/'.$reseller->cnic_back) }}" alt="cnic image not found" />
                </div>

                                        </td>
<td>{{$reseller->email}}</td>

<td>{{$reseller->messaging_service_no}}</td>
  <td>{{$reseller->messaging_service_name}}</td>
    <td>{{$reseller->social_media_name_1}}</td>
  <td>{{$reseller->link_1}}</td>
  <td>{{$reseller->social_media_name_2}}</td>
  <td>{{$reseller->link_2}}</td>
   <td>{{$reseller->bank_account_title}}</td>
    <td>{{$reseller->bank_name}}</td>
     <td>{{$reseller->bank_branch}}</td>
     
<td>{{$reseller->account_or_iban_no}}</td>
<td>{{$reseller->money_transfer_no}}</td>
<td>{{$reseller->money_transfer_service}}</td>
                                        <td>{{$reseller->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$reseller->created_at->diffForHumans()}}</td>
                                        <td>
             @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit $reseller'))
                <a href="{{route('reseller.edit',$reseller)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
             @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete reseller'))
                             <form method="POST" action="{{route('reseller.destroy',$reseller)}}">
                                                @csrf
                                                @method('DELETE')
 <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>City</th>
                                    <th>Cnic Image</th>
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
