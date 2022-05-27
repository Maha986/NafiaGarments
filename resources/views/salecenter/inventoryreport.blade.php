@extends('salecenter.layouts.master')
@section('content')

    <input type="hidden" value="{{$activePage = 'riderorderIndex', $title = 'Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Your Inventory</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Inventory</h4>
</br>
                         <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_inventoryreport_salecenter')}}" enctype="multipart/form-data">
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
                                    <th>Sale-Center</th>
                                 <th>Date of upload</th>
                                    <th>Invard Date</th>
                          
                                     <th>Purchase Date</th>
                                      <th>Product #</th>
                                      <th>Product Name</th>
                                    <th>Inventory Type</th>
                                    
                                  
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
           @foreach($salecenters as $salecenter)
                <tr>
           @php
           $pro = App\Models\Product::where('id',$salecenter->product_id)->first();
           @endphp
               <td>{{$salecenter->salecenter_id}}</td>
                <td>{{$pro->created_at}} </td>
                <td>? </td>
                <td>{{$salecenter->created_at}}</td>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>In-House</td>
                <td></td>
                <td>{{$pro->supplier}}</td>
                <td>?</td>
                <td>{{$salecenter->batch_id}}</td>
            @php
            $batch = App\Models\Batch::where('id',$salecenter->batch_id)->first();
            @endphp
                <td>{{$batch->created_at}} </td>
                <td>{{$batch->date}} </td>
                <td>{{$batch->owner}} </td>
                <td>{{$batch->transportation_cost}} </td>
                <td>{{$batch->labour_cost}} </td>
                <td>{{$batch->other_cost_one}} </td>
                <td>{{$batch->other_cost_two}} </td>
                <td>{{$salecenter->quantity}} </td>
                <td>{{$salecenter->quantity-$salecenter->sold}} </td>
     <td>{{$pro->price*($salecenter->quantity-$salecenter->sold)}} </td>
                <td>{{$pro->price*$salecenter->sold}}</td>
                </tr>
           @endforeach
                            

                                </tbody>
                                <tfoot>
                                <tr>
                                         <th>Sale-Center</th>
                                  <th>Date of upload</th>
                                    <th>Invard Date</th>
                          
                                     <th>Purchase Date</th>
                                      <th>Product #</th>
                                      <th>Product Name</th>
                                    <th>Inventory Type</th>
                               
                                
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>

    <script>

        {{--var i;--}}

        {{--$(document).ready(function() {--}}

        {{--    for(var i=1;i<{{ $count }};i++){--}}

        {{--        $('.js-example-basic-single'+i).select2({--}}
        {{--            dropdownAutoWidth : true,--}}
        {{--            width: 'auto'--}}
        {{--        });--}}

        {{--    }--}}

        {{--});--}}

    </script>
@endsection
