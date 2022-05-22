@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'bannerIndex', $title = 'Edit Logo - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Banner</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Banner</div>
                        <form class="forms-sample" method="POST" action="{{ route('homesetting.update',$banner) }}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                @if($banner->key == "banner-1")

                                    <div class="col-md-3 form-group mb-3">
                                        <label for="banner_1">Banner (Width:225px Height:183px)</label>
                                        <input type="hidden" name="banner_1_value" value="{{ $banner->value }}"/>
                                        <input type="file"  name="banner_1" class="form-control @error('banner_1') is-invalid @enderror" id="banner_1" placeholder="Enter Banner" value="{{ $banner->value }}" autocomplete="banner_1" autofocus/>
                                        @error('banner_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="col-md-3 form-group mb-3">
                                        <div style="width:75px; height: 75px; font-size: 0;">
                                            <img src="{{ asset('storage/images/banners/'.$banner->value) }}" alt="Banner not found" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="banner_1_v" value="banner 1"/>
                                @endif

                                @if($banner->key == "banner-2")

                                    <div class="col-md-3 form-group mb-3">
                                        <label for="banner_2">Banner (Width:207px Height:182px)</label>
                                        <input type="hidden" name="banner_2_value" value="{{ $banner->value }}"/>
                                        <input type="file"  name="banner_2" class="form-control @error('banner_2') is-invalid @enderror" id="banner_2" placeholder="Enter Banner" value="{{ $banner->value }}" autocomplete="banner_2" autofocus/>
                                        @error('banner_2')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="col-md-3 form-group mb-3">
                                        <div style="width:75px; height: 75px; font-size: 0;">
                                            <img src="{{ asset('storage/images/banners/'.$banner->value) }}" alt="Banner not found" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="banner_2_v" value="banner 2"/>
                                @endif

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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
