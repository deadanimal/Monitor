<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Beacon;

class BeaconController extends Controller
{
    public function receive_beacon(Request $request)
    {
        $user = $request->user;

        if($user) {
            $beacon = New Beacon;
            $beacon->user_id = $user->id;
            $beacon->url = $request->url;
            $beacon->latitude = $request->latitude;
            $beacon->longitude = $request->longitude;
            $beacon->save();
            return response()->json([
                'status' => 'OK',
                'user_id' => $user->id
            ]);
        } else {
            $returnData = array(
                'status' => 'error',
                'message' => 'An error occurred!'
            );            
            return Response::json($returnData, 500);         
        }
    }
}
