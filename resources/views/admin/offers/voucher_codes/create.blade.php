@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'offerIndex', $title = 'Create Voucher Code - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Voucher Code</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Voucher Code</div>
                        <form class="forms-sample" method="POST" action="{{ route('voucher_code.store') }}">
                            @csrf()
                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectCode">Create Code</label>
                                    <input type="text" id="selectCode" name="code" class="form-control @error('code') is-invalid @enderror" placeholder="Enter New Code" value="{{ old('code') }}" aria-label="code">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


@php 
$product = App\Models\Product::all();
@endphp
                            <div class="col-md-6 form-group mb-3">

                                    <label for="product">Product</label>
                                  <select class="form-control @error('product') is-invalid @enderror" id="product" name="product">
                     <option selected disabled> Select Deal For </option>
                     @foreach($product as $pro)
                     <option value="{{$pro->id}}"> {{$pro->name}}</option>
                @endforeach
                                     
                                    </select>
                                    @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="productsize">Product Size</label>
                                       <select class="form-control @error('productsize') is-invalid @enderror" id="productsize" name="productsize">
                     <option selected disabled> Select Size  </option>
                     @php $size = App\Models\Size::all(); @endphp
                     @foreach($size as $s)
                     <option value="{{$s->id}}">{{$s->sizeName}}</option>
                     @endforeach
                     
             
                                     
                                    </select>
                                    @error('productsize')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="productsize">Color</label>
                                       <select class="form-control @error('productsize') is-invalid @enderror" id="productsize" name="productcolor">
                     <option selected disabled> Select Color </option>
                     @php $color = App\Models\Colour::all(); @endphp
                     @foreach($color as $c)
                     <option value="{{$c->id}}">{{$c->colourCode}}</option>
                     @endforeach
                     
             
                                     
                                    </select>
                                    @error('productsize')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectMinimumAmount">Create Minimum Amount</label>
                                    <input type="text" id="selectMinimumAmount" name="minimum_amount" class="form-control @error('minimum_amount') is-invalid @enderror" placeholder="Enter New Minimum Code" value="{{ old('minimum_amount') }}" aria-label="minimum_amount">
                                    @error('minimum_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectDiscount">Discount (%)</label>
                                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="selectDiscount" placeholder="Enter Discount Here" value="{{ old('discount') }}" aria-label="discount">
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectNoOftimes">No Of Times</label>
                                    <input type="text" id="selectNoOftimes" name="no_of_times" class="form-control @error('no_of_times') is-invalid @enderror" placeholder="Enter Number of Times" value="{{ old('no_of_times') }}" aria-label="no_of_times">
                                    @error('no_of_times')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStartDate">Start Date</label>
                                    <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="selectStartDate" value="{{ old('start_date') }}" aria-label="start_date">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectEndDate">End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="selectEndDate" value="{{ old('end_date') }}" aria-label="end_date">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="deal_for">Select Offer for</label>
                                    <select class="form-control @error('deal_for') is-invalid @enderror" id="deal_for" name="deal_for">
                                        <option selected disabled> Select Deal For </option>
                                        <option {{ old('deal_for') == "customer" ? 'selected':'' }}  value="customer"> Customer </option>
                                        <option {{ old('deal_for') == "reseller" ? 'selected':'' }}  value="reseller"> Reseller </option>
                                    </select>
                                    @error('deal_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="specific_deal_for">Select Specific Offer For</label>
                                    <select class="form-control js-example-basic-single @error('specific_deal_for') is-invalid @enderror" id="specific_deal_for" name="specific_deal_for">
                                        @if(old('deal_for') == 'customer')

                                            @if(!is_null(old('specific_deal_for')))

                                                @php $customer = \App\Models\Customer::where('id',old('specific_deal_for'))->first() @endphp

                                                @if(!is_null($customer))

                                                    <option value="{{ old('specific_deal_for') }}"> {{ $customer->email }} </option>

                                                @endif
                                            @endif

                                        @elseif(old('deal_for') == 'reseller')

                                            @if(!is_null(old('specific_deal_for')))

                                                @php $reseller = \App\Models\Reseller::where('id',old('specific_deal_for'))->first() @endphp

                                                @if(!is_null($reseller))

                                                    <option value="{{ old('specific_deal_for') }}"> {{ $reseller->email }} </option>

                                                @endif

                                            @endif

                                        @endif
                                    </select>
                                    @error('specific_deal_for')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStatus">Select Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                        <option selected disabled> Select Status </option>
                                        <option {{ old('status') == 0 ? 'selected':'' }}  value="0"> In Active </option>
                                        <option {{ old('status') == 1 ? 'selected':'' }}  value="1"> Active </option>

                                    </select>
                                    @error('status')
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
