<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = DB::table('contactuses')->get();
        return view('admin.contactus.index',['contactus'=>$contactus]);
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
                'name' => 'required',
                'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
                'email' => 'required|email|unique:users',
                'message' => 'required',
            ]);

        $name= $request->input('name');
        $email= $request->input('email');
        $contact= $request->input('contact');
        $message=$request->input('message');

        $contactus = new Contactus();


            $contactus->name = $name;
            $contactus->email = $email;
            $contactus->contact = $contact;
            $contactus->message = $message;
            $contactus->status = '0';

            $contactus->save();

            Session::flash('message','Contact Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(Contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactus $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactus $contactus)
    {
        if($contactus->id){

            $contactus->delete();

            Session::flash('message','Customer Contact Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('contactus.index');

        }
    }

    public function status(Request $request, Contactus $contactus){

        if($contactus->status == 0){
            $contactus->status = 1;
            $contactus->save();

            return redirect()->route('contactus.index');

        }
    }
}
