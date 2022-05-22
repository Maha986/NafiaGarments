   @extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'dealIndex', $title = 'Edit Deal - Nafia Garments'}}">



          @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif


    
@php
$sizes = App\Models\Size::all();
@endphp
<form class="forms-sample" method="POST"enctype="multipart/form-data" action="{{ route('deal-update',$deal->id) }}">
                            @csrf()

                        <div class="col-md-12 form-group mb-3">
                                    <label for="selectDeal">Select Size </label>
                                    <select class="form-control @error('size') is-invalid @enderror" id="size" name="size">
                                        <option selected disabled> {{$deal->size_id}} </option>
                                        @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->sizeName}} </option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


@php
$colors = App\Models\Colour::all();
@endphp

                        <div class="col-md-12 form-group mb-3">
                                    <label for="color">Select Color </label>
                                    <select class="form-control @error('color') is-invalid @enderror" id="color" name="color">
                                        <option selected disabled> {{$deal->size_id}} </option>
                                        @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->colourCode}} </option>
                                        @endforeach
                                    </select>
                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


    <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                                @endsection