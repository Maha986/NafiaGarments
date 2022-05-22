@extends('owner.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Offer</h4>
               
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Your Offers</h4>

                               <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_inventoryreport_owner')}}" enctype="multipart/form-data">
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

                      </div>
                      

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                 
<th>Date of upload</th>
                                    <th>Invard Date</th>
                          
                                     <th>Purchase Date</th>
                                      <th>Product #</th>
                                      <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale-Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                 <th>PN #</th>
                                         <th>Batch #</th>
                                     <th>Purchase Date</th>
                                <th>Batch Date</th>
                                        <th>Batch Owner Name</th>
                                      <th>Transportation Cost</th>
                                              <th>Labour Cost</th>
                                                      <th>Other Cost 1</th>
                                                  <th>Other Cost 2</th>
                                                    <th>Total Items</th>
                                                      <th>Items In Stock</th>

                                                  <th>Items in stock value</th>
                                                   <th>Items sold value</th>
                                   
                                   
                                </tr>
                                </thead>
                                <tbody>
                                  
                                  @foreach($owners as $owner )
                           
                                   <tr>
                                <td></td>
                                   <td></td>
                                      <td>{{$owner->created_at}}</td>
                                         <td>{{$owner->product_id}}</td>
        @php
$pro = App\Models\Product::where('id',$owner->product_id)->first();
$product = json_decode($pro,true);
        @endphp
    @if($product!=null)
        <td>{{$product['name']}} </td>
    @else 
     <td>- </td>
    @endif
    @php
    $salecenter = App\Models\ProductForSaleCenter::where('product_id',$owner->product_id)->first();
    @endphp

    @if(  $salecenter!=null )
    <td>Sale-center</td>
    @else
  <td>Pick-to-order</td>
    @endif

     @if(  $salecenter!=null )
    <td>{{$salecenter->salecenter_id}}</td>
    @else
  <td>-</td>
    @endif

    @if($product!=null)
        <td>{{$product['owner']}} </td>
    @else 
     <td>- </td>
    @endif

     @if($product!=null)
        <td>{{$product['id']}} </td>
    @else 
     <td>- </td>
    @endif
       
    
     @if($product!=null)
        <td>{{$product['supplier']}} </td>
    @else 
     <td>- </td>
    @endif
 <td> </td>
   <td>{{$owner->batch_id}}</td>
<td> </td>
        @php
$batch = App\Models\Batch::where('id',$owner->batch_id)->first();
$batches = json_decode($batch,true);
        @endphp
  @if($batches!=null)
        <td>{{$batches['date']}} </td>
    @else 
     <td>- </td>
    @endif
       
         @if($batches!=null)
        <td>{{$batches['name']}} </td>
    @else 
     <td>- </td>
    @endif

      @if($batches!=null)
        <td>{{$batches['transportation_cost']}} </td>
    @else 
     <td>- </td>
    @endif

    @if($batches!=null)
        <td>{{$batches['labour_cost']}} </td>
    @else 
     <td>- </td>
    @endif

      @if($batches!=null)
        <td>{{$batches['other_cost_one']}} </td>
    @else 
     <td>- </td>
    @endif


         @if($batches!=null)
        <td>{{$batches['other_cost_two']}} </td>
    @else 
     <td>- </td>
    @endif

       <td>{{$owner->productQuantity}}</td>

     
                                   </tr>

                                   @endforeach
                                 

                                </tbody>
                                <tfoot>
                                <tr>
<th>Date of upload</th>
                                    <th>Invard Date</th>
                                 
                                     <th>Purchase Date</th>
                                      <th>Product #</th>
                                      <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    <th>Sale-Center</th>
                                    <th>Product Owner</th>
                                    <th>Category Route</th>
                                    <th>Supplier</th>
                                 <th>PN #</th>
                                         <th>Batch #</th>
                                     <th>Purchase Date</th>
                                <th>Batch Date</th>
                                        <th>Batch Owner Name</th>
                                      <th>Transportation Cost</th>
                                              <th>Labour Cost</th>
                                                      <th>Other Cost 1</th>
                                                  <th>Other Cost 2</th>
                                                    <th>Total Items</th>
                                                      <th>Items In Stock</th>

                                                  <th>Items in stock value</th>
                                                   <th>Items sold value</th>
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
