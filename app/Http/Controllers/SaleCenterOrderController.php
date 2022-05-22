<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SaleCenter;
use App\Models\SaleCenterOrder; 
use App\Models\ProductForSaleCenter;
use App\Models\ProductForOwner;
use App\Models\OwnerUser;
use App\Models\SaleCenterUser;
use App\Models\dealsizecolor;
use App\Models\ColourImageProductSize;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaleCenterOrderController extends Controller
{

    public function assign(Request $request){

        $request->validate([

            'salecenter_id' => ['required'],

        ]);

        if($request->get('assign_full_order') != null){

            $sale_center_order = SaleCenterOrder::where('order_number',$request->get('order_number'))->first();

            if($sale_center_order != null){

                SaleCenterOrder::where('order_number',$request->get('order_number'))
                    ->update(['salecenter_id'=>$request->get('salecenter_id'),'status'=>1]);

                $orders = Order::where('order_number',$request->get('order_number'))->get();

                foreach ($orders as $order){

                    if($sale_center_order->product_id == $order->product_id){
                        continue;
                    }

                    $SaleCenterOrder = new SaleCenterOrder();

                    $SaleCenterOrder->salecenter_id = $request->get('salecenter_id');
                    $SaleCenterOrder->order_number = $request->get('order_number');
                    $SaleCenterOrder->product_id = $order->product_id;
                    $SaleCenterOrder->quantity = $order->quantity;
                    $SaleCenterOrder->colour_id = $order->colour_id;
                    $SaleCenterOrder->size_id = $order->size_id;

                    $SaleCenterOrder->save();
                }

                Session::flash('message','Order Assign to Sale Center Successfully');
                Session::flash('alert-type','success');
                return back();
            }
            else{

                $orders = Order::where('order_number',$request->get('order_number'))->get();

                foreach ($orders as $order){

                    $SaleCenterOrder = new SaleCenterOrder();

                    $SaleCenterOrder->salecenter_id = $request->get('salecenter_id');
                    $SaleCenterOrder->order_number = $request->get('order_number');
                    $SaleCenterOrder->product_id = $order->product_id;
                    $SaleCenterOrder->quantity = $order->quantity;
                    $SaleCenterOrder->colour_id = $order->colour_id;
                    $SaleCenterOrder->size_id = $order->size_id;

                    $SaleCenterOrder->save();
                }

                Session::flash('message','Order Assign to Sale Center Successfully');
                Session::flash('alert-type','success');
                return back();

            }
        }

        if($request->get('reassign_full_order') != null){

            $sale_center_order = SaleCenterOrder::where('order_number',$request->get('order_number'))->first();

            if($sale_center_order != null){

                SaleCenterOrder::where('order_number',$request->get('order_number'))
                    ->update(['salecenter_id'=>$request->get('salecenter_id'),'status'=>1]);

                $orders = Order::where('order_number',$request->get('order_number'))->get();

                foreach ($orders as $order){

                    if($sale_center_order->product_id == $order->product_id){
                        continue;
                    }

                    $SaleCenterOrder = new SaleCenterOrder();

                    $SaleCenterOrder->salecenter_id = $request->get('salecenter_id');
                    $SaleCenterOrder->order_number = $request->get('order_number');
                    $SaleCenterOrder->product_id = $order->product_id;
                    $SaleCenterOrder->quantity = $order->quantity;
                    $SaleCenterOrder->colour_id = $order->colour_id;
                    $SaleCenterOrder->size_id = $order->size_id;

                    $SaleCenterOrder->save();
                }

                Session::flash('message','Order Reassign to Sale Center Successfully');
                Session::flash('alert-type','success');
                return back();
            }
        }


        if($request->get('reassign') != null){

            SaleCenterOrder::where('order_number',$request->get('order_number'))
                ->where('product_id',$request->get('product_id'))
                ->update(['salecenter_id'=>$request->get('salecenter_id'),'status'=>1]);

            Session::flash('message','Product Reassign to Sale Center Successfully');
            Session::flash('alert-type','success');
            return back();
        }

        $SaleCenterOrder = new SaleCenterOrder();

        $SaleCenterOrder->fill($request->all());

        $SaleCenterOrder->save();

        Session::flash('message','Product Assign to Sale Center Successfully');
        Session::flash('alert-type','success');
        return back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salecenter_id = auth()->user()->salecenters->first()->id;

    //    $salecenteruser = SaleCenterUser::where('sale_center_id',$salecenter_id)->first()->user_id;

        $orders = SaleCenterOrder::where('salecenter_id',$salecenter_id)->get();
// dd($orders);
        return view('salecenter.orders.index',['orders'=>$orders ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleCenterOrder  $saleCenterOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SaleCenterOrder $saleCenterOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleCenterOrder  $saleCenterOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleCenterOrder $order)
    {
        return view('salecenter.orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleCenterOrder  $saleCenterOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleCenterOrder $order)
    {
        // echo $order;
        // echo  $ownerid = OwnerUser::where('owner_id',$order->owner_id)->first()->user_id;
      
       
        SaleCenterOrder::where('id',$order->id)->update(['status'=>$request->get('status')]);
       $productid = SaleCenterOrder::where('id',$order->id)->first()->product_id;
      $checkdeal = ColourImageProductSize::where('product_id',$productid)->first()->deal;

      if($checkdeal!=null)
      {



 $deals = dealsizecolor::where('deal_id',$checkdeal)->get();
$array =null;
foreach($deals as $deal)
{
 $pro_sale = ProductForSaleCenter::where('product_id',$deal->product_id)->where('size',$deal->size_id)->where('color',$deal->color_id)->first();
 if($pro_sale==null)
 {
     $array[] =$deal;
 }

}

echo "no null";
if($array==null)
{
$len = sizeof($deals);
  foreach($deals as $key=>$p)
  {
    
  
    // $productquantity_in_productforsalecenters1 = ProductForSaleCenter::where('product_id',$p->product_id)->where('salecenter_id',$order->salecenter_id)->where('size',$p->size_id)->where('color',$p->color_id)->first();
    $productquantity_in_productforsalecenters2 = ProductForSaleCenter::where('product_id',$p->product_id)->where('salecenter_id',$order->salecenter_id)->where('size',$p->size_id)->where('color',$p->color_id)->first()->sold;

    ProductForSaleCenter::where('product_id',$p->product_id)->where('salecenter_id',$order->salecenter_id)->where('size',$p->size_id)->where('color',$p->color_id)->update(['sold'=>$productquantity_in_productforsalecenters2+1]);
   
  }

//   for ($i=0; $i < $len; $i++)
//  {

//      $dealcolorsize = new dealsizecolor;
//      $dealcolorsize->deal_id = $deal_last_id;
//      $dealcolorsize->product_id = $req->product_id_1;
//      $dealcolorsize->size_id = $req->size1[$i];
//      $dealcolorsize->color_id = $req->color1[$i];

//      $dealcolorsize->save();

   
// }

  
  Session::flash('message','Status & Inventory Updated Successfully ');
  Session::flash('alert-type','success');
  return redirect()->route('sale_center_order.index');
}
else
{
    $request->session()->flash('order_id', $array);
    return back();
}










      }
      else
      {
          if($request->get('status')==4 || $request->get('status')==3 )
{
     

       $productquantity_in_productforsalecenters = ProductForSaleCenter::where('product_id',$order->product_id)->where('salecenter_id',$order->salecenter_id)->where('color',$order->colour_id)->where('size',$order->size_id)->first()->sold;

  ProductForSaleCenter::where('product_id',$order->product_id)->where('salecenter_id',$order->salecenter_id)->update(['sold'=>$order->quantity+$productquantity_in_productforsalecenters]);

  $ownerid = OwnerUser::where('owner_id',$order->owner_id)->first()->user_id;
   $sold = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$order->product_id)->where('color_id',$order->colour_id)->where('size_id',$order->size_id)->first();
  if( $sold!=null)
  {
     ProductForOwner::where('owner_name',$ownerid)->where('product_id',$order->product_id)->where('color_id',$order->colour_id)->where('size_id',$order->size_id)->update(['sold'=>$order->quantity+$sold->sold]);
    $forsold_quantity = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$order->product_id)->where('color_id',$order->colour_id)->where('size_id',$order->size_id)->first();
    ProductForOwner::where('owner_name',$ownerid)->where('product_id',$order->product_id)->where('color_id',$order->colour_id)->where('size_id',$order->size_id)->update(['instock'=>($forsold_quantity->productQuantity)-($forsold_quantity->sold)]);
  }
  elseif( $sold=null)
  {
    Session::flash('message','Product don,t have any owner');
    Session::flash('alert-type','warning');
    return redirect()->route('sale_center_order.index');
  }

 
  
} 
        Session::flash('message','Status Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('sale_center_order.index');
      }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleCenterOrder  $saleCenterOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleCenterOrder $saleCenterOrder)
    {
        //
    }
}
