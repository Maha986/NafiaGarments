<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\ColourImageProductSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buy_1_get_1_frees = Offer::where('offer','Buy One Get One Free')->get();

        $free_deliveries = Offer::where('offer','Free Delivery')->get();

        $voucher_codes = Offer::where('offer','Voucher Code')->get();

        return view('admin.offers.index',['voucher_codes'=>$voucher_codes,'free_deliveries'=>$free_deliveries,'buy_1_get_1_frees'=>$buy_1_get_1_frees]);
    }

    public function buy_1_get_1_offer_create(){

        $products = Product::where('status',1)->get();

        return view('admin.offers.buy_1_get_1_offers.create',['products'=>$products]);

    }

    public function buy_1_get_1_offer_pdf(){

        // $products = Product::where('status',1)->get();

        // return view('admin.offers.buy_1_get_1_offers.create',['products'=>$products]);
       $offer = Offer::all();
        $pdf = PDF::loadView('admin.offers.offers_pdf',['offer'=> $offer])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('All_offers.pdf');

    }

   

    public function free_delivery_create(){

        $products = Product::where('status',1)->get();

        return view('admin.offers.free_deliveries.create',['products'=>$products]);

    }

    public function voucher_code_create(){

        return view('admin.offers.voucher_codes.create');

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
    }

    public function buy_1_get_1_offer_store(Request $request)
    {
        $request->validate([

            'product_id' => ['required'],
            'size_id' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $offer = new Offer();

        $offer->offer = 'Buy One Get One Free';
        $offer->product_id = $request->get('product_id');
        $offer->size_id = $request->get('size_id');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->deal_for = $request->get('deal_for');
        $offer->specific_deal_for = $request->get('specific_deal_for');
        $offer->status = $request->get('status');

        $offer->save();

        Session::flash('message','Buy One Get One Free Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');
    }

    public function free_delivery_store(Request $request)
    {
        $request->validate([

            'product_id' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $offer = new Offer();

        $offer->offer = 'Free Delivery';
        $offer->product_id = $request->get('product_id');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->deal_for = $request->get('deal_for');
        $offer->specific_deal_for = $request->get('specific_deal_for');
        $offer->status = $request->get('status');

        $offer->save();

        Session::flash('message','Free Delivery Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');
    }

    public function voucher_code_store(Request $request)
    {
        $request->validate([

            'code' => ['required','string'],
            'minimum_amount' => ['required','numeric','min:1'],
            'discount' => ['required','numeric','min:1','max:100'],
            'no_of_times' => ['nullable','numeric','min:1'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

       
        

$pro_id_ci = ColourImageProductSize::where('product_id',$request->get('product'))->where('colour_id',$request->get('productcolor'))->where('size_id', $request->get('productsize'))->first();
if($pro_id_ci!=null)
{

    $offer = new Offer();

    $offer->offer = 'Voucher Code';
    $offer->code = $request->get('code'); 
    $offer->product_id = $pro_id_ci->id;
    $offer->size_id = $request->get('productsize');
    $offer->color_id = $request->get('productcolor');
    $offer->min_amount = $request->get('minimum_amount');
    $offer->discount = $request->get('discount');
    $offer->no_of_times = $request->get('no_of_times');
    $offer->start_date = $request->get('start_date');
    $offer->end_date = $request->get('end_date');
    $offer->deal_for = $request->get('deal_for');
    $offer->specific_deal_for = $request->get('specific_deal_for');
    $offer->status = $request->get('status');

    $offer->save();

    Session::flash('message','Voucher Code Created Successfully');
    Session::flash('alert-type','success');

    return redirect()->route('offer.index');
}
else
{
    Session::flash('message','We don,t have this product variant');
    Session::flash('alert-type','warning');

    return redirect()->route('offer.index');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    public function buy_1_get_1_offer_edit(Offer $buyonegetone)
    {
        $products = Product::where('status',1)
            ->where('stock_availability',1)
            ->get();

        return view('admin.offers.buy_1_get_1_offers.edit',['offer'=>$buyonegetone,'products'=>$products]);
    }

    public function free_delivery_edit(Offer $freedelivery)
    {
        $products = Product::where('status',1)
            ->where('stock_availability',1)
            ->get();

        return view('admin.offers.free_deliveries.edit',['offer'=>$freedelivery,'products'=>$products]);
    }

    public function voucher_code_edit(Offer $vouchercode)
    {
        return view('admin.offers.voucher_codes.edit',['offer'=>$vouchercode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {

    }

    public function buy_1_get_1_offer_update(Request $request, Offer $buyonegetone)
    {
        $request->validate([

            'product_id' => ['required'],
            'size_id' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $offer = $buyonegetone;

        $offer->offer = 'Buy One Get One Free';
        $offer->product_id = $request->get('product_id');
        $offer->size_id = $request->get('size_id');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->deal_for = $request->get('deal_for');
        $offer->specific_deal_for = $request->get('specific_deal_for');
        $offer->status = $request->get('status');

        $offer->save();

        Session::flash('message','Buy One Get One Free Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');

    }

    public function free_delivery_update(Request $request, Offer $freedelivery)
    {
        $request->validate([

            'product_id' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $offer = $freedelivery;

        $offer->product_id = $request->get('product_id');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->deal_for = $request->get('deal_for');
        $offer->specific_deal_for = $request->get('specific_deal_for');
        $offer->status = $request->get('status');

        $offer->save();

        Session::flash('message','Free Delivery Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');

    }

    public function voucher_code_update(Request $request, Offer $vouchercode)
    {
        $request->validate([

            'code' => ['required','string'],
            'minimum_amount' => ['required','numeric','min:1'],
            'discount' => ['required','numeric','min:1','max:100'],
            'no_of_times' => ['nullable','numeric','min:1'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $offer = $vouchercode;

        $offer->code = $request->get('code');
        $offer->min_amount = $request->get('minimum_amount');
        $offer->discount = $request->get('discount');
        $offer->no_of_times = $request->get('no_of_times');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->deal_for = $request->get('deal_for');
        $offer->specific_deal_for = $request->get('specific_deal_for');
        $offer->status = $request->get('status');

        $offer->save();

        Session::flash('message','Voucher Code Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }

    public function buy_1_get_1_offer_destroy(Offer $buyonegetone)
    {

        $buyonegetone->delete();

        Session::flash('message','Buy One Get One Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');
    }

    public function free_delivery_destroy(Offer $freedelivery)
    {

        $freedelivery->delete();

        Session::flash('message','Free Delivery Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');
    }

    public function voucher_code_destroy(Offer $vouchercode)
    {

        $vouchercode->delete();

        Session::flash('message','Voucher Code Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('offer.index');
    }

    public function buy_1_get_1_offer_status(Request $request, Offer $buyonegetone)
    {
        if(!empty($request->buy_1_get_1_offer)){

            if($buyonegetone->status == 0){

                $buyonegetone->status = 1;

                $buyonegetone->save();

                Session::flash('message','Buy One Get One Offer Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');

            }
            elseif($buyonegetone->status == 1){

                $buyonegetone->status = 0;

                $buyonegetone->save();

                Session::flash('message','Buy One Get One Offer InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');
            }

        }
    }

    public function free_delivery_status(Request $request, Offer $freedelivery)
    {
        if(!empty($request->free_delivery)){

            if($freedelivery->status == 0){

                $freedelivery->status = 1;

                $freedelivery->save();

                Session::flash('message','Free Delivery Offer Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');

            }
            elseif($freedelivery->status == 1){

                $freedelivery->status = 0;

                $freedelivery->save();

                Session::flash('message','Free Delivery Offer InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');
            }

        }
    }

    public function voucher_code_status(Request $request, Offer $vouchercode)
    {
        if(!empty($request->voucher_code)){

            if($vouchercode->status == 0){

                $vouchercode->status = 1;

                $vouchercode->save();

                Session::flash('message','Voucher Code Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');

            }
            elseif($vouchercode->status == 1){

                $vouchercode->status = 0;

                $vouchercode->save();

                Session::flash('message','Voucher Code InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('offer.index');
            }
        }
    }

    public function coupon_check(Request $request){

        $request->validate([

            'coupon_code' => ['required'],
        ]);

        $customer = \App\Models\CustomerUser::where('user_id',auth()->user())->first();

        if(!is_null($customer)){

            $customer = $customer->id;

        }

        $checkCode = Offer::where('code',$request->coupon_code)
            ->where('status',1)
            ->where('no_of_times','>=',1)
            ->where('min_amount','<=',$request->total_amount)
            ->where('deal_for','customer')
            ->where('specific_deal_for',$customer)
            ->first();

        if(!empty($checkCode)){

            Session::flash('message','Voucher Code Applied Successfully');
            Session::flash('alert-type','success');

            Session::put(['vouchercode'=>$checkCode]);

            return redirect('checkout');

        }
        else{

            Session::flash('message','Voucher Code expired');
            Session::flash('alert-type','error');
            return back();

        }



    }

}
