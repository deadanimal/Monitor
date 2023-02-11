<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\Projek;

class TicketController extends Controller
{
    public function senarai(Request $request) {
        $user = $request->user();
        if($user->organisasi->id != 1) {
            $tickets = Ticket::where('user_id', $user->id)->get();  
            $projeks = Projek::where('organisasi_id', $user->organisasi->id)->get();       
        } {
            $tickets = Ticket::all();
            $projeks = Projek::all();
        }
        
        return view('ticket.senarai', compact('tickets', 'projeks'));
    
    }

    public function satu(Request $request) {
        $id = (int)$request->route('id');
        $ticket = Ticket::find($id);
        return view('ticket.satu', compact('ticket'));
    }

    public function cipta(Request $request) {
        $user = $request->user();

        $ticket = New Ticket;
        $ticket->tajuk = $request->tajuk;
        $ticket->kategori = $request->kategori;
        $ticket->status = 'BUKA';
        $ticket->user_id = $user->id;
        $ticket->projek_id = $request->projek_id;
        $ticket->save();

        $message = New TicketMessage;
        $message->ticket_id = $ticket->id;
        $message->mesej = $request->mesej;
        $message->user_id = $user->id;
        $message->save();

        return back();
    }

    public function mesej(Request $request) {
        
        $id = (int)$request->route('id');
        $user = $request->user();

        $message = New TicketMessage;
        $message->ticket_id = $id;
        $message->mesej = $request->mesej;
        $message->user_id = $user->id;
        $message->save();

        return back();        
    }

    public function tutup(Request $request) {
        $id = (int)$request->route('id');
        $ticket = Ticket::find($id);
        $ticket->status = 'BUKA';
        $ticket->save();
        return back();     
    }
}
