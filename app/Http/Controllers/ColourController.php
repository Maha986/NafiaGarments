<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours  = Colour::all();
        return view ('admin.colours.index',['colours'=>$colours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.colours.create');
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
            'colourCode'=> ['required', 'max:255']
        ]);

        $input = $request->all();

        $checkcolour = Colour::where('colourCode',$request->colourCode)->get();

        if(sizeof($checkcolour) == 0)
        {
            Colour::create($input);
            Session::flash('message','Colour Added Sucessfully');
            Session::flash('alert-type','success');
            return redirect()->route('colour.index');
        }
        Session::flash('message','Colour Already exist');
        Session::flash('alert-type','danger');
        return redirect()->route('colour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function show(Colour $colour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function edit(Colour $colour)
    {
        $colours  = Colour::all();
        return view ('admin.colours.edit',['colour'=>$colour]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colour $colour)
    {
        $request->validate([
            'colourCode'=> ['required', 'max:255']
        ]);

        $checkcolour = Colour::where('colourCode',$request->colourCode)->get();

        if(sizeof($checkcolour) == 0 || $colour->colourCode == $request->colourCode)
        {

            $colour->colourCode = $request->colourCode;
            $colour->save();

            Session::flash('message','Colour Updated Successfully');
            Session::flash('alert-type','success');
            return redirect()->route('colour.index');
        }
        Session::flash('message','Colour already exist with this code');
        Session::flash('alert-type','success');
        return redirect()->route('colour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colour $colour)
    {
        $colour->delete();
        Session::flash('message','Colour Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('colour.index');
    }
}
