@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'ownerIndex', $title = 'Create Owner - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Owners</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Assign Product To Owners</div>
                        <form class="forms-sample" method="POST" action="{{url('productassign') }}">
                            @csrf()




                            <div class="row">


          
                            <div class="col-md-6 form-group mb-3">
                                    <label for="product">Select Product</label>
                                    <select class="form-control js-example-basic-single @error('product_id') is-invalid @enderror" id="product" name="products">
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
                                    <label for="owners">Owners</label>
                                    <select class="form-control @error('owners') is-invalid @enderror" id="owners" name="owners">
                                        <option selected disabled> Select Owner </option>
                                      @foreach($owners as $owner)
                                        <option> {{$owner->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


@php
$batches = App\Models\Batch::all()
@endphp


 <div class="col-md-6 form-group mb-3">
                                    <label for="owners">Select Batches</label>
                                    <select class="form-control @error('owners') is-invalid @enderror" id="batch" name="batch">
                                        <option selected disabled> Batches </option>
                                      @foreach($batches as $batch)
                                        <option value="{{$batch->id}}"> {{$batch->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>






  <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="products">Products</label>
                                    <select class="form-control @error('products') is-invalid @enderror" id="products" name="products">
                                        <option selected disabled> Select Product </option>
                                      @foreach($products as $product)
                                        <option> {{$product->name}} </option>
                                        @endforeach
                                       
                                    </select>
                                    @error('products')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->



                                <div class="col-md-6 form-group mb-3">
                                    <label for="productquantity">Product Quantity</label>
                                    <input type="number"  name="productquantity" class="form-control form-control @error('productquantity') is-invalid @enderror" id="productquantity " type="number" placeholder="Enter Product Quantity" value="" autocomplete="productquantity" min="0" autofocus />
                                    @error('productquantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                       <div class="col-md-6 form-group mb-3">
                                    <label for="cost">Cost</label>
                                    <input type="number"  name="cost" class="form-control form-control @error('cost') is-invalid @enderror" id="customerName  " type="number" placeholder="Enter Cost" value="" autocomplete="cost" min="0" autofocus />
                                    @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

       <div class="col-md-6 form-group mb-3">
                                    <label for="profit">Profit</label>
                                    <input type="number"  name="profit" class="form-control form-control @error('profit') is-invalid @enderror" id="profit  " type="number" placeholder="Enter Profit" value="" autocomplete="profit" min="0" autofocus />
                                    @error('profit')
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


