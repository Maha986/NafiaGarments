<?php

namespace App\Http\Controllers;

use App\Models\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class ReviewReplyController extends Controller
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
        if($request->reply == null){

            session::flash('message',"Reply field is required");
            session::flash('alert-type','error');

            return back();
        }

        $reviewreply = new ReviewReply();

        $reviewreply->user_id = $currentuserid  = Auth::user()->id;
        $reviewreply->review_id = $request->review;
        $reviewreply->reply = $request->reply;

        $reviewreply->save();

        session::flash('message',"Reply Submitted Successfully");
        session::flash('alert-type','success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewReply  $reviewReply
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewReply $reviewReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewReply  $reviewReply
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewReply $reviewReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewReply  $reviewReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewReply $reviewReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewReply  $reviewReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewReply $reviewReply)
    {
        //
    }
}
