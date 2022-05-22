<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Models\Liabilities;
use App\Models\Liability;
use Illuminate\Http\Request;

class LiabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('admin.liabilities.index', ['liabilities' => Liability::paginate(5)]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(MainRequest $request)
    // {
    //     //
    //     $liability = new Liability();
    //     $liability->fill($request->all())->save();
    //     return redirect()->back();
    // }

       public function store(Request $request)
    {
        //
       $liability = new Liability;

     
       $liability->serialnumber = $request->serialnumber;
      $liability->category_id = $request->category_id;
      $liability->description = $request->description;
       $liability->debit = $request->debit;
      $liability->credit = $request->credit;
      $liability->date = $request->date;

       $liability->save();
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $liability = Liability::find($id);
        $liability->fill($request->all())->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $liability = Liability::find($id);
        $liability->delete();
        return redirect()->back();
    }
}
