<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SaleCenter;
use App\Models\SaleCenterOrder;
use App\Models\purchasereturn;
use App\Models\Product;
use App\Models\ProductForSaleCenter;
use App\Models\CategoryProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class purchasereturnController extends Controller
{




	    public function index()
    {
        $purchasereturns = purchasereturn::all();

        return view('admin.purchasereturn.index',['purchasereturn'=>$purchasereturns]);
    }




    public function select()
    {
    	
    	$SaleCenters =  SaleCenter::all();

       return view('admin.purchasereturn.select',['salecenters'=>$SaleCenters]);
    }


     public function create($id)
    {

    	
    	$orders = ProductForSalecenter::where('salecenter_id',$id)->get();
       
     
        
    	 return view('admin.purchasereturn.order',['order'=>$orders ]);
    }


     public function storage(Request $req)
    {

         
         $purchasereturn = new purchasereturn();
         $purchasereturn->salecenter_id = $req->salecen_id;
         $purchasereturn->product = $req->pro_id;
         $purchasereturn->color = $req->color;
         $purchasereturn->size = $req->size;
         $purchasereturn->batch_id = $req->batch;
         $purchasereturn->product_quantity = $req->productquantity;
         $purchasereturn->amount = $req->amount;
         $purchasereturn->purchase_order_number = $req->ordernumber;
          $purchasereturn->purchaseorder_date = $req->date;
            $purchasereturn->rider = $req->riderid;
             $purchasereturn->return_reason = $req->reason;
               $purchasereturn->payment_adjustment = $req->paymentadjustment;

$purchasediscount = Product::where('id',$req->pro_id)->first();

$pur_discount = json_decode($purchasediscount,true);

$salecenter = ProductForSaleCenter::where('product_id',$req->pro_id)->first();

if($salecenter != null)
{

    $purchasereturn->inventory_type = "In-House";

}
else 
{
    $purchasereturn->inventory_type = "pick-to-order";
}

if(isset($pur_discount))
{
$purchasereturn->purchase_price_after_discount =$pur_discount['purchase_discount'];
}
else 
{
    $purchasereturn->purchase_price_after_discount = "none";
}
     

$categoryid = CategoryProduct::where('product_id',$req->pro_id)->first();
$cat_id = json_decode($categoryid,true);
// $categoryid2 = Product::where('id',$categoryid)->first()->parent_id;
// $categoryid3 = Product::where('id',$categoryid)->first()->parent_id;
if(isset($cat_id))
{
    $purchasereturn->category_route = $cat_id['category_id']."/".$req->pro_id;
}
else 
{
       $purchasereturn->category_route = $req->pro_id;
}
                 
                    
         
         $purchasereturn->save();

         $data = ProductForSaleCenter::where('product_id',$req->pro_id)->where('color',$req->color)->where('size',$req->size)->where('batch_id',$req->batch)->first();
         $total_quantity = $data->quantity;

        //  DB::table('sale_center_orders')
        // ->where('product_id',$req->pro_id)
        // ->update(['quantity' => $total_quantity-$req->productquantity]);


        DB::table('product_for_sale_centers')
        ->where('product_id',$req->pro_id)->where('color',$req->color)->where('size',$req->size)->where('batch_id',$req->batch)->update(['quantity' => $total_quantity-$req->productquantity]);


        Session::flash('message','Purchase Return Added Succesfully');
        Session::flash('alert-type','success');
        return redirect('/purchasereturn');
    
    
    }



  public function edit(purchasereturn $purchasereturn)
    {

        return view('admin.purchasereturn.edit',['purchasereturn'=>$purchasereturn]);
    }







 public function update(Request $req, purchasereturn $purchasereturn)
    {
        
       $remainingquantity = $purchasereturn->product_quantity - $req->productquantity;


       $data = SaleCenterOrder::where('product_id',$req->p_id)->first();
       $total_quantity = $data->quantity;


         DB::table('sale_center_orders')
        ->where('product_id',$req->p_id)
        ->update(['quantity' => $total_quantity+$remainingquantity]);


        $purchasereturn = purchasereturn::where('id',$purchasereturn->id)->first();
        $purchasereturn->product_quantity = $req->productquantity;
        $purchasereturn->amount = $req->amountt;
        
        $purchasereturn->save();
     
       

        Session::flash('message','Purchase Return Updated Successfully');
        Session::flash('alert-type','success');
        return redirect('/purchasereturn');

       
      
    }







public function destroy(purchasereturn $purchasereturn)
    {

     

        $purchase = purchasereturn::where('id',$purchasereturn->id)->first();
        $purchase_product_id = $purchase->product;
        $purchase_quantity = $purchase->product_quantity;
     

  
         $data = ProductForSaleCenter::where('product_id', $purchase_product_id)->where('color',$purchase->color)->where('size',$purchase->size)->where('batch_id',$purchase->batch_id)->first();
         $total_quantity = $data->quantity; 


         DB::table('product_for_sale_centers')
           ->where('product_id', $purchase_product_id)->where('color',$purchase->color)->where('size',$purchase->size)->where('batch_id',$purchase->batch_id)
           ->update(['quantity' => $total_quantity+$purchase_quantity]);
     
        $purchasereturndelete = purchasereturn::where('id',$purchasereturn->id)->delete();

    //     // $user->delete();
    //     // $salecenter->delete();

        Session::flash('message','Purchase Return Deleted Successfully');
        Session::flash('alert-type','success');
        return back();
    //
   }






}