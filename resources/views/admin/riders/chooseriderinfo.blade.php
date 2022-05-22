@extends('admin.layouts.master')

@section('content')


    <input type="hidden" value="{{$activePage = 'riderinfoIndex', $title = 'Rider Info - Nafia Garments'}}">


<div class="container">
    <div class="row">
        <div class="col-4">
  
  <div class="card" style="width:200px">
    <img class="card-img-top" src="" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{route('riderpickups',$riderid)}}" class="btn btn-primary btn-block">Rider Pickups</a>
    </div>
  </div>
</div>




  <div class="col-4">
 
  <div class="card" style="width:200px">
    <img class="card-img-top" src="https://images.app.goo.gl/4685cWQboFngn5bM6" alt="Card image" style="width:100%">
    <div class="card-body">
      
      <a href="{{route('riderdeliveryy',$riderid)}}" class="btn btn-primary btn-block">Rider Delivery</a>
    </div>
  </div>
</div>


  <div class="col-4">
 
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
   
      <a href="{{route('riderwallet',$riderid)}}" class="btn btn-primary btn-block ">Rider Accounts</a>
    </div>
  </div>
</div>


  
  
   
</div>
</div>
    
        
@endsection
