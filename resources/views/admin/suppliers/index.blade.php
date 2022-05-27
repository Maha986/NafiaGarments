@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'supplierIndex', $title = 'Suppliers - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Suppliers</h4>
            </div>


 <form method="post" action="{{route('selectfield_supplier')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="">
                                <label><strong>Select Field :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                             <option value="name">name</option>
                               <option value="business_name">business_name</option>
                  <option value="address">Address</option>
                                  <option value="city">City</option>
                                  <option value="area">Area</option>
                                  <option value="contact">Contact</option>
                                   <option value="cnic_no">Cnic_Number</option>
                                <option value="messaging_service_name">messaging_service_name</option>
                                 <option value="messaging_service_no">messaging_service_no</option>
                                  <option value="email">Email</option>

                             <option value="social_media_name_1">social_media_name_1</option>

                            <option value="link_1">link_1</option>


                             <option value="social_media_name_2">social_media_name_2</option>

                            <option value="link_1">link_2</option>

                                    
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
                        <h4 class="card-title mb-3" style="display: inline;">Supplier</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create suppliers'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('supplier.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Supplier</a>
                            <br> <br>
                        </div>
                        @endif

                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('supplierindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>

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
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->business_name}}</td>
                 <td>{{$supplier->contact}}</td>
                 <td>{{$supplier->address}}</td>
                     <td>{{$supplier->city}}</td>
                     <td>{{$supplier->area}}</td>
                <td>{{$supplier->cnic_no}}</td>
                                        <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/supplierImages/'.$supplier->cnic_front) }}" alt="cnic image not found" />
                </div>

                                        </td>

                    <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/supplierImages/'.$supplier->cnic_back) }}" alt="cnic image not found" />
                </div>

                                        </td>
<td>{{$supplier->email}}</td>

<td>{{$supplier->messaging_service_no}}</td>
  <td>{{$supplier->messaging_service_name}}</td>
    <td>{{$supplier->social_media_name_1}}</td>
  <td>{{$supplier->link_1}}</td>
  <td>{{$supplier->social_media_name_2}}</td>
  <td>{{$supplier->link_2}}</td>
   <td>{{$supplier->bank_account_title}}</td>
    <td>{{$supplier->bank_name}}</td>
     <td>{{$supplier->bank_branch}}</td>
     
<td>{{$supplier->account_or_iban_no}}</td>
<td>{{$supplier->money_transfer_no}}</td>
<td>{{$supplier->money_transfer_service}}</td>
                                        <td>{{$supplier->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$supplier->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit suppliers'))
                                            <a href="{{route('supplier.edit',$supplier)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete suppliers'))
                                            <form method="POST" action="{{route('supplier.destroy',$supplier)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
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
                                    <th>Business Name</th>
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
