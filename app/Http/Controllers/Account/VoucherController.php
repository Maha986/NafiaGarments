<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Models\Asset;
use App\Models\Liability;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Equity;
use App\Models\bankpaymentvoucher;
use App\Models\bankpayment2voucher;
use App\Models\cashpaymentvoucher;
use App\Models\cashpayment2voucher;
use App\Models\bankrecievevoucher;
use App\Models\bankrecieve2voucher;
use App\Models\cashrecievevoucher;
use App\Models\cashrecieve2voucher;
use App\Models\journalvoucher;
use App\Models\journal2voucher;
use App\Models\header;
use App\Models\subheader;
use App\Models\thirdsubheader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class VoucherController extends Controller
{
    //



  public function bankpaymentvoucher()
    {
    	return view('admin.voucher.bankpaymentvoucher');
    }


    public function cashpaymentvoucher()
    {
    	return view('admin.voucher.cashpaymentvoucher');
    }


     public function bankrecievevoucher()
    {
    	return view('admin.voucher.bankrecievevoucher');
    }

       public function cashrecievevoucher()
    {
    	return view('admin.voucher.cashrecievevoucher');
    }

       public function journalvoucher()
    {
    	return view('admin.voucher.journalvoucher');
    }


  public function selectSearch(Request $request)
    {
    	$headers = [];

        if($request->has('q')){
            $search = $request->q;
            $headers =thirdsubheader::select("code", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($headers);
    }



    public function bankpaymentvoucher_post(request $req)
    {
        

if( array_sum($req->debit) == array_sum($req->credit) )
{
        $randomString = Str::random(5);

        $bankpaymentvoucher = new bankpaymentvoucher;
        $bankpaymentvoucher->voucher_no = $randomString;
        $bankpaymentvoucher->date = $req->date;
        $bankpaymentvoucher->paid_to = $req->paid;
        // $bankpaymentvoucher->account_code = $req->accountcode;
        // $bankpaymentvoucher->particular = $req->particular;
        // $bankpaymentvoucher->debit = $req->debit;
        // $bankpaymentvoucher->credit = $req->credit;
        $bankpaymentvoucher->total = $req->total;
        $bankpaymentvoucher->account_number_reference = $req->accountnumber;
        $bankpaymentvoucher->cheque_no = $req->chequeno;
        $bankpaymentvoucher->save();

        $bankpaymentvoucher_id = bankpaymentvoucher::all()->last()->id;

        
        $banklen_account = sizeof($req->accountcode);
        $banklen_particular = sizeof($req->particular);
        $banklen_debit = sizeof($req->debit);
        $banklen_credit = sizeof($req->credit);

for ($i=0; $i < $banklen_account; $i++)
 {
    
    $bank2 = new bankpayment2voucher;
    $bank2->bankpaymentvoucher_id = $bankpaymentvoucher_id;
    $bank2->account_code = $req->accountcode[$i];
    $bank2->particular = $req->particular[$i];
    $bank2->debit = $req->debit[$i];
    $bank2->credit = $req->credit[$i];

    $bank2->save();
 

          $code_of_thirdsubheader = thirdsubheader::where('code',$req->accountcode[$i])->first();
          $thirdsubheader_id = $code_of_thirdsubheader->subheader_id;   //17

          $subheader = subheader::where('id',$thirdsubheader_id)->first();
          $subheader_id = $subheader->header_id;

          $header = header::where('id',$subheader_id)->first();
          $mainheader =  $header->name;

          if($mainheader == 'assets')
          {
             $asset = new Asset;

             $asset->serialnumber = $req->accountcode[$i];
             $asset->category_id = "1";
             $asset->description = $req->particular[$i];
             $asset->debit = $req->debit[$i];
             $asset->credit = $req->credit[$i];
             $asset->date = $req->date;

             $asset->save();
             // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'liability')
          {   
          	$liability = new Liability;
          $liability->serialnumber = $req->accountcode[$i];
            $liability->category_id = "2";
            $liability->description = $req->particular[$i];
            $liability->debit = $req->debit[$i];
            $liability->credit = $req->credit[$i];
            $liability->date = $req->date;

            $liability->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'equity')
          {
            $equity = new Equity;

     
            $equity->serialnumber = $req->accountcode[$i];
            $equity->category_id ="3";
            $equity->description = $req->particular[$i];
            $equity->debit = $req->debit[$i];
            $equity->credit = $req->credit[$i];
            $equity->date = $req->date;

            $equity->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if ($mainheader == 'income')
          {
            $income = new Income;

     
            $income->serialnumber = $req->accountcode[$i];
            $income->category_id = "4";
            $income->description = $req->particular[$i];
            $income->debit = $req->debit[$i];
            $income->credit = $req->credit[$i];
            $income->date = $req->date;

            $income->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'expenses')
          {
            $expense = new Expense;

     
            $expense->serialnumber = $req->accountcode[$i];
            $expense->category_id = "5";
            $expense->description = $req->particular[$i];
            $expense->debit = $req->debit[$i];
            $expense->credit = $req->credit[$i];
            $expense->date = $req->date;

            $expense->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }
          else 
          {
          	echo "no data found";
          }
        

}
        return back()->with('success',' Vouchers Created Succesfully');  

}
else 
{
   return back()->with('warning',' Debit & Credit Are Not Matched !');
}
   } 


public function cashpaymentvoucher_post(request $req)
   {

    if( array_sum($req->debit) == array_sum($req->credit) )
{
        $randomString = Str::random(5);

        $cashpaymentvoucher = new cashpaymentvoucher;
        $cashpaymentvoucher->voucher_no = $randomString;
        $cashpaymentvoucher->date = $req->date;
        $cashpaymentvoucher->paid_to = $req->paid;
        // $cashpaymentvoucher->account_code = $req->accountcode;
        // $cashpaymentvoucher->particular = $req->particular;
        // $cashpaymentvoucher->debit = $req->debit;
        // $cashpaymentvoucher->credit = $req->credit;
        $cashpaymentvoucher->total = $req->total;
        $cashpaymentvoucher->save();

        $cashpaymentvoucher_id = cashpaymentvoucher::all()->last()->id;

        
        $banklen_account = sizeof($req->accountcode);
        $banklen_particular = sizeof($req->particular);
        $banklen_debit = sizeof($req->debit);
        $banklen_credit = sizeof($req->credit);

          
for ($i=0; $i < $banklen_account; $i++)
 {
    
    $bank2 = new cashpayment2voucher;
    $bank2->cashpaymentvoucher_id = $cashpaymentvoucher_id;
    $bank2->account_code = $req->accountcode[$i];
    $bank2->particular = $req->particular[$i];
    $bank2->debit = $req->debit[$i];
    $bank2->credit = $req->credit[$i];

    $bank2->save();
 

          $code_of_thirdsubheader = thirdsubheader::where('code',$req->accountcode[$i])->first();
          $thirdsubheader_id = $code_of_thirdsubheader->subheader_id;   //17

          $subheader = subheader::where('id',$thirdsubheader_id)->first();
          $subheader_id = $subheader->header_id;

          $header = header::where('id',$subheader_id)->first();
          $mainheader =  $header->name;

          if($mainheader == 'assets')
          {
             $asset = new Asset;

             $asset->serialnumber = $req->accountcode[$i];
             $asset->category_id = "1";
             $asset->description = $req->particular[$i];
             $asset->debit = $req->debit[$i];
             $asset->credit = $req->credit[$i];
             $asset->date = $req->date;

             $asset->save();
             // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'liability')
          {   
            $liability = new Liability;
          $liability->serialnumber = $req->accountcode[$i];
            $liability->category_id = "2";
            $liability->description = $req->particular[$i];
            $liability->debit = $req->debit[$i];
            $liability->credit = $req->credit[$i];
            $liability->date = $req->date;

            $liability->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'equity')
          {
            $equity = new Equity;

     
            $equity->serialnumber = $req->accountcode[$i];
            $equity->category_id ="3";
            $equity->description = $req->particular[$i];
            $equity->debit = $req->debit[$i];
            $equity->credit = $req->credit[$i];
            $equity->date = $req->date;

            $equity->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if ($mainheader == 'income')
          {
            $income = new Income;

     
            $income->serialnumber = $req->accountcode[$i];
            $income->category_id = "4";
            $income->description = $req->particular[$i];
            $income->debit = $req->debit[$i];
            $income->credit = $req->credit[$i];
            $income->date = $req->date;

            $income->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'expenses')
          {
            $expense = new Expense;

     
            $expense->serialnumber = $req->accountcode[$i];
            $expense->category_id = "5";
            $expense->description = $req->particular[$i];
            $expense->debit = $req->debit[$i];
            $expense->credit = $req->credit[$i];
            $expense->date = $req->date;

            $expense->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }
          else 
          {
            echo "no data found";
          }
        

}
        return back()->with('success',' Vouchers Created Succesfully');  
      }
else 
{
   return back()->with('warning',' Debit & Credit Are Not Matched !');
}

          }


      public function bankrecievevoucher_post(request $req)
           {

if( array_sum($req->debit) == array_sum($req->credit) )
{  
        $bankrecievevoucher = new bankrecievevoucher;
        $bankrecievevoucher->voucher_no = "asdas23123";
        $bankrecievevoucher->date = $req->date;
        $bankrecievevoucher->recieved_from = $req->recievefrom;
        // $bankrecievevoucher->account_code = $req->accountcode;
        // $bankrecievevoucher->particular = $req->particular;
        // $bankrecievevoucher->debit = $req->debit;
        // $bankrecievevoucher->credit = $req->credit;
        $bankrecievevoucher->total = $req->total;
        $bankrecievevoucher->account_number_reference = $req->accountnumber;
        $bankrecievevoucher->cheque_no = $req->chequeno;
        $bankrecievevoucher->save();

        $bankrecievevoucherr_id = bankrecievevoucher::all()->last()->id;

        
        $banklen_account = sizeof($req->accountcode);
        $banklen_particular = sizeof($req->particular);
        $banklen_debit = sizeof($req->debit);
        $banklen_credit = sizeof($req->credit);

       for ($i=0; $i < $banklen_account; $i++)
 {
    
    $bank2 = new bankrecieve2voucher;
    $bank2->bankrecievevoucher_id = $bankrecievevoucherr_id;
    $bank2->account_code = $req->accountcode[$i];
    $bank2->particular = $req->particular[$i];
    $bank2->debit = $req->debit[$i];
    $bank2->credit = $req->credit[$i];

    $bank2->save();
 

          $code_of_thirdsubheader = thirdsubheader::where('code',$req->accountcode[$i])->first();
          $thirdsubheader_id = $code_of_thirdsubheader->subheader_id;   //17

          $subheader = subheader::where('id',$thirdsubheader_id)->first();
          $subheader_id = $subheader->header_id;

          $header = header::where('id',$subheader_id)->first();
          $mainheader =  $header->name;

          if($mainheader == 'assets')
          {
             $asset = new Asset;

             $asset->serialnumber = $req->accountcode[$i];
             $asset->category_id = "1";
             $asset->description = $req->particular[$i];
             $asset->debit = $req->debit[$i];
             $asset->credit = $req->credit[$i];
             $asset->date = $req->date;

             $asset->save();
             // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'liability')
          {   
            $liability = new Liability;
          $liability->serialnumber = $req->accountcode[$i];
            $liability->category_id = "2";
            $liability->description = $req->particular[$i];
            $liability->debit = $req->debit[$i];
            $liability->credit = $req->credit[$i];
            $liability->date = $req->date;

            $liability->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'equity')
          {
            $equity = new Equity;

     
            $equity->serialnumber = $req->accountcode[$i];
            $equity->category_id ="3";
            $equity->description = $req->particular[$i];
            $equity->debit = $req->debit[$i];
            $equity->credit = $req->credit[$i];
            $equity->date = $req->date;

            $equity->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if ($mainheader == 'income')
          {
            $income = new Income;

     
            $income->serialnumber = $req->accountcode[$i];
            $income->category_id = "4";
            $income->description = $req->particular[$i];
            $income->debit = $req->debit[$i];
            $income->credit = $req->credit[$i];
            $income->date = $req->date;

            $income->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'expenses')
          {
            $expense = new Expense;

     
            $expense->serialnumber = $req->accountcode[$i];
            $expense->category_id = "5";
            $expense->description = $req->particular[$i];
            $expense->debit = $req->debit[$i];
            $expense->credit = $req->credit[$i];
            $expense->date = $req->date;

            $expense->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }
          else 
          {
            echo "no data found";
          }
        

}


        return back()->with('success',' Vouchers Created Succesfully'); 
  }

  else 
  {
    return back()->with('warning',' Debit & Credit Are Not Matched !');
  }

          }


public function cashrecievevoucher_post(request $req)
           {
if( array_sum($req->debit) == array_sum($req->credit) )
{ 

         $cashrecievevoucher = new cashrecievevoucher;
        $cashrecievevoucher->voucher_no = "asdas23123";
        $cashrecievevoucher->date = $req->date;
        $cashrecievevoucher->recieved_from = $req->recievefrom;
        // $cashrecievevoucher->account_code = $req->accountcode;
        // $cashrecievevoucher->particular = $req->particular;
        // $cashrecievevoucher->debit = $req->debit;
        // $cashrecievevoucher->credit = $req->credit;
        $cashrecievevoucher->total = $req->total;
        $cashrecievevoucher->save();


        $cashrecievevoucher_id = cashrecievevoucher::all()->last()->id;

        
        $banklen_account = sizeof($req->accountcode);
        $banklen_particular = sizeof($req->particular);
        $banklen_debit = sizeof($req->debit);
        $banklen_credit = sizeof($req->credit);


       for ($i=0; $i < $banklen_account; $i++)
 {
    
    $bank2 = new cashrecieve2voucher;
    $bank2->cashrecievevoucher_id = $cashrecievevoucher_id;
    $bank2->account_code = $req->accountcode[$i];
    $bank2->particular = $req->particular[$i];
    $bank2->debit = $req->debit[$i];
    $bank2->credit = $req->credit[$i];

    $bank2->save();
 

          $code_of_thirdsubheader = thirdsubheader::where('code',$req->accountcode[$i])->first();
          $thirdsubheader_id = $code_of_thirdsubheader->subheader_id;   //17

          $subheader = subheader::where('id',$thirdsubheader_id)->first();
          $subheader_id = $subheader->header_id;

          $header = header::where('id',$subheader_id)->first();
          $mainheader =  $header->name;

          if($mainheader == 'assets')
          {
             $asset = new Asset;

             $asset->serialnumber = $req->accountcode[$i];
             $asset->category_id = "1";
             $asset->description = $req->particular[$i];
             $asset->debit = $req->debit[$i];
             $asset->credit = $req->credit[$i];
             $asset->date = $req->date;

             $asset->save();
             // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'liability')
          {   
            $liability = new Liability;
          $liability->serialnumber = $req->accountcode[$i];
            $liability->category_id = "2";
            $liability->description = $req->particular[$i];
            $liability->debit = $req->debit[$i];
            $liability->credit = $req->credit[$i];
            $liability->date = $req->date;

            $liability->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'equity')
          {
            $equity = new Equity;

     
            $equity->serialnumber = $req->accountcode[$i];
            $equity->category_id ="3";
            $equity->description = $req->particular[$i];
            $equity->debit = $req->debit[$i];
            $equity->credit = $req->credit[$i];
            $equity->date = $req->date;

            $equity->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if ($mainheader == 'income')
          {
            $income = new Income;

     
            $income->serialnumber = $req->accountcode[$i];
            $income->category_id = "4";
            $income->description = $req->particular[$i];
            $income->debit = $req->debit[$i];
            $income->credit = $req->credit[$i];
            $income->date = $req->date;

            $income->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'expenses')
          {
            $expense = new Expense;

     
            $expense->serialnumber = $req->accountcode[$i];
            $expense->category_id = "5";
            $expense->description = $req->particular[$i];
            $expense->debit = $req->debit[$i];
            $expense->credit = $req->credit[$i];
            $expense->date = $req->date;

            $expense->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }
          else 
          {
            echo "no data found";
          }
        

}
  return back()->with('success',' Vouchers Created Succesfully'); 
}
else
{
  return back()->with('warning',' Debit & Credit Are Not Matched !');
}

          }

 public function journalvoucher_post(request $req)
 {

if( array_sum($req->debit) == array_sum($req->credit) )
{ 


    $journalvoucher = new journalvoucher;
        $journalvoucher->voucher_no = "asdas23123";
        $journalvoucher->date = $req->date;
        $journalvoucher->ledger_reference = $req->ledger;
        // $journalvoucher->account_code = $req->accountcode;
        // $journalvoucher->particular = $req->particular;
        // $journalvoucher->debit = $req->debit;
        // $journalvoucher->credit = $req->credit;
        $journalvoucher->total = $req->total;
        $journalvoucher->save();


      $journalvoucher_id = journalvoucher::all()->last()->id;

        
        $banklen_account = sizeof($req->accountcode);
        $banklen_particular = sizeof($req->particular);
        $banklen_debit = sizeof($req->debit);
        $banklen_credit = sizeof($req->credit);

      

       for ($i=0; $i < $banklen_account; $i++)
 {
    
    $bank2 = new journal2voucher;
    $bank2->journalvoucher_id = $journalvoucher_id;
    $bank2->account_code = $req->accountcode[$i];
    $bank2->particular = $req->particular[$i];
    $bank2->debit = $req->debit[$i];
    $bank2->credit = $req->credit[$i];

    $bank2->save();
 

          $code_of_thirdsubheader = thirdsubheader::where('code',$req->accountcode[$i])->first();
          $thirdsubheader_id = $code_of_thirdsubheader->subheader_id;   //17

          $subheader = subheader::where('id',$thirdsubheader_id)->first();
          $subheader_id = $subheader->header_id;

          $header = header::where('id',$subheader_id)->first();
          $mainheader =  $header->name;

          if($mainheader == 'assets')
          {
             $asset = new Asset;

             $asset->serialnumber = $req->accountcode[$i];
             $asset->category_id = "1";
             $asset->description = $req->particular[$i];
             $asset->debit = $req->debit[$i];
             $asset->credit = $req->credit[$i];
             $asset->date = $req->date;

             $asset->save();
             // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'liability')
          {   
            $liability = new Liability;
          $liability->serialnumber = $req->accountcode[$i];
            $liability->category_id = "2";
            $liability->description = $req->particular[$i];
            $liability->debit = $req->debit[$i];
            $liability->credit = $req->credit[$i];
            $liability->date = $req->date;

            $liability->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'equity')
          {
            $equity = new Equity;

     
            $equity->serialnumber = $req->accountcode[$i];
            $equity->category_id ="3";
            $equity->description = $req->particular[$i];
            $equity->debit = $req->debit[$i];
            $equity->credit = $req->credit[$i];
            $equity->date = $req->date;

            $equity->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if ($mainheader == 'income')
          {
            $income = new Income;

     
            $income->serialnumber = $req->accountcode[$i];
            $income->category_id = "4";
            $income->description = $req->particular[$i];
            $income->debit = $req->debit[$i];
            $income->credit = $req->credit[$i];
            $income->date = $req->date;

            $income->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }

          else if($mainheader == 'expenses')
          {
            $expense = new Expense;

     
            $expense->serialnumber = $req->accountcode[$i];
            $expense->category_id = "5";
            $expense->description = $req->particular[$i];
            $expense->debit = $req->debit[$i];
            $expense->credit = $req->credit[$i];
            $expense->date = $req->date;

            $expense->save();
            // return back()->with('success','Bank Payment Voucher Created Succesfully'); 
          }
          else 
          {
            echo "no data found";
          }
        

}
  return back()->with('success',' Vouchers Created Succesfully');

  }

  else 
  {
    return back()->with('warning',' Debit & Credit Are Not Matched !');
  } 

    }


}
