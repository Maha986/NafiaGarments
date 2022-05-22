<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Colour;
use App\Models\ColourImageProductSize;
use App\Models\Deal;
use App\Models\FrontEnd;
use App\Models\productorderdetail;
use App\Models\wishlist;
use App\Models\HomeSetting;
use App\Models\BlockFloorProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        $services = HomeSetting::where('key','service')
            ->where('status',1)
            ->take(4)
            ->get();

        $blockfloors = BlockFloorProducts::where('status',1)->get();

        $categoryProducts = CategoryProduct::with('product','category')->get();

        $products = Product::where('status',1)
            ->take(10)
            ->get();

        $ColoursImagesProductsSizes = ColourImageProductSize::all();

        $categories = Category::where('parent_id','!=',0)->get();

        return view('frontend.index',['products'=>$products,'services'=>$services,'blockfloors'=>$blockfloors,'categoryProducts'=>$categoryProducts,'ColoursImagesProductsSizes'=>$ColoursImagesProductsSizes,'categories'=>$categories]);
    }

    public function home()
    {
        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        $services = HomeSetting::where('key','service')
            ->where('status',1)
            ->take(4)
            ->get();

        $blockfloors = BlockFloorProducts::where('status',1)->get();

        $categoryProducts = CategoryProduct::with('product','category')->get();

        $products = Product::where('status',1)
            ->take(10)
            ->get();

        $ColoursImagesProductsSizes = ColourImageProductSize::all();

        $categories = Category::where('parent_id','!=',0)->get();


         $u = Auth::user(); 

        return view('frontend.index',['products'=>$products,'useriya' => $u,'services'=>$services,'blockfloors'=>$blockfloors,'categoryProducts'=>$categoryProducts,'ColoursImagesProductsSizes'=>$ColoursImagesProductsSizes,'categories'=>$categories]);
    }

  public function delete_wishlist($id){

        $wishlistitem = wishlist::find($id);
      $wishlistitem->delete();
     
     // return response()->json([
     //    'message' => 'Data deleted successfully!'
     //  ]);
      return back();


    }
    public function about(){

        $about = DB::table('abouts')->first();
        return view('frontend.about',['about'=>$about]);

    }

    public function category(){

        return view('frontend.category');

    }

    public function checkout(){

        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        $user = Auth::User();

        $cart = Cart::where('user_id', $user->id)->get();

        if(count($cart) !== 0){

            return view('frontend.checkout');
        }
        else{

            session::flash('message',"Add An Item To Cart");
            session::flash('alert-type','error');

            return back();
        }

    }


    public function customer_dashboard(){
        

        return view('frontend.dashboard');

    }

    public function customer_orderhistory()
    {
        $user_id = Auth::user()->id;

       $orderhistoryy = productorderdetail::where('user_id',$user_id)->get();

        return view('frontend.orderhistory',['orderhistory'=>$orderhistoryy]);

    }

    public function contact(){

        return view('frontend.contact');

    }

    public function order(){

        return view('frontend.order');

    }

    public function single_product(Product $product)
    {
 
       
        return view('frontend.singleproduct',['product'=>$product]);

      

    }

    public function single_colour(Colour $colour,Product $product){

        return view('frontend.singleproduct',['product'=>$product,'single_colour'=>$colour]);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function show(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontEnd $frontEnd)
    {
        //
    }
}
