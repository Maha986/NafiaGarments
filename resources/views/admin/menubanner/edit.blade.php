@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'bannerIndex', $title = 'Create Banner - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Banner</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Menu Banner</div>
                        <form class="forms-sample" method="post" action="{{Route('menuedit')}}" enctype="multipart/form-data">
                            @csrf()

                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label for="banner_1">Banner - 1 (Width:225px Height:183px)</label>

                                    <input type="file"  name="banner_1" class="form-control form-control @error('banner_1') is-invalid @enderror" id="banner_1" placeholder="Enter Banner One" value="" autocomplete="banner_1" autofocus/>

                                    @error('banner_1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label for="banner_2">Banner - 2 (Width:207px Height:182px)</label>

                                    <input type="file"  name="banner_2" class="form-control form-control @error('banner_2') is-invalid @enderror" id="banner_2" placeholder="Enter Banner Two" value="{{ old('banner_2') }}" autocomplete="banner_2" autofocus/>

                                    @error('banner_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->

                                <input type="hidden" name="key" value="menubanner" />
                                <input type="hidden" name="status" value="0" />

                                <input type="hidden" name="id" value="{{$id}}" />
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