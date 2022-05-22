@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'apeIndex', $title = 'Create Ape - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Address - Phone - Email</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Ape</div>
                        <form class="forms-sample" method="POST" action="{{ route('homesetting.store') }}">
                            @csrf()

                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label for="Address">Address</label>

                                    <input type="text"  name="address" class="form-control form-control @error('address') is-invalid @enderror" id="Address" placeholder="Enter Address" value="{{ old('address') }}" autocomplete="address" autofocus/>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="Phone">Phone Number</label>
                                    <input type="text"  name="phone" class="form-control form-control @error('phone') is-invalid @enderror" id="Phone" placeholder="Enter Phone number" value="{{ old('phone') }}" autocomplete="phone" autofocus/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="Email">Email</label>
                                    <input type="email"  name="email" class="form-control form-control @error('email') is-invalid @enderror" id="Email    " type="text" placeholder="Enter email" value="{{ old('email') }}" autocomplete="email" autofocus />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="ape" value="ape" />
                            </div>

                            <div class="form-group" style="margin-left:1%;">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
