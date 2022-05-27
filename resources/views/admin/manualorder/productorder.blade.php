@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Add Manual Order </h1>
          
          
               
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Add Product </div>


                         @if (Session::get('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
      <a href="{{route('admincart',$user)}}" class="btn btn-raised btn-raised-success m-1" style="color: white">View Cart</a>
           
  </div>

    <!--     @if (Session::get('flash_message2') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
      @endif -->
  

                        <form method="POST" action="{{route('addcartadmin')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">

                     @php

                    $products = App\Models\Product::all();
                  
                    @endphp  

                    
                         @php

                    $users = App\Models\User::all();


                  
                    @endphp  








<div class="col-md-6 form-group mb-3">
                                    <label for="role">User</label>
                                    <select class="form-control form-control-rounded @error('user') is-invalid @enderror" id="user" name="userid">
                                        
                      <option value="reseller">Reseller</option>
                      <option value="customer">Customer</option>



                                        
                                      
                                       
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                  





                    <!--             <div class="col-md-6 form-group mb-3">
                                    <label for="role">Product</label>
                                    <select class="form-control form-control-rounded @error('product') is-invalid @enderror" id="product" name="productid">
                                        @foreach($products as $product)
<option value="{{$product->id}}">
{{$product->name}} / Price:{{$product->price}}
</option>
                                        @endforeach
                                       
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->
                                

                              



                                              
                            <div class="col-md-6 form-group mb-3">
                                           <div class="form-group">
                 <label for="selectCategory">Select Category</label>
                                <select class="form-control @error('categories') is-invalid @enderror" id="selectCategory" name="categories[]" multiple size="10">
                                    <option value="none" selected="" disabled="">Select Product Category</option>
                                    @foreach($categories as $category)


                                        @if($category->parent_id == 0)

                                            <optgroup value="{{ $category->id }}" label="{{ $category->title }}">

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

                                                                    @php
                                                                        $third_child_categories =  DB::table('categories')
                                                                        ->where('parent_id',$second_child_category->id)
                                                                        ->get()
                                                                    @endphp

                                                                    @if(count($third_child_categories) != false)

                                                                        @foreach($third_child_categories as $third_child_category)

                                                                            <option value="{{ $third_child_category->id }}"> ---{{ $third_child_category->title }}</option>

                                                                            @php
                                                                                $fourth_child_categories =  DB::table('categories')
                                                                                ->where('parent_id',$third_child_category->id)
                                                                                ->get()
                                                                            @endphp

                                                                            @if(count($fourth_child_categories) != false)

                                                                                @foreach($fourth_child_categories as $fourth_child_category)

                                                                                    <option value="{{ $fourth_child_category->id }}"> ----{{ $fourth_child_category->title }}</option>

                                                                                @endforeach

                                                                            @endif

                                                                        @endforeach

                                                                    @endif

                                                                @endforeach

                                                            @endif

                                                    @endforeach

                                                @endif

                                            </optgroup>

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
                                   
                                
                               
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </div>

                            </div>
                        </form>

                        @else 

                      @if (Session::get('flash_message2') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message2') }}</h5>
      @endif   


@if(isset($user))
<a href="{{route('admincart',$user)}}" class="btn btn-raised btn-raised-success m-1" style="color: white">View Cart</a>
@endif




                         <form method="POST" action="{{route('addcartadmin')}}" enctype="multipart/form-data">
                            @csrf()



                            <div class="row">

                     @php

                    $products = App\Models\Product::all();
                  
                    @endphp  

                    
                         @php

                    $users = App\Models\User::all();


                  
                    @endphp  

<div class="col-md-6 form-group mb-3">
                                    <label for="role">User</label>
                                    <select class="form-control form-control-rounded @error('user') is-invalid @enderror" id="user" name="userid">
                                        
                      <option value="reseller">Reseller</option>
                      <option value="customer">Customer</option>



                                        
                                      
                                       
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                  


                               
                                

                           
                               
@php 
$colors = App\Models\Colour::all();
@endphp


 


                                    
                            <div class="col-md-6 form-group mb-3">
                                           <div class="form-group">
                 <label for="selectCategory">Select Category</label>
                                <select class="form-control @error('categories') is-invalid @enderror" id="selectCategory" name="categories[]" multiple size="10">
                                    <option value="none" selected="" disabled="">Select Product Category</option>
                                    @foreach($categories as $category)


                                        @if($category->parent_id == 0)

                                            <optgroup value="{{ $category->id }}" label="{{ $category->title }}">

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

                                                                    @php
                                                                        $third_child_categories =  DB::table('categories')
                                                                        ->where('parent_id',$second_child_category->id)
                                                                        ->get()
                                                                    @endphp

                                                                    @if(count($third_child_categories) != false)

                                                                        @foreach($third_child_categories as $third_child_category)

                                                                            <option value="{{ $third_child_category->id }}"> ---{{ $third_child_category->title }}</option>

                                                                            @php
                                                                                $fourth_child_categories =  DB::table('categories')
                                                                                ->where('parent_id',$third_child_category->id)
                                                                                ->get()
                                                                            @endphp

                                                                            @if(count($fourth_child_categories) != false)

                                                                                @foreach($fourth_child_categories as $fourth_child_category)

                                                                                    <option value="{{ $fourth_child_category->id }}"> ----{{ $fourth_child_category->title }}</option>

                                                                                @endforeach

                                                                            @endif

                                                                        @endforeach

                                                                    @endif

                                                                @endforeach

                                                            @endif

                                                    @endforeach

                                                @endif

                                            </optgroup>

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
                                
                               
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </div>

                            </div>
                        </form>
                        @endif
                      <!--   <div class="col-md-12"style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">CHECKOUT</button>
                                </div> -->
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
