<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Projek;
use App\Models\Organisasi;


class ActivityController extends Controller
{
    public function borang_activity(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        return view('activity.cipta', compact('projek'));
    }

    public function senarai_activity(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $activities = Activity::where('projek_id', $projek_id)->get();

        return Datatables::collection($activities)
            ->addIndexColumn()
            ->addColumn('pelaksana', function (Activity $activity) {
                return $activity->pekerja->name;
            })               
            // ->addColumn('role', function (User $user) {
            //     $statement = '';
            //     foreach ($user->roles as $role) {
            //         $statement .= $role->display_name.' ';
            //     }
            //     return $statement;
            // })                
            ->make(true);        
    }

    public function cipta_activity(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user_id = $request->user()->id;
    
        $activity = New Activity;
        
        $activity->nama = $request->nama;
        $activity->kategori = $request->kategori;
        $activity->status = 'CIPTA';
        $activity->pekerja_id = (int)$request->pekerja_id;
        $activity->organisasi_id = $organisasi->id;
        $activity->tarikh_rancang = $request->tarikh_rancang;
        $activity->deskripsi = $request->deskripsi;
        $activity->projek_id = $projek_id;
        $activity->supervisor_id = $user_id;

        $activity->save();

        toast('Aktiviti dicipta!','success');
        return back();
    }

    public function ubah() {}

    public function gugur() {}
} 
