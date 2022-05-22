<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\City;
use App\Models\Country;
use App\Models\DeliveryCharges;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
            ->get();
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
            ->get();
        return response()->json($data);
    }

    public function getDeliveryCharges(Request $request){

        $data['delivery_charges'] = DeliveryCharges::where('city_id',$request->city_id)
            ->first();

        return response()->json($data);
    }

    public function getBatch(Request $request){

        if($request->inventory_id == 0){

            $data['batches'] = Batch::all();

            return response()->json($data);

        }

    }
}
