@extends('admin.layouts.master')
@section('content')

<style>
    
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>
    <input type="hidden" value="{{$activePage = 'categoryCreate', $title = 'Create Category - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Categories</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Category</div>
                        <form class="forms-sample" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">


<!-- <div class="col-md-6 form-group mb-3">
                                    <label for="selectCategory">Select Gender</label>
                                    <select class="form-control" id="selectCategory" name="gender"required>
                                        <option selected disabled> Select Gender </option>
                                      
                                            <option>men</option>

                                            <option>women</option>
                                      
                                    </select>
                                </div>

<div class="col-md-6 form-group mb-3">

    



</div> -->




         <div class="col-md-6 form-group mb-3">
                                           <div class="form-group">
                 <label for="selectCategory">Select Category</label>
                                <select class="form-control @error('categories') is-invalid @enderror" id="selectCategory" name="categories[]" multiple size="10">
                                    <option value="none" selected="" disabled="">Select Product Category</option>
                                    @foreach($categories as $category)


                                        @if($category->parent_id == 0)

                                            <option style="font-size: 20px; font-style: bold;" value="{{ $category->id }}" label="{{ $category->title }}">

                                            @php
                                                $first_child_categories =  DB::table('categories')
                                                ->where('parent_id',$category->id)
                                                ->get()
                                            @endphp

                                                @if(count($first_child_categories) != false)

                     @foreach($first_child_categories as $first_child_category)

             <option value="{{ $first_child_category->id }}"> -{{$first_child_category->title }}</option>

                                     @php
                       $second_child_categories =  DB::table('categories')
                                                                ->where('parent_id',$first_child_category->id)
                                                                ->get()
                             @endphp

       @if(count($second_child_categories) != false)

         @foreach($second_child_categories as $second_child_category)

          <option value="{{ $second_child_category->id }}"> --{{ $second_child_category->title }}</option>

                                        @php  $third_child_categories =  DB::table('categories')->where('parent_id',$second_child_category->id) ->get()
                                                                    @endphp

                     @if(count($third_child_categories) != false)

                          @foreach($third_child_categories as $third_child_category)

                                                                            <rth_child_category->tit
                                     @endforeach

                                                                    @endif

                                                                @endforeach

                                                            @endif

                                                    @endforeach

                                                @endif

                                            </option>

                                        @endif

                                    @endforeach


                                </select>
                                @error('categories')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            </div>   



















                             
                                <div class="col-md-6 form-group mb-3">
                                    <label>New Category</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter New Category" value="{{ old('title') }}" aria-label="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- <div class="col-md-6 form-group mb-3">
                                    <label>Icon Class (Font Awesome)</label>
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Enter New Icon" value="{{ old('icon') }}" aria-label="icon">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="image">Image</label>
                                    <input type="file"  name="image" class="form-control form-control @error('image') is-invalid @enderror" id="image" value="{{ old('image') }}" autocomplete="image" autofocus/>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="margin-left:25%">Submit</button>
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
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
