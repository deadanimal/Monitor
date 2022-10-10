<?php

namespace App\Http\Controllers;

use DataTables;
use DateTime;


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
            ->addColumn('status_', function (Activity $activity) {
                $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($activity->status).'</span>';
                return $html_badge;
            })        
            ->addColumn('link', function (Activity $activity) {
                $url = '/projek/'.$activity->projek_id.'/activity/'.$activity->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })     
            ->rawColumns(['status_','link'])               
            ->make(true);        
    }

    public function senarai_activity_pengguna(Request $request) {

        $activities = Activity::where('pekerja_id', $request->user()->id)->get();

        return Datatables::collection($activities)
            ->addIndexColumn()      
            ->addColumn('pelanggan', function (Activity $activity) {
                return $activity->organisasi->nama;
            })    
            ->addColumn('projek', function (Activity $activity) {
                return $activity->projek->nama;
            })          
            ->addColumn('status_', function (Activity $activity) {
                $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($activity->status).'</span>';
                return $html_badge;
            })        
            ->addColumn('link', function (Activity $activity) {
                $url = '/projek/'.$activity->projek_id.'/activity/'.$activity->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })     
            ->rawColumns(['status_','link'])                                               
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

    public function satu_activity(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $id = (int)$request->route('id');
        
        $projek = Projek::find($projek_id);        
        $act = Activity::find($id);

        return view('activity.satu', compact('act', 'projek'));
    }

    public function kemaskini_activity(Request $req) {
        $projek_id = (int)$req->route('projek_id');
        $id = (int)$req->route('id');
        $user_id = $req->user()->id;
        
        $projek = Projek::find($projek_id);        
        $act = Activity::find($id);


        if ($user_id == $act->pekerja_id) {
            if($req->jenis == 'OK') {
                $act->deskripsi_ok = $req->deskripsi;
                $act->status = 'SIAP';          
            } else if($req->jenis == 'KO') {
                $act->deskripsi_ko = $req->deskripsi;
                $act->status = 'TIDAK SIAP';
            }             
        }    

        if ($req->jenis == 'SAH' and $user_id == $act->supervisor_id) {
            $act->deskripsi_sah = $req->deskripsi;
            $act->status = 'SAH';      
            $act->tarikh_siap = new DateTime();      
        }
        
        $act->save();

        toast('Aktiviti dikemaskini!','success');
        return back();
    }    
} 
