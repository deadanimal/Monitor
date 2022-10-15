<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\Meeting;
use App\Models\MeetingAttendance;

class MeetingController extends Controller
{
    public function senarai_meeting(Request $request) {}

    public function satu_meeting(Request $request) {}

    public function cipta_meeting(Request $request) {
        $meeting = New Meeting;
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
}
