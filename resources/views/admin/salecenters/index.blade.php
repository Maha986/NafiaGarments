@extends('admin.layouts.master')
@section('content')








    <input type="hidden" value="{{$activePage = 'saleCenterIndex', $title = 'Sale Centers - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Sale Centers</h4>
            </div>

           
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Sale Center</h4>



 <form method="post" action="{{route('selectfield_salecenter')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="">
                                <label><strong>Select Field :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                             <option value="name">name</option>
                            <option value="owner_name">Owner_Name</option>
                                  <option value="address">Address</option>
                                  <option value="city">City</option>
                                  <option value="area">Area</option>
                                  <option value="contact">Contact</option>
                                   <option value="cnic_no">Cnic_Number</option>
                                <option value="messaging_service_name">messaging_service_name</option>
                                 <option value="messaging_service_no">messaging_service_no</option>
                                  <option value="email">Email</option>
                                   <option value="social_media_name_1">social_media_name_1</option>
                                       <option value="social_media_name_2">social_media_name_2</option>
                                 <option value="social_media_name_3">social_media_name_3</option>
                                    <option value="link_1">link 1</option>
                                       <option value="link_2">link 2</option>
                                     <option value="link_3">link 3</option>
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



                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('saleCenter.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Sale Center</a>
                            <br> <br>
                        </div>

                          <div style="float:right; margin-right: 1%;">
                            <a href="{{route('salecenterindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>


                                      <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('sc_datewise')}}" enctype="multipart/form-data">
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
                                    <th>Sale Center Owner Name</th>
                                       <th>Address</th>
                                    <th>City</th>
                                    <th>Area</th>
                                    <th>Contact</th>
                                    <th>Cnic #</th>
                                    <th>Cnic Image1</th>
                                    <th>Cnic Image2</th>
                                      <th>Messaging Service Name</th>
                                       <th>Messaging Service No</th>

                                        <th>Email</th>
                                 <th>Social Media Name 1</th>
                                 <th>Social Media Name 2</th>
                                 <th>Social Media Name 3</th>

                                 <th>Link 1</th>
                                   <th>Link 2</th>
                                     <th>Link 3</th>
                                       <th>Bank Account Title</th>
                                         <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                      <th>Account #/Iban #</th>
                                <th>Money Transfer Service</th>
                                  <th>Link 3</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($SaleCenters as $SaleCenter)
                                    <tr>
                                        <td>{{$SaleCenter->id}}</td>
                                        <td>{{$SaleCenter->name}}</td>
                                        <td>{{$SaleCenter->owner_name}}</td>

    <td>{{$SaleCenter->address}}</td>
    <td>{{$SaleCenter->city}}</td>
    <td>{{$SaleCenter->area}}</td>
    <td>{{$SaleCenter->contact}}</td>
    <td>{{$SaleCenter->cnic_no}}</td>
                                        <td>
                                            <div style="width:75px; height: 75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/SaleCenterImages/'.$SaleCenter->cnic_front) }}" alt="cnic image not found" />
                                            </div>

                                        </td>
            <td>
                   <div style="width:75px; height: 75px; font-size: 0;">
                        <img src="{{ asset('storage/images/SaleCenterImages/'.$SaleCenter->cnic_back) }}" alt="cnic image not found" />
                                        </div>

                         </td>

    <td>{{$SaleCenter->messaging_service_name}}</td>
    <td>{{$SaleCenter->messaging_service_no}}</td>
    <td>{{$SaleCenter->email}}</td>
    <td>{{$SaleCenter->socail_media_name_1}}</td>
     <td>{{$SaleCenter->socail_media_name_2}}</td>
      <td>{{$SaleCenter->socail_media_name_3}}</td>
       <td>{{$SaleCenter->link_1}}</td>
        <td>{{$SaleCenter->link_2}}</td>
         <td>{{$SaleCenter->link_3}}</td>
          <td>{{$SaleCenter->bank_account_title}}</td>
     <td>{{$SaleCenter->bank_name}}</td>
      <td>{{$SaleCenter->bank_branch}}</td>
     
       <td>{{$SaleCenter->account_or_iban_no}}</td>
         <td>{{$SaleCenter->money_transfer_no}}</td>
         <td>{{$SaleCenter->money_transfer_service}}</td>
                                        <td>{{$SaleCenter->status == '1' ? 'Active':'InActive'}}</td>
                                        <td>{{$SaleCenter->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('salecenter.edit',$SaleCenter)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            <form method="POST" action="{{route('salecenter.destroy',$SaleCenter)}}">
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
                                    <th>Name</th>
                                    <th>Sale Center Owner Name</th>
                                       <th>Address</th>
                                    <th>City</th>
                                    <th>Area</th>
                                    <th>Contact</th>
                                    <th>Cnic #</th>
                                    <th>Cnic Image1</th>
                                    <th>Cnic Image2</th>
                                      <th>Messaging Service Name</th>
                                       <th>Messaging Service No</th>

                                        <th>Email</th>
                                 <th>Social Media Name 1</th>
                                 <th>Social Media Name 2</th>
                                 <th>Social Media Name 3</th>

                                 <th>Link 1</th>
                                   <th>Link 2</th>
                                     <th>Link 3</th>
                                       <th>Bank Account Title</th>
                                         <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                      <th>Account #/Iban #</th>
                                <th>Money Transfer Service</th>
                                  <th>Link 3</th>
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
