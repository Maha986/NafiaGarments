<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = HomeSetting::where('key','logo')->get();

        return view('admin.logos.index', ['logos'=>$logos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSetting  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSetting $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSetting  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSetting $logo)
    {
        return view('admin.logos.edit', ['logo'=>$logo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSetting  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSetting $logo)
    {
        $request->validate([

            'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if($request->file('logo')){

            $image = $request->file('logo');

            $image_name = $image->getClientOriginalName();

            $checkImage = HomeSetting::where('value',$image_name)->get();


        }
        else{

            $value = $request->logo->value;

            $checkImage = HomeSetting::where('value',$value)->get();

            $image_name  = null;
        }

        if(sizeof($checkImage) == false ||  $logo->value == $image_name || $logo->value == $request->logo->value){

            if(sizeof($checkImage) == false){

                $image->storeAs('/images/logos',$image_name);

                $logo->value = $image_name;

                $logo->save();

                Session::flash('message','Logo Updated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('logo.index');

            }
            else{

                Session::flash('message','Logo Updated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('logo.index');

            }
        }
        else{

            Session::flash('message','Logo Already exists');
            Session::flash('alert-type','warning');
            return redirect()->back();

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSetting  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSetting $logo)
    {
        $logo->delete();

        Session::flash('message','Logo Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('logo.index');
    }
}
