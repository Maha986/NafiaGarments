<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = DB::table('abouts')->get();
        return view('admin.aboutus.index',['abouts'=>$abouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
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

            'title' =>['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required'],

        ]);

        $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $checkImage = About::where('image',$image_name)->get();


            if(sizeof($checkImage) == false){
                $title= $request->input('title');
                $description= $request->input('description');
                $image->storeAs('/images/about/',$image_name);

                $aboutus = new About();

                $aboutus->title = $title;
                $aboutus->image = $image_name;
                $aboutus->description = $description;
                $aboutus->status = 0;

                $aboutus->save();

                Session::flash('message','About us Added Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('aboutus.index');


            }
            else{

                Session::flash('message','Image Already exist');
                Session::flash('alert-type','danger');
                return redirect()->back();

            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.aboutus.edit',['about'=>$about]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {

        $request->validate([
                'title'=> ['required'],
                'image'=> 'image|mimes:jpeg,png,jpg,gif,svg',
                'description'=>['required'],
            ]);

            if($request->file('image')){

                $image = $request->file('image');

                $image_name = $image->getClientOriginalName();

                $checkImage = About::where('image',$image_name)->get();

            }
            else{
                $value = $request->image_value;

                $checkImage = About::where('image',$value)->get();

                $image_name  = null;
            }

            if(sizeof($checkImage) == false ||  $about->image == $image_name || $request->image_value==$about->image){

                if(sizeof($checkImage) == false){

                    $image->storeAs('/images/about',$image_name);

                    $about->title = $request->title;
                    $about->image = $image_name;
                    $about->description = $request->description;

                    $about->save();

                    Session::flash('message','Image Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('aboutus.index');

                }
                else{
                    $about->title = $request->title;
                    $about->description = $request->description;
                    $about->save();
                    Session::flash('message','Image Updated Successfully');
                    Session::flash('alert-type','success');
                    return redirect()->route('aboutus.index');

                }
            }
            else{

                Session::flash('message','Image Already exists');
                Session::flash('alert-type','warning');
                return redirect()->back();

            }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if($about->id){

            $about->delete();

            Session::flash('message','About us Deleted Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('aboutus.index');

        }
    }
    public function status(Request $request, About $about){

            if($about->status == 0){

                $about->status = 1;

                $about->save();

                Session::flash('message','Aboutus Activated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('aboutus.index');

            }
            elseif($about->status == 1){

                $about->status = 0;

                $about->save();

                Session::flash('message','Aboutus InActivated Successfully');
                Session::flash('alert-type','success');
                return redirect()->route('aboutus.index');
            }
    }
}
