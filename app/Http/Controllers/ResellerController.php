<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use App\Models\User;
use App\Models\orderdetail;
use App\Models\Catalogue;
use App\Models\ResellerUser;
use App\Models\CatalogueProduct;
use App\Models\resellerwallet;
use App\Models\GeneralDiscount;
use App\Models\Offer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PDF;
class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resellers =  Reseller::all();

        return view('admin.resellers.index',['resellers'=>$resellers]);
    }


 public function index_pdf()
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $resellers =  Reseller::all();
          
    $pdf = PDF::loadView('admin.resellers.index_pdf',['resellers'=>$resellers])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A1', 'landscape');
    
        return $pdf->download('all_suppliers.pdf');
    }



     public function index_pdf1($pro1)
    {

      $products =  Reseller::all($pro1);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf1',['products'=> $products,'pro1'=>$pro1])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }

     public function index_pdf2($pro1,$pro2)
    {

      $products =  Reseller::all($pro1,$pro2);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf2',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }


     public function index_pdf3($pro1,$pro2,$pro3)
    {

      $products =  Reseller::all($pro1,$pro2,$pro3);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf3',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }

       public function index_pdf4($pro1,$pro2,$pro3,$pro4)
    {

      $products =  Reseller::all($pro1,$pro2,$pro3,$pro4);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf4',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }

      public function index_pdf5($pro1,$pro2,$pro3,$pro4,$pro5)
    {

      $products =  Reseller::all($pro1,$pro2,$pro3,$pro4,$pro5);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf5',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }

       public function index_pdf6($pro1,$pro2,$pro3,$pro4,$pro5,$pro6)
    {

      $products =  Reseller::all($pro1,$pro2,$pro3,$pro4,$pro5,$pro6);
          
    $pdf = PDF::loadView('admin.resellers.index_pdf6',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'pro6'=>$pro6])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('Reseller_Fields.pdf');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hhh()
    {
        echo"hi";
            }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string','max:255'],
            'contact'=> ['required','string','regex:/^((\+92))\d{10}$/'],
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'cnic_no'=> 'required|string|max:255',
            'cnic_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_media_name_1'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $checkCnicNo = Reseller::where('cnic_no',$request->cnic_no)->get();

        if(sizeof($checkCnicNo) == false){

            $reseller = new Reseller();

            $reseller->name = $request->get('name');
            $reseller->email = $request->get('email');
            $reseller->city = $request->get('city');
            $reseller->area = $request->get('area');
            $reseller->address = $request->get('address');
            $reseller->contact = $request->get('contact');
            $reseller->messaging_service_no = $request->get('messaging_service_no');
            $reseller->messaging_service_name = $request->get('messaging_service_name');
            $reseller->cnic_no = $request->get('cnic_no');
            $reseller->social_media_name_1 = $request->get('social_media_name_1');
            $reseller->link_1 = $request->get('link_1');
            $reseller->social_media_name_2 = $request->get('social_media_name_2');
            $reseller->bank_account_title = $request->get('bank_account_title');
            $reseller->bank_name = $request->get('bank_name');
            $reseller->bank_branch = $request->get('bank_branch');
            $reseller->account_or_iban_no = $request->get('account_or_iban_no');
            $reseller->money_transfer_no = $request->get('money_transfer_no');
            $reseller->money_transfer_service = $request->get('money_transfer_service');
            $reseller->status = $request->get('status');

            $cnic_front_image = $request->file('cnic_front');
            $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
            $cnic_front_image->storeAs('/images/resellerImages',$cnic_front_image_name);

            $reseller->cnic_front = $cnic_front_image_name;

            $cnic_back_image = $request->file('cnic_back');
            $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
            $cnic_back_image->storeAs('/images/resellerImages',$cnic_back_image_name);

            $reseller->cnic_back = $cnic_back_image_name;

            $reseller->save();

            $user = new User();

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->password);
            $user->o_auth = $request->password;
            $user->status = 0;

            $user->assignRole('reseller');

            $user->save();

            $userId = $user->id;


            $reseller->users()->attach($userId);

            Session::flash('message','Reseller Added Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('reseller.index');

        }
        else{

            Session::flash('message','Reseller Already exists with this CNIC');
            Session::flash('alert-type','warning');
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function show(Reseller $reseller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $reseller)
    {
        return view('admin.resellers.edit',['reseller'=>$reseller]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $reseller)
    {
        $reseller_user = Reseller::with(['users'])->where('id',$reseller->id)->first();
        $user = $reseller_user->users()->first();

        $request->validate([
            'name'=> ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:5'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string','max:255'],
            'contact'=> ['required','string','regex:/^((\+92))\d{10}$/'],
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'cnic_no'=> 'required|string|max:255',
            'cnic_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_media_name_1'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $checkCnicNo = Reseller::where('cnic_no',$request->cnic_no)->get();

        if(sizeof($checkCnicNo) == false || $reseller->cnic_no  == $request->cnic_no){

            $reseller->name = $request->get('name');
            $reseller->email = $request->get('email');
            $reseller->city = $request->get('city');
            $reseller->area = $request->get('area');
            $reseller->address = $request->get('address');
            $reseller->contact = $request->get('contact');
            $reseller->messaging_service_no = $request->get('messaging_service_no');
            $reseller->messaging_service_name = $request->get('messaging_service_name');
            $reseller->cnic_no = $request->get('cnic_no');
            $reseller->social_media_name_1 = $request->get('social_media_name_1');
            $reseller->link_1 = $request->get('link_1');
            $reseller->social_media_name_2 = $request->get('social_media_name_2');
            $reseller->bank_account_title = $request->get('bank_account_title');
            $reseller->bank_name = $request->get('bank_name');
            $reseller->bank_branch = $request->get('bank_branch');
            $reseller->account_or_iban_no = $request->get('account_or_iban_no');
            $reseller->money_transfer_no = $request->get('money_transfer_no');
            $reseller->money_transfer_service = $request->get('money_transfer_service');
            $reseller->status = $request->get('status');

            if($request->cnic_front != null){

                $cnic_front_image = $request->file('cnic_front');
                $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
                $cnic_front_image->storeAs('/images/resellerImages',$cnic_front_image_name);

                $reseller->cnic_front = $cnic_front_image_name;

                $reseller->save();

            }
            else{

                $front_image = $reseller->cnic_front;
                $reseller->cnic_front = $front_image;
                $reseller->save();

            }

            if($request->cnic_back != null){

                $cnic_back_image = $request->file('cnic_back');
                $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
                $cnic_back_image->storeAs('/images/resellerImages',$cnic_back_image_name);

                $reseller->cnic_back = $cnic_back_image_name;

                $reseller->save();

            }
            else{

                $back_image = $reseller->cnic_back;
                $reseller->cnic_back = $back_image;

                $reseller->save();

            }

            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if (!empty($request->password)){
                $user->password = Hash::make($request->password);
                $user->o_auth = $request->password;
            }

            $user->save();

            $userId = $user->id;

            $reseller->users()->detach();
            $reseller->users()->attach($userId);

            Session::flash('message','Reseller Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('reseller.index');
        }
        else{

            Session::flash('message','Reseller Already exists with this CNIC');
            Session::flash('alert-type','error');
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        $reseller_user = Reseller::with(['users'])->where('id',$reseller->id)->first();
        $user = $reseller_user->users()->first();

        $reseller->users()->detach();

        $user->delete();
        $reseller->delete();

        Session::flash('message','Reseller Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('reseller.index');
    }


    public function catalogue()
    {
        return view('reseller.catalogues.view_catalogue');
    }


     public function catalogue_products(Catalogue $catalogue)
    {



        $cat = CatalogueProduct::where('catalogue_id',$catalogue->id)->get();

        return view('reseller.catalogues.view_catalogue',['catalogue'=>$catalogue,'cat'=>$cat]);
    }


  //    public function exportimage()
  //   {
  //      // Browsershot::url('https://example.com')->save($pathToImage);
  //       Browsershot::url('https://example.com')->save('example.pdf');
  // // Browsershot::url('https://example.com')->bodyHtml();
  //       return redirect('/');
  //       // return view('reseller.catalogues.view_catalogue');
  //   }


//     public function exportimage()
// {
//     $content = view('reseller.catalogues.test', ['invoice' => $this])->render();

//     return Browsershot::html($content)
//         ->margins(18, 18, 24, 18)
//         ->format('A4')
//         ->showBackground()
//         ->pdf();
// }

public function exportimage(Catalogue $catalogue){
   // $data = [
   //          'title' => 'Welcome to OnlineWebTutorBlog.com',
   //          'author' => "Sanjay"
   //      ];

          $cat = CatalogueProduct::where('catalogue_id',$catalogue->id)->get();

        // return view('reseller.catalogues.view_catalogue',['catalogue'=>$catalogue,'cat'=>$cat]);
          
        $pdf = PDF::loadView('reseller.catalogues.view_catalogue_pdf', ['catalogue'=>$catalogue,'cat'=>$cat])->setOptions(['defaultFont' => 'sans-serif']);
    
        return $pdf->download('YourCatalogue.pdf');


      

}


public function selectfield(request $req)
{
  
    echo $len = sizeof($req->cat);

  
      if ($len == 1)
{
   $products = Reseller::all($req->cat[0]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =1;
   $pro1=$req->cat[0];
  

   return view('admin.resellers.newindex', compact('pro1','products','len'));
} 


elseif ($len == 2)
{
   $products = Reseller::all($req->cat[0], $req->cat[1]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =2;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];

   return view('admin.resellers.newindex', compact('pro1','pro2','products','len'));
}

else if($len == 3 )
{

   $products = Reseller::all($req->cat[0], $req->cat[1],$req->cat[2]);
   $len =3;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];

   return view('admin.resellers.newindex', compact('pro1','pro2','products','len','pro3'));

}

elseif($len == 4)
{
   $products = Reseller::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3]);

   $len =4;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];

   return view('admin.resellers.newindex', compact('pro1','pro2','products','len','pro3','pro4'));
}

elseif($len == 5)
{
   $products = Reseller::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4]);

   $len =5;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];

   return view('admin.resellers.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5'));
}

elseif($len == 6)
{
   $products = Reseller::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4],$req->cat[5]);
    $len =6;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];
   $pro6=$req->cat[5];

   return view('admin.resellers.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5','pro6'));
}


}
public function reseller_account()
{
    $reseller = reseller::all();
    return view ('admin.resellers.choosereseller' , compact('reseller'));
}

public function selectreseller(request $req)
{

   $reseller_id = ResellerUser::where('reseller_id', $req->reseller)->first()->user_id;
   $resellerwallet = resellerwallet::where('reseller_id',$reseller_id)->get();
    return view ('admin.resellers.resellerwallet' , compact('resellerwallet'));
}


public function resellerwalletupdate($id)
{

    $wallet = resellerwallet::where('id',$id)->first();
 return view ('admin.resellers.resellerwallet_update' , compact('wallet'));

}

public function resellerwalletedit_post(request $req,$id)
{
   $reseller_wallet_update = resellerwallet::where('id',$id)->first();

   $reseller_wallet_update->reseller_commission_recieved = $req->recieve;

   $reseller_wallet_update->save();


          Session::flash('message','Wallet Updated Successfully ');
        Session::flash('alert-type','success');

  return back();



}


public function sales_report()
{
$user_id = Auth::User()->id;

 $orderdetail = orderdetail::where('user_id',$user_id)->get();
  return view('reseller.saleorderreport',['orders'=>$orderdetail]);

}

public function sales_report_twodates(request $req)
{

$from = $req->from;
 $to = $req->to;
$user_id = Auth::User()->id;
    $orderdetail = orderdetail::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->where('user_id',$user_id)->get();
  return view('reseller.saleorderreport',['orders'=>$orderdetail])->render();

}

public function order_status()
{
$user_id = Auth::User()->id;

 $orderdetail = orderdetail::where('user_id',$user_id)->get();
  return view('reseller.orderstatusreport',['orders'=>$orderdetail]);

}

public function order_status_twodates(Request $req)
{
$from = $req->from;
 $to = $req->to;
$user_id = Auth::User()->id;
    $orderdetail = orderdetail::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->where('user_id',$user_id)->get();
  return view('reseller.orderstatusreport',['orders'=>$orderdetail])->render();

}


public function discount_report()
{
$user_id = Auth::User()->id;

$reselleruser = ResellerUser::where('user_id',$user_id)->first();
$resellerid = $reselleruser->reseller_id;


 $discountdetail = GeneralDiscount::where('specific_deal_for',$resellerid)->get();
  return view('reseller.discountorderreport',['discounts'=>$discountdetail]);

}


public function discount_report_twodates(request $req)
{
$from = $req->from;
$to = $req->to;
$user_id = Auth::User()->id;

$reselleruser = ResellerUser::where('user_id',$user_id)->first();
$resellerid = $reselleruser->reseller_id;


   $discountdetail = GeneralDiscount::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->where('specific_deal_for',$resellerid)->get();

  return view('reseller.discountorderreport',['discounts'=>$discountdetail])->render();

}

public function offer_report()
{
$user_id = Auth::User()->id;

$reselleruser = ResellerUser::where('user_id',$user_id)->first();
$resellerid = $reselleruser->reseller_id;

$offer = Offer::where('specific_deal_for',$resellerid)->get();
  return view('reseller.offerreport',['offers'=>$offer]);

}

public function offer_report_twodates(Request $req)
{
$from = $req->from;
 $to = $req->to;
$user_id = Auth::User()->id;

$reselleruser = ResellerUser::where('user_id',$user_id)->first();
$resellerid = $reselleruser->reseller_id;

   $offer = Offer::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->where('specific_deal_for',$resellerid)->get();

    return view('reseller.offerreport',['offers'=>$offer])->render();
}

}
