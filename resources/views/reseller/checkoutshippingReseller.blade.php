@extends('reseller.layouts.master')
@section('content')
<input type="hidden" value="{{$activePage = 'Delivery Address', $title = 'Dispatch- Nafia Garments'}}">



<div class="container">
    <div class="row">
        <div class="col-6">
  
  <div class="card" style="width:550px">
    <img class="card-img-top" src="{{ asset('storage/images/dealimages/re.png') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('reseller_customer_dispatch')}}" class="btn btn-primary btn-block">Dispatch Directly to Customers Address </a>
    </div>
  </div>
</div>

<div class="col-6">
  
  <div class="card" style="width:550px">
    <img class="card-img-top" src="{{ asset('storage/images/dealimages/re.png') }}" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('reseller_my_dispatch')}}" class="btn btn-primary btn-block">Dispatch on my Address </a>
    </div>
  </div>
</div>

</div>
</div>
@endsection