<?php

namespace App\Http\Controllers;
use App\Models\salereturn;
use App\Models\orderdetail;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\GeneralDiscount;
use App\Models\productorderdetail;
use App\Models\ProductForSaleCenter;
use App\Models\ProductForOwner;
use App\Models\OwnerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class salereturnController extends Controller
{
       public function index()
    {
        $salereturns = salereturn::all();

        return view('admin.salereturn.index',['salereturn'=>$salereturns]);
    }


    public function create($pro_id)
    {
        $orderdetail = productorderdetail::where('id',$pro_id)->first();

        // return view('admin.salereturn.create');
        if( $orderdetail->size =='0' && $orderdetail->color =='0')
        {
          return view('admin.salereturn.create',['orderdetail'=>$orderdetail]);
        }
        return view('admin.salereturn.create',['orderdetail'=>$orderdetail]);
    }


 public function store(Request $req)
    {
       // $req->validate([
       //      'order_number'=> ['required', 'max:255'],
       //      'product_id' => ['required', 'string', 'min:5'],
       //      'reason'=> ['required', 'max:255'],
       //      'amount' => ['required', 'max:255'],
            
       //  ]);
// quantity
// profitloss
// returndate
// courierrider

      

        $order_date = orderdetail::where('id', $req->ordername)->first()->created_at;
        $customer_reseller_name = orderdetail::where('id', $req->ordername)->first()->order_number;
        $city = orderdetail::where('id', $req->ordername)->first()->city;

if($req->color!='0' && $req->size!='0')
{


        $categoryid = CategoryProduct::where('product_id',$req->productid)->first()->category_id;


   $productpurchasediscount = Product::where('id',$req->productid)->first()->purchase_discount;

   $productcost = Product::where('id',$req->productid)->first()->purchase_cost;

   $product_reseller_price = Product::where('id',$req->productid)->first()->list_price_for_salesman;

      $product_retail_price = Product::where('id',$req->productid)->first()->price;


// $categoryid2 = Product::where('id',$categoryid)->first()->parent_id;
// $categoryid3 = Product::where('id',$categoryid)->first()->parent_id;
 

   
        $salereturn = new salereturn;

        $salereturn->order_number = $req->ordername;
        $salereturn->product_id = $req->productid;
        $salereturn->product_order_number = $req->product_order_number;
        $salereturn->reason = $req->reason;
        $salereturn->amount = $req->amount;
        $salereturn->quantity = $req->quantity;
        $salereturn->color_id = $req->color;
        $salereturn->size_id = $req->size;
        $salereturn->order_date = $order_date;
         $salereturn->profit_or_loss =  $req->profitloss;
         $salereturn->return_date =  $req->returndate;
         $salereturn->courier_or_rider =   $req->courierrider;
         $salereturn->category_route = $categoryid."/".$req->productid;

         if($req->batch!=null)
         {
            $salereturn->batch_id = $req->batch;
         }
         else
         {
            $salereturn->batch_id = '0';
         }
         

         $salecenter_pro = ProductForSaleCenter::where('product_id',$req->productid)->first();

        if($salecenter_pro!=null)
        {

            $salereturn->inventory_type = "Sale-Center";

            $salereturn->salecenter_id = $req->salecenter;

        }

        else
        {
             $salereturn->inventory_type = "Pick-To-Order";
             $salereturn->sale_center = "none";
        } 

        $salereturn->reseller_or_customer = $customer_reseller_name; 
        $salereturn->city = $city;

        $discount = GeneralDiscount::where('product_id',$req->productid)->first();
        if($discount!=null)
        {
          $salereturn->discount = $discount->discount;
        }

        else 
        {
            $salereturn->discount = "none";
        }
   
        $salereturn->purchase_price = $productcost;
        $salereturn->purchase_price_after_discount = $productpurchasediscount;
        $salereturn->reseller_price =  $product_reseller_price;
        $salereturn->reseller_price =  $product_reseller_price;
        $salereturn->retail_price =  $product_retail_price;

        
  
      
        $salereturn->save();

        $productquantity_in_productforsalecenters = ProductForSaleCenter::where('product_id',$req->productid)->where('salecenter_id',$req->salecenter)->where('size',$req->size)->where('color',$req->color)->first();
        if($productquantity_in_productforsalecenters!=null)
        {
             ProductForSaleCenter::where('product_id',$req->productid)->where('salecenter_id',$req->salecenter)->where('size',$req->size)->where('color',$req->color)->update(['sold'=>($productquantity_in_productforsalecenters->sold)-($req->quantity)]);
        }
              
             
                $ownerid = OwnerUser::where('owner_id',$req->owner)->first()->user_id;
              $sold = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productid)->where('color_id',$req->color)->where('size_id',$req->size)->first();
                if( $sold!=null)
                {
                   ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productid)->where('color_id',$req->color)->where('size_id',$req->size)->update(['sold'=>($sold->sold)-($req->quantity)]);
                  $forsold_quantity = ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productid)->where('color_id',$req->color)->where('size_id',$req->size)->first();
                  ProductForOwner::where('owner_name',$ownerid)->where('product_id',$req->productid)->where('color_id',$req->color)->where('size_id',$req->size)->update(['instock'=>($forsold_quantity->productQuantity)+($forsold_quantity->sold)]);
                }
                elseif( $sold=null)
                {
                  Session::flash('message','Sale return Added Successfully , Product don,t have any owner');
                  Session::flash('alert-type','warning');
                  return redirect()->route('sale_center_order.index');
                }
              
               
         
        
                
        
                
        
                Session::flash('message','Sale return Added Successfully');
                Session::flash('alert-type','success');
        
                return redirect()->route('salereturn.index');
      }
      else
      {

       
        $salereturn = new salereturn;

        $salereturn->order_number = $req->ordername;
        $salereturn->product_id = $req->productid;
        $salereturn->reason = $req->reason;
        $salereturn->amount = $req->amount;
        $salereturn->quantity = '1';
        
        $salereturn->product_order_number = $req->product_order_number;
        $salereturn->order_date = $order_date;
         $salereturn->profit_or_loss =  $req->profitloss;
         $salereturn->return_date =  $req->returndate;
         $salereturn->courier_or_rider =   $req->courierrider;
         $salereturn->category_route = 'deal';
         $salereturn->inventory_type = "Sale-Center";
         $salereturn->salecenter_id = $req->salecenter;

         $salereturn->save();

         Session::flash('message','Sale return Added Successfully');
         Session::flash('alert-type','success');
 
         return redirect()->route('salereturn.index');
      }


    }



  public function edit(salereturn $salereturn)
    {

        return view('admin.salereturn.edit',['salereturn'=>$salereturn]);
    }





 public function update(Request $req, salereturn $salereturn)
    {
        $salereturn = salereturn::where('id',$salereturn->id)->first();
        

        // $request->validate([
        //     'name'=> ['required', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
        //     'contact'=> ['required','numeric', 'digits:11'],
        //     'address'=> ['required', 'string','max:255'],
        //     'password' => ['nullable', 'string', 'min:5'],
        //     'status'=> 'required',
        // ]);

         $salereturn->order_number = $req->ordername;
        $salereturn->product_id = $req->productid;
        $salereturn->reason = $req->reason;
        $salereturn->amount = $req->amount;
        $salereturn->save();

     

     
       

        Session::flash('message','salereturn Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('salereturn.index');
    }


 public function destroy(salereturn $salereturn)
    {

        $salereturn_user = Salereturn::where('id',$salereturn->id)->delete();
     

        // $user->delete();
        // $salecenter->delete();

        Session::flash('message','Sale return Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('salereturn.index');
    }





}
