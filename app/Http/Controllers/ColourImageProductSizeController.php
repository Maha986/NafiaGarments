<?php

namespace App\Http\Controllers;

use App\Models\ColourImageProductSize;
use Illuminate\Http\Request;

class ColourImageProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ColourImageProductSize  $colourImageProductSize
     * @return \Illuminate\Http\Response
     */
    public function show(ColourImageProductSize $colourImageProductSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ColourImageProductSize  $colourImageProductSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ColourImageProductSize $colourImageProductSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ColourImageProductSize  $colourImageProductSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColourImageProductSize $colourImageProductSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ColourImageProductSize  $colourImageProductSize
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $a = ColourImageProductSize::find($id)->delete();

        return response()->json([
            'success' => $a,
        ]);
    }
}
