<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use App\Models\ResellerCart;
use App\Models\Product;
use App\Models\orderdetail;
use App\Models\productorderdetail;
use App\Models\Offer;
use App\Models\ResellerUser;
use App\Models\advancepayment;
use App\Models\DeliveryCharges;
use App\Models\resellerwallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;




class ResellerCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->id;

        $carts = ResellerCart::where('user_id',$user_id)->get();

        return view('reseller.carts.index',['carts'=>$carts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'quantity' => ['numeric','min:1'],

        ]);

        $cart = ResellerCart::where('size_id',$request->get('size'))
            ->where('colour_id',$request->get('colour'))
            ->where('product_id',$request->get('product'))
            ->where('user_id',Auth::User()->id)
            ->get();


        if(sizeof($cart) != false){

            $new_quantity = $cart[0]->quantity + $request->get('quantity');

$proprice = Product::where('id', $request->get('product'))->first()->price;
            $cart[0]->quantity = $new_quantity;
            $cart[0]->size_id = $request->get('size');
            $cart[0]->colour_id = $request->get('colour');
            $cart[0]->product_id = $request->get('product');
            $cart[0]->user_id = Auth::User()->id;
            $cart[0]->sub_total= $proprice*$new_quantity;

            $cart[0]->save();

            session::flash('message',"Product Added Successfully");
            session::flash('alert-type','success');

            return back();

        }
        else{
$proprice = Product::where('id', $request->get('product'))->first()->price;
            $cart = new ResellerCart();

            $cart->quantity = $request->get('quantity');
            $cart->size_id = $request->get('size');
            $cart->colour_id = $request->get('colour');
            $cart->product_id = $request->get('product');
            $cart->user_id = Auth::User()->id;
            $cart->sub_total = $proprice*$request->get('quantity');

            $cart->save();

            session::flash('message',"Product Added Successfully");
            session::flash('alert-type','success');

            return back();

        }
    }

    public function checkout()
    {

        $cart = ResellerCart::where('user_id',Auth::User()->id)->get();

        if(count($cart) !== 0)
        {
          
          return view('reseller.checkoutshippingReseller');
           
        }
        else{

            session::flash('message',"Add An Item To Cart");
            session::flash('alert-type','error');

            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResellerCart  $resellerCart
     * @return \Illuminate\Http\Response
     */
    public function show(ResellerCart $resellerCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResellerCart  $resellerCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ResellerCart $resellerCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResellerCart  $resellerCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResellerCart $resellerCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResellerCart  $resellerCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResellerCart $cart)
    {
        $cart->delete();

        return back();
    }

 
    public function reseller_customer_dispatch()
    {
      return view('reseller.checkoutshipping_customer_dispatch');
    }

 public function  reseller_my_dispatch()
    {
      return view('reseller.checkoutshipping_my_dispatch');
    }
   
   
   
     public function shippingcheckout(Request $req)
    {
      $userId = auth()->user()->id;

      $totalamountofuser = ResellerCart::where('user_id', $userId)->sum('sub_total');

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
       $order->totalamount = $totalamountofuser;


    $deliverycharges=DeliveryCharges::where('city_id',$req->city)->first();
     $delivery = $deliverycharges->delivery_charge;

       $order->deliverycharges =$delivery;

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

     


      $u = ResellerCart::where('user_id', $userId)->get();

     

      foreach($u as $product)
      {
        $productdetail = new productorderdetail;
        $productdetail->order_id = $ordernumberid;
        $productdetail->product_id = $product->product_id;
        $proo = Product::where('id', $product->product_id)->first();
        if($proo!=null)
        {
         $productdetail->supplier = $proo->supplier;
        } 

        $productdetail->supplier = '0';

        

 

      $buyonegetone_offer = Offer::where('product_id',$product->product_id)->where('offer','Buy One Get One Free')->first();
        if($buyonegetone_offer)
        {
          $productdetail->product_quantity = $product->quantity*2;
        }
        else 
        {
          $productdetail->product_quantity = $product->quantity;
        }
        
        $productdetail->total_price = $product->sub_total;

        $productdetail->size = $product->size_id; 
        // $product->size;
        $productdetail->color =$product->colour_id; 
        // $product->color;
        $productdetail->user_id = $userId;

      $freedelivery_offer = Offer::where('product_id',$product->product_id)->where('offer','Free Delivery')->first();

    if($freedelivery_offer)
    { 

    $productdetail->product_weight = "0";

    }
    else
    {


    $productdetail->product_weight = $delivery*$proo->product_weight*$product->quantity; //where 1 is product weight could be added
    }
    
 $productdetail->product_owner = "0";
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
        $resellerwallet->total_amount = $totalamountofuser;
        $resellerwallet->total_delivery_charges = $totaldeliverycharges;
        $resellerwallet->reseller_commission_payable = $req->resellerprofit;
        $resellerwallet->reseller_commission_recieved = "0";

        $resellerwallet->save();



      }


      $userId = auth()->user()->id; // or any string represents user identifier
      ResellerCart::where('user_id', $userId)->delete();
      // echo"successfuull";
     $ordernumber = "090078601";

echo "success";
      return view('reseller.paymentinvoice',['order_num'=> $ordernumber],['last'=> $lastiya]);




    }

         public function decline($id)
    {

    $del = orderdetail::where('id',$id)->first();
    $del->delete();

productorderdetail::where('order_id',$id)->delete();
return redirect('reseller'); 
    
    }

       public function accept($id)
    {
 $ordernumber = $id;

return view('reseller.thankyouorder',['order_num'=> $ordernumber]); 
    
    }
}
