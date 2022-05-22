@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'colourCreate', $title = 'Edit Colour - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Colours</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Colour</div>
                        <form class="forms-sample" method="POST" action="{{ route('colour.update',$colour) }}">
                            @csrf()
                            @method('PUT')
                            <div class="form-group">
                                <label>Edit Colour</label>
                                <input type="color" name="colourCode" class="form-control @error('colourCode') is-invalid @enderror" placeholder="Enter New Colour" value="{{ $colour->colourCode }}" aria-label="colourCode">
                                @error('colourCode')
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
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
