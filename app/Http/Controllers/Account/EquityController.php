<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Models\Equity;
use Illuminate\Http\Request;

class EquityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('admin.equities.index', ['equities' => Equity::paginate(5)]);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(MainRequest $request)
    // {
    //     //
    //     $equity = new Equity();
    //     $equity->fill($request->all())->save();
    //     return redirect()->back();
    // }


   public function store(Request $request)
    {
        //
       $equity = new Equity;

     
       $equity->serialnumber = $request->serialnumber;
       $equity->category_id = $request->category_id;
       $equity->description = $request->description;
       $equity->debit = $request->debit;
       $equity->credit = $request->credit;
       $equity->date = $request->date;

       $equity->save();
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
        $equity = Equity::find($id);
        $equity->fill($request->all())->save();
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
        $equity = Equity::find($id);
        $equity->delete();
        return redirect()->back();

    }
}
