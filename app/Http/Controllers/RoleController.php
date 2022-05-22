<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $roles = Role::all();

            return view('admin.roles.index',['roles'=>$roles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.roles.create');
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
            'role' => 'required|unique:roles,name',
            'permissions' => ['required'],
        ]);

        $role = Role::create(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        Session::flash('message','Role Created Sucessfully');
        Session::flash('alert-type','success');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        return view('admin.roles.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $role->name =$request->role;
        $role->syncPermissions($request->permissions);

        $role->save();

        Session::flash('message','Role Updated Sucessfully');
        Session::flash('alert-type','success');
        return redirect()->route('role.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        $role->delete();

        Session::flash('message','Role Deleted Sucessfully');
        Session::flash('alert-type','success');
        return redirect()->route('role.index');

    }
}
