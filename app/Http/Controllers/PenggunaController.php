<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function dashboard(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('dashboard', compact('user'));
    }

    public function profile(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('profile', compact('user'));
    }  
    
    public function log(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('log', compact('user'));
    }  
    
    public function lokasi(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('log', compact('user'));
    }         


}
