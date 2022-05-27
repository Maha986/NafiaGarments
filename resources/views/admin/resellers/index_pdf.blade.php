
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
               <center> <h4>View All E-Commerce Nafia Resellers</h4></center>
            </div>

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
      @php
       $path = 'storage/images/resellerImages/'.$reseller->cnic_front;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp 
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ $imageee }}"style="width:50px;" alt="cnic image not found" />
                </div>

</td>
                  
                                        

                    <td>
              @php
       $path = 'storage/images/resellerImages/'.$reseller->cnic_back;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee2 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp 
     <div style="width:50px; height: 75px; font-size: 0;">
            <img src="{{ $imageee2 }}"style="width:50px;" alt="cnic image not found" />
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
                                      
                                    </tr>
                                @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

