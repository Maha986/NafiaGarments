@extends('frontend.layout.master')

@section('content')

    <div class="jumbotron text-center" style="background-color: white;">
        <h1 class="display-3">Thank You! </h1>
        <h2> Your order has been recevied. </h2>
        <p class="lead"><strong> Your Order ID: </strong> #{{ $order_num }} </p>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ '/home' }}" role="button">Continue to homepage</a>
        </p>
    </div>

@endsection


