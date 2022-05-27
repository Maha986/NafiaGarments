@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'courierCreate', $title = 'Create Courier - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Couriers</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Courier</div>
                        <form class="forms-sample" method="POST" action="{{ route('courier.store') }}">
                            @csrf()
                            <div class="row">
                                <div class="col-md-12 form-group mb-6">
                                    <label>Courier Company Name</label>

                                    <input type="text" name="courier_name" class="form-control @error('courier_name') is-invalid @enderror" placeholder="Enter New courier Name" value="{{ old('courier_name') }}" aria-label="courier_name">
                                    @error('courier_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Person 1</label>
                                    <input type="text" name="person_one" class="form-control @error('person_one') is-invalid @enderror" placeholder="Enter Person One Name" value="{{ old('person_one') }}" aria-label="person_one">
                                    @error('person_one')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_num_one" class="form-control @error('phone_num_one') is-invalid @enderror" placeholder="Enter Phone Number One" value="{{ old('phone_num_one') }}" aria-label="phone_num_one">
                                    @error('phone_num_one')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Person 2</label>
                                    <input type="text" name="person_two" class="form-control @error('person_two') is-invalid @enderror" placeholder="Enter Person Two Name" value="{{ old('person_two') }}" aria-label="person_two">
                                    @error('person_two')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_num_two" class="form-control @error('phone_num_two') is-invalid @enderror" placeholder="Enter Phone Number Two" value="{{ old('phone_num_two') }}" aria-label="phone_num_two">
                                    @error('phone_num_two')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Person 3</label>
                                    <input type="text" name="person_three" class="form-control @error('person_three') is-invalid @enderror" placeholder="Enter Person Three Name" value="{{ old('person_three') }}" aria-label="person_three">
                                    @error('person_three')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_num_three" class="form-control @error('phone_num_three') is-invalid @enderror" placeholder="Enter Phone Number Three" value="{{ old('phone_num_three') }}" aria-label="phone_num_three">
                                    @error('phone_num_three')
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
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
