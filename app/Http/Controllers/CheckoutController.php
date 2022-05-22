<?php

namespace App\Http\Controllers;
use App\Models\orderdetail;
use App\Models\productorderdetail;
use App\Models\Offer;
use App\Models\ResellerUser;
use App\Models\advancepayment;
use App\Models\deliverystandard;
use App\Models\expressdeliverycharge;
use App\Models\DeliveryCharges;
use App\Models\resellerwallet;
use App\Models\ColourImageProductSize;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{


public function admin_customer_dispatch($id)
    {
      return view('admin.manualorder.checkoutresellerview',['userid'=>  $id]);
    }

    public function admin_reseller_dispatch($id)
    {
      return view('admin.manualorder.checkoutresellerview2',['userid'=>  $id]);
    }
 

    public function checkout_shipping($id)
    {
 

      $userId = auth()->user()->id;
      $reseller = ResellerUser::where('user_id',$userId)->first();
      if($reseller!=null)
      {
     return view('checkoutshippingReseller',['total'=>  $id]);
      }
      else 
      {
    return view('checkoutshipping',['total'=>  $id]);
      }
    	// return view('checkoutshipping',['total'=>  $id]);
    }
public function customer_dispatch($id)
    {

  return view('checkoutshipping_customer_dispatch',['total'=>  $id]);
    }


    public function my_dispatch($id)
    {

  return view('checkoutshipping_my_dispatch',['total'=>  $id]);
    }



     public function checkout_review()
    {

    	return view('checkoutreview');
    }




     public function decline($id)
    {

    $del = orderdetail::where('id',$id)->first();
    $del->delete();

productorderdetail::where('order_id',$id)->delete();
return redirect('category'); 
    
    }

       public function accept($id)
    {
 $ordernumber = $id;

return view('frontend.thankyouorder',['order_num'=> $ordernumber]); 
    
    }

    public function shippingcheckout(request $req,$id)
    { 
       $total = $id;

       $order = new orderdetail;
       
       $order->user_id = $req->userid;
       $order->order_from = $req->userrole;
       $order->name = $req->naam;
       $order->address = $req->address;
       $order->city = $req->city;
       $order->district = $req->district;
       $order->tehsil = $req->tehsil;
       $order->location = $req->nearlocation;
       $order->contactno = $req->contactno;
       $order->special_delivery_instruction = $req->deliveryinstruction;
       $order->far_fetched_town = "far";
       $order->urgentdelivery = "urgent";
       $order->delivery_required_before = $req->deliveryrequire;
       $order->totalamount = $total;


    // $deliverycharges=DeliveryCharges::where('city_id',$req->city)->first();
    //  $delivery = $deliverycharges->delivery_charge;

       $order->deliverycharges ='0';

       if($req->advancepayment!=null)
       {
        $order->advancepayment = $req->advancepayment;
       }

       $img3 = $req->file('img1');

        if($img3!= null)
        {
           $validator = Validator::make($req->all(), [
          'img1' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
                                                         ]);
         $image3 = $img3->getClientOriginalName();
        $img3->storeAs('/images/transferslips',$image3);
        $order->advancepayment_transfer_slip = $image3;


        }
       
       if($req->cashdelivery!=null)
       {
         $order->cashofdeliveryamount=$req->cashdelivery;
       }

    $order->refundable_amount_after_delivery = $req->refundableamount;

    $order->amount_to_be_charged_to_customer = $req->amountcharge;


          $order->resellerprofit = $req->resellerprofit;
       

    
  $order->advance_payment_from_commission_balance =$req->advancecommission;


      
       $order->save();
       $lastiya = $order->id;

       // return view('checkoutreview');
      $ordernumberdetail = orderdetail::all()->last();
      $ordernumberid = $ordernumberdetail->id;

     

       $cartCollection = Cart::getContent();
      $userId = auth()->user()->id; // or any string represents user identifier
      $u = Cart::session($userId)->getContent();

     

      foreach($u as $product)
      {
      	$productdetail = new productorderdetail;
      	$productdetail->order_id = $ordernumberid;
        
        $deal =  ColourImageProductSize::where('deal',$product->id)->first();
        
        $realproduct_id = ColourImageProductSize::where('id',$product->id)->first()->product_id;
         
        if($deal!=null)
        {
          $productdetail->product_id = $deal->product_id;
        }
        else
        {
          $productdetail->product_id = $realproduct_id;
        }
     
        $productdetail->supplier = $product->attributes->supplier;

        

 

      $buyonegetone_offer = Offer::where('product_id',$realproduct_id)->where('offer','Buy One Get One Free')->first();
        if($buyonegetone_offer)
        {
          $productdetail->product_quantity = $product->quantity*2;
        }
        else 
        {
          $productdetail->product_quantity = $product->quantity;
        }
      	
      	$productdetail->total_price = ($product->price)*($product->quantity);

        $productdetail->size = $product->size; 
        // $product->size;
        $productdetail->color =$product->color; 
        // $product->color;
        $productdetail->user_id = $req->userid;

      $freedelivery_offer = Offer::where('product_id',$realproduct_id)->where('offer','Free Delivery')->first();

    if($freedelivery_offer)
    { 

    $productdetail->product_weight = "0";

    }
    else
    {  //  start delivery 
$express_charge = expressdeliverycharge::all()->first()->charges;
$additional_charge = expressdeliverycharge::all()->first()->additional_charges;

$standard_charge_samecity = deliverystandard::all()->first()->charges;
$standard_charge_othercity = deliverystandard::where('id','2')->first()->charges;
$additional_charge_standard_samecity = deliverystandard::all()->first()->additional_charges;
$additional_charge_standard_othercity = deliverystandard::where('id','2')->first()->additional_charges;

      if($req->dc_package=='1')
      {


if($product->attributes->weight*$product->quantity<='1')
{
$productdetail->product_weight = $express_charge;
}
else
{
  
  $productdetail->product_weight = ($express_charge+$additional_charge*$product->quantity)-$additional_charge;

}


      }
      else if($req->dc_package=='0')
      {
       
        
        if($req->city =='54')
        {

          if($product->attributes->weight*$product->quantity<='1')
          {
          $productdetail->product_weight = $standard_charge_samecity;
          }
          else
          {
            
            $productdetail->product_weight = ($standard_charge_samecity+$additional_charge_standard_samecity*$product->quantity)-$additional_charge_standard_samecity;
          
          }

        }
        else 
        {
          if($product->attributes->weight*$product->quantity<='1')
          {
          $productdetail->product_weight = $standard_charge_othercity;
          }
          else
          {
           
            $productdetail->product_weight = ($standard_charge_othercity+$additional_charge_standard_othercity*$product->quantity)-$additional_charge_standard_othercity;
            
          }

        }

      }

    // $productdetail->product_weight = $delivery*$product->attributes->weight*$product->quantity; //where 1 is product weight could be added
    } // enddelivery 
    
    
    $p = Product::where('id', $product->id)->first();
 $productdetail->product_owner = '2';
  $productdetail->save();




      }
      

  $totaldeliverycharges = DB::table('productorderdetails')
        ->where('order_id',$ordernumberid)->sum('product_weight'); 

  // $tt = DB::table('productorderdetails')
  //       ->where('order_id',$ordernumberid)->first();
  //       echo $tt;
  $or_id = orderdetail::where('id',$ordernumberid)->first();
  $id_order = $or_id->id;

if($img3!= null)
 {

 $advance = new advancepayment;

 $advance->order_id =  $id_order;
 $advance->payment_recieved = "0";
 $advance->transaction_id = "0";
 $advance->bank_details = "0";
 $advance->amount =$req->advancepayment;
$advance->status = "0";

 $advance->save();

}
        DB::table('orderdetails')
        ->where('id',$id_order)
        ->update(['deliverycharges' => $totaldeliverycharges]);

         if($req->resellerprofit!=null)
      {
        $resellerwallet = new resellerwallet;
        $resellerwallet->reseller_id = $req->userid;
        $resellerwallet->order_id = $ordernumberid;
        $resellerwallet->total_amount = $total;
        $resellerwallet->total_delivery_charges = $totaldeliverycharges;
        $resellerwallet->reseller_commission_payable = $req->resellerprofit;
        $resellerwallet->reseller_commission_recieved = "0";

        $resellerwallet->save();



      }


      $userId = auth()->user()->id; // or any string represents user identifier
     Cart::session($userId)->clear();
      // echo"successfuull";
     $ordernumber = "090078601";

      return view('frontend.paymentinvoice',['order_num'=> $ordernumber],['last'=> $lastiya]);



    }


    

     public function checkoutadmin_post(request $req,$userid)
    { 
       

       $order = new orderdetail;
       $order->user_id = $userid;
       // $order->order_from = $req->userrole;
       $order->name = $req->name;
       $order->address = $req->address;
       $order->city = $req->city;
       $order->district = $req->district;
       $order->tehsil = $req->tehsil;
       $order->location = $req->location;
       $order->contactno = $req->contact;
       $order->special_delivery_instruction = $req->deliveryinstruction;
       $order->far_fetched_town = "far";
       $order->urgentdelivery = "no";
       $order->delivery_required_before = $req->deliverybefore;
       $order->totalamount = $req->totalamount;
       $order->deliverycharges =$req->deliverycharges;
       $order->advancepayment = $req->advancepayment;
   

        $img3 = $req->file('advancepaymentslip');

        if($img3!= null)
        {
         $image3 = $img3->getClientOriginalName();
        $img3->storeAs('/images/transferslips',$image3);
        $order->advancepayment_transfer_slip = $image3;
        }
       
       $order->cashofdeliveryamount=$req->cashofdeliveryamount;
       if($req->amountcharge!=null)
      {
        $order->amount_to_be_charged_to_customer=$req->amountcharge;
      }
        if($req->amountchargereseller!=null)
      {
        $order->amount_to_be_charged_to_customer_reseller=$req->amountchargereseller;
      }
        if($req->resellerprofit!=null)
      {
        $order->resellerprofit = $req->resellerprofit;
      }
        if($req->refundable!=null)
      {
        $order->refundable_amount_after_delivery = $req->refundable;
      }

         if($req->commission!=null)
      {
        $order->advance_payment_from_commission_balance = $req->commission;
      }
       $order->save();

       // return view('checkoutreview');
      $ordernumberdetail = orderdetail::all()->last();
      $ordernumberid = $ordernumberdetail->id;

       $cartCollection = Cart::getContent();
      $userId = $userid; // or any string represents user identifier
      $u = Cart::session($userId)->getContent();

     

      foreach($u as $product)
      {
        $productdetail = new productorderdetail;
        $productdetail->order_id = $ordernumberid;
        $productdetail->user_id = $userid;
        $productdetail->product_id = $product->id;
        $productdetail->product_quantity = $product->quantity;
         $productdetail->product_weight = "1";
          $productdetail->size =$product->size;
           $productdetail->color = $product->color;
        $productdetail->total_price = ($product->price)*($product->quantity);
        $productdetail->save();




      }


  $advance = new advancepayment;

 $advance->order_id =  $ordernumberid;
 $advance->payment_recieved = "0";
 $advance->transaction_id = "0";
 $advance->bank_details = "0";
 $advance->amount =$req->advancepayment;
$advance->status = "0";

 $advance->save();

      // $userId = auth()->user()->id; // or any string represents user identifier
     Cart::session($userId)->clear();
      // echo"successfuull";
     $ordernumber = "090078601";
      return view('admin.manualorder.thankyou',['order_num'=> $ordernumberid]);



    }

   

    
       
}
