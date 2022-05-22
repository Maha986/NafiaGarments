@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'riderCreate', $title = 'Create Rider - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Riders</h1>
        </div>

         @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif

         <form method="POST" action="{{route('selectreseller')}}" enctype="multipart/form-data"> 

                            @csrf()

        <div class="row">



<div class="col-md-12 form-group mb-12">
                                    <label for="role">Select Reseller</label>
                                    <select class="form-control form-control-rounded @error('rider') is-invalid @enderror" id="rider" name="reseller">
                                        @foreach($reseller as $reseller)
                                        <option value="{{$reseller->id}}">{{$reseller->name}}</option>

0


                                        @endforeach
                                       
                                    </select>
                                    @error('rider')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                 <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

            
        </div><!-- end of main-content -->
    </form>
    </div>
@endsection


@section('page_css')
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
































