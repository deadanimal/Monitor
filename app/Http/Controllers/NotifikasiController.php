<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use DataTables;

class NotifikasiController extends Controller
{
    public function cipta($user_id, $message) {
        $noti = new Notifikasi;
        $noti->user_id = $user_id;
        $noti->message = $message;
        $noti->save();
    }

    public function baca(Request $req) {
        $id = (int)$request->route('id');
        $noti = Notifikasi::find($id);
        $noti->baca = true;
        $noti->save();
    }

    public function senarai_notifikasi(Request $request) {
        $user_id = $request->user()->id;
        $notis = Notifikasi::where('user_id', $user_id)->get();

        if ($request->ajax()) {
            return Datatables::collection($notis)
                ->make(true);
        }    

        return view('notifikasi.senarai', compact('notis'));
    }
}
