
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
               <center> <h2>View All Orders Of E-Commerce Nafia</h2></center>
        



            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Orders</h4>
                       
  <div style="float:right; margin-right: 1%;">
                            <a href="{{route('orderdetails_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>
                        <div class="">
                            <table class="" style="width:50%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Order_name</th>
                                    <th>Special Delivery Instruction</th>
                                    <th>Order Price</th>
                                     <th>Total Delivery Charges</th>

                                     <th>Total Amount</th>
                                     <th>Address</th>
                                     <th>City</th>
                                     <th>District</th>
                                     <th>Tehsil</th>
                                     <th>Location</th>
                                       <th>Far_Fetched_Town</th>
                        <th>Urgent Delivery</th>
                          <th>Delivery Required Before</th>
                          <th>Advance Payment</th>
                          <th>Advance Payment Transfer Slip</th>
                          <th>Cash of delivery amount</th>
                                    <th>Created At</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                               
                                 @foreach($orders as $order)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$order->id}} </td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->special_delivery_instruction}}</td>
                                        <td>
                                            {{$order->totalamount}}

                                        </td>

                <td>
                 {{$order->deliverycharges}}

               </td>

            <td>
            {{$order->totalamount+$order->deliverycharges}}

             </td>
             <td>{{$order->address}} </td>
               <td>{{$order->city}} </td>
                 <td> {{$order->district}}</td>
                   <td>{{$order->tehsil}} </td>
                     <td> {{$order->location}}</td>
   <td> {{$order->far_fetched_town}}</td>
      <td> {{$order->urgentdelivery}}</td>
         <td> {{$order->delivery_required_before}}</td>

        <td>{{$order->advancepayment}}</td>
         <td>
  <div style="width:75px; height: 75px; font-size: 0;">
    <img src="{{ asset('storage/images/transferslips'.$order->advancepayment_transfer_slip) }}" alt=" image not found" />
                </div>


         </td>
          <td>{{$order->cashofdeliveryamount}}</td>
                                        
                                    
                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                        
                                    </tr>
                                @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>#</th>
                                    <th>Order_Id</th>
                                    <th>Order_name</th>
                                    <th>Special Delivery Instruction</th>
                                    <th>Order Price</th>
                                     <th>Total Delivery Charges</th>

                                     <th>Total Amount</th>
                                     <th>Address</th>
                                     <th>City</th>
                                     <th>District</th>
                                     <th>Tehsil</th>
                                     <th>Location</th>
                                       <th>Far_Fetched_Town</th>
                        <th>Urgent Delivery</th>
                          <th>Delivery Required Before</th>
                          <th>Advance Payment</th>
                          <th>Advance Payment Transfer Slip</th>
                          <th>Cash of delivery amount</th>
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


