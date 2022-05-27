<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::where('user_id',auth()->user()->id)->get();

        return view('reseller.catalogues.index',['catalogues'=>$catalogues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reseller.catalogues.create');
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

            'catalogue' => ['required'],

        ]);

        $catalogue = new Catalogue();

        $catalogue->catalogue = $request->get('catalogue');
        $catalogue->user_id = auth()->user()->id;

        $catalogue->save();

        session::flash('message',"Catalogue Added Successfully");
        session::flash('alert-type','success');

        return redirect()->route('catalogue.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogue $catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        return view('reseller.catalogues.edit',['catalogue'=>$catalogue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        $request->validate([

            'catalogue' => ['required'],

        ]);

        $catalogue->catalogue = $request->get('catalogue');

        $catalogue->save();

        session::flash('message',"Catalogue Updated Successfully");
        session::flash('alert-type','success');

        return redirect()->route('catalogue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();

        session::flash('message',"Catalogue Deleted Successfully");
        session::flash('alert-type','success');

        return redirect()->route('catalogue.index');
    }
}
