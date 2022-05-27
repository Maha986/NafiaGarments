<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Batch;
use App\Models\Colour;
use App\Models\Size;
use App\Models\ColourImageProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 


   public function all_products_search(request $req)
{

 $products = Product::where('name', 'LIKE', '%'.$req->search.'%')->paginate(15);

 return view ('frontend.category2',['catagories'=> $products]);


}


 
public function selectfield(request $req)
{
  
    echo $len = sizeof($req->cat);

  
      if ($len == 1)
{
   $products = Product::all($req->cat[0]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =1;
   $pro1=$req->cat[0];
  

   return view('admin.products.newindex', compact('pro1','products','len'));
} 


elseif ($len == 2)
{
   $products = Product::all($req->cat[0], $req->cat[1]);
   // return view ('admin.products.newindex',['products'=>$products],['pro1'=>$req->cat[0]],['pro2'=>$req->cat[1]]);
   $len =2;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];

   return view('admin.products.newindex', compact('pro1','pro2','products','len'));
}

else if($len == 3 )
{

   $products = Product::all($req->cat[0], $req->cat[1],$req->cat[2]);
   $len =3;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];

   return view('admin.products.newindex', compact('pro1','pro2','products','len','pro3'));

}

elseif($len == 4)
{
   $products = Product::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3]);

   $len =4;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];

   return view('admin.products.newindex', compact('pro1','pro2','products','len','pro3','pro4'));
}

elseif($len == 5)
{
   $products = Product::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4]);

   $len =5;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];

   return view('admin.products.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5'));
}

elseif($len == 6)
{
   $products = Product::all($req->cat[0], $req->cat[1],$req->cat[2],$req->cat[3],$req->cat[4],$req->cat[5]);
    $len =6;
   $pro1=$req->cat[0];
   $pro2=$req->cat[1];
   $pro3=$req->cat[2];
   $pro4=$req->cat[3];
   $pro5=$req->cat[4];
   $pro6=$req->cat[5];

   return view('admin.products.newindex', compact('pro1','pro2','products','len','pro3','pro4','pro5','pro6'));
}


}


public function category_all_products_price(request $req)
{

            $start =  $req->start;
            $end     = $req->end;

  $products= Product::where('price','>=',$start)->where('price','<=',$end)->paginate(15);

     return view ('frontend.category2',['catagories'=> $products]);


}
public function category_all_products_size(request $req)
{

    $size=ColourImageProductSize::where('size_id',$req->sizeid)->get();

    foreach ($size as $s )
     {

        $dd[] = Product::where('id',$s->product_id)->first();
     }
      echo $categories_json = json_encode($dd);
     // echo $dd[];
    // return view ('frontend.category2',['catagories'=> $categories_json]);


   // $dd[] = Product::where('id',$di->product_id)->first();

}
    

 public function category_products_sub($id)
    {
      

           $cat = Category::where('parent_id',$id)->get();
          if($cat=='[]' )
          {
    
     $d = CategoryProduct::where('category_id',$id)->get();

       foreach ($d as $di) 
       {

         $dd[] = Product::where('id',$di->product_id)->first();
       }
       $categories_json = json_encode($dd);
    return view ('frontend.subcategory',['categories'=> $categories_json],['id'=> $id]);
   
          
          }
          else 
          {
                 foreach ($cat as $c)  
    {
    
                 $d = CategoryProduct::where('category_id',$c->id)->get();
                  if (!empty($d))
              {

                foreach($d as $i)
                {

               $dd[] = Product::where('id',$i->product_id)->first();
              }

         
          }        
               
    }
     $categories_json = json_encode($dd);
    return view ('frontend.subcategory',['categories'=> $categories_json],['id'=> $id]);
          }


       



    
       }
 

public function category_products_sub_price(request $req,$id)
    {
      

           $cat = Category::where('parent_id',$id)->get();
          if($cat=='[]' )
          {
    
     $d = CategoryProduct::where('category_id',$id)->get();

       foreach ($d as $di) 
       {   $start =  $req->start;
            $end     = $req->end;

$dd[] = Product::where('id',$di->product_id)->where('price','>=',$start)->where('price','<=',$end)->first();

         
       }
       $categories_json = json_encode($dd);
    return view ('frontend.subcategory',['categories'=> $categories_json],['id'=> $id]);
   
          
          }
          else 
          {
                 foreach ($cat as $c)  
    {
    
                 $d = CategoryProduct::where('category_id',$c->id)->get();
                  if (!empty($d))
              {

                foreach($d as $i)
                {
            $start =  $req->start;
            $end     = $req->end;

           

$dd[] = Product::where('id',$i->product_id)->where('price','>=',$start)->where('price','<=',$end)->first();
              }

         
          }        
               
    }
      $categories_json = json_encode($dd);
    return view ('frontend.subcategory',['categories'=> $categories_json],['id'=> $id]);
          }


       



    
       }
 

   

      

             
        


            

 public function category_products_sub_size(request $req,$id)
    {
      

           $cat = Category::where('parent_id',$id)->get();
          if($cat=='[]' )
          {
    
     $d = CategoryProduct::where('category_id',$id)->get();

       foreach ($d as $di) 
       {

   $size[]=ColourImageProductSize::where('product_id',$di->product_id)->where('size_id',$req->sizeid)->first();

   $dd[] = Product::where('id',$di->product_id)->first();

         // $dd[] = Product::where('id',$di->product_id)->first();
       }
       $categories_json = json_encode($size);
    return view ('frontend.subcategory_size',['categories'=> $categories_json],['id'=> $id]);
   
          
          }
          else 
          {
                 foreach ($cat as $c)  
    {
    
                 $d = CategoryProduct::where('category_id',$c->id)->get();
                  if (!empty($d))
              {

  
                foreach($d as $i)
                {


            // $siziya =  $req->sizeid;
           
   $size[]=ColourImageProductSize::where('product_id',$i->product_id)->where('size_id',$req->sizeid)->first();

   $dd[] = Product::where('id',$i->product_id)->first()->id;

              }

         
          }        
               
    }

       $categories_json = json_encode($size);
 

   

 


    return view ('frontend.subcategory_size',['categories'=> $categories_json],['id'=> $id]);
          }


       



    
       }
 

    














 public function category_products_sub_color(request $req,$id)
    {
      

           $cat = Category::where('parent_id',$id)->get();
          if($cat=='[]' )
          {
    
     $d = CategoryProduct::where('category_id',$id)->get();

       foreach ($d as $di) 
       {

   $size[]=ColourImageProductSize::where('product_id',$di->product_id)->where('colour_id',$req->colorid)->first();

   $dd[] = Product::where('id',$di->product_id)->first();

         // $dd[] = Product::where('id',$di->product_id)->first();
       }
       $categories_json = json_encode($size);
    return view ('frontend.subcategory_size',['categories'=> $categories_json],['id'=> $id]);
   
          
          }
          else 
          {
                 foreach ($cat as $c)  
    {
    
                 $d = CategoryProduct::where('category_id',$c->id)->get();
                  if (!empty($d))
              {

  
                foreach($d as $i)
                {


            // $siziya =  $req->sizeid;
           
   $size[]=ColourImageProductSize::where('product_id',$i->product_id)->where('colour_id',$req->colorid)->first();

   $dd[] = Product::where('id',$i->product_id)->first()->id;

              }

         
          }        
               
    }

       $categories_json = json_encode($size);
 

   

 


    return view ('frontend.subcategory_size',['categories'=> $categories_json],['id'=> $id]);
          }


       



    
       }
 

    







  
  public function category_products()
    {

     
       $categories = Product::paginate(15);

        return view ('frontend.category2',['catagories'=>  $categories]);

            
    }


  public function category_products_all($id)
    {
        $category = Category::where('id',$id)->first();
         $category->id;

        $category2 = Category::where('parent_id',$category->id)->first();
        
        
        //       $category = Category::where('parent_id',$id)->first();
        // return view ('frontend.category',['categories'=>$category]);

        
        

        $category3 = Category::where('parent_id',$category2->id)->get();
        return view ('frontend.category',['categories'=>$category3]);
            
    }


  public function category_products_specific1($id)
    { 
        $category = Category::where('id',$id)->first();

         $category2 = Category::where('parent_id',$category->id)->get();
         return view ('frontend.category',['categories'=>$category2]);
        

        // $category2 = Category::where('parent_id',$category->id)->first();


        
        
        //  $category = Category::where('parent_id',$id)->first();
        // return view ('frontend.category',['categories'=>$category]);

        
        

        // $category3 = Category::where('parent_id',$category2->id)->get();
        // return view ('frontend.category',['categories'=>$category3]);
        
        

        // $category3 = Category::where('parent_id',$category2->id)->get();
        // return view ('frontend.category',['categories'=>$category3]);
    }

    public function category_products_specific2($id)
      {


   try {
            $user = Category::where('parent_id',$id)->first()->title;
        } 
        catch (\Exception $e )
         {
             $category22 = CategoryProduct::where('category_id',$id)->get();
             return view ('frontend.category',['categories'=>$category22]);
        }
        $category2 = Category::where('parent_id',$id)->get();
       return view ('frontend.category',['categories'=>$category2]);
    }

      // echo $category2 = Category::where('parent_id',$id)->first()->title;
     
    // if(!$category2 = Category::where('parent_id',$id)->first()->title)
    //  {
    //     // $category2 = Category::where('parent_id',$id)->get();
    //      $category22 = CategoryProduct::where('category_id',$id)->get();
    //    return view ('frontend.category',['categories'=>$category22]);
        
    //  }
    //  else 
    //  {
    //   $category2 = Category::where('parent_id',$id)->get();
    //    return view ('frontend.category',['categories'=>$category2]);
    //  }
     // return view ('frontend.category',['categories'=>$category2]);
     
      

          // $category22 = CategoryProduct::where('category_id',$id)->get();
          // return view ('frontend.category',['categories'=>$category22]);
        
     
      // $category2 = CategoryProduct::where('category_id',$id)->get();


        // $category2 = Category::where('parent_id',$id)->get();
        
        
    

public function category_products_specific3($id)
    {
       $category3 = CategoryProduct::where('category_id',$id)->get();
      
       
       return view ('frontend.category',['categories'=>$category3],['id'=>$id]);
    }



    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
         $batch = Batch::all();
        $category = Category::all();
        $colour = Colour::all();
        $size = Size::all();

        return view('admin.categories.create', compact('categories','batch','category','colour','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo  $request->parent_id;

      foreach ($request->categories as $category)
            {
                
            }

           

        // $request->validate([
        //     'title'=> ['required', 'string', 'max:255'],
        //     'gender'=> ['required','string' ,'max:255'],
        //     'icon'=> ['nullable','string' ,'max:255'],
        //     'image'=>  ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],

        // ]);
         $cat = new Category;
         $cat->parent_id = $category;
         $cat->title = $request->title;
         // $cat->icon = $request->icon;
         $cat->slug = '0';
         // $cat->gender = 'none';
         
       
        
        // $input = $request->all();

        // $input['slug'] = Str::slug($request->gender , '-');

        // $checktitle = Category::where('slug',$request->title)->where('gender',$request->gender)->get();

        // if(sizeof($checktitle) == 0)
        // {

            // if($request->file('image')){

            //     $image = $request->file('image');
            //     $image_name = $image->getClientOriginalName();

            //     $cat->image = $image_name;

            //     $image->storeAs('/images/categories',$image_name);

            // }

           $cat->save();
         



           Session::flash('message','Category Added Successfully');
           Session::flash('alert-type','success');
           return redirect()->route('category.index');
        // }
        Session::flash('message','Category Already exist');
        Session::flash('alert-type','error');
       return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'category'=>$category,
            'categories'=>Category::where('id','!=',$category->id)->get(),
//            'categories'=>Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'title'=> ['required', 'string', 'max:255'],
            'icon'=> ['nullable', 'string' ,'max:255'],
            'image'=>  ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);


        if($request->file('image')){

            $image = $request->file('image');

            $image_name = $image->getClientOriginalName();

            $checkImage = Category::where('image',$image_name)->get();

        }
        else{

            $value = $request->image_v;

            $checkImage = Category::where('image',$value)->get();

        }

        $slug = Str::slug($request->title , '-');

        $checktitle = Category::where('slug',$slug)->get();

        if(sizeof($checktitle) == 0 || $category->slug == $slug)
        {
            $category->parent_id = $request->parent_id;

            if($request->parent_id == null){

                $category->parent_id = 0;

            }

            $category->title = $request->title;
            $category->icon = $request->icon;
            $category->slug = $slug;

            if(sizeof($checkImage) == false){

                $image->storeAs('/images/categories',$image_name);

                $category->image = $image_name;

                $category->save();

                Session::flash('message','Category Updated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('category.index');

            }
            else{

                $category->save();

                Session::flash('message','Category Updated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('category.index');

            }

        }
        Session::flash('message','Category Already Exist');
        Session::flash('alert-type','error');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('message','Category Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('category.index');
    }
}
