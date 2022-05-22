@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'floorIndex', $title = 'Edit Block Floor - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Block Floor</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Block Floor</div>
                        <form class="forms-sample" method="POST" action="{{ route('floor.update',$floor) }}" enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter New Title" value="{{ $floor->title }}" aria-label="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Icon Class (Font Awesome)</label>
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Enter New Icon" value="{{ $floor->icon }}" aria-label="icon">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="banner_1">Banner - 1 (Width:585px Height:65px)</label>

                                    <input type="hidden" name="banner_1_value" value="{{ $floor->banner_1 }}"/>
                                    <input type="file"  name="banner_1" class="form-control form-control @error('banner_1') is-invalid @enderror" id="banner_1" autocomplete="banner_1" autofocus/>

                                    @error('banner_1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <div style="width:200px; height:75px; font-size: 0; padding-top:30px;">
                                        <img src="{{ asset('storage/images/block_floor_products/'.$floor->banner_1) }}" alt="Banner not found" />
                                    </div>
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="banner_2">Banner - 2 (Width:585px Height:65px)</label>

                                    <input type="hidden" name="banner_2_value" value="{{ $floor->banner_2 }}"/>
                                    <input type="file"  name="banner_2" class="form-control form-control @error('banner_2') is-invalid @enderror" id="banner_2" autocomplete="banner_2" autofocus/>

                                    @error('banner_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <div style="width:200px; height:75px; font-size: 0; padding-top:30px;">
                                        <img src="{{ asset('storage/images/block_floor_products/'.$floor->banner_2) }}" alt="Banner not found" />
                                    </div>
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <label for="featured_banner">Featured Banner (Width:234px Height:350px)</label>

                                    <input type="hidden" name="featured_banner_value" value="{{ $floor->featured_banner }}"/>
                                    <input type="file"  name="featured_banner" class="form-control form-control @error('featured_banner') is-invalid @enderror" id="featured_banner" autocomplete="featured_banner" autofocus/>

                                    @error('featured_banner')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group mb-3">
                                    <div style="width:75px; font-size: 0;">
                                        <img src="{{ asset('storage/images/block_floor_products/'.$floor->featured_banner) }}" alt="Banner not found" />
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Colour</label>

                                    <input type="color" name="colourCode" class="form-control @error('colourCode') is-invalid @enderror" placeholder="Enter New Colour" value="{{ $floor->colourCode }}" aria-label="colourCode">

                                    @error('colourCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category One</label>
                                    <select class="form-control @error('category_one') is-invalid @enderror" id="selectCategory" name="category_one">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_one == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Two</label>
                                    <select class="form-control @error('category_two') is-invalid @enderror" id="selectCategory" name="category_two">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_two == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Three</label>
                                    <select class="form-control @error('category_three') is-invalid @enderror" id="selectCategory" name="category_three">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_three == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_three')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Four</label>
                                    <select class="form-control @error('category_four') is-invalid @enderror" id="selectCategory" name="category_four">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_four == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Five</label>
                                    <select class="form-control @error('category_five') is-invalid @enderror" id="selectCategory" name="category_five">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_five == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_five')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Six</label>
                                    <select class="form-control @error('category_six') is-invalid @enderror" id="selectCategory" name="category_six">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_six == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_six')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2 form-group mb-2">
                                    <label for="selectCategory">Select Category Seven</label>
                                    <select class="form-control @error('category_seven') is-invalid @enderror" id="selectCategory" name="category_seven">
                                        <option selected disabled> Select Category </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $floor->category_seven == $category->id ? "selected":"") }}>{{ $category->title  }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_seven')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="block_floor" value="block_floor" />
                            </div>

                            <div class="form-group" style="margin-left:1%;">
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
