<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\BatchProduct;
use App\Models\CategoryProduct;
use App\Models\ColourImageProductSize;
use App\Models\Product;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;
use PDF;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return view('admin.products.index',['products'=>$product]);
    }

   

      public function  index_date(request $req)
    {
       

$from = $req->from;
        $to = $req->to;

    $product = Product::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();

           return view('admin.products.index',['products'=>$product])->render();




    }


 public function index_pdf()
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
  $product = Product::all();
          
    $pdf = PDF::loadView('admin.products.index_pdf',['products'=>$product])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A2', 'landscape');
    
        return $pdf->download('All_Products.pdf');
    }






public function view_product_details($id)
    {

      $product_details = ColourImageProductSize::where('product_id',$id)->get();

       return view('admin.products.productdetails',['products'=>$product_details]);
    }






    public function index_pdf1($pro1)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1);
          
    $pdf = PDF::loadView('admin.products.index_pdf1',['products'=>$product,'pro1'=>$pro1])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
    }


    public function index_pdf2($pro1,$pro2)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1,$pro2);
          
    $pdf = PDF::loadView('admin.products.index_pdf2',['products'=>$product,'pro1'=>$pro1,'pro2'=>$pro2])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
      
    }


 public function index_pdf3($pro1,$pro2,$pro3)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1,$pro2,$pro3);
          
    $pdf = PDF::loadView('admin.products.index_pdf3',['products'=>$product,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
      
    }


 public function index_pdf4($pro1,$pro2,$pro3,$pro4)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1,$pro2,$pro3,$pro4);
          
    $pdf = PDF::loadView('admin.products.index_pdf4',['products'=>$product,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
      
    }

     public function index_pdf5($pro1,$pro2,$pro3,$pro4,$pro5)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1,$pro2,$pro3,$pro4,$pro5);
          
    $pdf = PDF::loadView('admin.products.index_pdf5',['products'=>$product,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
      
    }



     public function index_pdf6($pro1,$pro2,$pro3,$pro4,$pro5,$pro6)
    {
        // $riders =  Rider::all();

        // return view('admin.riders.index',['riders'=>$riders]);
    $product = Product::all($pro1,$pro2,$pro3,$pro4,$pro5,$pro6);
          
    $pdf = PDF::loadView('admin.products.index_pdf6',['products'=>$product,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'pro6'=>$pro6])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
    
        return $pdf->download('product_fields.pdf');
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::all();
        $category = Category::all();
        $colour = Colour::all();
        $size = Size::all();

        return view('admin.products.create',['batches'=>$batch,'categories'=>$category,'colours'=>$colour,'sizes'=>$size]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {

        for($i=0; $i<=$request->length; $i++) {

            
            $colour = $request['colour_'.$i];
            $size = $request['size_'.$i];
           $quantity = $request['quantity_'.$i];
            $qr = $request['qr_'.$i];
            $image = $request['image_'.$i];

            
              // print_r($size);
 // print_r($quantity);
    
           

            if ($colour == null){

                session::flash('message',"Color" . strval($i) . " filed is required");
                session::flash('alert-type','error');
                return back();
            }

            if ($size == null){

                session::flash('message',"Size" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }

              if ($quantity == null){

                session::flash('message',"Quantity" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }

                if ($qr == null){

                session::flash('message',"Qr Field" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }

            if ($image == null){

                session::flash('message',"Image" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }

        }


        //$checkSkuCode = Product::where('sku_code',$request->sku_code)->get();

        //if(sizeof($checkSkuCode) == 0){

            $product->name = $request->name;
            $product->status = $request->status;
            $product->batch_id = $request->batch;
            $product->description = trim($request->description);
            $product->owner = $request->owner;
            $product->vendor = $request->supplier;
            $product->video_link = $request->video_link;
            $product->product_weight = $request->get('product_weight');
            $product->price = $request->price;
            $product->purchase_cost = $request->purchase_cost;
            $product->purchase_discount = $request->purchase_discount;
            $product->purchase_discount_percentage = $request->purchase_discount_percentage;
            $product->labour_cost = $request->labour_cost;
            $product->transportation_cost = $request->transportation_cost;
            $product->list_price_for_salesman = $request->list_price_for_salesman;
            $product->commission_amount = $request->get('commission_amount');
            $product->commission = $request->get('commission');
            //   $product->qr_code = $request->qr;
                $product->supplier = $request->supplier;

            $product->save();

            $sku_code = $product->product_sku_code;

            foreach ($request->categories as $category)
            {
                $product->categories()->attach($category);
            }

            //$product->batches()->attach($request->batch);

            for($i=0; $i<=$request->length; $i++)
            {
                $colour = $request['colour_' . $i];
                $size = $request['size_' . $i];
                $image = $request->file(['image_' . $i]);
            $quantity = $request['quantity_' . $i];
               $qr = $request['qr_' . $i];

                $image_length = sizeof($image);

                for($j=0; $j< $image_length; $j++)
                {
                    $check_image = $image[$j];
                    $image_name = time().$check_image->getClientOriginalName();

                    ColourImageProductSize::create(['variant_sku_code'=>$sku_code."-".$j,'colour_id' => $colour[$i], 'product_id' => $product->id, 'size_id' => $size[$i],
                        'quantity' => $quantity[$i],

                       
                       'qr_code' => $qr[$i],
                       'image' => $image_name]);

                    $check_image->storeAs('/images/productImages',$image_name);

                }

            }


            Session::flash('message','Product Added Successfully');
            Session::flash('alert-type','success');

            return redirect()->route('product.index');

        }

//             session::flash('message','Product Already Exist');
//             session::flash('alert-type','error');
//             return back();

    // }
 


// }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $ColoursImagesProductsSizes = ColourImageProductSize::where('product_id','=',$product->id)->get();
        $categoryProduct = CategoryProduct::with('product', 'category')->where('product_id','=',$product->id)->get();
        $batchProduct    = BatchProduct::where('product_id','=',$product->id)->get();
        $batch = Batch::all();
        $category = Category::with('cat')->get();
        $colour = Colour::all();
        $size = Size::all();
        return view('admin.products.edit',['batches'=>$batch,'categories'=>$category,'colours'=>$colour,'sizes'=>$size,'product'=>$product,'categoryProduct'=>$categoryProduct,'batchProduct'=>$batchProduct,'ColoursImagesProductsSizes'=>$ColoursImagesProductsSizes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->batch == null){

            session::flash('message',"Batch field is required");
            session::flash('alert-type','error');
            return back();
        }

        if ($request->owner == null){

            session::flash('message',"Owner field is required");
            session::flash('alert-type','error');
            return back();
        }

        if ($request->supplier == null){

            session::flash('message',"Supplier field is required");
            session::flash('alert-type','error');
            return back();
        }

        for($i=1; $i<=$request->length; $i++) {

            $colour = $request['colour_'.$i];
            $size = $request['size_'.$i];
            $quantity = $request['quantity_'.$i];
            $qr = $request['qr_'.$i];
            $image = $request['image_'.$i];

            if ($colour == null){

                session::flash('message',"Color" . strval($i) . " filed is required");
                session::flash('alert-type','error');
                return back();
            }

            if ($size == null){

                session::flash('message',"Size" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }
            if ($image == null){

                session::flash('message',"Image" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }
            if ($quantity == null){

                session::flash('message',"Quantity" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }
            if ($qr == null){

                session::flash('message',"QrCode" . strval($i) .  " filed is required");
                session::flash('alert-type','error');
                return back();
            }

           

        }

        //$checkSkuCode = Product::where('sku_code',$request->sku_code)->get();

        //if(sizeof($checkSkuCode) == 0 || $request->sku_code == $product->sku_code){

            $product->name = $request->name;
            $product->status = $request->status;
            $product->batch_id = $request->batch;
            $product->description = trim($request->description);
            $product->owner = $request->owner;
            $product->vendor = $request->supplier;
            $product->video_link = $request->video_link;
            $product->product_weight = $request->get('product_weight');
            $product->price = $request->price;
            $product->purchase_cost = $request->purchase_cost;
            $product->purchase_discount = $request->purchase_discount;
            $product->purchase_discount_percentage = $request->purchase_discount_percentage;
            $product->labour_cost = $request->labour_cost;
            $product->transportation_cost = $request->transportation_cost;
            $product->list_price_for_salesman = $request->list_price_for_salesman;
            $product->commission_amount = $request->get('commission_amount');
            $product->commission = $request->get('commission');
            //   $product->qr_code = $request->qr;
            $product->supplier = $request->supplier;

            $product->save();


            $product->categories()->detach();

            foreach ($request->categories as $category)
            {
                $product->categories()->attach($category);
            }

            //$product->batches()->detach();

            //$product->batches()->attach($request->batch);

            $cips = ColourImageProductSize::where('product_id',$product->id)->get();

            $count = count($cips);

            for($i=1; $i<=$request->length; $i++)
            {
                $colour = $request['colour_' . $i];
                $size = $request['size_' . $i];
                $quantity = $request['quantity_' . $i];
                $qr = $request['qr_' . $i];
                $image = $request->file(['image_' . $i]);
                $image_length = sizeof($image);


                for($j=0; $j<$image_length; $j++)
                {
                    $check_image = $image[$j];
                    $image_name = time(). $check_image->getClientOriginalName();

                    ColourImageProductSize::create(['variant_sku_code'=>$product->product_sku_code."-".($count + $j),'colour_id' => $colour[$i], 'product_id' => $product->id, 'size_id' => $size[$i], 'quantity' => $quantity[$i], 'qr_code' => $qr[$i], 'image' => $image_name]);

                    $check_image->storeAs('/images/productImages',$image_name);

                }


            }


            Session::flash('message','Product Updated Successfully');
            Session::flash('alert-type','success');

            return redirect()->route('product.index');

        //}

        session::flash('message','Product Failed to Update');
        session::flash('alert-type','error');
        return back();
    }

    public function status(Product $product){

            if($product->status == 0){

                $product->status = 1;

                $product->save();

                Session::flash('message','Product Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('product.index');

            }
            elseif($product->status == 1){

                $product->status = 0;

                $product->save();

                Session::flash('message','Product InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('product.index');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->categories()->detach();
        $product->batches()->detach();
        $cips = ColourImageProductSize::where('product_id',$product->id)->get();

        $product->delete();

        Session::flash('message','Product Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('product.index');
    }
}
