<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();

        return view('admin.reviews.index',['reviews'=>$reviews]);
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
        if($request->rating == null){

            session::flash('message',"Rating field is required");
            session::flash('alert-type','error');

            return back();

        }

        if($request->comment == null){

            session::flash('message',"Review field is required");
            session::flash('alert-type','error');

            return back();
        }

        $review = new Review();

        $review->user_id = $currentuserid  = Auth::user()->id;
        $review->product_id = $request->product;
        $review->comment = $request->comment;
        $review->rating = $request->rating;

        $review->save();

        session::flash('message',"Review Submitted Successfully");
        session::flash('alert-type','success');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $reviews)
    {
        $reviewreplies=ReviewReply::where('review_id',$reviews->id)->get();

        foreach ($reviewreplies as $review_reply){
            $review_reply->delete();
        }
        $reviews->delete();
        Session::flash('message','Review Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('review.index');
    }
}
