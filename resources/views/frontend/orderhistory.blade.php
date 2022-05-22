@extends('frontend.layout.master')
@section('content')
<style>
    .panel-order .row {
    border-bottom: 1px solid #ccc;
}
.panel-order .row:last-child {
    border: 0px;
}
.panel-order .row .col-md-1  {
    text-align: center;
    padding-top: 15px;
}
.panel-order .row .col-md-1 img {
    width: 50px;
    max-height: 50px;
}
.panel-order .row .row {
    border-bottom: 0;
}
.panel-order .row .col-md-11 {
    border-left: 1px solid #ccc;
}
.panel-order .row .row .col-md-12 {
    padding-top: 7px;
    padding-bottom: 7px; 
}
.panel-order .row .row .col-md-12:last-child {
    font-size: 11px; 
    color: #555;  
    background: #efefef;
}
.panel-order .btn-group {
    margin: 0px;
    padding: 0px;
}
.panel-order .panel-body {
    padding-top: 0px;
    padding-bottom: 0px;
}
.panel-order .panel-deading {
    margin-bottom: 0;
}                    
</style>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<div class="container bootdey">
    <div class="panel panel-default panel-order">
        <div class="panel-heading">
            <strong>Order history</strong>
            <div class="btn-group pull-right">
                <div class="btn-group">
                  
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#">Approved orders</a></li>
                        <li><a href="#">Pending orders</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel-body">

            @foreach($orderhistory as $order)
            <div class="row">
                <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail" /></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right"><label class="label label-danger">rejected</label></div>

                            <div class="col-md-12"><h4>Product Name: {{$order->product_id}}</h4> </div>


                            <span><strong><h5>Order name: {{$order->order_id}}</h5></strong></span> 

                            <span class="label label-info">group name</span><br />
                            Quantity : {{$order->product_quantity}}, cost: $ {{$order->total_price}} <br />
                            
                        </div>
                        <div class="col-md-12">order made on: {{$order->created_at}} by <a href="#">Jane Doe </a></div>
                    </div>
                </div>
            </div>
            @endforeach

            
        <div class="panel-footer">Put here some note for example: bootdey si a gallery of free bootstrap snippets bootdeys</div>
    </div>
</div>

@endsection