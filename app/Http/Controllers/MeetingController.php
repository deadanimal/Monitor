<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\Meeting;
use App\Models\MeetingAttendance;
use App\Models\MeetingNota;

class MeetingController extends Controller
{
    public function senarai_meeting(Request $request) {
        $meetings = Meeting::all();
        return view('meeting.senarai', compact('meetings'));
    }

    public function satu_meeting(Request $request) {
        $id = (int)$request->route('id');
        $meeting = Meeting::find($id);
        $notas = MeetingNota::where('meeting_id', $meeting->id)->get();
        $peoples = MeetingAttendance::where('meeting_id', $meeting->id)->get();
        return view('meeting.satu', compact('meeting', 'peoples', 'notas'));
    }

    public function cipta_meeting(Request $request) {
        $user = $request->user();
        $user_id = $user->id;
        $meeting = New Meeting;
        $meeting->nama = $request->nama;
        $meeting->tarikh = $request->tarikh;
        $meeting->deskripsi = $request->deskripsi;
        $meeting->user_id= $user_id;
        $meeting->save();
        return back();
    }

    public function tandaan_meeting(Request $request) {
        $user = $request->user();

        $today = date("Y-m-d");
        $meetings = Meeting::where('tarikh', $today)->get();
        return view('meeting.anon', compact('meetings'));
    }

    public function menanda_meeting(Request $request) {
        
        $attendance = New MeetingAttendance;
        $attendance->meeting_id = $request->meeting_id;
        $attendance->nama = $request->nama;
        $attendance->email = $request->email;
        $attendance->save();

        return view('meeting.thankyou');
    }    

    public function nota_meeting(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $user_id = $user->id;        
        $meeting = Meeting::find($id);

        $nota = New MeetingNota;
        $nota->deskripsi = $request->deskripsi;
        $nota->meeting_id= $meeting->id;
        $nota->user_id= $user_id;
        $nota->save();        
        
        return back();
    }    
}
