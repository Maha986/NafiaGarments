<?php

namespace App\Http\Controllers;
use App\Models\wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
   public function add_wishlist(request $req,$id)
   {
        $product = Product::where('id',$id)->first();
        $product->name;

        $userId = auth()->user()->id;

        $checkwishlist_arleady = wishlist::where('user_id',$userId)->where('product_id',$id)->first();

        if($checkwishlist_arleady)
        	{
        		Session::flash('flash_message', 'Product Add To Wishlist Arleady !');
                Session::flash('flash_type', 'alert-success');
       return back();
        	}

        else{

        $wishlist = new wishlist;
        $wishlist->user_id = $userId;
        $wishlist->product_id = $id;
        $wishlist->product_name = $product->name;

        $wishlist->save();

         Session::flash('flash_message', 'Product Add To Wishlist Successfully !');
    Session::flash('flash_type', 'alert-success');
       return back();

        }



   }
}
