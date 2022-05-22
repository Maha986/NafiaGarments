<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {

            $role = Auth::user()->roles->first();
            echo $role;

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

                return route('admin.dashboard');

            }
            else if($role->name == "reseller"){

                return route('reseller.dashboard');

            }
            else if($role->name == "salecenter"){

                return route('salecenter.dashboard');

            }
            else if($role->name == "rider"){

                return route('rider.dashboard');
            }

              else if($role->name == "owner"){

                return route('owner.dashboard',);
            }

               else if($role->name == "admin4"){

                 return route('admin.dashboard');
            }

            else if($role->name == "customer"){

                return '/home';
            }
            else{

                return '/home';
            }

//            $role = Auth::user()->getRoleNames()->first();
//
//            switch ($role) {
//                case 'super-admin':
//                    return route('admin.dashboard');
//                    break;
//                case 'admin':
//                    return route('admin.dashboard');
//                    break;
//                case 'reseller':
//                    return route('reseller.dashboard');
//                    break;
//                default:
//                    return '/home';
//                    break;
//            }
        }
        return $next($request);
    }

//    public function handle(Request $request, Closure $next, ...$guards)
//    {
//        $guards = empty($guards) ? [null] : $guards;
//
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
//            }
//        }
//
//        return $next($request);
//    }
}
