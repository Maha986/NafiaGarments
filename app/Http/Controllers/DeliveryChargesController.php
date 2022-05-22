<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\DeliveryCharges;
use App\Models\expressdeliverycharge;
use App\Models\deliverystandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class DeliveryChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_charges = DeliveryCharges::all();
        return view('admin.deliverycharges.index',['delivery_charges'=>$delivery_charges]);
    }


public function index_pdf()
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $delivery_charges =  DeliveryCharges::all();
          
    $pdf = PDF::loadView('admin.deliverycharges.index_pdf',['delivery_charges'=>$delivery_charges])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('all_deliverycharges.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.deliverycharges.create',['cities' => $cities]);
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
            'city_id'=> ['required'],
            'delivery_charge'=> ['required','numeric' ,'min:1'],
        ]);

        $delivery_charges = new DeliveryCharges();

        $delivery_charges->city_id = $request->get('city_id');
        $delivery_charges->delivery_charge = $request->get('delivery_charge');

        $delivery_charges->save();

        Session::flash('message','Delivery Charge Added Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('delivery_charges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryCharges  $deliveryCharges
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryCharges $deliveryCharges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryCharges  $deliverycharges
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryCharges $deliverycharges)
    {
        $cities = City::all();

        return view('admin.deliverycharges.edit',['cities'=>$cities,'deliverycharge'=>$deliverycharges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryCharges  $deliverycharges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryCharges $deliverycharges)
    {
        $request->validate([
            'city_id'=> ['required'],
            'delivery_charge'=> ['required','numeric' ,'min:1'],
        ]);

        $deliverycharges->city_id = $request->get('city_id');
        $deliverycharges->delivery_charge = $request->get('delivery_charge');

        $deliverycharges->save();

        Session::flash('message','Delivery Charge Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('delivery_charges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryCharges  $deliverycharges
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCharges $deliverycharges)
    {
        $deliverycharges->delete();

        Session::flash('message','Delivery Charge Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('delivery_charges.index');
    }

    public function standard_delivery_index()
    {
        $deliverystandard = deliverystandard::all();
        return view('admin.deliverycharges.standard_delivery_index',['delivery'=>$deliverystandard]);
        // return view('admin.deliverycharges.standard_delivery_index');
    }
    public function  standard_delivery_edit($id)
    {
 
        return view('admin.deliverycharges.standard_delivery_edit',compact('id'));
    }

    public function standard_delivery_update(request $req)
    {
        $deliverystandard = deliverystandard::where('id',$req->id)->first();
        $deliverystandard->charges = $req->delivery_charge;
        $deliverystandard->additional_charges = $req->additional_charge;
        $deliverystandard->save();
        Session::flash('message','Standard Delivery Charge Updated Successfully');
        Session::flash('alert-type','success');
        
        return redirect('admin/standard/deliverycharges/index');
    }

    public function express_delivery_index()
    {

        $deliveryexpress = expressdeliverycharge::all();
        return view('admin.deliverycharges.express_delivery_index',['delivery'=>$deliveryexpress]);

    }

    public function express_delivery_edit($id)
    {
  
        return view('admin.deliverycharges.express_delivery_edit',compact('id'));

    }

    public function express_delivery_update(request $req)
    {
  
        $deliverystandard = expressdeliverycharge::where('id',$req->id)->first();
        $deliverystandard->charges = $req->delivery_charge;
        $deliverystandard->additional_charges = $req->additional_charge;
        $deliverystandard->save();

        Session::flash('message','Express Delivery Charge Updated Successfully');
        Session::flash('alert-type','success');
        
        return redirect('admin/express/deliverycharges/index');

    }
    
    
   
}
