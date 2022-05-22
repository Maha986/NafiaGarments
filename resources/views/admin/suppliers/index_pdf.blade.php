
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
               <center> <h4>View All E-Commerce Nafia Suppliers</h4></center>
            </div>


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

                         @php
       $path = 'storage/images/SupplierImages/'.$supplier->cnic_front;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp                    
             
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{$imageee}}"style="width:50px;" alt="cnic image not found" />
                </div>

                                        </td>

                    <td>
                    @php
       $path = 'storage/images/SupplierImages/'.$supplier->cnic_back;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee2 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp  

     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ $imageee2 }}" style="width:50px;" alt="cnic image not found" />
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

