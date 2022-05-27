<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralDiscount;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = GeneralDiscount::where('general_discount','Product')->get();

        $categories = GeneralDiscount::where('general_discount','Category')->get();

        $customers = GeneralDiscount::where('general_discount','Customer')->get();

        $resellers = GeneralDiscount::where('general_discount','Reseller')->get();

        return view('admin.generaldiscounts.index',['resellers'=>$resellers,'customers'=>$customers,'categories'=>$categories,'products'=>$products]);
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

    public function product_discount_create(){

        $products = Product::where('status',1)->get();

        return view('admin.generaldiscounts.products.create',['products'=>$products]);

    }

    public function category_discount_create(){

        $categories = Category::where('parent_id','!=',0)->get();

        return view('admin.generaldiscounts.categories.create',['categories'=>$categories]);

    }

    public function customer_discount_create(){

        $customers = User::all();

        return view('admin.generaldiscounts.customers.create',['customers'=>$customers]);

    }

    public function reseller_discount_create(){

        $resellers = Reseller::all();

        return view('admin.generaldiscounts.resellers.create',['resellers'=>$resellers]);

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

    public function product_discount_store(Request $request)
    {
        $request->validate([

            'product_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $generaldiscount = new GeneralDiscount();

        $generaldiscount->general_discount = 'Product';
        $generaldiscount->product_id = $request->get('product_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->deal_for = $request->get('deal_for');
        $generaldiscount->specific_deal_for = $request->get('specific_deal_for');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Product Discount Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function category_discount_store(Request $request)
    {
        $request->validate([

            'category_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $generaldiscount = new GeneralDiscount();

        $generaldiscount->general_discount = 'Category';
        $generaldiscount->category_id = $request->get('category_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->deal_for = $request->get('deal_for');
        $generaldiscount->specific_deal_for = $request->get('specific_deal_for');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Category Discount Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function customer_discount_store(Request $request)
    {
        $request->validate([

            'customer_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'status' => ['required']
        ]);

        $generaldiscount = new GeneralDiscount();

        $generaldiscount->general_discount = 'Customer';
        $generaldiscount->customer_id = $request->get('customer_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Customer Discount Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function reseller_discount_store(Request $request)
    {
        $request->validate([

            'reseller_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'status' => ['required']
        ]);

        $generaldiscount = new GeneralDiscount();

        $generaldiscount->general_discount = 'Reseller';
        $generaldiscount->reseller_id = $request->get('reseller_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Reseller Discount Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralDiscount  $generalDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralDiscount $generalDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralDiscount  $generalDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralDiscount $generalDiscount)
    {
        //
    }

    public function product_discount_edit(GeneralDiscount $productdiscount)
    {
        $products = Product::where('status',1)
            ->where('stock_availability',1)
            ->get();

        return view('admin.generaldiscounts.products.edit',['generaldiscount'=>$productdiscount,'products'=>$products]);
    }

    public function category_discount_edit(GeneralDiscount $categorydiscount)
    {
        $categories = Category::where('parent_id','!=',0)->get();

        return view('admin.generaldiscounts.categories.edit',['generaldiscount'=>$categorydiscount,'categories'=>$categories]);
    }

    public function customer_discount_edit(GeneralDiscount $customerdiscount)
    {
        $customers = User::all();

        return view('admin.generaldiscounts.customers.edit',['generaldiscount'=>$customerdiscount,'customers'=>$customers]);
    }

    public function reseller_discount_edit(GeneralDiscount $resellerdiscount)
    {
        $resellers = Reseller::all();

        return view('admin.generaldiscounts.resellers.edit',['generaldiscount'=>$resellerdiscount,'resellers'=>$resellers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralDiscount  $generalDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralDiscount $generalDiscount)
    {
        //
    }

    public function product_discount_update(Request $request, GeneralDiscount $productdiscount)
    {
        $request->validate([

            'product_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $generaldiscount = $productdiscount;

        $generaldiscount->product_id = $request->get('product_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->deal_for = $request->get('deal_for');
        $generaldiscount->specific_deal_for = $request->get('specific_deal_for');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Product Discount Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');

    }


    public function category_discount_update(Request $request, GeneralDiscount $categorydiscount)
    {
        $request->validate([

            'category_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'deal_for' => ['required'],
            'status' => ['required']
        ]);

        $generaldiscount = $categorydiscount;

        $generaldiscount->category_id = $request->get('category_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->deal_for = $request->get('deal_for');
        $generaldiscount->specific_deal_for = $request->get('specific_deal_for');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Category Discount Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');

    }

    public function customer_discount_update(Request $request, GeneralDiscount $customerdiscount)
    {
        $request->validate([

            'customer_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'status' => ['required']
        ]);

        $generaldiscount = $customerdiscount;

        $generaldiscount->customer_id = $request->get('customer_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Customer Discount Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');

    }

    public function reseller_discount_update(Request $request, GeneralDiscount $resellerdiscount)
    {
        $request->validate([

            'reseller_id' => ['required'],
            'discount' => ['required','numeric','min:1','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'status' => ['required']
        ]);

        $generaldiscount = $resellerdiscount;

        $generaldiscount->reseller_id = $request->get('reseller_id');
        $generaldiscount->discount = $request->get('discount');
        $generaldiscount->start_date = $request->get('start_date');
        $generaldiscount->end_date = $request->get('end_date');
        $generaldiscount->status = $request->get('status');

        $generaldiscount->save();

        Session::flash('message','Reseller Discount Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralDiscount  $generalDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralDiscount $generalDiscount)
    {
        //
    }

    public function product_discount_destroy(GeneralDiscount $productdiscount)
    {

        $productdiscount->delete();

        Session::flash('message','Product Discount Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function category_discount_destroy(GeneralDiscount $categorydiscount)
    {

        $categorydiscount->delete();

        Session::flash('message','Category Discount Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function customer_discount_destroy(GeneralDiscount $customerdiscount)
    {

        $customerdiscount->delete();

        Session::flash('message','Customer Discount Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function reseller_discount_destroy(GeneralDiscount $resellerdiscount)
    {

        $resellerdiscount->delete();

        Session::flash('message','Reseller Discount Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('general_discount.index');
    }

    public function product_discount_status(Request $request, GeneralDiscount $productdiscount)
    {
        if(!empty($request->product)){

            if($productdiscount->status == 0){

                $productdiscount->status = 1;

                $productdiscount->save();

                Session::flash('message','Product Discount Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');

            }
            elseif($productdiscount->status == 1){

                $productdiscount->status = 0;

                $productdiscount->save();

                Session::flash('message','Product Discount InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');
            }

        }
    }

    public function category_discount_status(Request $request,GeneralDiscount $categorydiscount)
    {
        if(!empty($request->category)){

            if($categorydiscount->status == 0){

                $categorydiscount->status = 1;

                $categorydiscount->save();

                Session::flash('message','Category Discount Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');

            }
            elseif($categorydiscount->status == 1){

                $categorydiscount->status = 0;

                $categorydiscount->save();

                Session::flash('message','Category Discount InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');
            }

        }
    }

    public function customer_discount_status(Request $request, GeneralDiscount $customerdiscount)
    {
        if(!empty($request->customer)){

            if($customerdiscount->status == 0){

                $customerdiscount->status = 1;

                $customerdiscount->save();

                Session::flash('message','Customer Discount Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');

            }
            elseif($customerdiscount->status == 1){

                $customerdiscount->status = 0;

                $customerdiscount->save();

                Session::flash('message','Customer Discount InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');
            }

        }
    }

    public function reseller_discount_status(Request $request, GeneralDiscount $resellerdiscount)
    {
        if(!empty($request->reseller)){

            if($resellerdiscount->status == 0){

                $resellerdiscount->status = 1;

                $resellerdiscount->save();

                Session::flash('message','Reseller Discount Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');

            }
            elseif($resellerdiscount->status == 1){

                $resellerdiscount->status = 0;

                $resellerdiscount->save();

                Session::flash('message','Reseller Discount InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('general_discount.index');
            }

        }
    }
}
