<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\BlockFloorProducts;
use App\Models\Category;
use App\Models\menubanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\countOf;

class HomeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function menubanner()
    {
       

        return view('admin.menubanner.create');
    }

    public function menubannerindex()
    {
    $menubanner = menubanner::all();
    return view('admin.menubanner.index',['menubanner'=>$menubanner]);

    }







public function saviya(request $request)
      {
        $validatedData = $request->validate([
         'banner_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $banner_2 = $request->file('banner_1');
                $banner_2_name = $banner_2->getClientOriginalName();
                $path = $banner_2->move(public_path('/images/banner2'), $banner_2_name);

                echo "saved";
                // move(public_path('/images/banner2'), $banner_2_name);


        // $save = new Photo;
          $menubanner = new menubanner;

          $menubanner->key = $request->key;
          $menubanner->value = $banner_2_name;
          $menubanner->status = $request->status; 
          $menubanner->save();

          echo "success";


        // $save->name = $name;
        // $save->path = $path;

        // $save->save();

        // return back()->with('status', 'Image Has been uploaded');
        // echo "image succesfully saved";
    }



public function saviyaupdate(request $request)
      {
        $validatedData = $request->validate([
         'banner_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        // $banner_2 = $request->file('banner_1');
        //         $banner_2_name = $banner_2->getClientOriginalName();
        //         $path = $banner_2->move(public_path('/images/banner2'), $banner_2_name);

        //         echo "saved";
                // move(public_path('/images/banner2'), $banner_2_name);


        // $save = new Photo;

        $menubanner = menubanner::find($request->id);
         
          $banner_2 = $request->file('banner_1');
          $banner_2_name = $banner_2->getClientOriginalName();

          $menubanner->key = $request->key;
          $menubanner->value = $banner_2_name;
          $menubanner->status = $request->status; 
          $menubanner->save();

          echo "edit success";


        // $save->name = $name;
        // $save->path = $path;

        // $save->save();

        // return back()->with('status', 'Image Has been uploaded');
        // echo "image succesfully saved";
    }

     public function menubanneredit($id)
    {
        $idofmenubanner = $id;
    // $menubanner = menubanner::find($id);
         return view('admin.menubanner.edit',['id'=>$idofmenubanner]);
   

    }

    public function logo_index()
    {
        $logos = HomeSetting::where('key','logo')->get();

        return view('admin.logos.index', ['logos'=>$logos]);
    }


    public function ape_index()
    {

        $homeSettings = DB::table('home_settings')
            ->where('key', '=', 'email')
            ->orWhere('key', 'address')
            ->orWhere('key', 'phone')
            ->get();


        return view('admin.addressphoneemails.index',['homeSettings'=>$homeSettings]);
    }


    public function slider_index()
    {

        $homeSettings = DB::table('home_settings')
            ->where('key', '=', 'slider')
            ->get();

        return view('admin.sliders.index',['homeSettings'=>$homeSettings]);
    }

    public function banner_index()
    {

        $homeSettings = DB::table('home_settings')
            ->where('key', '=', 'banner-1')
            ->orWhere('key', 'banner-2')
            ->get();

        return view('admin.banners.index',['homeSettings'=>$homeSettings]);
    }

    public function service_index()
    {

        $homeSettings = DB::table('home_settings')
            ->where('key', '=', 'service')
            ->get();

        return view('admin.services.index',['homeSettings'=>$homeSettings]);
    }

    public function floor_index(){

        $blockfloorproducts = BlockFloorProducts::all();

        return view('admin.blockfloorproducts.index',['blockfloorproducts'=>$blockfloorproducts]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logo_create()
    {
        return view('admin.logos.create');
    }

    public function ape_create()
    {
        return view('admin.addressphoneemails.create');
    }

    public function slider_create()
    {
        return view('admin.sliders.create');
    }

    public function banner_create()
    {
        return view('admin.banners.create');
    }

    public function service_create()
    {
        return view('admin.services.create');
    }

    public function floor_create()
    {
        $categories = Category::where('parent_id','!=',0)->get();

        return view('admin.blockfloorproducts.create',['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!empty($request->hidden_logo)){

            $request->validate([

                'logo' => ['required','image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=255,min_height=64'],
            ]);

            $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();

            $checkImage = HomeSetting::where('value',$image_name)->get();

            if(sizeof($checkImage) == false){

                $image->storeAs('/images/logos',$image_name);

                $homeSetting = new HomeSetting();

                $homeSetting->page_name = 'all-pages';
                $homeSetting->key = 'logo';
                $homeSetting->value = $image_name;
                $homeSetting->status = 0;

                $homeSetting->save();

                Session::flash('message','Logo Added Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('logo.index');


            }
            else{

                Session::flash('message','Logo Already exist');
                Session::flash('alert-type','danger');
                return redirect()->back();

            }
        }

       if (!empty($request->ape)){

            $request->validate([

                'address'=> ['required', 'string','max:255'],
                'phone'=> ['required','numeric', 'digits:11'],
                'email'=> ['required','email'],

            ]);

            if(!empty($request->address)){

                HomeSetting::create(['page_name'=>'all-pages','key'=>'address','value'=>$request->address,'status'=>0]);
            }

           if(!empty($request->phone)){

               HomeSetting::create(['page_name'=>'all-pages','key'=>'phone','value'=>$request->phone,'status'=>0]);
           }

           if(!empty($request->email)){

               HomeSetting::create(['page_name'=>'all-pages','key'=>'email','value'=>$request->email,'status'=>0]);
           }

            Session::flash('message','Address - Phone - Email Created Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');

        }


        if (!empty($request->slider)) {

            $request->validate([

                'title' => ['required', 'string', 'max:255'],
                'sub_title' => ['required', 'string', 'max:255'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'dimensions:min_width=666,min_height=453' ],
            ]);

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

            $image_name = str_replace(' ','_',$image_name);

            $checkImage = HomeSetting::where('value', $image_name.'~'.$request->title.'~'.$request->sub_title)->get();

            if (sizeof($checkImage) == false) {

                $image->storeAs('/images/sliders', $image_name);

                $homeSetting = new HomeSetting();

                $homeSetting->page_name = 'all-pages';
                $homeSetting->key = 'slider';
                $homeSetting->value = $image_name.'~'.$request->title.'~'.$request->sub_title;
                $homeSetting->status = 0;

                $homeSetting->save();

//                if (!empty($request->image)) {
//
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'image', 'value' => $image_name, 'status' => 0]);
//
//                }
//
//                if (!empty($request->title)) {
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'title', 'value' => $request->title, 'status' => 0]);
//
//                }
//
//                if (!empty($request->sub_title)) {
//
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'sub title', 'value' => $request->sub_title, 'status' => 0]);
//
//                }

                Session::flash('message', 'Slider Created Successfully');
                Session::flash('alert-type', 'success');
                return redirect()->route('slider.index');


            }
            else {

                Session::flash('message', 'Image Already exist');
                Session::flash('alert-type', 'error');
                return redirect()->back();

            }
        }

        if (!empty($request->banner)){

            $request->validate([

                'banner_1' => ['required','image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=225,min_height=183'],
                'banner_2' => ['required','image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=207,min_height=182'],
            ]);

            //image one
            $image_1 = $request->file('banner_1');
            $image_name_1 = $image_1->getClientOriginalName();

            $checkImage_1 = HomeSetting::where('value',$image_name_1)->get();

            //image two
            $image_2 = $request->file('banner_2');
            $image_name_2 = $image_2->getClientOriginalName();

            $checkImage_2 = HomeSetting::where('value',$image_name_2)->get();

            if(sizeof($checkImage_1) == false && sizeof($checkImage_2) == false) {

                $image_1->storeAs('/images/banners', $image_name_1);
                $image_2->storeAs('/images/banners', $image_name_2);

                if (!empty($request->banner_1)) {

                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'banner-1', 'value' =>$image_name_1 , 'status' => 0]);

                }

                if (!empty($request->banner_2)) {


                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'banner-2', 'value' =>$image_name_2 , 'status' => 0]);

                }

                Session::flash('message', 'Banner Created Successfully');
                Session::flash('alert-type', 'success');
                return redirect()->route('banner.index');



            }
            else {

                if(sizeof($checkImage_1) != false)
                {
                    $image =  $image_name_1.' Banner Already exist';
                }
                elseif(sizeof($checkImage_2) != false)
                {
                    $image =  $image_name_2.' Banner Already exist';
                }

                Session::flash('message', $image );
                Session::flash('alert-type', 'error');
                return redirect()->back();

            }


        }


        if(!empty($request->service)){

            $request->validate([

                'title' => ['required', 'string', 'max:255'],
                'sub_title' => ['required', 'string', 'max:255'],
                'icon' => ['required', 'string', 'max:255'],
            ]);

            $homeSetting = new HomeSetting();

            $homeSetting->page_name="home-page";
            $homeSetting->key="service";
            $homeSetting->value= $request->title.'~'.$request->sub_title.'~'.$request->icon;
            $homeSetting->status = 0;

            $homeSetting->save();

            Session::flash('message', 'Service Created Successfully');
            Session::flash('alert-type', 'success');
            return redirect()->route('service.index');

        }

        if(!empty($request->block_floor)){

            $request->validate([

                'title' => ['required', 'string', 'max:255'],
                'icon' => ['required', 'string', 'max:255'],
                'banner_1' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=585,min_height=65'],
                'banner_2' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=585,min_height=65'],
                'featured_banner' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=234,min_height=350'],
                'colourCode' => ['required', 'max:255'],
                'category_one' => ['required'],
                'category_two' => ['required'],
                'category_three' => ['required'],
                'category_four' => ['required'],
                'category_five' => ['required'],
                'category_six' => ['required'],
                'category_seven' => ['required'],

            ]);

            if($request->file('banner_1')){

                $banner_1 = $request->file('banner_1');
                $banner_1_name = $banner_1->getClientOriginalName();
                $banner_1->storeAs('/images/block_floor_products', $banner_1_name);

            }

            if($request->file('banner_2')){

                $banner_2 = $request->file('banner_2');
                $banner_2_name = $banner_2->getClientOriginalName();
                $banner_2->storeAs('/images/block_floor_products', $banner_2_name);

            }

            if($request->file('featured_banner')){

                $featured_banner = $request->file('featured_banner');
                $featured_banner_name = $featured_banner->getClientOriginalName();
                $featured_banner->storeAs('/images/block_floor_products', $featured_banner_name);

            }

            $blockfloorproducts = new BlockFloorProducts();

            $blockfloorproducts->title = $request->title;
            $blockfloorproducts->icon = $request->icon;
            $blockfloorproducts->banner_1 = $banner_1_name;
            $blockfloorproducts->banner_2 = $banner_2_name;
            $blockfloorproducts->featured_banner = $featured_banner_name;
            $blockfloorproducts->colourCode = $request->colourCode;
            $blockfloorproducts->category_one = $request->category_one;
            $blockfloorproducts->category_two = $request->category_two;
            $blockfloorproducts->category_three = $request->category_three;
            $blockfloorproducts->category_four = $request->category_four;
            $blockfloorproducts->category_five = $request->category_five;
            $blockfloorproducts->category_six = $request->category_six;
            $blockfloorproducts->category_seven = $request->category_seven;
            $blockfloorproducts->status = 0;

            $blockfloorproducts->save();

            Session::flash('message', 'Block Floor Created Successfully');
            Session::flash('alert-type', 'success');
            return redirect()->route('floor.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSetting $homeSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function logo_edit(HomeSetting $logo)
    {
        return view('admin.logos.edit', ['logo'=>$logo]);
    }

    public function ape_edit(HomeSetting $ape)
    {
        return view('admin.addressphoneemails.edit', ['ape'=>$ape]);
    }

    public function slider_edit(HomeSetting $slider)
    {
        return view('admin.sliders.edit', ['slider'=>$slider]);
    }

    public function banner_edit(HomeSetting $banner)
    {
        return view('admin.banners.edit', ['banner'=>$banner]);
    }

    public function service_edit(HomeSetting $service)
    {
        return view('admin.services.edit', ['service'=>$service]);
    }

    public function floor_edit(BlockFloorProducts $floor)
    {
        $categories = Category::where('parent_id','!=',0)->get();

        return view('admin.blockfloorproducts.edit', ['floor'=>$floor,'categories'=>$categories]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSetting $homesetting)
    {

        if($request->logo_value){

            $request->validate([

                'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=255,min_height=64',
            ]);

            if($request->file('logo')){

                $image = $request->file('logo');

                $image_name = $image->getClientOriginalName();

                $checkImage = HomeSetting::where('value',$image_name)->get();

            }
            else{

                $value = $request->logo_value;

                $checkImage = HomeSetting::where('value',$value)->get();

                $image_name  = null;
            }

            if(sizeof($checkImage) == false ||  $homesetting->value == $image_name || $homesetting->value == $request->logo_value){

                if(sizeof($checkImage) == false){

                    $image->storeAs('/images/logos',$image_name);

                    $homesetting->value = $image_name;

                    $homesetting->save();

                    Session::flash('message','Logo Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('logo.index');

                }
                else{

                    Session::flash('message','Logo Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('logo.index');

                }
            }
            else{

                Session::flash('message','Logo Already exists');
                Session::flash('alert-type','warning');
                return redirect()->back();

            }
        }

        if($request->address_value){

            $request->validate([

                'address'=> ['required', 'string','max:255'],
            ]);

            $homesetting->page_name = 'all-pages';
            $homesetting->key = 'address';
            $homesetting->value = $request->address;
            $homesetting->status = 0;

            $homesetting->save();

            Session::flash('message','Address Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');
        }

        if($request->phone_value){

            $request->validate([

                'phone'=> ['required','numeric', 'digits:11'],

            ]);

            $homesetting->page_name = 'all-pages';
            $homesetting->key = 'phone';
            $homesetting->value = $request->phone;
            $homesetting->status = 0;

            $homesetting->save();

            Session::flash('message','Phone Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');
        }

        if($request->email_value){

            $request->validate([

                'email'=> ['required','email'],

            ]);

            $homesetting->page_name = 'all-pages';
            $homesetting->key = 'email';
            $homesetting->value = $request->email;
            $homesetting->status = 0;

            $homesetting->save();

            Session::flash('message','Email Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');

        }

        if (!empty($request->slider)) {

            $request->validate([

                'title' => ['string', 'max:255'],
                'sub_title' => ['string', 'max:255'],
                'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'dimensions:min_width=666,min_height=453'],
            ]);

            if($request->file('image')){

                $image = $request->file('image');

                $image_name = $image->getClientOriginalName();

                $image_name = str_replace(' ','_',$image_name);


                $checkImage = HomeSetting::where('value', $image_name.'~'.$request->title.'~'.$request->sub_title)->get();

            }
            else{

                $value = $request->image_value.'~'.$request->title.'~'.$request->sub_title;

                $checkImage = HomeSetting::where('value',$value)->get();

                $image_name  = null;

            }

            if (sizeof($checkImage) == false || $homesetting->value == $image_name.'~'.$request->title.'~'.$request->sub_title || $homesetting->value == $request->image_value.'~'.$request->title.'~'.$request->sub_title) {

                if(sizeof($checkImage) == false){

                    $image->storeAs('/images/sliders', $image_name);

                    $homesetting->value = $image_name.'~'.$request->title.'~'.$request->sub_title;

                    $homesetting->save();

                    Session::flash('message','Image Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('slider.index');

                }
                else{

                    Session::flash('message','Image Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('slider.index');

                }


//                $image->storeAs('/images/sliders', $image_name);
//
//                $homeSetting = new HomeSetting();
//
//                $homeSetting->page_name = 'all-pages';
//                $homeSetting->key = 'slider';
//                $homeSetting->value = $image_name.'~'.$request->title.'~'.$request->sub_title;
//                $homeSetting->status = 0;
//
//                $homeSetting->save();

//                if (!empty($request->image)) {
//
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'image', 'value' => $image_name, 'status' => 0]);
//
//                }
//
//                if (!empty($request->title)) {
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'title', 'value' => $request->title, 'status' => 0]);
//
//                }
//
//                if (!empty($request->sub_title)) {
//
//
//                    HomeSetting::create(['page_name' => 'home-page', 'key' => 'sub title', 'value' => $request->sub_title, 'status' => 0]);
//
//                }

//                Session::flash('message', 'Slider Created Successfully');
//                Session::flash('alert-type', 'success');
//                return redirect()->route('slider.index');


            }
            else {

                Session::flash('message', 'Image Already exist');
                Session::flash('alert-type', 'error');
                return redirect()->back();

            }
        }

//        if($request->title_v){
//
//            $request->validate([
//
//                'title'=> ['required', 'string','max:255'],
//            ]);
//
//            $homesetting->page_name = 'all-pages';
//            $homesetting->key = 'title';
//            $homesetting->value = $request->title;
//            $homesetting->status = 0;
//
//            $homesetting->save();
//
//            Session::flash('message','Title Updated Successfully');
//            Session::flash('alert-type','success');
//            return redirect()->route('slider.index');
//        }

//        if($request->sub_title_v){
//
//            $request->validate([
//
//                'sub_title'=> ['required', 'string','max:255'],
//            ]);
//
//            $homesetting->page_name = 'all-pages';
//            $homesetting->key = 'sub title';
//            $homesetting->value = $request->sub_title;
//            $homesetting->status = 0;
//
//            $homesetting->save();
//
//            Session::flash('message','Sub Title Updated Successfully');
//            Session::flash('alert-type','success');
//            return redirect()->route('slider.index');
//        }

//        if($request->image_v){
//
//            $request->validate([
//
//                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//
//            ]);
//
//            if($request->file('image')){
//
//                $image = $request->file('image');
//
//                $image_name = $image->getClientOriginalName();
//
//
//                $checkImage = HomeSetting::where('value',$image_name)
//                    ->where('key','image')
//                    ->get();
//
//            }
//            else{
//
//                $value = $request->image_value;
//
//                $checkImage = HomeSetting::where('value',$value)->get();
//
//                $image_name  = null;
//
//            }
//
//            if(sizeof($checkImage) == false ||  $homesetting->value == $image_name || $homesetting->value == $request->image_value){
//
//                if(sizeof($checkImage) == false){
//
//                    $image->storeAs('/images/sliders', $image_name);
//
//                    $homesetting->value = $image_name;
//
//                    $homesetting->save();
//
//                    Session::flash('message','Image Updated Successfully');
//                    Session::flash('alert-type','success');
//                    return redirect()->route('slider.index');
//
//                }
//                else{
//
//                    Session::flash('message','Image Updated Successfully');
//                    Session::flash('alert-type','success');
//                    return redirect()->route('slider.index');
//
//                }
//            }
//            else{
//
//                Session::flash('message','Image Already exists');
//                Session::flash('alert-type','error');
//                return redirect()->back();
//
//            }
//        }

        if($request->banner_1_v){

            $request->validate([

                'banner_1' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=255,min_height=183',

            ]);

            if($request->file('banner_1')){

                $image = $request->file('banner_1');

                $image_name = $image->getClientOriginalName();

                $checkImage = HomeSetting::where('value',$image_name)
                    ->whereIn('key', ['banner-1', 'banner-2'])
                    ->get();

            }
            else{

                $value = $request->banner_1_value;

                $checkImage = HomeSetting::where('value',$value)->get();

                $image_name  = null;

            }

            if(sizeof($checkImage) == false ||  $homesetting->value == $image_name || $homesetting->value == $request->banner_1_value){

                if(sizeof($checkImage) == false){

                    $image->storeAs('/images/banners', $image_name);

                    $homesetting->value = $image_name;

                    $homesetting->save();

                    Session::flash('message','Banner Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
                else{

                    Session::flash('message','Banner Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
            }
            else{

                Session::flash('message','Banner Already exists');
                Session::flash('alert-type','error');
                return redirect()->back();

            }

        }

        if($request->banner_2_v){

            $request->validate([

                'banner_2' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=207,min_height=182',

            ]);

            if($request->file('banner_2')){

                $image = $request->file('banner_2');

                $image_name = $image->getClientOriginalName();

                $checkImage = HomeSetting::where('value',$image_name)
                    ->whereIn('key', ['banner-1', 'banner-2'])
                    ->get();

            }
            else{

                $value = $request->banner_2_value;

                $checkImage = HomeSetting::where('value',$value)->get();

                $image_name  = null;

            }

            if(sizeof($checkImage) == false ||  $homesetting->value == $image_name || $homesetting->value == $request->banner_2_value){

                if(sizeof($checkImage) == false){

                    $image->storeAs('/images/banners', $image_name);

                    $homesetting->value = $image_name;

                    $homesetting->save();

                    Session::flash('message','Banner Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
                else{

                    Session::flash('message','Banner Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
            }
            else{

                Session::flash('message','Banner Already exists');
                Session::flash('alert-type','error');
                return redirect()->back();

            }

        }

        if(!empty($request->service)){

            $request->validate([

                'title' => ['required', 'string', 'max:255'],
                'sub_title' => ['required', 'string', 'max:255'],
                'icon' => ['required', 'string', 'max:255'],
            ]);

            $homesetting->value= $request->title.'~'.$request->sub_title.'~'.$request->icon;

            $homesetting->save();

            Session::flash('message', 'Service Updated Successfully');
            Session::flash('alert-type', 'success');
            return redirect()->route('service.index');

        }
    }

    public function floor_update(Request $request, BlockFloorProducts $floor){

        if(!empty($request->block_floor)){

            $request->validate([

                'title' => ['required', 'string', 'max:255'],
                'icon' => ['required', 'string', 'max:255'],
                'banner_1' => ['image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=585,min_height=65'],
                'banner_2' => ['image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=585,min_height=65'],
                'featured_banner' => ['image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=234,min_height=350'],
                'colourCode' => ['required', 'max:255'],
                'category_one' => ['required'],
                'category_two' => ['required'],
                'category_three' => ['required'],
                'category_four' => ['required'],
                'category_five' => ['required'],
                'category_six' => ['required'],
                'category_seven' => ['required'],

            ]);

            if($request->file('banner_1')){

                $banner_1 = $request->file('banner_1');

                $banner_1_name = $banner_1->getClientOriginalName();

                $banner_1->storeAs('/images/block_floor_products', $banner_1_name);

            }
            else{

                $banner_1_name = $request->banner_1_value;

            }

            if($request->file('banner_2')){

                $banner_2 = $request->file('banner_2');

                $banner_2_name = $banner_2->getClientOriginalName();

                $banner_2->storeAs('/images/block_floor_products', $banner_2_name);

            }
            else{

                $banner_2_name = $request->banner_2_value;

            }

            if($request->file('featured_banner')){

                $featured_banner = $request->file('featured_banner');

                $featured_banner_name = $featured_banner->getClientOriginalName();

                $featured_banner->storeAs('/images/block_floor_products', $featured_banner_name);

            }
            else{

                $featured_banner_name = $request->featured_banner_value;

            }

            $floor->title = $request->title;
            $floor->icon = $request->icon;
            $floor->banner_1 = $banner_1_name;
            $floor->banner_2 = $banner_2_name;
            $floor->featured_banner = $featured_banner_name;
            $floor->colourCode = $request->colourCode;
            $floor->category_one = $request->category_one;
            $floor->category_two = $request->category_two;
            $floor->category_three = $request->category_three;
            $floor->category_four = $request->category_four;
            $floor->category_five = $request->category_five;
            $floor->category_six = $request->category_six;
            $floor->category_seven = $request->category_seven;

            $floor->save();

            Session::flash('message', 'Block Floor Updated Successfully');
            Session::flash('alert-type', 'success');
            return redirect()->route('floor.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSetting $homesetting)
    {
        if($homesetting->key == 'logo'){

            $homesetting->delete();

            Session::flash('message','Logo Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('logo.index');

        }

        if($homesetting->key == 'address'){

            $homesetting->delete();

            Session::flash('message','Address Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');

        }

        if($homesetting->key == 'phone'){

            $homesetting->delete();

            Session::flash('message','Phone Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');

        }

        if($homesetting->key == 'email'){

            $homesetting->delete();

            Session::flash('message','Email Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('ape.index');

        }

        if($homesetting->key == 'slider'){

            $homesetting->delete();

            Session::flash('message','Slider Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('slider.index');

        }


        if($homesetting->key == 'banner-1'){

            $homesetting->delete();

            Session::flash('message','Banner One Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('banner.index');

        }

        if($homesetting->key == 'banner-2'){

            $homesetting->delete();

            Session::flash('message','Banner Two Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('banner.index');
        }

        if($homesetting->key == 'service'){

            $homesetting->delete();

            Session::flash('message','Service Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('service.index');
        }

    }

    public function floor_destroy(BlockFloorProducts $floor){

        $floor->delete();

        Session::flash('message', 'Block Floor Deleted Successfully');
        Session::flash('alert-type', 'success');
        return redirect()->route('floor.index');

    }

    public function status(Request $request, HomeSetting $homesetting){

        if(!empty($request->logo)){

            if($homesetting->status == 0){

                HomeSetting::where('key','logo')->update(['status'=>0]);

                $homesetting->status = 1;

                $homesetting->save();

                Session::flash('message','Logo Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('logo.index');

            }
            elseif($homesetting->status == 1){

                $homesetting->status = 0;

                $homesetting->save();

                Session::flash('message','Logo InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('logo.index');
            }

        }
        else if(!empty($request->ape)){

           if($homesetting->key == 'address'){

               if($homesetting->status == 0){

                   HomeSetting::where('key','address')->update(['status'=>0]);

                   $homesetting->status = 1;

                   $homesetting->save();

                   Session::flash('message','Address Activated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');

               }
               elseif($homesetting->status == 1){

                   $homesetting->status = 0;

                   $homesetting->save();

                   Session::flash('message','Address InActivated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');
               }

           }
           elseif($homesetting->key == 'phone'){

               if($homesetting->status == 0){

                   HomeSetting::where('key','phone')->update(['status'=>0]);

                   $homesetting->status = 1;

                   $homesetting->save();

                   Session::flash('message','Phone Activated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');

               }
               elseif($homesetting->status == 1){

                   $homesetting->status = 0;

                   $homesetting->save();

                   Session::flash('message','Phone InActivated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');
               }

           }
           elseif($homesetting->key == 'email'){

               if($homesetting->status == 0){

                   HomeSetting::where('key','email')->update(['status'=>0]);

                   $homesetting->status = 1;

                   $homesetting->save();

                   Session::flash('message','Email Activated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');

               }
               elseif($homesetting->status == 1){

                   $homesetting->status = 0;

                   $homesetting->save();

                   Session::flash('message','Email InActivated Successfully');
                   Session::flash('alert-type','success');
                   return redirect()->route('ape.index');
               }

           }

        }
        else if(!empty($request->slider)){

            if($homesetting->key == 'slider'){

                if($homesetting->status == 0){

                    $homesetting->status = 1;

                    $homesetting->save();

                    Session::flash('message','Slider Activated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('slider.index');

                }
                elseif($homesetting->status == 1){

                    $homesetting->status = 0;

                    $homesetting->save();

                    Session::flash('message','Slider InActivated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('slider.index');
                }

            }
        }
        else if(!empty($request->banner)){

            if($homesetting->key == 'banner-1'){

                if($homesetting->status == 0){

                    HomeSetting::where('key','banner-1')->update(['status'=>0]);

                    $homesetting->status = 1;

                    $homesetting->save();

                    Session::flash('message','Banner One Activated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
                elseif($homesetting->status == 1){

                    $homesetting->status = 0;

                    $homesetting->save();

                    Session::flash('message','Banner One InActivated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');
                }

            }
            elseif($homesetting->key == 'banner-2'){

                if($homesetting->status == 0){

                    HomeSetting::where('key','banner-2')->update(['status'=>0]);

                    $homesetting->status = 1;

                    $homesetting->save();

                    Session::flash('message','Banner Two Activated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');

                }
                elseif($homesetting->status == 1){

                    $homesetting->status = 0;

                    $homesetting->save();

                    Session::flash('message','Banner Two InActivated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('banner.index');
                }

            }
        }
        else if(!empty($request->service)){

            if($homesetting->key == 'service'){

                if($homesetting->status == 0){

                    $homesetting->status = 1;

                    $homesetting->save();

                    Session::flash('message','Service Activated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('service.index');

                }
                elseif($homesetting->status == 1){

                    $homesetting->status = 0;

                    $homesetting->save();

                    Session::flash('message','Service InActivated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('service.index');
                }

            }
        }

    }

    public function floor_status(Request $request, BlockFloorProducts $floor){

        if(!empty($request->floor)){

            if($floor->status == 0){

                $floor->status = 1;

                $floor->save();

                Session::flash('message','Block Floor Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('floor.index');

            }
            elseif($floor->status == 1){

                $floor->status = 0;

                $floor->save();

                Session::flash('message','Block Floor InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('floor.index');
            }

        }

    }
}
