<?php

namespace App\Http\Controllers;

use App\Models\ColourImageProductSize;
use App\Models\Product;
use App\Models\ProductForSaleCenter;
use App\Models\SaleCenterUser;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductForSaleCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.productforsalecenters.index',['products'=>$products]);
    }

       public function index_date(request $req)
    {
      

$from = $req->from;
        $to = $req->to;

    $product = Product::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

           return view('admin.productforsalecenters.index',['products'=>$product])->render();


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productforsalecenters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response



     */

   public function store2(Request $req)
   {
        //  $req->validate([

        //     'product' => ['required'],
        //     'inventory_category' => ['required'],
        //     'batch' => ['nullable'],
        //     'quantity' => ['nullable','numeric','min:1'],
        //     'salecenter_id' => ['required'],
        // ]);

    $pro_salecenters = new ProductForSaleCenter;
    $pro_salecenters->product_id = $req->product;
    $pro_salecenters->inventroy = $req->inventory_category;
    $pro_salecenters->batch_id = $req->batch;
    $pro_salecenters->quantity = $req->quantity;
     $pro_salecenters->color = $req->color;
      $pro_salecenters->size = $req->size;
    // $user_salecenter =  SaleCenterUser::where('sale_center_id',$req->salecenter_id)->first()->user_id;
    $pro_salecenters->salecenter_id = $req->salecenter_id;
    $pro_salecenters->sold = "0";
    $pro_salecenters->PricePerPiece= $req->ppp;

    $pro_salecenters->save();
    return back();

   }




public function productsalecenter_edit_view($id)
   {
    return view ('admin.productforsalecenters.edit',['id'=>$id]);
   }


public function productsalecenter_edit_post(request $req)
   {
      $pro_salecenter = ProductForSaleCenter::find($req->productsalecenter_id);

    $pro_salecenter->inventroy = $req->inventory_category;
    $pro_salecenter->quantity = $req->quantity;
    $pro_salecenter->salecenter_id = $req->salecenter_id;
    $pro_salecenter->PricePerPiece = $req->ppp;
    $pro_salecenter->save();

Session::flash('message', 'Updated Successfully'); 
Session::flash('alert-class', 'alert-success'); 
return redirect('admin/salecenter/product');


   }



public function productsalecenter_delete($id)
   {

  $pro_salecenter = ProductForSaleCenter::find($id);
 $pro_salecenter->delete();
Session::flash('message', 'deleted Successfully'); 
Session::flash('alert-class', 'alert-success'); 
return redirect('admin/salecenter/product');
    




   }



    public function store(Request $request)
    {
        $request->validate([

            'product' => ['required'],
            'inventory_category' => ['required'],
            'batch' => ['nullable'],
            'quantity' => ['nullable','numeric','min:1'],
            'salecenter_id' => ['required'],
        ]);

        $pfsc = ProductForSaleCenter::where('product_id',$request->get('product'))
            ->where('salecenter_id',$request->get('salecenter_id'))
            ->first();

        if(!empty($pfsc) And $request->get('quantity') !== null){

            $pfsc_quantity = ProductForSaleCenter::where('product_id',$request->get('product'))
                ->where('salecenter_id',$request->get('salecenter_id'))
                ->first();

            $pfsc_old_quantity = $pfsc_quantity->quantity;

            ProductForSaleCenter::where('product_id',$request->get('product'))
                ->where('salecenter_id',$request->get('salecenter_id'))
                ->update(['quantity'=>$request->get('quantity')]);



                $cips = ColourImageProductSize::where('product_id',$request->get('product'))
                ->where('colour_id',$request->get('colour'))
                ->where('size_id',$request->get('size'))->first();

                $subtract_quantity = $cips->quantity-$pfsc_old_quantity;

                ColourImageProductSize::where('product_id',$request->get('product'))
                    ->where('colour_id',$request->get('colour'))
                    ->where('size_id',$request->get('size'))
                    ->update(['quantity'=>$subtract_quantity]);

                $cips_total_new_quantity = ColourImageProductSize::where('product_id',$request->get('product'))
                ->where('colour_id',$request->get('colour'))
                ->where('size_id',$request->get('size'))
                ->first();

                $old_quantity = $cips_total_new_quantity->quantity;
                $new_quantity = $request->get('quantity');

                $total_quantity = $old_quantity + $new_quantity;

                ColourImageProductSize::where('product_id',$request->get('product'))
                    ->where('colour_id',$request->get('colour'))
                    ->where('size_id',$request->get('size'))
                    ->update(['quantity'=>$total_quantity]);

                session::flash('message',"Product Assign To SaleCenter Successfully");
                session::flash('alert-type','success');

                return back();

        }
        elseif(!empty($pfsc) And $request->get('quantity') === null){

            session::flash('message',"Already exist");
            session::flash('alert-type','error');

            return back();

        }
        else{

            $ProductForSaleCenter = new ProductForSaleCenter();

            $ProductForSaleCenter->product_id = $request->get('product');
            $ProductForSaleCenter->inventroy = $request->get('inventory_category');
            $ProductForSaleCenter->batch_id = $request->get('batch');
            $ProductForSaleCenter->quantity = $request->get('quantity');
            $ProductForSaleCenter->salecenter_id = $request->get('salecenter_id');

            $ProductForSaleCenter->save();

            $cips = ColourImageProductSize::where('product_id',$request->get('product'))
                ->where('colour_id',$request->get('colour'))
                ->where('size_id',$request->get('size'))->first();

            if($request->get('quantity') !== null){

                if (isset($cips->quantity) === null){

                    ColourImageProductSize::where('product_id',$request->get('product'))
                        ->where('colour_id',$request->get('colour'))
                        ->where('size_id',$request->get('size'))
                        ->update(['quantity'=>$request->get('quantity')]);
                }
                else{

                    $old_quantity = $cips->quantity;
                    $new_quantity = $request->get('quantity');

                    $total_quantity = $old_quantity + $new_quantity;

                    ColourImageProductSize::where('product_id',$request->get('product'))
                        ->where('colour_id',$request->get('colour'))
                        ->where('size_id',$request->get('size'))
                        ->update(['quantity'=>$total_quantity]);
                }
            }


            session::flash('message',"Product Assign To SaleCenter Successfully");
            session::flash('alert-type','success');

            return back();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductForSaleCenter  $productForSaleCenter
     * @return \Illuminate\Http\Response
     */
    public function show(ProductForSaleCenter $productForSaleCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductForSaleCenter  $productForSaleCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductForSaleCenter $productForSaleCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductForSaleCenter  $productForSaleCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductForSaleCenter $productForSaleCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductForSaleCenter  $productForSaleCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductForSaleCenter $productForSaleCenter)
    {
        //
    }
    
    // salecenter module -> myproducts
    public function salecenter_myproducts()
    {
        return view('salecenter.myproducts.index');
    }
}
