<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers  = Courier::all();
        return view ('admin.couriers.index',['couriers'=>$couriers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.couriers.create');
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
            'courier_name'=> ['required', 'max:255'],
            'person_one'=> ['required','max:255'],
            'phone_num_one' => ['required','digits:11'],
            'person_two'=> ['nullable','max:255'],
            'phone_num_two' => ['nullable','digits:11'],
            'person_three'=> ['nullable','max:255'],
            'phone_num_three' => ['nullable','digits:11'],
        ]);

        $input = $request->all();

        $checkcourier = Courier::where('courier_name',$request->courier_name)->get();

        if(sizeof($checkcourier) == false)
        {
            Courier::create($input);
            Session::flash('message','Courier Name Added Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('courier.index');
        }
        Session::flash('message','Courier Company Already exist');
        Session::flash('alert-type','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view ('admin.couriers.edit',['courier'=>$courier]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        $request->validate([
            'courier_name'=> ['required', 'max:255'],
            'person_one'=> ['required','max:255'],
            'phone_num_one' => ['required','digits:11'],
            'person_two'=> ['nullable','max:255'],
            'phone_num_two' => ['nullable','digits:11'],
            'person_three'=> ['nullable','max:255'],
            'phone_num_three' => ['nullable','digits:11'],
        ]);

        $checkcourier = Courier::where('courier_name',$request->courier_name)->get();

        if(sizeof($checkcourier) == 0 || $courier->courier_name == $request->courier_name)
        {

            $courier->fill($request->all());

            $courier->save();

            Session::flash('message','Courier Name Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('courier.index');
        }
        Session::flash('message','Courier already exist with this Name');
        Session::flash('alert-type','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        Session::flash('message','Courier Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('courier.index');
    }
}
