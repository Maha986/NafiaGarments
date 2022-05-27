<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if(Auth::check()){

                $role = Auth::user()->roles->first();

                $permissions = Permission::all();

                foreach($permissions as $permission){

                    $item =   DB::table('role_has_permissions')
                        ->where('permission_id',$permission->id)
                        ->where('role_id',$role->id)
                        ->first();

                    if(!empty($item)){

                        break;
                    }
                }

                if(!empty($item)){

                    return $next($request);
                }

            }

            //abort(404);
            return redirect('/home');

        });


    }


    public function index()
    {
        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        return view('admin.index');
    }
}
