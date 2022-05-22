<?php

namespace App\Http\Controllers;
use App\Models\salereturn;
use App\Models\purchasereturn;
use App\Models\productorderdetail;
use App\Models\Product;
use App\Models\riderproductorder;
use App\Models\ColourImageProductSize;
use App\Models\ProductForSaleCenter;
use App\Models\RiderUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function salereturn_Report()
    {

       $salereturns = salereturn::all();

        return view('admin.salereturn.index_report',['salereturn'=>$salereturns]);

    }






    public function salereturn_Report_lastmoth()
    {
         $salereturns = salereturn::whereMonth('created_at', date('m'))->get();

          return view('admin.salereturn.index_report',['salereturn'=>$salereturns]);
    }


      public function salereturn_Report_lastyear()
    {
         $salereturns = salereturn::whereYear('created_at', date('m'))->get();

          return view('admin.salereturn.index_report',['salereturn'=>$salereturns]);
    }




    public function salereturn_Report_twodates(Request $req)
    {
    	$from = $req->from;
        $to = $req->to;

        $salereturns = salereturn::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

          return view('admin.salereturn.index_report',['salereturn'=>$salereturns]);

    }







  public function purchasereturn_Report()
    {

  $purchasereturns = purchasereturn::all();

     return view('admin.purchasereturn.index_report',['purchasereturn'=>$purchasereturns]);

    }


      public function purchasereturn_Report_lastmoth()
    {
         $purchasereturns = purchasereturn::whereMonth('created_at', date('m'))->get();

              return view('admin.purchasereturn.index_report',['purchasereturn'=>$purchasereturns]);
    }

    public function purchasereturn_Report_lastyear()
    {
       $purchasereturns = purchasereturn::whereYear('created_at', date('m'))->get();

      return view('admin.purchasereturn.index_report',['purchasereturn'=>$purchasereturns]);
    }

 public function purchasereturn_Report_twodates(Request $req)
 {
    $from = $req->from;
        $to = $req->to;

      $purchasereturns = purchasereturn::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

          return view('admin.purchasereturn.index_report',['purchasereturn'=>$purchasereturns]);

 }


public function upload_report()
 {
    $product = ColourImageProductSize::all();

        return view('admin.products.index_report',['products'=>$product]);
 }


   public function upload_Report_lastmoth()
    {
         $product = ColourImageProductSize::whereMonth('created_at', date('m'))->get();

              return view('admin.products.index_report',['products'=>$product]);
    }

  public function upload_Report_lastyear()
    {
      $product  = ColourImageProductSize::whereYear('created_at', date('m'))->get();
 return view('admin.products.index_report',['products'=>$product])->render();
    }



 public function upload_Report_twodates(Request $req)
 {
    $from = $req->from;
        $to = $req->to;

    $product = ColourImageProductSize::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

          return view('admin.products.index_report',['products'=>$product])->render();

 }




 public function order_report()
 {
    $order_product_table = productorderdetail::all();
   return view('admin.orders.product_order_report',['products'=> $order_product_table])->render();
 }


     public function order_Report_lastmoth()
    {
         $order_product_table = productorderdetail::whereMonth('created_at', date('m'))->get();

              return view('admin.orders.product_order_report',['products'=> $order_product_table])->render();
    }

    public function order_Report_lastyear()
    {
      $order_product_table = productorderdetail::whereYear('created_at', date('m'))->get();

     return view('admin.orders.product_order_report',['products'=> $order_product_table])->render();
    }

 public function order_Report_twodates(Request $req)
 {
    $from = $req->from;
        $to = $req->to;

    $order_product_table = productorderdetail::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

          return view('admin.orders.product_order_report',['products'=> $order_product_table])->render();

 }













 public function  purchaseorder_report()
 {

  $orders = riderproductorder::all();
   //  $order_product_table = productorderdetail::all();
   return view('admin.orders.purchaseorder_report',['products'=> $orders])->render();
 }

  public function inventory_report()
 {

  $orders = ProductForSaleCenter::all();
   //  $order_product_table = productorderdetail::all();
   return view('admin.orders.inventory_report',['products'=> $orders]);
 }


 public function inventory_Report_twodates(Request $req)
 {
    $from = $req->from;
        $to = $req->to;

    $orders = ProductForSaleCenter::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

          return view('admin.orders.inventory_report',['products'=> $orders])->render();

 }


 public function pickupreport ()
 {
  $riderid = Auth::user()->id;
  $rideruser = RiderUser::where('user_id',$riderid)->first();
  $rideruser->rider_id;
 $riderpickup = riderproductorder::where('rider_id', $rideruser->rider_id)->get();

   return view('rider.picktoorderreport',['orders'=>$riderpickup ]);

   // return view('admin.orders.inventory_report',['products'=> $orders])->render();

 }

  public function pickup_Report_twodates(Request $req)
 {

  $riderid = Auth::user()->id;
  $rideruser = RiderUser::where('user_id',$riderid)->first();
  $rideruser->rider_id;


   $from = $req->from;
   $to = $req->to;

  $riderpickup = riderproductorder::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

   return view('rider.picktoorderreport',['orders'=>$riderpickup ])->render();
 }


// salecenter>


  public function  inventoryreport_salecenter()
 {

   $salecenter_id = Auth::user()->id;
 
  $pro_salecenter = ProductForSaleCenter::where('salecenter_id',$salecenter_id)->get();

  return view('salecenter.inventoryreport',['salecenters'=>$pro_salecenter  ]);

 }

  public function inventoryreport_salecenter_twodates(Request $req)
 {

   $salecenterid = Auth::user()->id;
   $from = $req->from;
   $to = $req->to;

   $pro_salecenter = ProductForSaleCenter::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

   return view('salecenter.inventoryreport',['salecenters'=>$pro_salecenter  ])->render();
 }


//orderreportsalecenter

 
   public function orderreport_salecenter()
 {
 $user_id = Auth::User()->id;

      // $owneruser = OwnerUser::where('user_id',$user_id)->first();
      // $ownerid = $owneruser->owner_id;

    $pro_salecenters = ProductForSaleCenter::where('salecenter_id',$user_id)->get();
 
     return view('salecenter.orderreport',['sales' => $pro_salecenters]);

 }

    public function orderreport_salecenter_twodates(Request $req)
 {
    $user_id = Auth::User()->id;
    $from = $req->from;
    $to = $req->to;

  $sales= ProductForSaleCenter::where('salecenter_id',$user_id)->get();
    // $order_product_table = productorderdetail::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
 // return view('owner.orderreport',['owners' =>  $pro_owners]);
         
return view('salecenter.orderreport', compact('from','to','sales'))->render();


}


}
