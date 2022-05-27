<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressPhoneEmailController extends Controller
{
    public function index()
    {
        //$logos = HomeSetting::where('key','logo')->get();

        return view('admin.addressphoneemails.index');
    }

    public function create()
    {
        return view('admin.addressphoneemails.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'address'=> ['required', 'string','max:255'],
            'phone'=> ['required','string', 'max:255'],
            'email'=> ['required','email'],

        ]);

        $concatenate_value = $request->address.'`'.$request->phone.'`'.$request->email;


        $homeSetting = new HomeSetting();

        $homeSetting->page_name = 'all-pages';
        $homeSetting->key = 'Address_Phone_Email';
        $homeSetting->value = $concatenate_value;
        $homeSetting->status = 0;

        $homeSetting->save();

        Session::flash('message','Address - Phone - Email Created Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('ape.index');

    }
}
