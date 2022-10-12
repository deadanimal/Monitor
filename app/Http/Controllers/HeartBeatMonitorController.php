<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeartBeatMonitor;
use Illuminate\Support\Str;

class HeartBeatMonitorController extends Controller
{

    public function senarai_heartbeat_monitor(Request $request) {}

    public function satu_heartbeat_monitor(Request $request) {}

    public function cipta_heartbeat_monitor(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        $monitor = New HeartBeatMonitor;
        $monitor->nama = $request->nama;
        $monitor->projek_id = $request->projek_id;
        $monitor->organisasi_id = $request->organisasi_id;
        $monitor->save();

        return back();
    }
}
