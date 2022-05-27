

@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'userCreate', $title = 'Create User - Nafia Garments'}}">




<div class="container">
    <div class="row">
        <div class="col-6">
  
  <div class="card" style="width:292px">
    <img class="card-img-top" src="{{ asset('storage/images/CR/two.jpg') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="" class="btn btn-primary btn-block">Deliver By Courier  </a>
    </div>
  </div>
</div>

<div class="col-6">
  
  <div class="card" style="width:356px">
    <img class="card-img-top" src="{{ asset('storage/images/CR/one.png') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('assignrider2',['id'=>$id,'name'=>$name])}}" class="btn btn-primary btn-block">Deliver By Rider </a>
    </div>
  </div>
</div>

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


