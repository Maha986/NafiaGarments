<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PDF;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();

        return view('admin.owners.index',['owners'=>$owners]);
    }

 public function index_pdf()
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
   $owners = Owner::all();
          
    $pdf = PDF::loadView('admin.owners.index_pdf',['owners'=>$owners])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('All_Owners.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
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
            'name'=> ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'contact'=> ['required','numeric', 'digits:11'],
            'password' => ['required', 'string', 'min:5'],
            'address'=> ['required', 'string','max:255'],
            'status'=> 'required',
        ]);

        $owner = new Owner();

        $owner->name = $request->get('name');
        $owner->email = $request->get('email');
        $owner->contact = $request->get('contact');
        $owner->address = $request->get('address');
        $owner->status = $request->get('status');

        $owner->save();

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->password);
        $user->o_auth = $request->password;
        $user->status = 0;

        $user->assignRole('owner');

        $user->save();

        $userId = $user->id;

        $owner->users()->attach($userId);

        Session::flash('message','Owner Added Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('admin.owners.edit',['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $owner_user = Owner::with(['users'])->where('id',$owner->id)->first();
        $user = $owner_user->users()->first();

        $request->validate([
            'name'=> ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            'contact'=> ['required','numeric', 'digits:11'],
            'address'=> ['required', 'string','max:255'],
            'password' => ['nullable', 'string', 'min:5'],
            'status'=> 'required',
        ]);

        $owner->name = $request->get('name');
        $owner->email = $request->get('email');
        $owner->contact = $request->get('contact');
        $owner->address = $request->get('address');
        $owner->status = $request->get('status');

        $owner->save();

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if (!empty($request->password)){
            $user->password = Hash::make($request->password);
            $user->o_auth = $request->password;
        }

        $user->save();

        $userId = $user->id;

        $owner->users()->detach();
        $owner->users()->attach($userId);

        Session::flash('message','Owner Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner_user = Owner::with(['users'])->where('id',$owner->id)->first();
        $user = $owner_user->users()->first();

        $owner->users()->detach();

        $user->delete();
        $owner->delete();


        Session::flash('message','Owner Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('owner.index');
    }
}
