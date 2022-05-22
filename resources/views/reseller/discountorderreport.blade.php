@extends('reseller.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'salereturnIndex', $title = 'Sale Return - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Discounts</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Reseller Dicounts</h4>
                      

                                   <div class="row">
                                  <div class="col-6">
 <form class="forms-sample" method="POST" action="{{route('tofrom_discountorderreports_reseller')}}" enctype="multipart/form-data">
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
                                 
<th>Discount To </th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Discount %</th>
                                    <th>Product Details</th>
                                    <th>Category Details</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($discounts as $discount)
                               <tr>
                                <td>{{$discount->general_discount}}</td>
                        <td>{{$discount->start_date}}</td>
                                <td>{{$discount->end_date}}</td>
                                <td>{{$discount->discount}}</td>
                                @php 
                                $product = App\Models\Product::where('id',$discount->product_id)->first();
                                @endphp
                                @if($product!=null)
                                   <td>{{$product->name}}</td>
                                   @else 
                                   <td>-</td>
                                   @endif
                                   @php 
                                $cat = App\Models\Category::where('id',$discount->category_id)->first();
                                @endphp

                                    @if($cat!=null)
                                   <td>{{$cat->title}}</td>
                                   @else
                                   <td>-</td>
                                   @endif
                               </tr>
                                  @endforeach
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                
<th>Discount To </th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Discount %</th>
                                    <th>Product Details</th>
                                    <th>Category Details</th>
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
