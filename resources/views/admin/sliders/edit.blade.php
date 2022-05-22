@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'sliderIndex', $title = 'Edit Ape - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Slider</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Slider</div>
                        <form class="forms-sample" method="POST" action="{{ route('homesetting.update',$slider) }}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <?php $hs = explode("~",$slider->value) ?>
                            <div class="row">
                                <div class="col-md-3 form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text"  name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{ $hs[1] }}" autocomplete="title" autofocus/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text"  name="sub_title" class="form-control form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" value="{{ $hs[2] }}" autocomplete="sub_title" autofocus/>
                                    @error('sub_title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="image">Image (Width:666px Height:453px)</label>
                                    <input type="file"  name="image" class="form-control form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Image" value="{{ $hs[0] }}" autocomplete="image" autofocus/>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <input type="hidden" name="image_value" value="{{ $hs[0] }}"/>
                                </div>
                                <img src="{{ asset('storage/images/sliders/'.$hs[0] ) }}" height="120px" width="200px">
                                <input type="hidden" name="slider" value="slider" />
                            </div>

{{--                            <div class="row">--}}

{{--                                @if($slider->key == "title")--}}

{{--                                    <div class="col-md-6 form-group mb-3">--}}
{{--                                        <label for="Address">Title</label>--}}

{{--                                        <input type="text"  name="title" class="form-control form-control @error('title') is-invalid @enderror" id="Address" placeholder="Enter Title" value="{{ $slider->value }}" autocomplete="title" autofocus/>--}}

{{--                                        @error('title')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="title_v" value="title"/>--}}
{{--                                @endif--}}

{{--                                @if($slider->key == "sub title")--}}

{{--                                    <div class="col-md-6 form-group mb-3">--}}
{{--                                        <label for="sub_title">Sub Title</label>--}}
{{--                                        <input type="text"  name="sub_title" class="form-control form-control @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Enter Sub Title" value="{{ $slider->value }}" autocomplete="sub_title" autofocus/>--}}
{{--                                        @error('sub_title')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="sub_title_v" value="sub_title"/>--}}
{{--                                @endif--}}

{{--                                @if($slider->key == "image")--}}

{{--                                    <div class="col-md-6 form-group mb-3">--}}
{{--                                        <label for="image">Image</label>--}}
{{--                                        <input type="hidden" name="image_value" value="{{ $slider->value }}"/>--}}
{{--                                            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Image" value="{{ $slider->value }}" autocomplete="image" autofocus/>--}}
{{--                                        @error('image')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-3 form-group mb-3">--}}
{{--                                        <div style="width:75px; height: 75px; font-size: 0;">--}}
{{--                                            <img src="{{ asset('storage/images/sliders/'.$slider->value) }}" alt="Slider not found" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="image_v" value="image"/>--}}
{{--                                @endif--}}

{{--                            </div>--}}

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
