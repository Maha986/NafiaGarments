<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\riderproductorder;
use App\Models\riderordercustomer;
use App\Models\riderwallet;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Redirect;
use Carbon\Carbon;

class RiderOrderController extends Controller
{


    public function index()
    {
         $rider_id = auth()->user()->riders->first()->id;

       $orders = riderproductorder::where('rider_id', $rider_id)->get();

        return view('rider.orders.index',['orders'=>$orders ]);

    }


    public function index2()
    {
         $rider_id = auth()->user()->riders->first()->id;

       $orders = riderordercustomer::where('rider_id', $rider_id)->get();

        return view('rider.picktoorder.index',['orders'=>$orders ]);

    }

     public function edit($order)
    {
    	echo $order;
        return view('rider.orders.edit',['order'=>$order]);
    }

    public function edit2($order)
    {
      echo $order;
        return view('rider.picktoorder.edit',['order'=>$order]);
    }

     public function update(Request $request,$order)
    {
    	$rider = riderproductorder::where('id',$order)->first();

        riderproductorder::where('id',$rider->id)->update(['status'=>$request->get('status')]);

        Session::flash('message','Status Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('riderorderindex');
    }

   public function update2(Request $request,$order)
    {
      $rider = riderordercustomer::where('id',$order)->first();

        riderordercustomer::where('id',$rider->id)->update(['status'=>$request->get('status')]);


        if($request->get('status')==4)
        {
            $riderwallet = new riderwallet;
            $riderwallet->rider_id = $rider->rider_id;
            $riderwallet->product = $rider->product_name;
            $riderwallet->order_id = $rider->order_id;
            $riderwallet->cash_payable = $rider->cash;

            $riderwallet->save();


        }
        Session::flash('message','Status Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('riderorderindex2');

    }

public function pick()
    {
     
      return view('rider.pickorderdate.date');
 

    }
    public function todaypick()
    {

       $date = date('Y-m-d');
       $order = riderordercustomer::where('date',$date)->get();
      return view('rider.pickorderdate.dateindex',['orders'=>$order]);
    }

    public function date(request $req)
    {
     
      echo $req->date;
      $order = riderordercustomer::where('date',$req->date)->get();
      return view('rider.pickorderdate.dateindex',['orders'=>$order]);


 

    }

    public function defer($id)
    {
 
      return view('rider.pickorderdate.defernewdate',['order'=>$id]);
    }

      public function defer_update(request $req,$id)
    {
     
    $rider_defer_update = riderproductorder::where('id',$id)->first();
    $rider_defer_update->date = $req->date;
    $rider_defer_update->save();

    Session::flash('message','Date Defer Successfully ');
        Session::flash('alert-type','success');

      return redirect('riderorderindex');
    }

    public function riderorder_detail()
    {
      // $riderorders = riderproductorder::where('status', 4)->get();
      $rider = Rider::all();
      
 return view('admin.riders.selectrider',['riders'=>$rider]);
    }

       public function selectrider_work(request $req)
    {
      $rider_id = $req->rider;
       return view('admin.riders.chooseriderinfo',['riderid'=>$rider_id]);
    }


        public function rider_pickups($id)
    {
        
       $riderorders = riderproductorder::where('rider_id',$id)->where('status', 4)->get();

       return view('admin.riders.riderorderdetail',['riderorder'=>$riderorders,'rider_idi'=>$id]);
       
    }

          public function rider_delivery($id)
    {
        
       $riderorders = riderordercustomer::where('rider_id',$id)->where('status', 4)->get();

       return view('admin.riders.riderorderdelivery',['riderorder'=>$riderorders,'rider_idi'=>$id]);
       
    }

          public function edit_rider_pickups($id)
    {
        
       $riderorders = riderproductorder::where('id',$id)->first();


       return view('admin.riders.editriderpickups',['riderorder'=>$riderorders]);
       
    }

         public function edit_rider_delivery($id)
    {
        
       $riderorders = riderordercustomer::where('id',$id)->first();


       return view('admin.riders.editriderdelivery',['riderorder'=>$riderorders]);
       
    }


      public function edit_rider_pickups_post(request $req)
    {
        
    $riderorders = riderproductorder::where('id',$req->id)->first();

    $riderorders->description = $req->description;
    $riderorders->address = $req->address;
    $riderorders->date = $req->date;
    $riderorders->cash = $req->cash;

    $riderorders->save();

    // return view('admin.riders.editriderpickups',['riderorder'=>$riderorders]);
     Session::flash('message','Rider Pickup Updated Successfully ');
        Session::flash('alert-type','success');

    
    // Redirect::route('riderpickups',$riderorders->rider_id);
  return redirect('/admin/riderpickups/'.$riderorders->rider_id);






       // return view('admin.riders.editriderpickups',['riderorder'=>$riderorders]);
       
    }

    public function edit_rider_delivery_post(request $req)
    {
        
    $riderorders = riderordercustomer::where('id',$req->id)->first();

    $riderorders->description = $req->description;
    $riderorders->address = $req->address;
    $riderorders->date = $req->date;
    $riderorders->cash = $req->cash;

    $riderorders->save();


     Session::flash('message','Rider Delivery Updated Successfully ');
        Session::flash('alert-type','success');

  return redirect('/admin/riderdeliveryy/'.$riderorders->rider_id);


       
    }

public function rider_wallet($id)
    {
      $confirm_orders = riderwallet::where('rider_id',$id)->get();
 

return view('admin.riders.riderwallet',['riderorder'=>$confirm_orders]);

 
    }

    
    public function riderwalletupdate_view($id)
    {
      $wallet = riderwallet::where('id',$id)->first();

      return view('admin.riders.riderwalletupdate_view',['wallet'=>$wallet]);

    }

  public function riderwalletupdate_post(request $req,$id)
    {
     
      $wallet = riderwallet::where('id',$id)->first();
      $wallet->cash_recievable = $req->recieve;
      $wallet->save();

      Session::flash('message','Wallet Updated Successfully ');
        Session::flash('alert-type','success');

  return redirect('/admin/rider/wallet/'.$wallet->rider_id);

    }


}

