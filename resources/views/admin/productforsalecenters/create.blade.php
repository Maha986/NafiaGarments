@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'ownerIndex', $title = 'Create Owner - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Sale-Center</h1>
        </div>

        @php
        $products = App\Models\Product::all();
        $batches = App\Models\Batch::all();
        $salecenters = App\Models\SaleCenter::all();
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Assign Product To Sale Center</div>
                        <form class="forms-sample" method="POST" action="{{route('productsalecenter_store')}}">
                            @csrf()




                            <div class="row">







                                  
                            <div class="col-md-6 form-group mb-3">
                                    <label for="product">Select Product</label>
                                    <select class="form-control js-example-basic-single @error('product_id') is-invalid @enderror" id="product" name="product">
                                        <option selected disabled> Select Product </option>
                                        @foreach($products as $product)
                                            @php $deal_product = \App\Models\Deal::where('product_id',$product->id)->first();
                                                if(!empty($deal_product)){
                                                    continue;
                                                }
                                            @endphp
                                            @php $offer_product = \App\Models\Offer::where('product_id',$product->id)->first();
                                                if(!empty($offer_product)){
                                                    continue;
                                                }
                                            @endphp
                                            @php $general_product = \App\Models\GeneralDiscount::where('product_id',$product->id)->first();
                                                if(!empty($general_product)){
                                                    continue;
                                                }
                                            @endphp
                                            <option {{ old('product_id') == $product->id ? 'selected':'' }} value="{{ $product->id }}"> {{ $product->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="size">Select Size</label>
                                    <select class="form-control @error('size_id') is-invalid @enderror" id="size" name="size">
                                        @if(!is_null(old('size_id')))
                                            <option value="{{ old('size_id') }}"> {{ \App\Models\Size::where('id',old('size_id'))->first()->sizeName }} </option>
                                        @endif
                                    </select>
                                    @error('size_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>




  <div class="col-md-6 form-group mb-3">
                                    <label for="salecenter_id">Sale Center</label>
                                    <select class="form-control @error('salecenter_id') is-invalid @enderror" id="salecenter_id" name="salecenter_id">
                                        <option selected disabled> Select Sale Centers </option>
                                      @foreach($salecenters as $salecenter)
            <option name ="salecenter_id"value="{{$salecenter->id}}"> {{$salecenter->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('salecenter_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>










  <div class="col-md-6 form-group mb-3">
                                    <label for="batch">Batch</label>
                                    <select class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch">
                                        <option selected disabled> Select Batch </option>
                                      @foreach($batches as $batch)
            <option name ="batch"value="{{$batch->id}}"> {{$batch->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="number"  name="quantity" class="form-control form-control @error('quantity') is-invalid @enderror" id="quantity " type="number" placeholder="Enter Product Quantity" value="" autocomplete="quantity" min="0" autofocus />
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
@php
$size = App\Models\Size::all();@endphp
     <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="Size">Product Size</label>
                                     <select class="form-control @error('size') is-invalid @enderror" id="size" name="size">
                                        <option selected disabled> Select Product Size </option>
                                      @foreach($size as $s)
                                        <option name = "size"value="{{$s->id}}"> {{$s->sizeName}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->
@php
$color = App\Models\Colour::all();@endphp
     <div class="col-md-6 form-group mb-3">
                                    <label for="Size">Product Colour</label>
                                     <select class="form-control @error('color') is-invalid @enderror" id="size" name="color">
                                        <option selected disabled> Select Product Colour </option>
                                      @foreach($color as $c)
                                        <option name = "color"value="{{$c->id}}"> {{$c->colourCode}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="inventory_category">Inventory</label>
                                    <input type="number"  name="inventory_category" class="form-control form-control @error('inventory_category') is-invalid @enderror" id="inventory_category " type="number" placeholder="Enter inventory_category" value="" autocomplete="inventory" min="0" autofocus />
                                    @error('inventory_category')
                                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="inventory_category">Price Per Piece</label>
                                    <input type="number"  name="ppp" class="form-control form-control @error('inventory_category') is-invalid @enderror" id="inventory_category " type="number" placeholder="Enter PricePerPiece" value="" autocomplete="inventory" min="0" autofocus />
                                    @error('inventory_category')
                                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                               




                               

                             
                              
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

    <script>
        $(document).ready(function () {
            $('#product').on('change', function () {
                var product_id = this.value;
                $("#size").html('');
                $.ajax({
                    url: "{{url('sizes')}}",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#size').html('<option value="">Select Size</option>');
                        $.each(result.sizes, function (key, value) {
                            $("#size").append('<option value="' + value.id + '">' + value.sizeName + '</option>');
                        });
                    }
                });
            });

            $('#deal_for').on('change', function () {
                var deal_for = this.value;
                $("#specific_deal_for").html('');
                $.ajax({
                    url: "{{url('specificdealfor')}}",
                    type: "POST",
                    data: {
                        deal_for: deal_for,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#specific_deal_for').html('<option value="">Select Specific Deal For</option>');

                        if(result.customers != null){

                            $.each(result.customers, function (key, value) {
                                $("#specific_deal_for").append('<option value="' + value.id + '">' + value.email + '</option>');
                            });

                        }
                        else if(result.resellers != null){

                            $.each(result.resellers, function (key, value) {
                                $("#specific_deal_for").append('<option value="' + value.id + '">' + value.email + '</option>');
                            });

                        }


                    }
                });
            });
        });
    </script>
@endsection
