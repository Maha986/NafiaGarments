<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Courier;
use App\Models\courierorder;
use App\Models\Offer;
use App\Models\SaleCenter;
use App\Models\SaleCenterOrder;
use App\Models\riderordercustomer;
use App\Models\Order;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Size;
use App\Models\OwnerUser;

use App\Models\ProductForSaleCenter;
use App\Models\Billing;
use App\Models\Product;
use App\Models\ResellerCart;
use App\Models\orderdetail;
use App\Models\productorderdetail;
use App\Models\GeneralDiscount;
use App\Models\riderproductorder;
use App\Models\advancepayment; 
use App\Models\ColourImageProductSize;
use App\Models\closingorder;
use App\Models\closingordercustomertype;
use App\Models\closingorderdeliverycharge;
use App\Models\closingorderpayment;
use App\Models\closingorderproductdetail;
use App\Models\closingorderresellercommissionorprofit;
use App\Models\SaleCenterUser;
use App\Notifications\OrderProcessed;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Notification;
use App\Notifications\OffersNotification;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
   public function close_order_view($ordernumber,$id)
{
  $order = orderdetail::where('id',$ordernumber)->first();
return view('admin.orders.closingorder', compact('order','id'));
}


   public function close_order_post(request $req)
{
 $order = orderdetail::where('id',$req->orderid)->first();
 $productorder = productorderdetail::where('id',$req->productorderid)->first();

$closingorder = new closingorder();
$closingorder->order_number = $productorder->order_id;
$closingorder->order_date = $productorder->created_at;
$closingorder->customer_reseller_name = $order->name;
$closingorder->finalprofit_and_loss = 'no';
$closingorder->save();

$closedorder_id = closingorder::all()->last()->id;
  
$customertype = new closingordercustomertype();
$customertype->closingorder_id = $closedorder_id;
$customertype->order_id = $req->orderid;
$customertype->deliverytype = 'rider';
$customertype->consignee_name  = 'pata nai';
$customertype->city  =  $order->city;
$customertype->tehsil  =  $order->tehsil;
$customertype->district  =  $order->district;
$customertype->delivery_address  =  $order->address;
$customertype->save();

$productdetail = new closingorderproductdetail();
$productdetail->closingorder_id = $closedorder_id;
$productdetail->order_id =  $req->orderid;
$productdetail->picture =  $req->orderid;
$productdetail->product_number =  $productorder->product_id;
$pro = Product::where('id',$productorder->product_id)->first();
$productdetail->product_name =  $pro->name;
$discount = GeneralDiscount::where('product_id',$productorder->product_id)->first();
if($discount==null)
{
$productdetail->purchase_price_after_discount =$pro->purchase_cost;
}
else
{
$productdetail->purchase_price_after_discount =$pro->purchase_cost-$discount->discount;
}
$productdetail->quantity =  $productorder->product_quantity;
$productdetail->sellprice =  'pata karo';
if($discount==null)
{
  $productdetail->discount =  'no discount';
}
else
{
$productdetail->discount =  $discount->discount;
}

$productdetail->profit_loss =  'pata karo';
$productdetail->save();


$deliverycharge = new closingorderdeliverycharge();
$deliverycharge->closingorder_id = $closedorder_id;
$deliverycharge->order_id = $req->orderid;
$deliverycharge->agreed_delivery_charges = $req->actual_dc;
$deliverycharge->actual_delivery_charges = $productorder->product_weight; 
$deliverycharge->courierinvoice_or_loadsheetnumber  = $req->courierloadsheet_number;

$riderordercustomer = riderordercustomer::where('product_name',$pro->name)->where('order_id',$req->orderid)->first();

$deliverycharge->ridername_or_couriercompany   = $riderordercustomer->rider_id;
$deliverycharge->profit_or_lossondeliverycharges = 'pata karo';
$deliverycharge->save();



$payment = new closingorderpayment();
$payment->closingorder_id = $closedorder_id;
$payment->order_id = $req->orderid;
$payment->product_amount = $pro->price;
$payment->resellerprofit_or_commission  = $pro->commission;
$payment->totalorder_amount = $productorder->product_weight+$productorder->total_price;
if($order->advance_payment==null)
{
  $payment->advance_payment =  '-';
}
else
{
$payment->advance_payment =  $order->advance_payment;
}

if($order->cashondeliveryamount==null)
{
  $payment->cashondeliveryamount =  '-';
}
else
{
$payment->cashondeliveryamount =  $order->cashofdeliveryamount;
}



$payment->save();


$resellercommissionorprofit = new  closingorderresellercommissionorprofit();
$resellercommissionorprofit->closingorder_id = $closedorder_id;
$resellercommissionorprofit->order_id = $req->orderid;
$resellercommissionorprofit->commission_amount='pata karo';
$resellercommissionorprofit->commission_payment_transfered='pata karo';
$resellercommissionorprofit->transfer_slip='pata karo';
$resellercommissionorprofit->commission_balance='pata karo';
$resellercommissionorprofit->save();


  DB::table('productorderdetails')
        ->where('id',$req->productorderid)
        ->update(['order_status' => '1']);

Session::flash('flash_message', 'Order('.$req->orderid.') Successfully !');
        Session::flash('flash_type', 'alert-success');

        return redirect ('/orderdetails');



}
 

public function close_order_check($ordernumber,$id)
{
$closingorder = closingorder::where('order_number',$ordernumber)->first();

$closingordercustomertype = closingordercustomertype::where('order_id',$ordernumber)->first();

$closingorderdeliverycharges = closingorderdeliverycharge::where('order_id',$ordernumber)->first();

$closingorderpayment = closingorderpayment::where('order_id',$ordernumber)->first();

$closingorderproductdetail = closingorderproductdetail::where('order_id',$ordernumber)->first();


$closingorderresellercommissionorprofit = closingorderresellercommissionorprofit::where('order_id',$ordernumber)->first();


return view('admin.orders.checkorderclose', compact('closingorder','closingordercustomertype','closingorderdeliverycharges','closingorderpayment','closingorderproductdetail','closingorderresellercommissionorprofit'));

}
    public function courier_rider($id,$name,$name2)
{
 

     if(auth()->user()->hasPermissionTo('confirm pick') )
      {
        $productorderdetail = productorderdetail::where('id',$name2)->first();
        $product_detail = ColourImageProductSize::where('product_id',$productorderdetail->product_id)->where('colour_id',$productorderdetail->color)->where('size_id',$productorderdetail->size)->first();

        if($product_detail==null)
        {
echo "we are working  ";
        }
        else 
        {

        
        $totalquantity =  $product_detail->quantity;

        if($totalquantity > $productorderdetail->product_quantity)
        {
         $product_detail->quantity = $totalquantity-$productorderdetail->product_quantity;
        $product_detail->save();
        }
        elseif(($totalquantity == $productorderdetail->product_quantity))
        {
             $product_detail->quantity = $totalquantity-$productorderdetail->product_quantity;
        $product_detail->save();
        }

         elseif(($totalquantity < $productorderdetail->product_quantity))
        {
          
          Session::flash('message', 'You donot have stock of this product');
         Session::flash('alert-class', 'alert-warning');
        return back();

        }

        }
      

        // $productorderdetail = productorderdetail::where('id',$name2)->first();
        $productorderdetail->confirm_order = "1";
        $productorderdetail->save();

Session::flash('message', 'Order Confirm Successfully !');
Session::flash('alert-class', 'alert-success');
        return back();

        // return view('admin.orders.courier_rider', compact('id','name'));
      }
      else
      {
        return view('nopermission');
      }
    

}



    public function not_available($pro_id,$pro_order_id,$pro_weight,$pro_totalprice)
{
$order = orderdetail::where('id',$pro_order_id)->first();
$updateddeliverycharges = $order->deliverycharges-$pro_weight;
$order->deliverycharges = $updateddeliverycharges;


$updatedtotalamount = $order->totalamount-$pro_totalprice;
$order->totalamount = $updatedtotalamount;

$order->save();

$delete = productorderdetail::where('id',$pro_id)->first();
$delete->delete();

Session::flash('message', 'Product Remove Successfully !');
Session::flash('alert-class', 'alert-success');
 return back();



}
  public function not_recieved($riderorderrr)
  { 
    if( auth()->user()->hasPermissionTo('store'))
    {
        $update = riderproductorder::where('id',$riderorderrr)->first();
    $update->status = "1";
    $update->save();


Session::flash('message', 'Update Successfully !');
Session::flash('alert-class', 'alert-success');
 return back();
    }

    else 
    {
      return view ('nopermission');
    }
  

  }

    public function confirm_packing($id)
  {

 if( auth()->user()->hasPermissionTo('confirm packing'))
     {

    $update = productorderdetail::where('id',$id)->first();
    $update->packing_status = "1";
    $update->save();


Session::flash('message', 'Sorting & Packing Successfully Checked !');
Session::flash('alert-class', 'alert-success');
 return back();
     }
 else 
 {
  return view('nopermission');
 }


  }






    public function selectfield(request $req)
{
  
    echo $len = sizeof($req->cat);

  
      if ($len == 1)
{
   $products = orderdetail::all($req->cat[0]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =1;
   $pro1=$req->cat[0];
  

   return view('admin.orders.newindex', compact('pro1','products','len'));
} 


elseif ($len == 2)
{
   $products = orderdetail::all($req->cat[0], $req->cat[1]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =2;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];

   return view('admin.orders.newindex', compact('pro1','pro2','products','len'));
}

else if($len == 3 )
{

   $products = orderdetail::all($req->cat[0], $req->cat[1],$req->cat[2]);
   $len =3;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];

   return view('admin.orders.newindex', compact('pro1','pro2','products','len','pro3'));

}

elseif($len == 4)
{
   $products = orderdetail::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3]);

   $len =4;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];

   return view('admin.orders.newindex', compact('pro1','pro2','products','len','pro3','pro4'));
}

elseif($len == 5)
{
   $products = orderdetail::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4]);

   $len =5;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];

   return view('admin.orders.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5'));
}

elseif($len == 6)
{
   $products = orderdetail::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4],$req->cat[5]);
    $len =6;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];
   $pro6=$req->cat[5];

   return view('admin.orders.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5','pro6'));
}


}


    public function index()
    {
        $orders  = Order::orderby('id','DESC')->get()->unique('order_number');

        return view('admin.orders.index',['orders'=>$orders]);

    }

    public function index2()
    {
        $orders  = orderdetail::all();

       return view('admin.orders.index2',['orders'=>$orders]);

    }

      public function index2_pdf()
    {
       $orders  = orderdetail::all();
          
    $pdf = PDF::loadView('admin.orders.index2_pdf',['orders'=>$orders])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('allorders.pdf');
    }
   

     public function index2_pdf1($pro1)
    {
       $products = orderdetail::all($pro1);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf1',['products'=>$products,'pro1'=>$pro1])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }



      public function index2_pdf2($pro1,$pro2)
    {
       $products = orderdetail::all($pro1,$pro2);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf2',['products'=>$products,'pro1'=>$pro1,'pro2'=>$pro2])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }
   
      public function index2_pdf3($pro1,$pro2,$pro3)
    {
       $products = orderdetail::all($pro1,$pro2,$pro3);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf3',['products'=>$products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }

        public function index2_pdf4($pro1,$pro2,$pro3,$pro4)
    {
       $products = orderdetail::all($pro1,$pro2,$pro3,$pro4);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf4',['products'=>$products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }


          public function index2_pdf5($pro1,$pro2,$pro3,$pro4,$pro5)
    {
       $products = orderdetail::all($pro1,$pro2,$pro3,$pro4,$pro5);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf5',['products'=>$products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A3', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }

            public function index2_pdf6($pro1,$pro2,$pro3,$pro4,$pro5,$pro6)
    {
       $products = orderdetail::all($pro1,$pro2,$pro3,$pro4,$pro5,$pro6);
          
    $pdf = PDF::loadView('admin.orders.index2_pdf6',['products'=>$products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'pro6'=>$pro6])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('orderfields.pdf');
    }
   
   
   

     public function orderproduct_details($id)
    {
        
        // $orders_products  = productorderdetail::where('id',$id)->get();
        // echo $orders_products;
         $orders_products = productorderdetail::where('order_id', $id)->get();
       
       return view('admin.orders.productdetails',['products'=>$orders_products]);

    }

    public function orderproduct_details_delete($id)
    {
 

 $orders_products = productorderdetail::where('order_id', $id)->delete();

 $orders = orderdetail::where('id', $id)->delete();

  Session::flash('flash_message', 'Order Deleted Successfully !');
        Session::flash('flash_type', 'alert-success');
       return redirect ('/orderdetails');

 



    }

  
public function cour()
{
    
}
   


    // ==============================ORDER PROCESSING=========================

    public function assign_product($id,$name)
    { 
        $order_products = productorderdetail::where('id',$name)->first();
        
         return view('admin.orders.assignsalecenter',['product_id'=>$id],['products'=>$order_products]);
    }

    public function salecenter_order(request $req)
    { 
        // echo $req->productidi;
        $user = User::all();
        $offerData = "You have New Order";
       $salecenterorder = new SaleCenterOrder;
       $salecenterorder->salecenter_id = $req->salecenterid;
       $salecenterorder->order_number = $req->orderid;
       $salecenterorder->product_id = $req->productidi;
       $salecenterorder->owner_id = $req->ownerid;
       $salecenterorder->quantity = $req->productquantity;
       $salecenterorder->colour_id = $req->color;
       $salecenterorder->size_id = $req->size;
       $salecenterorder->status = "1";

       $salecenterorder->save();
        Notification::send($user, new OffersNotification($offerData));

       Session::flash('flash_message', 'Sale Center Assigned Successfully !');
    Session::flash('flash_type', 'alert-success');
       return redirect ('/orderdetails');

    }

       public function edit_assign_product(request $req)
    { 
        $editsalecenter = SaleCenterOrder::where('id', $req->salecenterorderid)->first();
        $editsalecenter->salecenter_id = $req->salecenterid;
        $editsalecenter->save();
        Session::flash('flash_message', 'Sale Center Reassigned Successfully !');
    Session::flash('flash_type', 'alert-success');
          return redirect ('/orderdetails');


        // $editsalecenter->

        
         // return view('admin.orders.assignsalecenter',['product_id'=>$id],['products'=>$order_products]);
    }

      public function edit_assign_product_view($id,$name,$name2)

    { 

        // echo $name2;
          $order_products = productorderdetail::where('order_id', $name)->first();
        
         // return view('admin.orders.editsalecenter',['salecenterorderid'=>$id],['products'=>$order_products]);

         return view('admin.orders.editsalecenter', compact(['id', 'order_products','name2']));


       // return view('admin.orders.editsalecenter',['salecenterid'=>$id]);

        
         // return view('admin.orders.assignsalecenter',['product_id'=>$id],['products'=>$order_products]);
    }

 public function assign_rider($id,$name,$name2)
    { 
        // $sale = SaleCenterUser::where('user_id',$name2)->first()->sale_center_id;
         $salecenter = SaleCenter::where('id',$name2)->first();
       $salecenterorder = SaleCenterOrder::where('id',$id)->first();


        
          return view('admin.orders.assignrider', compact(['salecenterorder', 'name','salecenter']));
    }


public function rider_order(request $req)
    {

       $riderproductorder = new riderordercustomer;
       $riderproductorder->rider_id = $req->riderid;
       $riderproductorder->product_name = $req->productname;
       $riderproductorder->quantity = $req->quantity;
       $riderproductorder->size = $req->size;
       $riderproductorder->color = $req->color;
       $riderproductorder->description = $req->description;
       $riderproductorder->address = $req->address;
       $riderproductorder->date = $req->date;
       $riderproductorder->cash = $req->cash;
       $riderproductorder->order_id = $req->orderid;
       $riderproductorder->status = "1";

       $riderproductorder->save();

        Session::flash('flash_message', 'Rider Assigned Successfully !');
        Session::flash('flash_type', 'alert-success');
       return redirect ('/orderdetails');


        
    }




   public function edit_assign_rider_view($id,$name,$name2,$name3)
    {

    // $order_riders = riderproductorder::where('id', $name3)->first();
    // echo $order_riders;

         return view('admin.orders.editrider', compact(['id', 'name','name2','name3']));
    }

    public function edit_assign_rider(request $req)
    {
     
     $order_riders = riderordercustomer::where('id', $req->editriderid)->first();
     
        $order_riders->rider_id = $req->riderid;
        $order_riders->description = $req->description;
        $order_riders->date = $req->date;

        $order_riders->save();

Session::flash('flash_message', 'Rider Reassigned Successfully !');
Session::flash('flash_type', 'alert-success');

        return redirect ('/orderdetails');
    }

 // product details module #02


 public function assign_rider2($id,$name,$name2)
    { 
      if(auth()->user()->hasPermissionTo('confirm pick') && auth()->user()->hasPermissionTo('store'))
    {
      return view('admin.orders.assignrider2', compact(['id', 'name' , 'name2']));
    }
    else
    {

         return view('nopermission');

    }
        
    
    }


 public function assign_rider3($id,$name,$name2)
    { 
        
    if(auth()->user()->hasPermissionTo('labelling & dispatching'))
    {
        
        return view('admin.orders.assignrider3', compact(['id', 'name' , 'name2']));
    }
    else
    {
      return view('nopermission');
    }
  
    }





   
public function rider_order2(request $req)
    {


    if(auth()->user()->hasPermissionTo('confirm pick') && auth()->user()->hasPermissionTo('store'))

    {

      $product_color = productorderdetail::where('id',$req->productdetailid)->first()->color;


      $product_size = productorderdetail::where('id',$req->productdetailid)->first()->size;

      $product_quantity = productorderdetail::where('id',$req->productdetailid)->first()->product_quantity;

      $totaldeliverycharges = productorderdetail::where('id',$req->productdetailid)->first()->product_weight;

      $totalproductprice = productorderdetail::where('id',$req->productdetailid)->first()->total_price;


       $riderproductorder = new riderproductorder;
       $riderproductorder->rider_id = $req->riderid;
       $riderproductorder->product_name = $req->productname;
       $riderproductorder->color =  $product_color;
       $riderproductorder->size =   $product_size;
       $riderproductorder->quantity = $product_quantity;
       $riderproductorder->description = $req->description;
       $riderproductorder->address = $req->address;
       $riderproductorder->date = $req->date;
       $riderproductorder->cash =   $totaldeliverycharges+$totalproductprice;
       $riderproductorder->order_id = $req->orderid;
       $riderproductorder->status = "1";

       $riderproductorder->save();

        Session::flash('flash_message', 'Rider Assigned Successfully !');
        Session::flash('flash_type', 'alert-success');
       return redirect ('/orderdetails');
    }
    
    else 
    {
      return view('nopermission');
    }


        
    }

    public function rider_order3(request $req)
    {

        
if(auth()->user()->hasPermissionTo('labelling & dispatching') ) 
{
  
    


     $product_color = productorderdetail::where('id',$req->productorderdetail_id)->first()->color;


      $product_size = productorderdetail::where('id',$req->productorderdetail_id)->first()->size;

      $product_quantity = productorderdetail::where('id',$req->productorderdetail_id)->first()->product_quantity;

      $totaldeliverycharges = productorderdetail::where('id',$req->productorderdetail_id)->first()->product_weight;

      $totalproductprice = productorderdetail::where('id',$req->productorderdetail_id)->first()->total_price;


       $exist_sc = ProductForSaleCenter::where('product_id',$req->productname)->where('color',$product_color)->where('size',$product_size)->first();
  
//        if($exist_sc!=null)
//        {
//            if($exist_sc->quantity>$product_quantity)
//            {
// // forsalecenter start
//             $p_salecenter = productorderdetail::where('id',$req->productorderdetail_id)->first();
//             $productquantity_in_productforsalecenters = ProductForSaleCenter::where('product_id',$req->productname)->where('salecenter_id',$exist_sc->id)->first()->sold;

//             ProductForSaleCenter::where('product_id',$req->productname)->where('salecenter_id',$exist_sc->id)->update(['sold'=>$product_quantity+$productquantity_in_productforsalecenters]);

// //forsalecenter end


// //forproductowner start
//            $proo_owner = productorderdetail::where('id',$req->productorderdetail_id)->first()->product_owner;

//        $ownerid = OwnerUser::where('owner_id',$proo_owner)->first()->user_id;
//        $sold = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productname)->where('color_id',$product_color)->where('size_id',$product_size)->first();
//        if( $sold!=null)
//        {
//           ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productname)->where('color_id',$product_color)->where('size_id',$product_size)->update(['sold'=>$product_quantity+$sold->sold]);
//          $forsold_quantity = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productname)->where('color_id',$product_color)->where('size_id',$product_size)->first();
//          ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productname)->where('color_id',$product_color)->where('size_id',$product_size)->update(['instock'=>($forsold_quantity->productQuantity)-($forsold_quantity->sold)]);
//        }

//  //forproductowner end

//        else 
//        {
//         Session::flash('flash_message', 'Item don,t have any owner');
//         Session::flash('flash_type', 'alert-warning');
//        return redirect ('/orderdetails');
//        }


            $riderproductorder = new riderordercustomer;
            $riderproductorder->rider_id = $req->riderid;
            $riderproductorder->product_name = $req->productname;
     
            $riderproductorder->color =  $product_color;
            $riderproductorder->size =   $product_size;
            $riderproductorder->quantity = $product_quantity;
     
            $riderproductorder->description = $req->description;
            $riderproductorder->address = $req->address;
            $riderproductorder->date = $req->date;
            $riderproductorder->cash = $totaldeliverycharges+$totalproductprice;
            $riderproductorder->order_id = $req->orderid;
            $riderproductorder->status = "1";
     
            $riderproductorder->save();
     
             Session::flash('flash_message', 'Rider Assigned Successfully !');
             Session::flash('flash_type', 'alert-success');
            return redirect ('/orderdetails');
        //    }

        //    else 
        //    {
        //     Session::flash('flash_message', 'Items out of stock');
        //     Session::flash('flash_type', 'alert-warning');
        //    return redirect ('/orderdetails');
        //    }
        
    //    }

    //    else 
    //    {
    //     Session::flash('flash_message', 'Salecenter have not this item');
    //     Session::flash('flash_type', 'alert-warning');
    //    return redirect ('/orderdetails');
    //    }
  

}

else
{
  return view('nopermission');
}
      

        
    }

public function edit_assign_rider2_view($id,$name,$name2)
    {

    // $order_riders = riderproductorder::where('id', $name3)->first();
    // echo $order_riders;
      if( auth()->user()->hasPermissionTo('store'))
      {
         return view('admin.orders.editrider2', compact(['id', 'name','name2']));
      }

      else 
      {
        return view('nopermission');
      }


    }


    public function edit_assign_rider2(request $req)
    {

          if( auth()->user()->hasPermissionTo('store') )
      {
          $order_riders = riderproductorder::where('id', $req->editriderid)->first();
     
        $order_riders->rider_id = $req->riderid;
        $order_riders->description = $req->description;
        $order_riders->date = $req->date;

        $order_riders->save();

        Session::flash('flash_message', 'Rider Reassigned Successfully !');
        Session::flash('flash_type', 'alert-success');

        return redirect ('/orderdetails');
      }
     else 
     {
      return view('nopermission');
     }
   
    }



     public function manualorder()

    {  

      $batch = Batch::all();
        $category = Category::all();
        $colour = Colour::all();
        $size = Size::all();

        return view('admin.manualorder.productorder',['batches'=>$batch,'categories'=>$category,'colours'=>$colour,'sizes'=>$size]);
        // $orders  = Order::orderby('id','DESC')->get()->unique('order_number');

        

    }


    public function create()
    {
        //
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string'],
            'address' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required', 'string'],
            'contact' => ['required','string','regex:/^((\+92))\d{10}$/'],
            'cod' => ['required'],

        ]);


        $user = Auth::User();

        if($request->get('reseller_cart') != null){

            $cart = ResellerCart::where('user_id', $user->id)->get();
        }
        else{

            $cart = Cart::where('user_id', $user->id)->get();
        }



        if(count($cart) !== 0){

            $order_num = Str::random(5);

            $billing = new Billing();

            $billing->user_id = $user->id;
            $billing->name = $request->get('name');
            $billing->email = $user->email;
            $billing->address = $request->get('address');
            $billing->country = $request->get('country');
            $billing->province = $request->get('state');
            $billing->city = $request->get('city');
            $billing->postal_code = $request->get('postal_code');
            $billing->contact = $request->get('contact');
            $billing->total_amount = $request->get('total_amount');
            $billing->order_number = $order_num;

            $billing->save();

            foreach ($cart as $c) {

                $order = Order::create(['delivery_charges'=>$request->get('delivery_charges'),'discount'=> $request->get('discount'),'sub_total_amount'=> $request->get('sub_total_amount'),'order_number' => $order_num, 'quantity' => $c->quantity, 'size_id' => $c->size_id, 'colour_id' => $c->colour_id, 'product_id' => $c->product_id, 'user_id' => $user->id, 'payment_type' => $request->get('cod'), 'total_amount' => $request->get('total_amount')]);

                if($request->get('reseller_cart') != null){

                    Order::where('id',$order->id)->update(['order_type'=>"Reseller"]);

                }
                else{

                    Order::where('id',$order->id)->update(['order_type'=>"Customer"]);

                }

                $product = Product::where('id',$c->product_id)->first();

                $new_quantity = $product->quantity - $c->quantity;

                Product::where('id',$c->product_id)->update(['quantity'=>$new_quantity]);

                if($request->get('reseller_cart') != null){

                    ResellerCart::destroy($c->id);

                }
                else{

                    Cart::destroy($c->id);

                }

            }

            $request->user()->notify(new OrderProcessed($order));

            if(!empty(Session('vouchercode')['no_of_times'])){

            $new_no_of_times = Session('vouchercode')['no_of_times'] - 1;

            Offer::where('code',Session('vouchercode')['code'])->update(['no_of_times'=>$new_no_of_times]);

            Session::forget('vouchercode');

            Session::save();

            }

            if($request->get('reseller_cart') != null){

                return view('reseller.thankyouorder',['order_num'=>$order_num]);

            }
            else{

                return view('frontend.thankyouorder',['order_num'=>$order_num]);

            }

        }
        else{

            session::flash('message',"Add An Item To Cart");
            session::flash('alert-type','error');

            return redirect('/home');

        }




    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $checkcourier = Courier::all();
        $orders = Order::where('order_number',$order->order_number)->get();

        return view('admin.orders.show',['orders'=>$orders,'checkcourier'=>$checkcourier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $orders = Order::where('order_number',$order->order_number)->get();

        if($request->get('status') == 5){

            foreach ($orders as $item){

                $product = Product::where('id',$item->product_id)->first();

                $new_quantity = $product->quantity + $item->quantity;

                Product::where('id',$item->product_id)->update(['quantity'=>$new_quantity]);

                Order::where('id',$item->id)->update(['status'=>$request->get('status')]);

            }
        }

        if($request->get('status') != 5) {

            foreach ($orders as $item) {

                Order::where('id', $item->id)->update(['status' => $request->get('status')]);
            }

        }

        Session::flash('message','Status Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $orders = Order::where('order_number',$order->order_number)->get();

        if($order->status == 5){

            foreach ($orders as $item){

                Order::where('id',$item->id)->delete();

            }

            Session::flash('message','Order Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('order.index');

        }
        elseif($order->status != 5){

            foreach ($orders as $item){

                $product = Product::where('id',$item->product_id)->first();

                $new_quantity = $product->quantity + $item->quantity;

                Product::where('id',$item->product_id)->update(['quantity'=>$new_quantity]);

                Order::where('id',$item->id)->delete();

            }

            Session::flash('message','Order Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('order.index');
        }
    }

    public function order_history(Order $order){

        $orderhistory=Order::where('user_id',Auth::User()->id)->get();
        return view('customer.order.index',['orders'=>$orderhistory]);

    }

    public function couriercompanyorder(request $req)
    {

        if($req->reassign_courier !== null){

            courierorder::where('id',$req->get('reassign_courier'))
                ->update(['courier_company'=>$req->courier,'courier_track_code'=>$req->trackordernumber]);

            return back();
        }

        $courier = new courierorder;

        $courier->user_id = $req->customerid;
        $courier->courier_company = $req->courier;
        $courier->order_number = $req->trackcode;
        $courier->courier_track_code = $req->trackordernumber;

        $courier->save();

        return back();

    }



    public function advancepayment_confirmation()
    {

      return view('admin.orders.advance_payment');
    }


public function advancepayment_post(request $req)
    {

 $advance = new advancepayment;

 $advance->order_id = $req->orderid;
 $advance->payment_recieved = $req->paymentrecieved;
 $advance->transaction_id = $req->transaction;
 $advance->bank_details = $req->bankdetails;
 $advance->amount = $req->amount;
 $advance->transaction_date = $req->date;

 $advance->save();

    Session::flash('message','Advance Payment Inserted Successfully ');
    Session::flash('alert-type','success');
    return redirect('admin/order/advance-payment/index');
    
    
    }


public function advancepayment_index(request $req)
    {

$advance = advancepayment::all();

return view('admin.orders.index_advance_payment',['advance'=>$advance]);
    
    
    }

    public function advancepayment_delete($id)
    {

$advance = advancepayment::where('id',$id)->first()->delete();

 Session::flash('message','Advance Payment Deleted Successfully ');
    Session::flash('alert-type','success');
    return redirect('admin/order/advance-payment/index');
    
    
    
    }

public function advancepayment_edit($id)
    {

$advance = advancepayment::where('id',$id)->first();

return view('admin.orders.edit_advance_payment',['advance'=>$advance]);
    
    
    }



public function advancepayment_update(request $req,$id)
    {

  $advance = advancepayment::where('id',$id)->first();

 $advance->order_id = $req->orderid;
 $advance->payment_recieved = $req->paymentrecieved;
 $advance->transaction_id = $req->transaction;
 $advance->bank_details = $req->bankdetails;
 $advance->amount = $req->amount;
 $advance->transaction_date = $req->date;
 $advance->status = $req->status;

 $advance->save();

    Session::flash('message','Advance Payment updated Successfully ');
    Session::flash('alert-type','success');
    return redirect('admin/order/advance-payment/index');
    
    
    }

public function permission()
    {

      $permission = Permission::create(['name' => 'labelling & dispatching']);
      echo"success";
    }

    public function edit_DC(request $req)
    {
        
     $update_order = orderdetail::where('id',$req->id)->first();
     $update_order->deliverycharges = $req->edit_dc;
     $update_order->save();
     return back();


      
    }
    


}
