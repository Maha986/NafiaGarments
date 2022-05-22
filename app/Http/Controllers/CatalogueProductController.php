<?php

namespace App\Http\Controllers;

use App\Models\CatalogueProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class CatalogueProductController extends Controller
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
        $request->validate([

            'catalogue_id' => ['required'],

        ]);

        $CatalogueProduct = new CatalogueProduct();

        $CatalogueProduct->size_id = Crypt::decrypt($request->get('size_id'));
        $CatalogueProduct->colour_id = Crypt::decrypt($request->get('colour_id'));
        $CatalogueProduct->product_id = Crypt::decrypt($request->get('product_id'));
        $CatalogueProduct->catalogue_id = $request->get('catalogue_id');
        $CatalogueProduct->user_id = auth()->user()->id;

        $CatalogueProduct->save();

        session::flash('message',"Catalogue List Added Successfully");
        session::flash('alert-type','success');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatalogueProduct  $catalogueProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CatalogueProduct $catalogueProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatalogueProduct  $catalogueProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CatalogueProduct $catalogueProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatalogueProduct  $catalogueProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CatalogueProduct $catalogueProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatalogueProduct  $catalogueProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatalogueProduct $catalogueProduct)
    {
        //
    }
}
