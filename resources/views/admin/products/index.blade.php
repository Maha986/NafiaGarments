@extends('admin.layouts.master')
@section('content')

  <style>
    .thead th { position: sticky; top: 0; }
  </style>





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
                                     <!--  <option value="transportation_cost">Transportation_Cost</option> -->
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
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Product</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create products'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('product.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Product</a>


                            <br> <br>
                        </div>


                        @endif




           <div class="col-12">
 <form class="forms-sample" method="POST" action="{{route('productdatewise')}}" enctype="multipart/form-data">
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




                         <div style="float:right; margin-right: 1%;">
                            <a href="{{route('productindex_pdf')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>

                      <!--    <div style="float:right; margin-right: 1%;">
                            <a href="{{route('product_salecenter.index')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Products For Sale Centers</a>
                            <br> <br>
                        </div> -->

                       <!--  <div style="float:right; margin-right: 1%;">
                            <a href="{{ route('product_owner.index') }}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Products For Owners</a>
                            <br> <br>
                        </div> -->
    

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered " id="zero_configuration_table" style="width:100%">
                                <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                   
                                    <th>Price</th>
                                    <th>Stock Availability</th>
                                    <th>SKU Code</th>
                                    <th>Description</th>
                                    <th>Owner</th>
                                    <th>Vendor</th>
                                    <th>Video Link</th>
                                <th>Product Weight</th>
                                <th>QR Code</th>
                                <th>Purchase Cost</th>
                                <th>Purchase Discount</th>
                    <th>Purchase Discount Percentage</th>
                      <th>Labour Cost</th>
                        
                          <th>List Price For Salesman</th>
                            <th>Commission Amount</th>
                              <th>Commission</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                      
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock_availability == 1 ? 'Available':'Out of Stock' }}</td>


 <td>{{ $product->product_sku_code}}</td>
 <td>{{ $product->description}}</td>
 <td>{{ $product->owner}}</td>
 <td>{{ $product->vendor}}</td>
 <td>{{ $product->video_link}}</td>
 <td>{{ $product->product_weight}}</td>
 <td>{{ $product->qr_code}}</td>
 <td>{{ $product->purchase_cost}}</td>
 <td>{{ $product->purchase_discount}}</td>
  <td>{{ $product->purchase_discount_percentage}}</td>
   <td>{{ $product->labour_cost}}</td>
     
       <td>{{ $product->list_price_for_salesman}}</td>
         <td>{{ $product->commission_amount}}</td>
           <td>{{ $product->commission}}</td>




                                        <td>{{ $product->status == 1 ? 'Active':'InActive'}}</td>
                                        <td>{{ $product->created_at->diffForHumans() }}</td>
                                        <td>

        <div class="row">
            <div class="col-6">

                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit products'))
                                            <a href="{{route('product.edit',$product)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
            </div>

              <div class="col-6">
      @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete products'))
                                            <form method="POST" action="{{route('product.destroy',$product)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif

            </div>

              <div class="col-6">
                  <a href="{{route('viewproduct',  $product->id)}}" class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                        class="far fa-eye font-weight-bold"></i></a>
            </div>

              <div class="col-6">
                 @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('Products status'))
                                                @if($product->status == 0)
                                                    <form method="POST" action="{{route('product.status',$product)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="product" value="product"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($product->status == 1)
                                                    <form method="POST" action="{{route('product.status',$product)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="product" value="product"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> InActive </button>
                                                    </form>
                                                @endif
                                            @endif

            </div>
        </div> 
                                      






                                           

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Name</th>
                                    
                                    <th>Price</th>
                                    <th>Stock Availability</th>
                                    <th>SKU Code</th>
                                    <th>Description</th>
                                    <th>Owner</th>
                                    <th>Vendor</th>
                                    <th>Video Link</th>
                                <th>Product Weight</th>
                                <th>QR Code</th>
                                <th>Purchase Cost</th>
                                <th>Purchase Discount</th>
                    <th>Purchase Discount Percentage</th>
                      <th>Labour Cost</th>
                       
                          <th>List Price For Salesman</th>
                            <th>Commission Amount</th>
                              <th>Commission</th>
                                    <th>Status</th>
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

    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>

   
    
   
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
