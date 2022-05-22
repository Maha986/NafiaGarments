
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
             <center>   <h4>View All Riders Of Ecommerce-Nafia</h4> </center>
            </div>








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
                        @endif

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
                    @php
       $path = 'storage/images/riderImages/'.$rider->rider_image;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp                    
                            <td>
 <div style="width:75px; height: 75px; font-size: 0;">
 
  
    <img src="{{ $imageee }}" style="width:50px;" alt="cnic image not found" />
  
  
                        </div>
                            </td>
                                        <td>{{$rider->address}}</td>
                                        <td>{{$rider->city}}</td>
                                        <td>{{$rider->area}}</td>
                                        <td>{{$rider->contact}}</td>

                                        <td>{{$rider->cnic_no}}</td>
    
                
                                        <td>
                                                   @php
       $path = 'storage/images/riderImages/'.$rider->cnic_front;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee2 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp   
                <div style="width:75px; height: 75px; font-size: 0;">
                <img src="{{$imageee2}}"style="width:50px;" alt="cnic image not found" />
                        </div>

                                </td>
        
                                                   <td>
                                           @php
       $path = 'storage/images/riderImages/'.$rider->cnic_back;

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageee3 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        
        
   @endphp  
                <div style="width:75px; height: 75px; font-size: 0;">
                <img src="{{$imageee3}}"style="width:50px;" alt="cnic image not found" />
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
                                
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


