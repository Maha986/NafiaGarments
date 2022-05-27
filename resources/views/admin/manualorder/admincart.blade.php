@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'admincartIndex', $title = 'Admin Cart - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View cart of customer</h4>
            </div>
                             @if (Session::get('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  @endif
           
  </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Cart</h4>
                        
<div style="text-align: right;">
     <form method="get" action="{{route('checkoutadmincart',$userid)}}">
                                                @csrf
                                                
                                                <button type="submit"  class="btn btn-raised btn-raised-success m-1" style="color: white">Checkout</button>
                                            </form>
</div>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Product</th>
                                  
                                    <th>Product Quantity</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                 
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                @foreach($items as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->name}}</td>
                                        <td>

                                            <form method="get" action="{{route('editadmincart',['id'=>$item->id,'name'=>$userid])}}">



                                                @csrf
                                                <input class="vertical-quantity form-control" type="number" name ="quantity"value="{{$item->quantity}}"min="1">
                                                <button type="submit"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                            </form>

                                          </td>
                                        
                                          <td>{{$item->color}}</td>
                                             <td>{{$item->size}}</td>
                                    
                                        <td></td>
                                        <td>
                                         
                                            <form method="get" action="{{route('deleteadmincart',['id'=>$item->id,'name'=>$userid])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                              
                                   
                                @endforeach

                                </tbody>
                                <tfoot>
                              
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
