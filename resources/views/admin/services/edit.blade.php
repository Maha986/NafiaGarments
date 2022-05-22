@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'serviceIndex', $title = 'Edit Service - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Service</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Service</div>
                        <form class="forms-sample" method="POST" action="{{ route('homesetting.update',$service) }}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <?php $hs = explode("~",$service->value) ?>
                            <div class="row">
                                <div class="col-md-3 form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text"  name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{ $hs[0] }}" autocomplete="title" autofocus/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text"  name="sub_title" class="form-control form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" value="{{ $hs[1] }}" autocomplete="sub_title" autofocus/>
                                    @error('sub_title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label>Icon Class</label>
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Enter New Icon" value="{{ $hs[2] }}" aria-label="icon">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="service" value="service" />
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
