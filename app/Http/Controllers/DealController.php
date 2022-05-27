<?php

namespace App\Http\Controllers;

use App\Models\ColourImageProductSize;
use App\Models\Customer;
use App\Models\Deal;
use App\Models\Product;
use App\Models\dealsizecolor;
use App\Models\Reseller;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::all();

        return view('admin.deals.index',['deals'=>$deals]);
    }

    public function getSize(Request $request){

        $checksize = null;

        $product_sizes = ColourImageProductSize::where('product_id',$request->product_id)->get();

        foreach ($product_sizes as $product_size){

            if($checksize !== $product_size->size_id){

                $arr[] = Size::where('id',$product_size->size_id)->first();

                $checksize = $product_size->size_id;

            }
        }

        $data['sizes'] = $arr;

        return response()->json($data);
    }

    public function getSpecificdealfor(Request $request){

        if($request->deal_for == "customer"){

            $data['customers'] = Customer::all();

            return response()->json($data);

        }
        elseif($request->deal_for == "reseller"){

            $data['resellers'] = Reseller::all();

            return response()->json($data);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status',1)->get();

        return view('admin.deals.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
 {

    

        $deal = new Deal;

        $deal->deal = $req->deal;
        $deal->product_id = $req->product_id_1;
        // $deal->size_id = $req->size_id;
        // $deal->color_id_1 = $req->color_id_1;
        $deal->product_id_2 = $req->product_id_2;
        // $deal->size_id_2 = $req->size_id_2;
        // $deal->color_id_2 = $req->color_id_2;
        $deal->product_id_3 = $req->product_id_3;
        // $deal->size_id_3 = $req->size_id_3;
        // $deal->color_id_3 = $req->color_id_3;
        $deal->product_id_4 = $req->product_id_4;
        // $deal->size_id_4 = $req->size_id_4;
        // $deal->color_id_4 = $req->color_id_4;
        $deal->product_id_5 = $req->product_id_5;
        // $deal->size_id_5 = $req->size_id_5;
        // $deal->color_id_5 = $req->color_id_5;

       

        $img1 = $req->file('img1');
        $image1 = $img1->getClientOriginalName();
        $img1->storeAs('/images/dealimages',$image1);
        $deal->image_1 = $image1;


        $img2 = $req->file('img_2');

        if($img2!= null)
        {
        $image2 = $img2->getClientOriginalName();
        $img2->storeAs('/images/dealimages',$image2);
        $deal->image_2 = $image2;
        }

        $img3 = $req->file('img_3');

        if($img3!= null)
        {
        $image3 = $img3->getClientOriginalName();
        $img3->storeAs('/images/dealimages',$image3);
        $deal->image_3 = $image3;
        }

        $deal->totalprice = $req->totalprice;
        $deal->discount = $req->discount;
        $deal->start_date = $req->start_date;
        $deal->end_date = $req->end_date;
        $deal->deal_for = $req->deal_for;
        $deal->dealname = $req->dealname;
        $deal->specific_deal_for = $req->specific_deal_for;
        $deal->status = $req->status;

        $deal->save();

        if($deal->save())
        {
            $deal_last_id = Deal::all()->last()->id;

       
$sizelen1 = sizeof($req->size1);
$colorlen1 = sizeof($req->color1);
if($sizelen1==$colorlen1)
{

for ($i=0; $i < $sizelen1; $i++)
 {

     $dealcolorsize = new dealsizecolor;
     $dealcolorsize->deal_id = $deal_last_id;
     $dealcolorsize->product_id = $req->product_id_1;
     $dealcolorsize->size_id = $req->size1[$i];
     $dealcolorsize->color_id = $req->color1[$i];

     $dealcolorsize->save();

   
}

}
else 
{
     $delete = Deal::all()->last()->id;
    $delete->delete();
Session::flash('message1', 'size and color should be equal !'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
}

$sizelen2 = sizeof($req->size2);
$colorlen2 = sizeof($req->color2);

if($sizelen2==$colorlen2)
{

for ($i=0; $i < $sizelen2; $i++)
 {

     $dealcolorsize = new dealsizecolor;
     $dealcolorsize->deal_id = $deal_last_id;
     $dealcolorsize->product_id = $req->product_id_2;
     $dealcolorsize->size_id = $req->size2[$i];
     $dealcolorsize->color_id = $req->color2[$i];

     $dealcolorsize->save();

   
}
}
else
{
     $delete = Deal::all()->last()->id;
    $delete->delete();
Session::flash('message2', 'size and color should be equal !'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
}

if($req->product_id_3!=null)
{
    $sizelen3 = sizeof($req->size3);
    $colorlen3 = sizeof($req->color3);


if($sizelen3==$colorlen3)
{

for ($i=0; $i < $sizelen3; $i++)
 {

     $dealcolorsize = new dealsizecolor;
     $dealcolorsize->deal_id = $deal_last_id;
     $dealcolorsize->product_id = $req->product_id_3;
     $dealcolorsize->size_id = $req->size3[$i];
     $dealcolorsize->color_id = $req->color3[$i];

     $dealcolorsize->save();

   
}

}
else 
{
     $delete = Deal::all()->last()->id;
    $delete->delete();
    Session::flash('message3', 'size and color should be equal !'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
}

}


if($req->product_id_4!=null)
{
    $sizelen4 = sizeof($req->size4);
    $colorlen4 = sizeof($req->color4);

if($sizelen4==$colorlen4)
{


for ($i=0; $i < $sizelen4; $i++)
 {

     $dealcolorsize = new dealsizecolor;
     $dealcolorsize->deal_id = $deal_last_id;
     $dealcolorsize->product_id = $req->product_id_4;
     $dealcolorsize->size_id = $req->size4[$i];
     $dealcolorsize->color_id = $req->color4[$i];

     $dealcolorsize->save();

   
}

}
else 
{
    $delete = Deal::all()->last()->id;
    $delete->delete();
     Session::flash('message4', 'size and color should be equal !'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
}

}



if($req->product_id_5!=null)
{
    $sizelen5 = sizeof($req->size5);
    $colorlen5 = sizeof($req->color5);

 if($sizelen5==$colorlen5)
{


for ($i=0; $i < $sizelen5; $i++)
 {

     $dealcolorsize = new dealsizecolor;
     $dealcolorsize->deal_id = $deal_last_id;
     $dealcolorsize->product_id = $req->product_id_5;
     $dealcolorsize->size_id = $req->size5[$i];
     $dealcolorsize->color_id = $req->color5[$i];

     $dealcolorsize->save();

   
}

}
else 
{
     $delete = Deal::all()->last()->id;
    $delete->delete();
    Session::flash('message5', 'size and color should be equal !'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
}

}

            $product = new Product;
            $product->name = $req->dealname;
            $product->slug = $req->slug;
            $product->status = '1';
            $product->price = $req->totalprice;
            $product->deal = $deal_last_id;
            $product->save();
          


            $p_last_id = Product::all()->last()->id;

    $dealll = new ColourImageProductSize;
    $dealll->deal = $deal_last_id;
    $dealll->product_id =  $p_last_id ;

    $image1 = $img1->getClientOriginalName();
   $img1->storeAs('/images/productImages',$image1);
   $dealll->image = $image1;
  
 
    
   $dealll->save();

  




        Session::flash('message','Deal Created Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('deal.index');


    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $products = Product::where('status',1)
            ->get();

        return view('admin.deals.edit',['deal'=>$deal,'products'=>$products]);
    }


     public function show1($id)
    {

         $dealsizecolor = dealsizecolor::where('deal_id',$id)
            ->get();
    return view('admin.deals.show1',['deal'=> $dealsizecolor]);
    }


  public function edit_deall($id)
    {

         $dealsizecolor = dealsizecolor::where('id',$id)
            ->first();
    return view('admin.deals.edit_deal_view_CS',['deal'=>  $dealsizecolor]);
    }

     public function update_deall(request $req , $id)
    {


         $dealsizecolor = dealsizecolor::where('id',$id)
            ->first();
             $dealsizecolor->size_id = $req->size;
             $dealsizecolor->color_id = $req->color;
               $dealsizecolor->save();

              Session::flash('message','Updated Successfully');
              Session::flash('alert-type','success');

          return back(); 
    // return view('admin.deals.edit_deal_view_CS',['deal'=>  $dealsizecolor]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
 public function update(Request $req, Deal $deal)
    {
        $deal->id;
        $deal = Deal::where('id', $deal->id)->first();

        $deal->deal = $req->deal;
       

         $img1 = $req->file('img1');
        $image1 = $img1->getClientOriginalName();
        $img1->storeAs('/images/dealimages',$image1);
        $deal->image_1 = $image1;


        $img2 = $req->file('img_2');

        if($img2!= null)
        {
        $image2 = $img2->getClientOriginalName();
        $img2->storeAs('/images/dealimages',$image2);
        $deal->image_2 = $image2;
        }

        $img3 = $req->file('img_3');

        if($img3!= null)
        {
        $image3 = $img3->getClientOriginalName();
        $img3->storeAs('/images/dealimages',$image3);
        $deal->image_3 = $image3;
        }

        $deal->totalprice = $req->totalprice;
        $deal->discount = $req->discount;
        $deal->start_date = $req->start_date;
        $deal->end_date = $req->end_date;
        $deal->deal_for = $req->deal_for;
        $deal->dealname = $req->dealname;
        $deal->specific_deal_for = $req->specific_deal_for;
        $deal->status = $req->status;

        $deal->save();

        Session::flash('message','Deal Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('deal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        dealsizecolor::where('deal_id',$deal->id)->delete(); 

        Session::flash('message','Deal Deleted Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('deal.index');
    }

    public function deal_status(Request $request,Deal $deal){

        if(!empty($request->deal)){

            if($deal->status == 0){

                $deal->status = 1;

                $deal->save();

                Session::flash('message','Deal Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('deal.index');

            }
            elseif($deal->status == 1){

                $deal->status = 0;

                $deal->save();

                Session::flash('message','Deal InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('deal.index');
            }

        }

    }




    public function deals_discount()
    {
        $categories = Deal::all();

        return view ('frontend.category_deals',['catagories'=>  $categories]);
    }



  public function single_product_deals($id)
    {
     $categories = Deal::where('id',$id)->first();
   return view ('frontend.singleproduct_deals',['categories'=>  $categories]);
    }


}
