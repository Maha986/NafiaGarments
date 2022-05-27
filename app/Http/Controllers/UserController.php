<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\cuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create',['roles'=>$roles]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'role' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $image = $request->file('image');
        $image_name = time().$image->getClientOriginalName();

        $image->storeAs('/images/users_profile',$image_name);

        $user = new User();

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->o_auth = $request->password;
        $user->assignRole($request->role);
        $user->image = $image_name;
        $user->save();

if($request->role == '1')
{
$lastuser_id = user::all()->last()->id;
$lastuser_name = user::all()->last()->name;

$custo = new cuser;
$custo->user_id = $lastuser_id;
$custo->name = $lastuser_name;
$custo->save();
}



        Session::flash('message','User Created Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('user.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit',['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $checkUser = User::where('email',$request->email)->get();
        if(sizeof($checkUser) == 0 || $user->email == $request->email)
        {
            if($request->image != null){

                $image = $request->file('image');
                $image_name = time().$image->getClientOriginalName();
                $image->storeAs('/images/users_profile',$image_name);
                $user->image = $image_name;
            }

            if($request->password != null)
            {
                $user->password = Hash::make($request->password);
                $user->o_auth = $request->password;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->assignRole($request->role);
            $user->save();
            Session::flash('message','User Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('user.index');
        }
        Session::flash('message','User already exist with this email');
        Session::flash('alert-type','success');
        return redirect()->route('user.index');
    }

    public function status(User $user){

        if($user->status == 0){

            $user->status = 1;

            $user->save();

            Session::flash('message','User Activated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('user.index');

        }
        elseif($user->status == 1){

            $user->status = 0;

            $user->save();

            Session::flash('message','User InActivated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('user.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message','User Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('user.index');
    }
}
