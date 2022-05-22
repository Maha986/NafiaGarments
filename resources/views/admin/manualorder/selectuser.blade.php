@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Select User</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Add User </div>

                         @if ( Session::has('flash_message') )

  <div class="alert {{ Session::get('flash_type') }}">
      <h5>{{ Session::get('flash_message') }}</h5>
  </div>
  
@endif
                        <form method="get" action="" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">

                    

                    
                         @php

                    $users = App\Models\User::all();


                  
                    @endphp  



                     <div class="col-md-6 form-group mb-3">
                                    <label for="role">User</label>
                                    <select class="form-control form-control-rounded @error('user') is-invalid @enderror" id="user" name="userid">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>




                                        @endforeach
                                       
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                

                                
                                <a href=" " class="btn btn-raised btn-raised-success m-1" style="color: white">submit </a> 

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
