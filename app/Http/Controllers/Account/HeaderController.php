<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\header;
use App\Models\subheader;
use App\Models\thirdsubheader;

class HeaderController extends Controller
{
    public function subheader()
    {
        return view('admin.header.addsubheader');
    }

    public function thirdsubheader()
    {
        return view('admin.header.addthirdsubheader');
    }


    public function subheader_post(Request $req)
    {
        // $name = $req->input('headers');
        // echo $name;
        $subheader = new subheader;
        $subheader->header_id = $req->input('headers');
        $subheader->name = $req->input('subheadername');
        // $subheader->created_at = "2021-01-20 16:32:57";
        // $subheader->updated_at = "2021-01-20 16:32:57";

        $subheader->save();
        // return view('admin.header.addthirdsubheader');
        return back()->with('success','Sub-Header Added Successfully');

    }

    public function hello(Request $req)
    {
        echo"asdasdasdas";

    }


    public function ThirdSubheaderPost(Request $req)
    {
        // $name = $req->input('headers');
        // echo $name;
        $thirdsubheader = new thirdsubheader;
        $thirdsubheader->subheader_id = $req->input('subheaders');
        $thirdsubheader->name = $req->input('thirdsubheadername');
        $thirdsubheader->code = $req->input('code');
        // $subheader->created_at = "2021-01-20 16:32:57";
        // $subheader->updated_at = "2021-01-20 16:32:57";

        $thirdsubheader->save();
        // return view('admin.header.addthirdsubheader');
        return back()->with('success','Third-Sub-Header Added Successfully');

    }

}
