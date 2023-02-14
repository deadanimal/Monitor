<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\ContactUs;
use App\Mail\GiveFeedback;
use Illuminate\Support\Facades\Mail;


use DataTables;

use App\Models\User;

use App\Models\Feedback;

class PenggunaController extends Controller
{

    public function home() {
        return view('home');
    }

    public function send_message(Request $request) {
        Mail::to('afeezaziz@gmail.com')->send(new ContactUs($request));
        return back();
    }   
    
    public function feedback(Request $request) {
        //dd('123');
        if ($request->has('system')) {
            $system = $request->input('system');
        } else {
            $system = 'monitor';
        }        
        return view('feedback', compact('system'));
    }

    public function send_feedback(Request $request) {
        $feedback = Feedback::create([
            'system' => $request->system,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        Mail::to('afeezaziz@gmail.com')->send(new GiveFeedback($feedback));
        return back();
    }        

}
