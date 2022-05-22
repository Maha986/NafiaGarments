<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes  = Size::all();
        return view ('admin.sizes.index',['sizes'=>$sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.sizes.create');
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
            'sizeName'=> ['required', 'max:255']
        ]);

        $input = $request->all();

        $input['slug'] = Str::slug($request->sizeName , '-');
        $input['sizeName'] = Str::title($request->sizeName);

        $checkSizeName = Size::where('slug',$input['slug'])->get();

        if(sizeof($checkSizeName) == 0)
        {
            Size::create($input);
            Session::flash('message','Size Added Sucessfully');
            Session::flash('alert-type','success');
            return redirect()->route('size.index');
        }
        Session::flash('message','Size Already exist');
        Session::flash('alert-type','error');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view ('admin.sizes.edit',['size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'sizeName'=> ['required', 'max:255']
        ]);

        $slug = Str::slug($request->sizeName , '-');

        $checkSizeName = Size::where('slug',$slug)->get();

        if(sizeof($checkSizeName) == 0 || $size->slug == $slug)
        {
            $size->slug = $slug;
            $size->sizeName = Str::title($request->sizeName);
            $size->save();

            Session::flash('message','Size Added Sucessfully');
            Session::flash('alert-type','success');
            return redirect()->route('size.index');
        }
        Session::flash('message','Size Already exist');
        Session::flash('alert-type','error');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        Session::flash('message','Size Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('size.index');
    }
}
