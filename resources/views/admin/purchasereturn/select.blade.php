@extends('admin.layouts.master')
@section('content')

 <input type="hidden" value="{{$activePage = 'purchasereturnIndex', $title = 'purchase return - Nafia Garments'}}">





  <div class="main-content">
        <div class="breadcrumb">
            <h1>Purchase return</h1>
        </div>
     
                     
                                    <!-- <label for="exampleFormControlSelect1">Select Blood Group</label> -->
                                   
 <div class="form-group">
                                    <!-- <label for="exampleFormControlSelect1">Select Blood Group</label> -->
                                </br>
                                    <p>Select Sale Center</p>
                                   <div class="row">
                                      
                                      @foreach($salecenters as $salecenter)
                                   	<div class="col-3">
                                   		<h3>{{$salecenter->name}}</h3>
                                   		 <form action="purchase/{{$salecenter->id}}" method="post"> 
                                   		 	@csrf
                                                  <input type="hidden" name="" value ="{{$salecenter->id}}">
                                       <button class="btn btn-primary">

                                                   select
                                                  </button>

                                                </form>

                                   	</div>
                                   	@endforeach
                                   </div>
                                  
                                  </div>

                                   

                                   
                           
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
