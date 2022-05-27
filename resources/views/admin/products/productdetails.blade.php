@extends('admin.layouts.master')
@section('content')

  

    <input type="hidden" value="{{$activePage = 'productIndex', $title = 'Products- Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Products</h4>
            </div>
             <form method="post" action="{{route('selectfield')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="">
                                <label><strong>Select Field :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="cat[]">

                             <option value="name">name</option>
                            <option value="product_sku_code">product_sku_code</option>
                                  <option value="description">description</option>
                                  <option value="price">price</option>
                                  <option value="owner">owner</option>
                                  <option value="vendor">vendor</option>
                                   <option value="video_link">Video_Link</option>
                                <option value="product_weight">product_weight</option>
                                 <option value="vendor">vendor</option>
                                  <option value="purchase_cost">Purchase_Cost</option>
                                   <option value="purchase_discount">Purchase_Discount</option>
                                    <option value="purchase_discount_percentage">Purchase_Discount_Percentage</option>
                                     <option value="labour_cost">Labour_Cost</option>
                                      <option value="transportation_cost">Transportation_Cost</option>
                                 <option value="list_price_for_salesman">List_Price_For_Salesmen</option>
                                  <option value="commission_amount">Commission_Amount</option>

                                   <option value="commission">Commission</option>

                                                                 </select>
                            </div>

                            <div class="" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </form>

                        <!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
  @php
                        $id = $products[0]->product_id;
                        $product = App\Models\Product::where('id',$id)->first();
                        $product->name;
                        @endphp
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;"><b>{{$product->name}}</b></h4>

                      
                       

                         <div style="float:right; margin-right: 1%;">
                            <a href="" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>


                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product_ID</th>
                                    <th>Colour_ID</th>
                                    <th>Size_ID</th>
                                    <th>Quantity</th>
                                    <th>Bar_Code</th>
                                    <th>Variant_Sku_Code</th>
                                   
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>#</td>
                                                    <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/productImages/'. $product->image) }}" alt="cnic image not found" />
                </div>

                                        </td>

                                        <td>{{$product->product_id}}</td>
                                        <td>
                                        @php

 $colorr = \App\Models\Colour::where('id',$product->colour_id)->first();
 @endphp

 @if($colorr!=null)
 <div style="background-color: {{$colorr->colourCode}}; width:25px; height: 25px; font-size: 0;"> </div>
 @endif
</td>
@if($product->size_id==1)
<td>Small</td>
@elseif($product->size_id==2)
<td>Medium</td>
@elseif($product->size_id==3)
<td>Large</td>
@elseif($product->size_id==4)
<td>Extra Large</td>
@endif
                                
                                        <td>{{$product->quantity}}</td>


                                       
@php
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
@endphp

 <td><p><b>Code : {{$product->qr_code}}</b><p>
     {!! $generator->getBarcode($product->qr_code, $generator::TYPE_CODE_128) !!}</td>
                                        <td>{{$product->variant_sku_code}}</td>
                         <td>{{ $product->created_at->diffForHumans() }}</td>
                         <td></td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>#</th>
                                    <th>Image</th>
                                    <th>Product_ID</th>
                                    <th>Colour_ID</th>
                                    <th>Size_ID</th>
                                    <th>Quantity</th>
                                    <th>QR_Code</th>
                                    <th>Variant_Sku_Code</th>
                                   
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
