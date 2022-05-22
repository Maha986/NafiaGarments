@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'logoIndex', $title = 'Create Logo - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Logo</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Logo</div>
                        <form class="forms-sample" method="POST" action="{{ route('homesetting.store') }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="col-md-3 form-group mb-3">
                                <label for="logo">Logo (Width:255px Height:64px)</label>
                                <input type="file"  name="logo" class="form-control form-control @error('logo') is-invalid @enderror" id="logo" placeholder="Enter Logo" value="{{ old('logo') }}" autocomplete="logo" autofocus/>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="hidden_logo" value="logo" />
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
