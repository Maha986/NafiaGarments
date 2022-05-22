@extends('salecenter.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salecenterorderIndex', $title = 'Order - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>My Product Details</h4>
            </div>
                    @php 
     echo $userId = auth()->user()->id;
    $productforsalecenter = App\Models\ProductForSalecenter::where('salecenter_id',$userId)->get();
          @endphp
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Your Products</h4>

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
                                   
                                    <th>Created At</th>
                                   <!--  <th>Action</th> -->
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
                <td>{{$pro_for_sc->salecenter_id}}</td>
          
     <td>{{$pro_for_sc->sold}}</td>
     <td></td>
     
<td>{{$pro_for_sc->created_at->diffForHumans()}}</td>
<!-- <td>
     <a href="{{route('productsalecenteredit',$pro_for_sc->id)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

         <a href="{{route('productsalecenterdelete',$pro_for_sc->id)}}" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i class="nav-icon i-Close-Window font-weight-bold"></i></a>
    
                    </td> -->
          


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
