@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Add Manual Order</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New User</div>
                        <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">First name</label>
                                    <input type="text"  name="name" class="form-control form-control-rounded @error('name') is-invalid @enderror" id="firstName2" type="text" placeholder="Enter your first name" value="{{ old('name') }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Email address</label>
                                    <input type="email"  name="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" id="exampleInputEmail2" type="email" placeholder="Enter email" value="{{ old('email') }}" autocomplete="email" autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Password</label>
                                    <input type="password"  name="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" id="exampleInputEmail2"  placeholder="Enter password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Confirm Password</label>
                                    <input type="password" name="password_confirmation"  class="form-control form-control-rounded" id="exampleInputEmail2" placeholder="Confirm Password" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="role">Select Role</label>
                                    <select class="form-control form-control-rounded @error('role') is-invalid @enderror" id="role" name="role">
                                       
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 form-group mb-3">
                                    <label for="image">Profile Image</label>
                                    <input type="file"  name="image" class="form-control form-control form-control-rounded @error('image') is-invalid @enderror" id="image" placeholder="Enter Image" value="{{ old('image') }}" autocomplete="image" autofocus/>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
