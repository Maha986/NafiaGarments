<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Models\Asset;
use App\Models\bankpaymentvoucher;
use App\Models\cashpaymentvoucher;
use App\Models\bankrecievevoucher;
use App\Models\cashrecievevoucher;
use App\Models\journalvoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */




    public function voucher_store(request $req)
    {
        //
        $bankpaymentvoucher = new bankpaymentvoucher;
        $bankpaymentvoucher->voucher_no = "asdas23123";
        $bankpaymentvoucher->date = $req->date;
        $bankpaymentvoucher->paid_to = $req->paid;
        $bankpaymentvoucher->account_code = $req->accountcode;
        $bankpaymentvoucher->particular = $req->particular;
        $bankpaymentvoucher->debit = $req->debit;
        $bankpaymentvoucher->credit = $req->credit;
        $bankpaymentvoucher->total = $req->total;
        $bankpaymentvoucher->account_number_reference = $req->accountnumber;
        $bankpaymentvoucher->cheque_no = $req->chequeno;
        $bankpaymentvoucher->save();


        $cashpaymentvoucher = new cashpaymentvoucher;
        $cashpaymentvoucher->voucher_no = "asdas23123";
        $cashpaymentvoucher->date = $req->date;
        $cashpaymentvoucher->paid_to = $req->paid;
        $cashpaymentvoucher->account_code = $req->accountcode;
        $cashpaymentvoucher->particular = $req->particular;
        $cashpaymentvoucher->debit = $req->debit;
        $cashpaymentvoucher->credit = $req->credit;
        $cashpaymentvoucher->total = $req->total;
        $cashpaymentvoucher->save();


        $bankrecievevoucher = new bankrecievevoucher;
        $bankrecievevoucher->voucher_no = "asdas23123";
        $bankrecievevoucher->date = $req->date;
        $bankrecievevoucher->recieved_from = $req->recievefrom;
        $bankrecievevoucher->account_code = $req->accountcode;
        $bankrecievevoucher->particular = $req->particular;
        $bankrecievevoucher->debit = $req->debit;
        $bankrecievevoucher->credit = $req->credit;
        $bankrecievevoucher->total = $req->total;
        $bankrecievevoucher->account_number_reference = $req->accountnumber;
        $bankrecievevoucher->cheque_no = $req->chequeno;
        $bankrecievevoucher->save();



        $cashrecievevoucher = new cashrecievevoucher;
        $cashrecievevoucher->voucher_no = "asdas23123";
        $cashrecievevoucher->date = $req->date;
        $cashrecievevoucher->recieved_from = $req->recievefrom;
        $cashrecievevoucher->account_code = $req->accountcode;
        $cashrecievevoucher->particular = $req->particular;
        $cashrecievevoucher->debit = $req->debit;
        $cashrecievevoucher->credit = $req->credit;
        $cashrecievevoucher->total = $req->total;
        $cashrecievevoucher->save();


        $journalvoucher = new journalvoucher;
        $journalvoucher->voucher_no = "asdas23123";
        $journalvoucher->date = $req->date;
        $journalvoucher->ledger_reference = $req->ledger;
        $journalvoucher->account_code = $req->accountcode;
        $journalvoucher->particular = $req->particular;
        $journalvoucher->debit = $req->debit;
        $journalvoucher->credit = $req->credit;
        $journalvoucher->total = $req->total;
        $journalvoucher->save();

 
        // Session::flash('message','All Vouchers Created Succesfully');
        // Session::flash('alert-type','success');
      return back()->with('success','All Vouchers Created Succesfully');       // return view('admin.voucher.vouchers');
    }


    public function voucher()
    {
        //
        return view('admin.voucher.vouchers');
    }


    public function index()
    {
        //
        return view('admin.assets.index',['assets' => Asset::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $asset = new Asset;

     
       $asset->serialnumber = $request->serialnumber;
       $asset->category_id = $request->category_id;
       $asset->description = $request->description;
       $asset->debit = $request->debit;
       $asset->credit = $request->credit;
       $asset->date = $request->date;

       $asset->save();
       return back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $asset = Asset::find($id);
        $asset->fill($request->all())->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $asset = Asset::find($id);
        $asset->delete();
        return redirect()->back();
    }
}
