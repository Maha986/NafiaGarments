@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">
    <div class="main-content">
        
         <div class="jumbotron text-center" style="background-color: white;">
        <h1 class="display-3">Thank You! </h1>
        <h2> Your Manual order Has Been Placed</h2>
        <p class="lead"><strong> Your Order ID: </strong> #{{ $order_num }} </p>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}" role="button">Continue to Dashboard</a>
        </p>
    </div>
    </div>
@endsection

@section('page_css')
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
