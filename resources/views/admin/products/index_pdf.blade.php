
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Products</h4>
            </div>
            

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
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
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
                        <th>Transportation Cost</th>
                          <th>List Price For Salesman</th>
                            <th>Commission Amount</th>
                              <th>Commission</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
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
     <td>{{ $product->transportation_cost}}</td>
       <td>{{ $product->list_price_for_salesman}}</td>
         <td>{{ $product->commission_amount}}</td>
           <td>{{ $product->commission}}</td>




                                        <td>{{ $product->status == 1 ? 'Active':'InActive'}}</td>
                                        <td>{{ $product->created_at->diffForHumans() }}</td>
                                        

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
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
                        <th>Transportation Cost</th>
                          <th>List Price For Salesman</th>
                            <th>Commission Amount</th>
                              <th>Commission</th>
                                    <th>Status</th>
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

