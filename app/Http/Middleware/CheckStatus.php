<?php

namespace App\Http\Middleware;

use App\Models\Reseller;
use App\Models\ResellerUser;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $reseller = Auth::user()->resellers->first();

        if(!empty($reseller)){

            if($reseller->status == 1){

                return $next($request);
            }
            else{

                Auth::logout();

                session::flash('message',"Your Account Is Inactive");
                session::flash('alert-type','error');

                return redirect('/login');

            }
        }

        $salecenter = Auth::user()->salecenters->first();

        if(!empty($salecenter)){

            if($salecenter->status == 1){

                return $next($request);
            }
            else{

                Auth::logout();

                session::flash('message',"Your Account Is Inactive");
                session::flash('alert-type','error');

                return redirect('/login');

            }
        }

        if (Auth::check() && Auth::user()->status == '1') {

            return $next($request);
        }

        Auth::logout();

        session::flash('message',"Your Account Is Inactive");
        session::flash('alert-type','error');

        return redirect('/login');

    }
}
