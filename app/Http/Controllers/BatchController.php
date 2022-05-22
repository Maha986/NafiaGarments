<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches  = Batch::all();
        return view ('admin.batches.index',['batches'=>$batches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.batches.create');
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
            'number'=> ['required'],
            'date'=> ['required', 'date','max:255'],
            'labour_cost'=> ['required', 'numeric', 'min:1'],
            'transportation_cost'=> ['required', 'numeric', 'min:1'],
            'other_cost_one'=> ['numeric','required', 'min:1'],
            'other_cost_two'=> ['numeric','required', 'min:1'],
           
            
        ]);

    //    dd($request->all());
        $checkBatch = Batch::where('number' , $request->number)->get();

        if(sizeof($checkBatch) == 0){

           $batch = new Batch();
           $batch->name = $request->name;
           $batch->number = $request->number;
           $batch->date = $request->date ;
           $batch->labour_cost = $request->labour_cost ;
           $batch->transportation_cost = $request->transportation_cost;
           $batch->other_cost_one = $request->other_cost_one;
           $batch->other_cost_two = $request->other_cost_two;
           $batch->head_cost_one = $request->head_cost_one;;
           $batch->head_cost_two = $request->head_cost_two;

           $batch->save();

            Session::flash('message','Batch Added Sucessfully');
            Session::flash('alert-type','success');
            return redirect()->route('batch.index');

        }

        Session::flash('message','Batch Already Exists');
        Session::flash('alert-type','error');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        return view ('admin.batches.show',['batch'=>$batch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        return view ('admin.batches.edit',['batch'=>$batch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'number'=> ['required'],
            'date'=> ['nullable', 'date','max:255'],
            'labour_cost'=> ['required', 'numeric', 'min:1'],
            'transportation_cost'=> ['required', 'numeric', 'min:1'],
            'other_cost_one'=> ['numeric','required'],
            'other_cost_two'=> ['numeric','required'],
            'owner'=> 'string|nullable',
            'vendor'=> 'string|nullable',
        ]);

        $checkBatch = Batch::where('number' , $request->number)->get();

        if(sizeof($checkBatch) == 0 || $batch->number == $request->number){

            if(!empty($request->date)){

                $batch->date = $request->date;
            }

            $batch->name = $request->name;
            $batch->number = $request->number;
            $batch->labour_cost = $request->labour_cost;
            $batch->transportation_cost = $request->transportation_cost;
            $batch->other_cost_one = $request->other_cost_one;
            $batch->other_cost_two = $request->other_cost_two;
            $batch->head_cost_one = $request->owner;
            $batch->head_cost_two = $request->vendor;

            $batch->save();

            Session::flash('message','Batch Updated Sucessfully');
            Session::flash('alert-type','success');
            return redirect()->route('batch.index');

        }

        Session::flash('message','Batch Already Exists');
        Session::flash('alert-type','error');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        Session::flash('message','Batch Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('batch.index');
    }
}
