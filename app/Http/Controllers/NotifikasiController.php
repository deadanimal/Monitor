<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function cipta($user_id, $message) {
        $noti = new Notifikasi;
        $noti->user_id = $user_id;
        $noti->message = $message;
        $noti->save();
    }
}
