<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Offer;
use App\Models\Deal;
use App\Models\cartt;
use App\Models\User;
use App\Models\ResellerUser;
use App\Models\ProductCategory;
use App\Models\ColourImageProductSize;
use App\Models\orderdetail;
use App\Models\Batch;
use App\Models\Category;
use App\Models\GeneralDiscount;
use App\Models\CategoryProduct;

use App\Models\Colour;
use App\Models\cuser;
use App\Models\Size;
use App\Models\dealsizecolor;
use Illuminate\Http\Request;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




  public function cart_view(request $req)
    { 

        cartt::where('created_at', '<=', now()->subMinutes(30)->toDateTimeString())
        ->delete();

      $cartCollection = Cart::getContent();
      $userId = auth()->user()->id; // or any string represents user identifier
      $u = Cart::session($userId)->getContent();
      

   
    

      return view('frontend.cart',['items'=>$u]);

 }

   public function cart_view_discount(request $req)
    { 

      $req->promocode;
      $offer_product = Offer::where('code',$req->promocode)->first();

      echo $pro_id = $offer_product->product_id;
      $pro_amount = $offer_product->min_amount;

      $userId = auth()->user()->id;

      $product_ci = ColourImageProductSize::where('id',$pro_id)->first()->product_id;
      $product = Product::where('id',$product_ci)->first();
   
// Cart::session($userId)->update($pro_id, array( 
//   'price' => $pro_amount, // new item price, price can also be a string format like so: '98.67'
// ));


Cart::session($userId)->update($pro_id, array(
  'attributes' => array(
      'supplier' => $product->supplier,
      'weight' => $product->product_weight,
      'discounted_price' =>$pro_amount
     
  ),
));

  // $usercart = Cart::session($userId)->getContent();
  Session::flash('message','Discount Applied Successfully');
        Session::flash('alert-type','success');
  return back();

      

    //  echo $cartCollection = Cart::getContent();
      // $userId = auth()->user()->id; // or any string represents user identifier
      // $u = Cart::session($userId)->getContent();       // echo $u = Cart::where('id',$offer->product_id)->first();
      // return view('frontend.cart',['items'=>$u,'offerproduct'=>$offer_product]);

 }

   public function admin_cart_view($id)
    { 

      $cartCollection = Cart::getContent();
      $userId = $id; // or any string represents user identifier
      $usercart = Cart::session($userId)->getContent();
      return view('admin.manualorder.admincart',['items'=>$usercart],['userid'=>$userId]);

 }




public function update_cart_item(request $req,$id)
    { 

//   Cart::update($id, array(
// 'quantity' => array(
      
//       'value' => 5
// ),
//  ));
// return back();
        $userId = auth()->user()->id; // or any string represents user identifier
Cart::session($userId)->update($id, array(
   
   'quantity' => array(
      'relative' => false,
      'value' => $req->quantity), ));
Session::flash('message', 'Updated Successfully!'); 
Session::flash('alert-class', 'alert-success'); 
 return back();
        

 }

 public function edit_admin_cart(request $req,$id,$name)
    { 

        $userId = $name; // or any string represents user identifier
Cart::session($userId)->update($id, array(
   // new item name
   'quantity' => array(
      'relative' => false,
      'value' => $req->quantity
  ), // new item price, price can also be a string format like so: '98.67'
));
Session::flash('message', 'Updated Successfully!'); 
Session::flash('alert-class', 'alert-success'); 
 return back();
        
        

 }



  public function delete_cart_item($id)
    { 

  Cart::remove($id);

// removing cart item for a specific user's cart
$userId = auth()->user()->id; // or any string represents user identifier
Cart::session($userId)->remove($id);
Session::flash('message', 'Delete Successfully!'); 
Session::flash('alert-class', 'alert-success'); 
 return back();

 }


  public function delete_cart_item_cart($id)
    { 

  $cartt = cartt::where('id',$id)->first()->delete();


Session::flash('message', 'Delete Successfully!'); 
Session::flash('alert-class', 'alert-success'); 
 return back();

 }


  public function clear_cart()
    { 

     $userId = auth()->user()->id;
     Cart::clear();
     Cart::session($userId)->clear();


      DB::table('cartts')->delete();


     Session::flash('message', 'Cart Clear Successfully!'); 
Session::flash('alert-class', 'alert-success'); 
     return back();

 }


   public function delete_admin_cart($id,$name)
    { 
// echo $id ;
// echo $name;
  Cart::remove($id);

// removing cart item for a specific user's cart
  $userId = $name; // or any string represents user identifier
  Cart::session($userId)->remove($id);
 return back();

 }







     public function deal_add_cart(request $req)
    {

         if(!$userId = auth()->user())
        {
           return redirect('/login');
        }
      
      $deal=Deal::find($req->dealid);

//       $cart = new cartt;
//       $cart->deal_id = $deal->id;
//       $cart->deal_name = $deal->dealname;
//       $cart->user_id = $userId = auth()->user()->id;
//       $cart->totalprice = $deal->totalprice;
//       $cart->save();


// cartt::where('created_at', '<=', now()->subMinutes(30)->toDateTimeString())
// ->delete();

// $product_variant_id = ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$req->color)->where('size_id',$req->size)->first()->id;
         
$dealsize = dealsizecolor::where('deal_id',$deal->id)->get()->count();
          $userId = auth()->user()->id;
           Cart::session($userId)->add(array(
           'id' =>$deal->id,
           'name' => $deal->dealname,
           'price' => $deal->totalprice,
           'quantity' =>'1',
           'color' => '0',
           'size' => '0',
          
           'attributes' => array(
            'product_id' => $deal->id,
            'discounted_price' => $deal->totalprice),
           'associatedModel' => $deal->id
));

   Session::flash('flash_message', 'Product Add To Cart Successfully !');
   Session::flash('flash_type', 'alert-success');
   return redirect('/category');

     

    }


     public function addcart(request $req)
    {
        $product=Product::find($req->productid);
        // Cart::add($product->id, $product->name ,1,$product->price);

        // $cart = Cart::content();
        // dd($cart);
        
        if(!$userId = auth()->user())
        {
           return redirect('/login');
        }
        else 
        {
          $product_variant_id = ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$req->color)->where('size_id',$req->size)->first()->id;
           $userId = auth()->user()->id;
           Cart::session($userId)->add(array(
           'id' => $product_variant_id,
           'name' => $product->name,
           'price' => $product->price,
           'quantity' => $req->quantity,
           'color' => $req->color,
           'size' => $req->size,
          
           'attributes' => array(
            'product_id' => $product->id,
            'weight' => $product->product_weight,
            'color' => $req->color,
            'size' => $req->size,
            'supplier' => $req->supp,
            'discounted_price' => $req->discount),
           'associatedModel' => $product->id
));

      Cart::session($userId)->update($product->id, array( 
  'discounted_price' => $req->discount, // new item price, price can also be a string format like so: '98.67'
));

        Cart::session($userId)->update($product->id, array( 
  'supplier' =>  $req->supp, // new item price, price can also be a string format like so: '98.67'
));


  Cart::session($userId)->update($product->id, array( 
   'color' => $req->color, // new item price, price can also be a string format like so: '98.67'
));

  Cart::session($userId)->update($product->id, array( 
    'size' => $req->size, // new item price, price can also be a string format like so: '98.67'
));
    

    cartt::where('created_at', '<=', now()->subMinutes(30)->toDateTimeString())
->delete();


    

           $userIdi = auth()->user()->id;
     $subTotal = Cart::session($userIdi)->getSubTotal();
   Session::put('oldcart', $subTotal);
    Session::flash('flash_message', 'Product Add To Cart Successfully !');
    Session::flash('flash_type', 'alert-success');
      return redirect('/category');
           
        }
        // echo Cart::session(2)->getContent(2);


 // $cartCollection = Cart::getContent();
 // $cartCollection->toArray();
 // echo $cartCollection->toJson();


 // or any string represents user identifier

       // return back()->with('message','Successfully Add To Cart ');
    }


    public function addcart_admin(request $req)
    {
//          $product=Product::find($req->productid);
        
//          $userId = $req->userid;
          
//            Cart::session($userId)->add(array(
//            'id' => $product->id,
//            'name' => $product->name,
//            'price' => $product->price,
//            'quantity' => $req->quantity,
//            'color' => $req->color,
//            'attributes' => array(),
//            'associatedModel' => $product
// ));

     
    
//     $u = Cart::sessionk($userId)->getContent();
//      $subTotal = Cart::session($userId)->getSubTotal();

   foreach ($req->categories as $category)
            {
                
            }

  $pro =  DB::table('category_product')
        ->where('category_id',$category)->get();


           $pro_id = $req->productid;
           $quantity = $req->quantity;
           $color = $req->color;
           $users = $req->userid;
           $size = $req->size;
           if($users=='reseller')
           {
            $user1 = ResellerUser::all();
            return view('admin.manualorder.selectproduct',compact('pro_id','quantity', 'color','user1','pro','size'));
           }
           else
           {
            $user2 = cuser::all();
return view('admin.manualorder.selectproduct',compact('pro_id','quantity', 'color','user2','pro','size'));
           }


    // Session::flash('flash_message', 'Product Add To Cart Successfully !');
    // Session::flash('flash_type', 'alert-success');
    
      // $cartCollection = Cart::getContent();
      // $userId = "$req->userid"; // or any string represents user identifier
      // echo $u = Cart::session($userId)->getContent();
           
      

    }

    public function addcart_admin2(request $req)
    {
       $product=Product::find($req->productid);
        
         $userId = $req->userid;
          
  
 $req->quan;
 $pro_check = ColourImageProductSize::where('product_id',$product->id)->where('colour_id',$req->color)->where('size_id',$req->size)->first();


$batch = Batch::all();
        $category = Category::all();
        $colour = Colour::all();
        $size = Size::all();


if($pro_check!=null && $req->quan!=null)
{
$cat = CategoryProduct::where('product_id',$product->id)->first();
  $cat->category_id;

$cat_discount = GeneralDiscount::where('category_id',$product->id)->first();




$gen_discount = GeneralDiscount::where('product_id',$product->id)->first();


if($gen_discount!=null )
{ 

$discount = $gen_discount->discount;
$price = ($product->price/100)*$discount;
$finalpriceafterdiscount = $discount-$price;

        Cart::session($userId)->add(array(
           'id' => $product->id,
           'name' => $product->name,
           'price' => $finalpriceafterdiscount,
           'quantity' => $req->quan,
           'color' => $req->color,
           'size' => $req->size,
           'attributes' => array(
            'color' =>$req->color,
            'size' => $req->size),
           'associatedModel' => $product
));
}
else if($cat_discount!=null)
{
  $discount = $cat_discount->discount;
$price = ($product->price/100)*$discount;
$finalpriceafterdiscount = $discount-$price;

        Cart::session($userId)->add(array(
           'id' => $product->id,
           'name' => $product->name,
           'price' => $finalpriceafterdiscount,
           'quantity' => $req->quan,
           'color' => $req->color,
           'size' => $req->size,
           'attributes' => array(
            'color' =>$req->color,
            'size' => $req->size),
           'associatedModel' => $product
));
}

else 
{

        Cart::session($userId)->add(array(
           'id' => $product->id,
           'name' => $product->name,
           'price' => $product->price,
           'quantity' => $req->quan,
           'color' => $req->color,
           'size' => $req->size,
           'attributes' => array(
            'color' =>$req->color,
            'size' => $req->size),
           'associatedModel' => $product
));
}
 



//   Cart::session($userId)->update($product->id, array( 
//     'color' => $req->color, // new item price, price can also be a string format like so: '98.67'
// ));


//   Cart::session($userId)->update($product->id, array( 
//     'size' => $req->size, // new item price, price can also be a string format like so: '98.67'
// ));

  

     $u = Cart::session($userId)->getContent('name');
     $subTotal = Cart::session($userId)->getSubTotal();

    Session::flash('flash_message', 'Product Add To Cart Successfully !');
    Session::flash('flash_type', 'alert-success');



        return view('admin.manualorder.productorder',['batches'=>$batch,'categories'=>$category,'colours'=>$colour,'sizes'=>$size,'user'=>$userId]);



       return view('admin.manualorder.productorder',['user'=>$userId]);
}

else
{
  Session::flash('flash_message2', 'Color/Size not available !');
  Session::flash('flash_type', 'alert-warning');
  return view('admin.manualorder.productorder',['batches'=>$batch,'categories'=>$category,'colours'=>$colour,'sizes'=>$size,'user'=>$userId]);
}
  Cart::session($userId)->update($product->id, array( 
   'color' => $req->color, // new item price, price can also be a string format like so: '98.67'
));
         

    }




   public function  select_user_admin(request $req)
    {

        $selecteduser_id = $req->userid;
        return view('admin.manualorder.productorder',['userid'=>$selecteduser_id]);
    }


  public function checkout_admin_cart($id)
    {

        $reseller = ResellerUser::where('user_id',$id)->first();
        if($reseller!=null)
        {

if($subTotal = Cart::session($id)->getSubTotal()=='0')
    {
Session::flash('flash_message2', 'Empty cart cannot be proceed');
  Session::flash('flash_type', 'alert-warning');
        return back();
    }
    else 
    {
  return view('admin.manualorder.checkoutreseller',['userid'=>$id]);
    }

        
        }
        else 
        {
    if($subTotal = Cart::session($id)->getSubTotal()=='0')
    {
         Session::flash('flash_message2', 'Empty cart cannot be proceed');
  Session::flash('flash_type', 'alert-warning');
        return back();
    }
    else
    {
return view('admin.manualorder.checkout',['userid'=>$id]);
    }
        
        }

       
    }

    public function usercart_table()
    {
        $cuser = cuser::all();
        return view('admin.manualorder.usercart',compact('cuser'));
    }

      public function resellercart_table()
    {
        
       $cuser = ResellerUser::all();
        return view('admin.manualorder.resellercart',['cuser'=>$cuser]);

         // return view('admin.manualorder.usercart',compact('cuser'));
    }

 
    public function index()
    {
        //
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
            $request->validate([

                'quantity' => ['numeric','min:1'],

            ]);

            $cart = Cart::where('size_id',$request->get('size'))
                        ->where('colour_id',$request->get('colour'))
                        ->where('product_id',$request->get('product'))
                        ->where('user_id',Auth::User()->id)
                        ->get();


            if(sizeof($cart) != false){

                $new_quantity = $cart[0]->quantity + $request->get('quantity');

                $cart[0]->quantity = $new_quantity;
                $cart[0]->size_id = $request->get('size');
                $cart[0]->colour_id = $request->get('colour');
                $cart[0]->product_id = $request->get('product');
                $cart[0]->user_id = Auth::User()->id;

                $cart[0]->save();

                Session::put('oldcartt',$subTotal);
                echo $old = Session::get('oldcartt');

                session::flash('message',"Product Added Successfully");
                session::flash('alert-type','success');

                return back();

            }
            else{

                $cart = new Cart();

                $cart->quantity = $request->get('quantity');
                $cart->size_id = $request->get('size');
                $cart->colour_id = $request->get('colour');
                $cart->product_id = $request->get('product');
                $cart->user_id = Auth::User()->id;

                $cart->save();
                 Session::put('oldcartt',$subTotal);
                echo $old = Session::get('oldcartt');
                session::flash('message',"Product Added Successfully");
                session::flash('alert-type','success');

                  return back()->with('success','Item Deleted Successfully'); 

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        $CheckCart = Cart::where('user_id',auth()->user()->id)->get();

        if(sizeof($CheckCart) == 0){

            return redirect('/home');
        }

        return back();
    }
}
