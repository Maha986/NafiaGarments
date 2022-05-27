@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'EditRiderPickupCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Edit Rider Pickups</h1>
          
          
               
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        


      
  


                      
                         <form method="POST" action="{{route('editriderpickup_post')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">

                   




                  


                          

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Description</label>
                                    <input type="name"  name="description" class="form-control form-control-rounded @error('description') is-invalid @enderror" id="exampleInputEmail2" type="description"  value="{{$riderorder->description}}" autocomplete="description" autofocus/>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Date of delivery </label>
                                    <input type="text"  name="date" class="form-control form-control-rounded @error('date') is-invalid @enderror" id="exampleInputEmail2"  value="{{$riderorder->date}}" />
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Delivery Address </label>
                                    <input type="text" name="address"  class="form-control form-control-rounded" id="address" value="{{$riderorder->address}}" /required>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Cash</label>
                                    <input type="text"  name="cash" class="form-control form-control-rounded @error('cash') is-invalid @enderror" id="cash" type="text"  value="{{$riderorder->cash}}" autocomplete="location" autofocus />
                                    @error('cash')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                             






<input type="hidden"  name="id" value="{{$riderorder->id}}" />





                                    
                                   
                                
                             
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
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
