@extends('admin.layouts.master')
@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
   .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Products </h1>
          
          
               
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Add Product </div>

    <!--                     @if (Session::get('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
    
           
  </div>
  @endif -->





 <form method="POST" action="{{route('addtocart_manualorder')}}" enctype="multipart/form-data">
@csrf()


@if(isset($user1))
<a href="{{route('resellercart')}}" class="btn btn-raised btn-raised-success m-1" style="color: white">Reseller Carts</a>
</br>

<div class="col-md-6 form-group mb-3">
                                    <label for="role">User</label>
                                    <select class="form-control form-control-rounded @error('user') is-invalid @enderror" id="user" name="userid">
                                        @foreach($user1 as $user)
                      <option value="{{$user->reseller_id}}">{{$user->user_id}}</option>
                     
                                        @endforeach



                                        
                                      
                                       
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
             


@elseif(isset($user2))

<a href="{{route('usercart')}}" class="btn btn-raised btn-raised-success m-1" style="color: white">User Carts</a>
<div class="col-md-6 form-group mb-3">
                                    <label for="role">User</label>
                                    <select class="form-control form-control-rounded @error('user') is-invalid @enderror" id="user" name="userid">
                                        @foreach($user2 as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                     
                                        @endforeach



                                        
                                      
                                       
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
              @endif

<div class="container">

    <div class="row">
@foreach($pro as $product)
@php
$productss = App\Models\Product::where('id',$product->product_id)->first();
@endphp
@if($productss!=null)

@php
  $image = App\Models\ColourImageProductSize::where('product_id',$productss->id)->first();
@endphp


<div class="col-4">
  <div class="card" >
    <img class="card-img-top" src="{{ asset('storage/images/productImages/'.$image->image) }}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h2 class="card-title"><b>{{$productss->name}}</b></h2>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
<input type="hidden" value="{{$productss->id}}" name="productid">



                     <label for="color">Colors</label>
                  <select class="form-control form-control-rounded @error('color') is-invalid @enderror" id="color" name="color">
                    @php $colors = App\Models\ColourImageProductSize::where('product_id',$productss->id)->get();

               @endphp

               @foreach($colors as $color)

              @php
              $c = App\Models\Colour::where('id',$color->colour_id)->first()->colourCode;
              @endphp
                                    
                                            <option style="background-color:{{$c}};" value="{{$color->colour_id}}">

                                          {{$c}}
                                            </option>
                                      
                                      
                @endforeach
                                    </select>

 <label>Size:</label>
       <select class="input form-control @error('size') is-invalid @enderror" name="size" id="size"placeholder="Select Size">
              @php $sizes = App\Models\ColourImageProductSize::where('product_id',$productss->id)->get();

               @endphp

               @foreach($sizes as $sizee)

              
                                    
                                            <option value="{{$sizee->size_id}}">

                                                @if($sizee->size_id=='1')
                                                Small
                                        @elseif($sizee->size_id=='2')
                                            Medium
                                        @elseif($sizee->size_id=='3')
                                        Large
                                         @elseif($sizee->size_id=='4')
                                         XLarge
                                         @endif
                                            </option>
                                      
                                      
                @endforeach
                                    </select>









<label>Quantity</label>
<input type="text" class="form-control" name="quan">








@php
$prod = App\Models\Product::where('id',$productss->id)->first();
@endphp
<label>Price : <b> Rs:{{$prod->price}} </b></label>
<input type="hidden" value="{{$prod->price}}" name="price"></br>

  <button type="submit" class="w3-button w3-black">Add To Cart</button>

    </div>
  </div>
</div>
@endif
     
@endforeach


    </div>

</div>

</form>

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






















