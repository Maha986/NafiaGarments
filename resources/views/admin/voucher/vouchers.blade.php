@extends('admin.layouts.master')

@section('content')


    <input type="hidden" value="{{$activePage = 'accountsIndex', $title = 'Generate Voucher - Nafia Garments'}}">


<div class="container">
    <div class="row">
        <div class="col-4">
  
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
     
      <a href="{{url('bankpaymentvoucher')}}" class="btn btn-primary btn-block">Bank Payment Voucher</a>
    </div>
  </div>
</div>

  <div class="col-4">
  
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
    
      <a href="{{url('bankrecievevoucher')}}" class="btn btn-primary btn-block">Bank Recieve Voucher</a>
    </div>
  </div>
</div>


  <div class="col-4">
 
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
      
      <a href="{{url('cashpaymentvoucher')}}" class="btn btn-primary btn-block">Cash Payment Voucher</a>
    </div>
  </div>
</div>


  <div class="col-4">
 
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
   
      <a href="{{url('cashrecievevoucher')}}" class="btn btn-primary btn-block ">Cash Recieve Voucher</a>
    </div>
  </div>
</div>


  <div class="col-4">
 
  <div class="card" style="width:200px">
    <img class="card-img-top" src="admin-assets/images/voucher.png" alt="Card image" style="width:100%">
    <div class="card-body">
      
      <a href="{{url('journalvoucher')}}" class="btn btn-primary btn-block ">Journal Voucher</a>
    </div>
  </div>
</div>
  
   
</div>
</div>
    
        
@endsection
