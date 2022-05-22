@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'ownerIndex', $title = 'Create Owner - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Product Owners</h1>
        </div>
        @php
         $ownerr = App\Models\ProductForOwner::where('id',$id)->first();
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Update Owner Products</div>
                        <form class="forms-sample" method="POST" action="{{ route('productownersedit_post') }}">
                            @csrf()
                            <div class="row">
                                

                          @php
                $products = App\Models\Product::all();
                          @endphp     
  <div class="col-md-6 form-group mb-3">
                                    <label for="products">Products</label>
                                    <select name="products"class="form-control @error('products') is-invalid @enderror" id="products"required >
                                        <option selected disabled> Select Product </option>
                                      @foreach($products as $product)
                                        <option name="products"value="{{$product->id}}"required> {{$product->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('products')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="productquantity">Product Quantity </label>
             <input type="number" min="0" name="productquantity" value="{{$ownerr->productQuantity}}"class="form-control form-control @error('productquantity') is-invalid @enderror" id="productquantity" placeholder="Enter contact number" value="007" autocomplete="contact" autofocus/>
                                    @error('productquantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>






 <div class="col-md-6 form-group mb-3">
                                    <label for="productquantity">Cost </label>
             <input type="number" min="0" name="cost" value="{{$ownerr->cost}}"class="form-control form-control @error('cost') is-invalid @enderror" id="cost" placeholder="Enter contact number" autocomplete="cost" autofocus/>
                                    @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



 <div class="col-md-6 form-group mb-3">
                                    <label for="profit">Profit </label>
             <input type="number" min="0" name="profit" value="{{$ownerr->profit}}"class="form-control form-control @error('profit') is-invalid @enderror" id="profit" placeholder="Enter contact number" autocomplete="profit" autofocus/>
                                    @error('profit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
 <input type="hidden" name="productownerid" value="{{$ownerr->id}}"/>


                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection


@section('page_css')
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
