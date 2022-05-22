@extends('owner.layouts.master')

@section('content')
    <input type="hidden" value="{{$activePage = 'cartIndex', $title = 'Prouduct Owner Details - Nafia Garments'}}">
<div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">


  <h4 class="card-title mb-3">All Details </h4>

<div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Total Cost</th>
                            
                                <th scope="col">Total Profit</th>
                                <th scope="col">Total Price Per Piece</th>
                                <th scope="col">All Total Price</th>
                               
                            </tr>
                            </thead>
                         
                            <tbody>
                                
                      @php
$user_id = Auth::user()->id;

$totalcost = DB::table('product_for_owners')->where('owner_name',$user_id)->sum('cost'); 

$totalprofit = DB::table('product_for_owners')->where('owner_name',$user_id)->sum('profit'); 

$totalpriceperpiece = DB::table('product_for_owners')->where('owner_name',$user_id)->sum('PricePerPiece'); 

$total_allprice = DB::table('product_for_owners')->where('owner_name',$user_id)->sum('TotalPrice'); 
                      @endphp
                                <tr>
                                    
                       
                                    
                                    <td></td>
                                    
    <td>{{$totalcost}}</td>
    <td>{{$totalprofit}}</td>
    <td>{{$totalpriceperpiece}}</td>
    <td>{{$total_allprice}}</td>
                                    
                            
                                   
                                </tr>
                               
               
                            </tbody>
                        </table></div>







                    <h4 class="card-title mb-3">Your Product Details </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product Name</th>
                            
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Profit</th>
                                <th scope="col">Price Per Piece</th>
                                <th scope="col">Total Price</th>
                            </tr>
                            </thead>
                         
                            <tbody>
                                @foreach($userr as $u)
                      
                                <tr>
                                   
         @php 
     $product=\App\Models\Product::where('id',$u->product_id)->first();
                        @endphp
                        <td></td>
                        @if($product!=null)
                                    <td>{{$product->name}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                   
                                    <td>{{$u->productQuantity}}</td>

                                    <td>{{$u->cost}}</td>
                                    <td>{{$u->profit}}</td>
                                    <td>{{$u->PricePerPiece}}</td> 
                                    <td>{{$u->TotalPrice}}</td> 
                                    
                                    

                                    
                            
                                   
                                </tr>
                               
                        @endforeach
                            </tbody>
                        </table></div></div></div></div>
@endsection

