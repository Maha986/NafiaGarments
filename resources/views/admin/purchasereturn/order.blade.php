@extends('admin.layouts.master')
@section('content')



 <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'purchase return - Nafia Garments'}}">




<div class="main-content">
        <div class="breadcrumb">
            <h1>Purchase return</h1>
        </div>
     
                     
                                    <!-- <label for="exampleFormControlSelect1">Select Blood Group</label> -->
                                   
 <div class="form-group">
                                    <!-- <label for="exampleFormControlSelect1">Select Blood Group</label> -->
                                   
                                   <div class="row">
                                    

                                      @foreach($order as $or)
                                   	<div class="col-3">
                                   		
                                   	  <form class="forms-sample" method="POST" action="{{ url('/pur') }}" enctype="multipart/form-data">
                                   		 	@csrf()



                                          <label><b>Product</b></label>
                                      @php     $products = \App\Models\Product::where('id',$or->product_id)->first(); @endphp
                                      
                                                  <h4> {{$products->name }} </h4></br>

                                                  <div class="form-group">
                                                      <label>Product Quantity </label>
                                                    <input type="number" class="form-control" name="productquantity" value ="{{$or->quantity}}" min="0" max="{{$or->quantity}}">

                                                    <input type="hidden" name="salecen_id" value ="{{$or->salecenter_id}}" min="0" max="">

<input type="hidden" name="pro_id" value ="{{$or->product_id}}" min="0" max="">
<input type="hidden" name="color" value ="{{$or->color}}" min="0" max="">
<input type="hidden" name="size" value ="{{$or->size}}" min="0" max="">
<input type="hidden" name="batch" value ="{{$or->batch_id}}">
<input type="hidden" name="ordernumber" value ="{{$or->order_number}}" min="0" max="">
<input type="hidden" name="date" value ="{{$or->created_at}}" min="0" max="">
</br>
@php $riders=App\Models\Rider::all(); @endphp

            <label>Rider </label>                    

                                  <select class="form-control" name="riderid"required>
                        <option selected disabled> Select Rider </option>
                  

@foreach($riders as $rider)

                 <option value="{{$rider->id}}">{{$rider->name}}</option>
        
@endforeach

                     </select>

</br>


<label>Amount Return </label>
                                                     <input type="number" class="form-control" name="amount" value ="" min="0" max="" placeholder="Enter Return Amount">

                                                 

</br>

 <label>Reason of Return </label>
                                                     <input type="text" class="form-control" name="reason" value ="" min="0" max="" placeholder="Enter Return Amount">
                  
                                                                  
                                                     </br>     

                                    <label>Payment Adjustment </label>                    

                                  <select class="form-control" name="paymentadjustment"required>
                        <option selected disabled> Select Payment Adjustment </option>
                  


                 <option value="1"> yes</option>
                  <option value="0"> nop</option>

                     </select>





                                                 </div>

                                       <button class="btn btn-primary">

                                                  Purchase Return
                                                  </button>

                                                </form>

                                   	</div>
                                   	@endforeach
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
