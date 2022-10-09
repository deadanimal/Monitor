<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Projek;

class ActivityController extends Controller
{
    public function borang_activity(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        return view('activity.cipta', compact('projek'));
    }

    public function satu() {}

    public function cipta() {}

    public function ubah() {}

    public function gugur() {}
} 
