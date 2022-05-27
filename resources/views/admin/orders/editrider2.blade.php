@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = '', $title = 'Edit Rider - Nafia Garments'}}">
                  @php
                  $riders = \App\Models\Rider::all();
                  @endphp

    <div class="main-content">
        <div class="breadcrumb">
            <h1>Rider</h1> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Reassign Rider</div>
                        <form class="forms-sample" method="POST" action="{{ route('editriderorder2') }}" enctype="multipart/form-data">
                            @csrf()
                             <select class="form-control" name="riderid"required>
                        <option selected disabled> Select Rider </option>
                  

                  @foreach($riders as $rider)
               

                 <option value="{{$rider->id}}"> {{$rider->name}}</option>

                  @endforeach
    
                  
                                                                  
                                                             </select>

                                      
                                                          
                                                             
                                                             
                            </div>
                                                     <div class="col-md-12 form-group mb-3">
                                    <label for="description">Description</label>
                                    <input type="text"  name="description" class="form-control form-control @error('description') is-invalid @enderror" id="description" type="text" placeholder="Enter Description" value="" autocomplete="description" autofocus />
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                         <div class="col-md-12 ">
                                          <label for="firstName1">Enter Date</label>
                                         <input class="form-control" id="date" name="date" value="" type="date"/>
                          </div>
                                                      </br>
                   
                         
                         
                            <input type="text" name="editriderid" value=" {{$name2}}" />
                              
                               
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection

