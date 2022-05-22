@extends('reseller.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'catalogueIndex', $title = 'Edit Catalogue - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Catalogue</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Catalogue</div>
                        <form class="forms-sample" method="POST" action="{{ route('catalogue.update',$catalogue) }}">
                            @csrf()
                            @method('PUT')
                            <div class="form-group">
                                <label>New Catalogue</label>
                                <input type="text" name="catalogue" class="form-control @error('catalogue') is-invalid @enderror" placeholder="Enter New Catalogue" value="{{ old('catalogue') }}" aria-label="catalogue">
                                @error('catalogue')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
