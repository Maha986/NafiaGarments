 @extends('frontend.layout.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-6">
  
  <div class="card" style="width:550px">
    <img class="card-img-top" src="{{ asset('storage/images/dealimages/re.png') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('customerdispatch',$total)}}" class="btn btn-primary btn-block">Dispatch Directly to Customer’s Address </a>
    </div>
  </div>
</div>

<div class="col-6">
  
  <div class="card" style="width:550px">
    <img class="card-img-top" src="{{ asset('storage/images/dealimages/re.png') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('mydispatch',$total)}}" class="btn btn-primary btn-block">Dispatch on my Address </a>
    </div>
  </div>
</div>

</div>
</div>

@endsection