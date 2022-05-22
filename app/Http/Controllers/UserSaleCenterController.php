<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSaleCenterController extends Controller
{
    public function index()
    {
        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        return view('salecenter.index');
    }
}
