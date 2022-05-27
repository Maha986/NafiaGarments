@extends('admin.layouts.master')
@section('content')

  

    <input type="hidden" value="{{$activePage = 'productIndex', $title = 'Products- Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Products</h4>
                 <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">All Uploads Report</h4>

                         <div class="row mb-4">

  <div class="row">
            <div class="col-3" style="padding-left: 40px;">
                <!-- <a href="" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Year (Purchase-Return)k</a> -->
            </div>


             <div class="col-3">
                <!-- <a href="" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Last Month (Purchase-Return)k</a> -->
            </div>

             <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('tofrom_uploadreport')}}" enctype="multipart/form-data">
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







        </div>
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
                      
                        @endphp
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;"><b></b></h4>

                      
                       

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
                                     <th>Date Of Upload</th>
                                   <!--  <th>Image</th> -->
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th> Inventory_Type</th>
                                     <th> Sale-Center</th>
                                     <th> Product Owner </th>
                                  <th> Category Route </th>
                                   <th> Supplier </th>
                                    <th> Purchase Price </th>
                                     <th>Purchase Discount </th>
                                      <th> Purchase Price After Discount </th>
                                      <th> Reseller Price </th>
                                      <th> Reseller Commission</th>
                                      <th> Retail Price </th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>QR_Code</th>
                                   <!--  <th>Variant_Sku_Code</th> -->
                                   
                                   
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>#</td>

                                          <td>{{ $product->created_at }}</td>
                                     <!--                <td>
     <div style="width:75px; height: 75px; font-size: 0;">
            <img src="{{ asset('storage/images/productImages/'. $product->image) }}" alt="cnic image not found" />
                </div>

                                        </td> -->

                                          <td>{{$product->product_id}}</td>

                                                                                         @php 
 $productone = App\Models\Product::where('id',$product->product_id)->first();
 $productnamee = json_decode($productone,true);

@endphp

@if(isset($productnamee))
<td>{{$productnamee['name']}}</td>

@else 
  <td>{{$product->product_id}}</td>
@endif      

@php
$salecenter = App\Models\ProductForSaleCenter::where('product_id',$product->product_id)->first();
@endphp

@if($salecenter!=null)
                         <td>Sale-Center </td>
@else
<td>Pick To Order </td>
@endif

@if($salecenter!=null)
                         <td>{{$salecenter->salecenter_id}} </td>
  @else 
   <td>None </td>
 @endif         




 @if(isset($productnamee))
 @php

  $productownerr = App\Models\ProductForOwner::where('product_id',$productnamee['id'])->get();


@endphp

<td>

@foreach($productownerr as $pro_own)
@php
$owner_user = App\Models\User::where('id',$pro_own->owner_name)->first();
@endphp
@if($owner_user!=null)
{{$owner_user->name}} ,
@else
<p>-</p>
@endif

@endforeach
</td>

@else 
  <td>None</td>
@endif                

@php 
$cat_id = App\Models\CategoryProduct::where('product_id',$product->product_id)->first();

 $categoryid = json_decode($cat_id,true);
@endphp


 @if(isset($categoryid))
<td>{{$categoryid['category_id']}}/{{$product->product_id}}</td>

@else 
  <td>None</td>
@endif                


@if(isset($productnamee))
<td>{{$productnamee['supplier']}}</td>

@else 
  <td>none</td>
@endif  
          
          @if(isset($productnamee))
<td>{{$productnamee['purchase_cost']}}</td>

@else 
  <td>none</td>
@endif  


@if(isset($productnamee))
<td>{{$productnamee['purchase_discount']}}</td>

@else 
  <td>none</td>
@endif  

                          <td> - </td> 


                          @if(isset($productnamee))
<td>{{$productnamee['list_price_for_salesman']}}</td>

@else 
  <td>none</td>
@endif       

                         @if(isset($productnamee))
<td>{{$productnamee['commission']}}</td>

@else 
  <td>none</td>
@endif      


                      @if(isset($productnamee))
<td>{{$productnamee['price']}}</td>

@else 
  <td>none</td>
@endif        
                                        <td>{{$product->colour_id}}</td>
                                        <td>{{$product->size_id}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->qr_code}}</td>
                                     <!--    <td>{{$product->variant_sku_code}}</td> -->
                       
                         

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                     <th>Date Of Upload</th>
                                   <!--  <th>Image</th> -->
                                    <th>Product Number</th>
                                    <th>Product Name</th>
                                    <th> Inventory_Type</th>
                                     <th> Sale-Center</th>
                                     <th> Product Owner </th>
                                  <th> Category Route </th>
                                   <th> Supplier </th>
                                    <th> Purchase Price </th>
                                     <th>Purchase Discount </th>
                                      <th> Purchase Price After Discount </th>
                                      <th> Reseller Price </th>
                                      <th> Reseller Commission</th>
                                      <th> Retail Price </th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>QR_Code</th>
                                   <!--  <th>Variant_Sku_Code</th> -->
                                   
                                   
                                  
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
