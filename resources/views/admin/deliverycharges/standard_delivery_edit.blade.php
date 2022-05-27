@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'deliverychargesIndex', $title = 'Create Delivery Charge - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Delivery Charges</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Standard Delivery Charges</div>
                        <form class="forms-sample" method="POST" action="{{ route('update_standard_delivery_charges.store') }}">
                            @csrf()
                            <div class="row">
                                
                                <div class="col-md-3 form-group mb-3">
                                    <label>New Delivery Charge</label>
                                    <input type="text" name="delivery_charge" class="form-control @error('delivery_charge') is-invalid @enderror" placeholder="Enter New Delivery Charge" value="{{ old('delivery_charge') }}" aria-label="delivery_charge">
                                    @error('delivery_charge')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label>Additional Charges</label>
                                    <input type="text" name="additional_charge" class="form-control @error('delivery_charge') is-invalid @enderror" placeholder="Enter New Delivery Charge" value="{{ old('delivery_charge') }}" aria-label="delivery_charge">
                                    @error('additional_charge')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="id" class="form-control @error('delivery_charge') is-invalid @enderror" placeholder="Enter New Delivery Charge" value="{{$id}}" aria-label="delivery_charge">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="margin-left:25%; margin-top:35%;">Submit</button>
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
@endsection
