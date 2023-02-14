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
        Alert::success('Feedback Received!', 'Your feedback to us is highly appreciated. We will take note and revert soon.');
        return back();
    }    
    
    public function afeezaziz() {
        return view('home');
    }    

    public function send_afeezaziz(Request $request) {
        Alert::success('Message Received!', 'Afeez will contact you soon!');
        Mail::to('afeezaziz@gmail.com')->send(new EmailAfeezaziz($request));
        return back();
    }       
    
    public function send_usecase(Request $request) {
        Alert::success('Message Received!', 'Pipeline will contact you soon!');
        Mail::to('connect@pipeline.com.my')->send(new EmailUsecase($request));
        return back();
    }            

}
