@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = '', $title = 'Check close order'}}">
   <center> <h1> <b>Order Closing Screen</b></h1></center></br>
    <h3> Closing Order : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Order Number :{{$closingorder->order_number}}</p>
	</div>

	<div class="col-4">
		 <p> Order Date :{{$closingorder->order_date}} </p>
	</div>

	<div class="col-4">
		<p> Customer Reseller Name :{{$closingorder->customer_reseller_name}}</p>
	</div>

	<div class="col-4">
	<p> Final Profit & Loss :{{$closingorder->finalprofit_and_loss}}</p>
	</div>
</div>
</br>




    <h3> Customer Type : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Closingorder_id :{{$closingordercustomertype->closingorder_id}}</p>
	</div>

	<div class="col-4">
		 <p> Order Id :{{$closingordercustomertype->order_id}} </p>
	</div>

	<div class="col-4">
		<p> Delivery Type :{{$closingordercustomertype->deliverytype}}</p>
	</div>

	<div class="col-4">
	<p> Consignee Name :{{$closingordercustomertype->consignee_name}}</p>
	</div>

	<div class="col-4">
	<p> City :{{$closingordercustomertype->city}}</p>
	</div>
	<div class="col-4">
	<p> tehsil :{{$closingordercustomertype->tehsil}}</p>
	</div>
	<div class="col-4">
	<p> district :{{$closingordercustomertype->district}}</p>
	</div>

	<div class="col-4">
	<p> Delivery Address :{{$closingordercustomertype->delivery_address}}</p>
	</div>

</div>
</br>





    <h3> Delivery Charges : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Closingorder_id :{{$closingorderdeliverycharges->closingorder_id}}</p>
	</div>

	<div class="col-4">
		 <p> Order Id :{{$closingorderdeliverycharges->order_id}} </p>
	</div>

	<div class="col-4">
		<p> Agreed delivery charges :{{$closingorderdeliverycharges->agreed_delivery_charges}}</p>
	</div>

	<div class="col-4">
	<p> Actual delivery charges :{{$closingorderdeliverycharges->actual_delivery_charges}}</p>
	</div>

	<div class="col-4">
	<p> Courier Invoice / Loadsheet #:{{$closingorderdeliverycharges->courierinvoice_or_loadsheetnumber}}</p>
	</div>
	<div class="col-4">
	<p> Rider name/ Courier Company :{{$closingorderdeliverycharges->ridername_or_couriercompany}}</p>
	</div>
	<div class="col-4">
	<p> Profit/loss :{{$closingorderdeliverycharges->profit_or_lossondeliverycharges}}</p>
	</div>



</div>
</br>








    <h3> Order payments : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Closingorder_id :{{$closingorderpayment->closingorder_id}}</p>
	</div>

	<div class="col-4">
		 <p> Order Id :{{$closingorderpayment->order_id}} </p>
	</div>

	<div class="col-4">
		<p> Product Amount:{{$closingorderpayment->product_amount}}</p>
	</div>

	<div class="col-4">
	<p> Reseller profit/Commission:{{$closingorderpayment->resellerprofit_or_commission}}</p>
	</div>


	<div class="col-4">
	<p> Total order amount:{{$closingorderpayment->totalorder_amount}}</p>
	</div>
	<div class="col-4">
	<p> Advance Payment :{{$closingorderpayment->advance_payment}}</p>
	</div>
	<div class="col-4">
	<p> Cash on delivery amount :{{$closingorderpayment->cashondeliveryamount}}</p>
	</div>



</div>
</br>




    <h3> Product Details : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Closingorder_id :{{$closingorderproductdetail->closingorder_id}}</p>
	</div>

	<div class="col-4">
		 <p> Order Id :{{$closingorderproductdetail->order_id}} </p>
	</div>

	<div class="col-4">
		<p> Picture:{{$closingorderproductdetail->picture}}</p>
	</div>

	<div class="col-4">
	<p> Product Number:{{$closingorderproductdetail->product_number}}</p>
	</div>


	<div class="col-4">
	<p> Purchase Price After Discount :{{$closingorderproductdetail->purchase_price_after_discount}}</p>
	</div>
	<div class="col-4">
	<p> Quantity :{{$closingorderproductdetail->quantity}}</p>
	</div>
	<div class="col-4">
	<p> Sell Price :{{$closingorderproductdetail->sellprice}}</p>
	</div>

	<div class="col-4">
	<p> Discount:{{$closingorderproductdetail->discount}}</p>
	</div>

	<div class="col-4">
	<p>Profit/Loss:{{$closingorderproductdetail->profit_loss}}</p>
	</div>




</div>
</br>




    <h3> Reseller Commission Profit : </h3>
</br>
<div class="row">
	<div class="col-4">
		<p> Closingorder_id :{{$closingorderresellercommissionorprofit->closingorder_id}}</p>
	</div>

	<div class="col-4">
		 <p> Order Id :{{$closingorderresellercommissionorprofit->order_id}} </p>
	</div>

	<div class="col-4">
		<p> Commission amount:{{$closingorderresellercommissionorprofit->commission_amount}}</p>
	</div>

	<div class="col-4">
	<p> Commission Payment transfered :{{$closingorderresellercommissionorprofit->commission_payment_transfered}}</p>
	</div>


	<div class="col-4">
	<p> Transfer Slip :{{$closingorderresellercommissionorprofit->transfer_slip}}</p>
	</div>
	<div class="col-4">
	<p> Commission balance :{{$closingorderresellercommissionorprofit->commission_balance}}</p>
	</div>
	



</div>
</br>





    @endsection