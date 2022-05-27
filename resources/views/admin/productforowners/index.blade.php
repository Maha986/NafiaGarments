@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'productownersIndex', $title = 'Product Owners - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Products For Owners</h4>
                                   @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            @php 
           $productowners = App\Models\ProductForOwner::all();
          @endphp
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Product Owners</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('owner.assign')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Product For Owner</a>
                            <br> <br>
                        </div>

   

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Owner Name</th>
                                    <th>Product</th>
                                    <th>Product Quantity</th>
                                    <th>Batch</th>
                                    <th>Sold</th>
                                    <th>Instock</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                    <th>Price Per Piece</th>
                                    <th>Total Price</th>
                                    
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
             @foreach($productowners as $productowner)
                                    <tr>
        
          <td>{{$productowner->id}}</td>
 @php
         $own = App\Models\User::where('id',$productowner->owner_name)->get();
         foreach($own as $o)
         {
            @endphp
         
            <td>{{$o->name}}</td>
            @php
         }
         @endphp

          @php
         $pro = App\Models\Product::where('id',$productowner->product_id)->get();
        if(sizeof($pro) <= 0)
        {
        @endphp
         
            <td></td>
            @php
        }
         foreach($pro as $p)
         {
            @endphp
         
            <td>{{$p->name}}</td>
            @php
         }
         @endphp
 
           
           
            <td>{{$productowner->productQuantity}}</td>
            <td>{{$productowner->batch_id}}</td>
      <td>{{$productowner->sold}}</td>
      <td>{{$productowner->instock}}</td>
              <td>{{$productowner->cost}}</td>
                <td>{{$productowner->profit}}</td>

                @if($productowner->PricePerPiece!=null)
      <td>{{$productowner->PricePerPiece}}</td>
      @else
      <td>-</td>
      @endif

     

     @if($productowner->TotalPrice!=null)
      <td>{{$productowner->TotalPrice}}</td>
      @else
      <td>-</td>
      @endif

     
<td>{{$productowner->created_at->diffForHumans()}}</td>
<td>
     <a href="{{route('productownersedit',$productowner->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

         <a href="{{route('productownersdelete',$productowner->id)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></a>
    
                    </td>
          


                    </tr>
                     @endforeach
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Owner Name</th>
                                    <th>Product</th>
                                    <th>Product Quantity</th>
                                    <th>Batch</th>
                                    <th>Sold</th>
                                    <th>Instock</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
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
