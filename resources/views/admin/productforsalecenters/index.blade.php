@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'productownersIndex', $title = 'Product Owners - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Products For Sale-Centers</h4>
    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            @php 
    $productforsalecenter = $products;
          @endphp
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Product In Sale-Centers</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('salecenterproductcreate')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Product For Sale Center</a>
                            <br> <br>
                        </div>

              <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('productsalecenterdatewise')}}" enctype="multipart/form-data">
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
                                    <th>Product</th>
                                    <th>Inventory</th>
                                    <th>Batch ID</th>
                                    <th>Quantity</th>
                                    <th>Sale Center</th>
                                    <th>Sold</th>
                                    <th>Price Per Piece</th>
                                    <th>Total Price</th>
                                   
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
             @foreach($productforsalecenter as $pro_for_sc)
                                    <tr>
        
          <td>{{$pro_for_sc->id}}</td>
 @php
$product = App\Models\Product::where('id',$pro_for_sc->product_id)->get();
         foreach($product as $o)
         {
            @endphp
         
            <td>{{$o->name}}</td>
            @php
         }
         @endphp

      
 
           
           
            <td>{{$pro_for_sc->inventroy}}</td>
              <td>{{$pro_for_sc->batch_id}}</td>
              
                <td>{{$pro_for_sc->quantity}}</td>
                  @php
$salecenter = App\Models\SaleCenter::where('id',$pro_for_sc->salecenter_id)->get();@endphp
         <td>{{$pro_for_sc->salecenter_id}}</td>
     <td>{{$pro_for_sc->sold}}</td>

     <td>{{$pro_for_sc->PricePerPiece}}</td>
     @php  $total = ($pro_for_sc->PricePerPiece)*($pro_for_sc->quantity); @endphp
     <td>{{$total}}</td>
  
     
<td>{{$pro_for_sc->created_at->diffForHumans()}}</td>
<td>
     <a href="{{route('productsalecenteredit',$pro_for_sc->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

         <a href="{{route('productsalecenterdelete',$pro_for_sc->id)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></a>
    
                    </td>
          


                    </tr>
                     @endforeach
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Product</th>
                                    <th>Inventory</th>
                                    <th>Batch ID</th>
                                    <th>Quantity</th>
                                    <th>Sale Center</th>
                                    <th>Sold</th>
                                    <th>Price Per Piece</th>
                                    <th>Total Price</th>
                                   
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
