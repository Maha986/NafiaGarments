@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'customeIndex', $title = 'Edit Customer - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Customers</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Customer</div>
                        <form class="forms-sample" method="POST" action="{{ route('customer.update',$customer) }}">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerName">Cutomer Name</label>
                                        <input type="text"  name="name" class="form-control form-control @error('name') is-invalid @enderror" id="customerName  " type="text" placeholder="Enter your Customer name" value="{{ $customer->name }}" autocomplete="name" autofocus />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerCity">City</label>
                                        <input type="text"  name="city" class="form-control form-control @error('city') is-invalid @enderror" id="customerCity" placeholder="Enter city name" value="{{ $customer->city }}" autocomplete="city" autofocus/>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerArea">Area</label>
                                        <input type="text"  name="area" class="form-control form-control @error('area') is-invalid @enderror" id="customerArea" placeholder="Enter area name" value="{{ $customer->area }}" autocomplete="area" autofocus/>
                                        @error('area')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerContact">Contact Number</label>
                                        <input type="text"  name="contact" class="form-control form-control @error('contact') is-invalid @enderror" id="customerContact" placeholder="Enter contact number" value="{{ $customer->contact }}" autocomplete="contact" autofocus/>
                                        @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerEmail">Email</label>
                                        <input type="email" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="customerEmail" placeholder="Enter email" value="{{ $customer->email }}" autocomplete="email" autofocus />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="exampleInputEmail2">Password</label>
                                        <input type="password"  name="password" class="form-control form-control @error('password') is-invalid @enderror" id="exampleInputEmail2"  placeholder="Enter password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerMessagingServiceNo">Messaging Service Number</label>
                                        <input type="text"  name="messaging_service_no" class="form-control form-control @error('messaging_service_no') is-invalid @enderror" id="customerMessagingServiceNo" type="text" placeholder="Enter messaging service number" value="{{ $customer->messaging_service_no }}" autocomplete="messaging_service_no" autofocus />
                                        @error('messaging_service_no')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerMessagingServiceName">Messaging Service Name</label>
                                        <input type="text"  name="messaging_service_name" class="form-control form-control @error('messaging_service_name') is-invalid @enderror" id="customerMessagingServiceName" type="text" placeholder="Enter messaging service name" value="{{ $customer->messaging_service_name }}" autocomplete="messaging_service_name" autofocus />
                                        @error('messaging_service_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerSocialMediaName_1">Social Media Name One</label>
                                        <input type="text"  name="social_media_name_1" class="form-control form-control @error('social_media_name_1') is-invalid @enderror" id="customerSocialMediaName_1" type="text" placeholder="Enter Social media name one" value="{{ $customer->social_media_name_1 }}" autocomplete="social_media_name_1" autofocus />
                                        @error('social_media_name_1')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerLink_1">Social Media Link One</label>
                                        <input type="text"  name="link_1" class="form-control form-control @error('link_1') is-invalid @enderror" id="customerLink_1" type="text" placeholder="Enter Social media Link one" value="{{ $customer->link_1 }}" autocomplete="link_1" autofocus />
                                        @error('link_1')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerSocialMediaName_2">Social Media Name Two</label>
                                        <input type="text"  name="social_media_name_2" class="form-control form-control @error('social_media_name_2') is-invalid @enderror" id="customerSocialMediaName_2" type="text" placeholder="Enter Social media name two" value="{{ $customer->social_media_name_2 }}" autocomplete="social_media_name_2" autofocus />
                                        @error('social_media_name_2')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="customerLink_2">Social Media Link Two</label>
                                        <input type="text"  name="link_2" class="form-control form-control @error('link_2') is-invalid @enderror" id="customerLink_2" type="text" placeholder="Enter Social media Link Two" value="{{ $customer->link_2 }}" autocomplete="link_2" autofocus />
                                        @error('link_2')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="selectStatus">Select Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                            <option selected disabled> Select Status </option>
                                            <option {{ $customer->status == 1 ? 'selected':'' }} value="1"> Active </option>
                                            <option {{ $customer->status == 0 ? 'selected':'' }} value="0"> In Active </option>
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
