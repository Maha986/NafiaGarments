<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $user = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => '7'
        ];
  
   Notification::send($user, new OffersNotification($offerData));
   
      dd('Task completed!');
    }
}