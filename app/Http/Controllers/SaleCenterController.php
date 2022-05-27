<?php

namespace App\Http\Controllers;

use App\Models\SaleCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SaleCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SaleCenters =  SaleCenter::all();

        return view('admin.salecenters.index',['SaleCenters'=>$SaleCenters]);
    }

     public function index_dates(request $req)
    {
     

        $from = $req->from;
        $to = $req->to;

      $SaleCenters =  SaleCenter::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
return view('admin.salecenters.index',['SaleCenters'=>$SaleCenters])->render();



    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salecenters.create');
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
            'owner_name'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string','max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'cnic_no'=> 'required|string|max:255|unique:sale_centers',
            'cnic_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'messaging_service_name'=> 'nullable|string|max:255',
            'messaging_service_no'=> 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'social_media_name_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'social_media_name_3'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'link_3'=> 'nullable|string|max:255',
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $saleCenter = new SaleCenter();


        $saleCenter->name = $request->get('name');
        $saleCenter->owner_name = $request->get('owner_name');
        $saleCenter->address = $request->get('address');
        $saleCenter->city = $request->get('city');
        $saleCenter->area = $request->get('area');
        $saleCenter->contact = $request->get('contact');
        $saleCenter->cnic_no = $request->get('cnic_no');
        $saleCenter->messaging_service_name = $request->get('messaging_service_name');
        $saleCenter->messaging_service_no = $request->get('messaging_service_no');
        $saleCenter->email = $request->get('email');
        $saleCenter->social_media_name_1 = $request->get('social_media_name_1');
        $saleCenter->social_media_name_2 = $request->get('social_media_name_2');
        $saleCenter->social_media_name_3 = $request->get('social_media_name_3');
        $saleCenter->link_1 = $request->get('link_1');
        $saleCenter->link_2 = $request->get('link_2');
        $saleCenter->link_3 = $request->get('link_3');
        $saleCenter->bank_account_title = $request->get('bank_account_title');
        $saleCenter->bank_name = $request->get('bank_name');
        $saleCenter->bank_branch = $request->get('bank_branch');
        $saleCenter->account_or_iban_no = $request->get('account_or_iban_no');
        $saleCenter->money_transfer_no = $request->get('money_transfer_no');
        $saleCenter->money_transfer_service = $request->get('money_transfer_service');
        $saleCenter->status = $request->get('status');

        $cnic_front_image = $request->file('cnic_front');
        $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
        $cnic_front_image->storeAs('/images/SaleCenterImages',$cnic_front_image_name);

        $saleCenter->cnic_front = $cnic_front_image_name;

        $cnic_back_image = $request->file('cnic_back');
        $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
        $cnic_back_image->storeAs('/images/SaleCenterImages',$cnic_back_image_name);

        $saleCenter->cnic_back = $cnic_back_image_name;

        $saleCenter->save();

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->password);
        $user->o_auth = $request->password;
        $user->status = 0;

        $user->assignRole('salecenter');

        $user->save();

        $userId = $user->id;

        $saleCenter->users()->attach($userId);

        Session::flash('message','Sale Center Added Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('saleCenter.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleCenter  $saleCenter
     * @return \Illuminate\Http\Response
     */
    public function show(SaleCenter $saleCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleCenter  $saleCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(salecenter $salecenter)
    {

        return view('admin.salecenters.edit',['salecenter'=>$salecenter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleCenter  $saleCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salecenter $salecenter)
    {

        $salecenter_user = SaleCenter::with(['users'])->where('id',$salecenter->id)->first();
        $user = $salecenter_user->users()->first();

        $request->validate([
            'name'=> ['required', 'max:255'],
            'owner_name'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string','max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'cnic_no' => ['required', 'string','max:255','unique:sale_centers,cnic_no,'.$salecenter->id],
            'cnic_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'messaging_service_name'=> 'nullable|string|max:255',
            'messaging_service_no'=> 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:5'],
            'social_media_name_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'social_media_name_3'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'link_3'=> 'nullable|string|max:255',
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $salecenter->name = $request->get('name');
        $salecenter->owner_name = $request->get('owner_name');
        $salecenter->address = $request->get('address');
        $salecenter->city = $request->get('city');
        $salecenter->area = $request->get('area');
        $salecenter->contact = $request->get('contact');
        $salecenter->cnic_no = $request->get('cnic_no');
        $salecenter->messaging_service_name = $request->get('messaging_service_name');
        $salecenter->messaging_service_no = $request->get('messaging_service_no');
        $salecenter->email = $request->get('email');
        $salecenter->social_media_name_1 = $request->get('social_media_name_1');
        $salecenter->social_media_name_2 = $request->get('social_media_name_2');
        $salecenter->social_media_name_3 = $request->get('social_media_name_3');
        $salecenter->link_1 = $request->get('link_1');
        $salecenter->link_2 = $request->get('link_2');
        $salecenter->link_3 = $request->get('link_3');
        $salecenter->bank_account_title = $request->get('bank_account_title');
        $salecenter->bank_name = $request->get('bank_name');
        $salecenter->bank_branch = $request->get('bank_branch');
        $salecenter->account_or_iban_no = $request->get('account_or_iban_no');
        $salecenter->money_transfer_no = $request->get('money_transfer_no');
        $salecenter->money_transfer_service = $request->get('money_transfer_service');
        $salecenter->status = $request->get('status');


        if($request->cnic_front != null){

            $cnic_front_image = $request->file('cnic_front');
            $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
            $cnic_front_image->storeAs('/images/SaleCenterImages',$cnic_front_image_name);

            $salecenter->cnic_front = $cnic_front_image_name;

            $salecenter->save();

        }
        else{

            $salecenter->save();
        }

        if($request->cnic_back != null){

            $cnic_back_image = $request->file('cnic_back');
            $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
            $cnic_back_image->storeAs('/images/SaleCenterImages',$cnic_back_image_name);

            $salecenter->cnic_back = $cnic_back_image_name;

            $salecenter->save();

        }
        else{

            $salecenter->save();
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if (!empty($request->password)){
            $user->password = Hash::make($request->password);
            $user->o_auth = $request->password;
        }

        $user->save();

        $userId = $user->id;

        $salecenter->users()->detach();
        $salecenter->users()->attach($userId);


        Session::flash('message','Sale Center Updated Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('saleCenter.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleCenter  $saleCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(salecenter $salecenter)
    {

        $salecenter_user = SaleCenter::with(['users'])->where('id',$salecenter->id)->first();
        $user = $salecenter_user->users()->first();

        $salecenter->users()->detach();

        $user->delete();
        $salecenter->delete();

        Session::flash('message','Sale Center Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('saleCenter.index');
    }





public function selectfield(request $req)
{
  
    echo $len = sizeof($req->cat);

  
      if ($len == 1)
{
   $products = SaleCenter::all($req->cat[0]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =1;
   $pro1=$req->cat[0];
  

   return view('admin.salecenters.newindex', compact('pro1','products','len'));
} 


elseif ($len == 2)
{
   $products = SaleCenter::all($req->cat[0], $req->cat[1]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =2;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];

   return view('admin.salecenters.newindex', compact('pro1','pro2','products','len'));
}

else if($len == 3 )
{

   $products = SaleCenter::all($req->cat[0], $req->cat[1],$req->cat[2]);
   $len =3;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];

   return view('admin.salecenters.newindex', compact('pro1','pro2','products','len','pro3'));

}

elseif($len == 4)
{
   $products = SaleCenter::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3]);

   $len =4;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];

   return view('admin.salecenters.newindex', compact('pro1','pro2','products','len','pro3','pro4'));
}

elseif($len == 5)
{
   $products = SaleCenter::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4]);

   $len =5;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];

   return view('admin.salecenters.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5'));
}

elseif($len == 6)
{
   $products = SaleCenter::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4],$req->cat[5]);
    $len =6;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];
   $pro6=$req->cat[5];

   return view('admin.salecenters.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5','pro6'));
}


}



}
