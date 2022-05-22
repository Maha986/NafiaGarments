<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\riderproductorder;
use App\Models\User;
use App\Models\RiderUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PDF;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     


    public function index()
    {
        $riders =  Rider::all();

        return view('admin.riders.index',['riders'=>$riders]);
    }


        public function index_date(request $req)
    {
        


        $from = $req->from;
        $to = $req->to;

      $riders =  Rider::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
   return view('admin.riders.index',['riders'=>$riders])->render();


    }
    


 public function index_pdf()
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $riders =  Rider::all();
          
    $pdf = PDF::loadView('admin.riders.index_pdf',['riders'=>$riders])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('allriders.pdf');
    }

     public function index_pdf1($pro1)
    {

    $products =  Rider::all($pro1);
          
    $pdf = PDF::loadView('admin.riders.index_pdf1',['products'=> $products,'pro1'=>$pro1])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }

     public function index_pdf2($pro1,$pro2)
    {

    $products =  Rider::all($pro1,$pro2);
          
    $pdf = PDF::loadView('admin.riders.index_pdf2',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }

      public function index_pdf3($pro1,$pro2,$pro3)
    {

    $products =  Rider::all($pro1,$pro2,$pro3);
          
    $pdf = PDF::loadView('admin.riders.index_pdf3',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }

      public function index_pdf4($pro1,$pro2,$pro3,$pro4)
    {

    $products =  Rider::all($pro1,$pro2,$pro3,$pro4);
          
    $pdf = PDF::loadView('admin.riders.index_pdf4',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }


     public function index_pdf5($pro1,$pro2,$pro3,$pro4,$pro5)
    {

    $products =  Rider::all($pro1,$pro2,$pro3,$pro4,$pro5);
          
    $pdf = PDF::loadView('admin.riders.index_pdf5',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }

        public function index_pdf6($pro1,$pro2,$pro3,$pro4,$pro5,$pro6)
    {

    $products =  Rider::all($pro1,$pro2,$pro3,$pro4,$pro5,$pro6);
          
    $pdf = PDF::loadView('admin.riders.index_pdf6',['products'=> $products,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'pro6'=>$pro6])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('riders_fileds.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.riders.create');
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
            'address'=> ['required', 'string','max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'cnic_no'=> 'required|string|max:255',
             'riderimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $checkCnicNo = Rider::where('cnic_no',$request->cnic_no)->get();

        if(sizeof($checkCnicNo) == false){

            $rider = new Rider();

            $rider->name = $request->get('name');
            $rider->address = $request->get('address');
            $rider->city = $request->get('city');
            $rider->area = $request->get('area');
            $rider->contact = $request->get('contact');
            $rider->cnic_no = $request->get('cnic_no');
            $rider->messaging_service_no = $request->get('messaging_service_no');
            $rider->messaging_service_name = $request->get('messaging_service_name');
            $rider->email = $request->get('email');
            $rider->bank_account_title = $request->get('bank_account_title');
            $rider->bank_name = $request->get('bank_name');
            $rider->bank_branch = $request->get('bank_branch');
            $rider->account_or_iban_no = $request->get('account_or_iban_no');
            $rider->money_transfer_no = $request->get('money_transfer_no');
            $rider->money_transfer_service = $request->get('money_transfer_service');
            $rider->status = $request->get('status');

            // for image 1
            $riderr = $request->file('riderimage');
            $rider_image = $riderr->getClientOriginalName();
     $riderr->storeAs('/images/riderImages',$rider_image);

            $rider->rider_image =  $rider_image;
          // end for image 1


 // for image 2
            $cnic_front_image = $request->file('cnic_front');
            $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
            $cnic_front_image->storeAs('/images/riderImages',$cnic_front_image_name);

            $rider->cnic_front = $cnic_front_image_name;
// end for image 2      

// for image 3
            $cnic_back_image = $request->file('cnic_back');
            $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
            $cnic_back_image->storeAs('/images/riderImages',$cnic_back_image_name);

            $rider->cnic_back = $cnic_back_image_name;

            // end for image 3

            $rider->save();

            $user = new User();

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->password);
            $user->o_auth = $request->password;

            $user->assignRole('rider');

            $user->save();

            $userId = $user->id;

            $rider->users()->attach($userId);

            Session::flash('message','Rider Added Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('rider.index');

        }
        else{

            Session::flash('message','Rider Already exists with this CNIC');
            Session::flash('alert-type','warning');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        return view('admin.riders.edit',['rider'=>$rider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rider $rider)
    {
        $rider_user = Rider::with(['users'])->where('id',$rider->id)->first();
        $user = $rider_user->users()->first();

        $request->validate([
            'name'=> ['required', 'max:255'],
            'address'=> ['required', 'string','max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'cnic_no'=> 'required|string|max:255',
            'cnic_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cnic_back'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:5'],
            'bank_account_title'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_or_iban_no'=> 'required|string|max:255',
            'money_transfer_no'=> 'required|string|max:255',
            'money_transfer_service'=> 'required|string|max:255',
            'status'=> 'required',
        ]);

        $checkCnicNo = Rider::where('cnic_no',$request->cnic_no)->get();

        if(sizeof($checkCnicNo) == false || $rider->cnic_no == $request->cnic_no){

            $rider->name = $request->get('name');
            $rider->address = $request->get('address');
            $rider->city = $request->get('city');
            $rider->area = $request->get('area');
            $rider->contact = $request->get('contact');
            $rider->cnic_no = $request->get('cnic_no');
            $rider->messaging_service_no = $request->get('messaging_service_no');
            $rider->messaging_service_name = $request->get('messaging_service_name');
            $rider->email = $request->get('email');
            $rider->bank_account_title = $request->get('bank_account_title');
            $rider->bank_name = $request->get('bank_name');
            $rider->bank_branch = $request->get('bank_branch');
            $rider->account_or_iban_no = $request->get('account_or_iban_no');
            $rider->money_transfer_no = $request->get('money_transfer_no');
            $rider->money_transfer_service = $request->get('money_transfer_service');
            $rider->status = $request->get('status');

            if($request->cnic_front != null){

                $cnic_front_image = $request->file('cnic_front');
                $cnic_front_image_name = $cnic_front_image->getClientOriginalName();
                $cnic_front_image->storeAs('/images/riderImages',$cnic_front_image_name);

                $rider->cnic_front = $cnic_front_image_name;

                $rider->save();

            }
            else{

                $rider->save();
            }

            if($request->cnic_back != null){

                $cnic_back_image = $request->file('cnic_back');
                $cnic_back_image_name = $cnic_back_image->getClientOriginalName();
                $cnic_back_image->storeAs('/images/riderImages',$cnic_back_image_name);

                $rider->cnic_back = $cnic_back_image_name;

                $rider->save();
            }
            else{

                $rider->save();

            }

            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if (!empty($request->password)){
                $user->password = Hash::make($request->password);
                $user->o_auth = $request->password;
            }

            $user->save();

            $userId = $user->id;

            $rider->users()->detach();
            $rider->users()->attach($userId);

            Session::flash('message','Rider Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('rider.index');


        }
        else{

            Session::flash('message','Rider Already exists with this CNIC');
            Session::flash('alert-type','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        $rider_user = Rider::with(['users'])->where('id',$rider->id)->first();
        $user = $rider_user->users()->first();

        $rider->users()->detach();

        $user->delete();
        $rider->delete();

        Session::flash('message','Rider Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('rider.index');
    }


    public function selectfield(request $req)
{
  
    echo $len = sizeof($req->cat);

  
      if ($len == 1)
{
   $products = Rider::all($req->cat[0]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =1;
   $pro1=$req->cat[0];
  

   return view('admin.riders.newindex', compact('pro1','products','len'));
} 


elseif ($len == 2)
{
   $products = Rider::all($req->cat[0], $req->cat[1]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =2;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];

   return view('admin.riders.newindex', compact('pro1','pro2','products','len'));
}

else if($len == 3 )
{

   $products = Rider::all($req->cat[0], $req->cat[1],$req->cat[2]);
   $len =3;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];

   return view('admin.riders.newindex', compact('pro1','pro2','products','len','pro3'));

}

elseif($len == 4)
{
   $products = Rider::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3]);

   $len =4;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];

   return view('admin.riders.newindex', compact('pro1','pro2','products','len','pro3','pro4'));
}

elseif($len == 5)
{
   $products = Rider::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4]);

   $len =5;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];

   return view('admin.riders.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5'));
}

elseif($len == 6)
{
   $products = Rider::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4],$req->cat[5]);
    $len =6;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];
   $pro6=$req->cat[5];

   return view('admin.riders.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5','pro6'));
}


}
}
