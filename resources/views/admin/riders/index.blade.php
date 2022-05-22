@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'riderIndex', $title = 'Riders - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Riders</h4>
            </div>





 <form method="post" action="{{route('selectfield_rider')}}" enctype="multipart/form-data">
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
                        <h4 class="card-title mb-3" style="display: inline;">Rider</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create riders'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('rider.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Rider</a>
                            <br> <br>
                        </div>

                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('riderindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
                        @endif



                                      <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('rider_datewise')}}" enctype="multipart/form-data">
    @csrf
                 
             <div class="input-group"> 
                <label> <b>From Date :</b> </label>
    <input type="date" name = "from" class="form-control" placeholder="Start"/>
    <span class="input-group-addon">-</span>
      <label> <b>To Date : </b></label>
    <input type="date" name = "to" class="form-control" placeholder="End"/>
<button type="submit">Search</button>

                                </form>
</div>
</br>     

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                     <th>Rider-Image</th>
                                     <th>Address</th>
                                      <th>City</th>
                                       <th>Area</th>
                                    <th>Contact No</th>
                                     <th>Cnic Number</th>
                                    <th>Cnic Image1</th>
                                    <th>Cnic Image2</th>
                                      <th>Messaging Service Number</th>
                                      <th>Messaging Service Name</th>
                                    <th>Email</th>
                                    <th>Bank Account Title</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                      <th>Account #/Iban #</th>
                                        <th>Money Transfer Number</th>
                                    <th>Money Transfer Service</th>
                                         
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($riders as $rider)
                                    <tr>
                                        <td>{{$rider->id}}</td>
                                        <td>{{$rider->name}}</td>
                                         
                            <td>
 <div style="width:75px; height: 75px; font-size: 0;">
                <img src="{{ asset('storage/images/riderImages/'.$rider->rider_image) }}" alt="cnic image not found" />

                        </div>
                            </td>
                                        <td>{{$rider->address}}</td>
                                        <td>{{$rider->city}}</td>
                                        <td>{{$rider->area}}</td>
                                        <td>{{$rider->contact}}</td>

                                        <td>{{$rider->cnic_no}}</td>
                                        <td>
                <div style="width:75px; height: 75px; font-size: 0;">
                <img src="{{ asset('storage/images/riderImages/'.$rider->cnic_front) }}" alt="cnic image not found" />
                        </div>

                                </td>

                                                   <td>
                <div style="width:75px; height: 75px; font-size: 0;">
                <img src="{{ asset('storage/images/riderImages/'.$rider->cnic_back) }}" alt="cnic image not found" />
                        </div>

                                </td>

            <td>{{$rider->messaging_service_no}}</td>
            <td>{{$rider->messaging_service_name}}</td>
             <td>{{$rider->email}}</td>
              <td>{{$rider->bank_account_title}}</td>
               <td>{{$rider->bank_name}}</td>
                <td>{{$rider->bank_branch}}</td>
                  <td>{{$rider->account_or_iban_no}}</td>
             <td>{{$rider->money_transfer_no}}</td>
              <td>{{$rider->money_transfer_service}}</td>
              
                                        <td>{{$rider->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$rider->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit riders'))
                                            <a href="{{route('rider.edit',$rider)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete riders'))
                                            <form method="POST" action="{{route('rider.destroy',$rider)}}">
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
                                    <th>Rider-Image</th>
                                     <th>Address</th>
                                      <th>City</th>
                                       <th>Area</th>
                                    <th>Contact No</th>
                                     <th>Cnic Number</th>
                                    <th>Cnic Image1</th>
                                    <th>Cnic Image2</th>
                                      <th>Messaging Service Number</th>
                                      <th>Messaging Service Name</th>
                                    <th>Email</th>
                                    <th>Bank Account Title</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                      <th>Account #/Iban #</th>
                                        <th>Money Transfer Number</th>
                                    <th>Money Transfer Service</th>
                                         
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
