@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'generaldiscountIndex', $title = 'Edit Reseller Discount - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Reseller Discount</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Reseller Discount</div>
                        <form class="forms-sample" method="POST" action="{{ route('reseller_discount.update',$generaldiscount) }}">
                            @csrf()
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label for="reseller">Select Reseller</label>
                                    <select class="form-control js-example-basic-single @error('reseller_id') is-invalid @enderror" id="reseller" name="reseller_id">
                                        <option selected disabled> Select Reseller </option>
                                        @foreach($resellers as $reseller)
                                            <option {{ $generaldiscount->reseller_id == $reseller->id ? 'selected':'' }} value="{{ $reseller->id }}"> {{ $reseller->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('reseller_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectDiscount">Discount (%)</label>
                                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="selectDiscount" placeholder="Enter Discount Here" value="{{ $generaldiscount->discount }}" aria-label="discount">
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStartDate">Start Date</label>
                                    <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="selectStartDate" value="{{ date('Y-m-d\TH:i', strtotime($generaldiscount->start_date)) }}" aria-label="start_date">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectEndDate">End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="selectEndDate" value="{{ date('Y-m-d\TH:i', strtotime($generaldiscount->end_date)) }}" aria-label="end_date">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="selectStatus">Select Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                        <option selected disabled> Select Status </option>
                                        <option {{ $generaldiscount->status == 0 ? 'selected':'' }}  value="0"> In Active </option>
                                        <option {{ $generaldiscount->status == 1 ? 'selected':'' }}  value="1"> Active </option>

                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        });
    </script>
@endsection
