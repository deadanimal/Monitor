<?php

namespace App\Http\Controllers;

use DataTables;
use DateTime;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Projek;
use App\Models\Organisasi;
use App\Models\Notifikasi;
use App\Models\User;


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
            ->editColumn('tarikh_rancang', function (Activity $activity) {
                return [
                    'display' =>($activity->tarikh_rancang && $activity->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($activity->tarikh_rancang))->format('d F Y') : '',
                    'timestamp' =>($activity->tarikh_rancang && $activity->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($activity->tarikh_rancang))->timestamp : ''
                ];
            })            
            ->rawColumns(['status_','link'])               
            ->make(true);        
    }

    public function senarai_activity_pengguna(Request $request) {

        $id = (int)$request->route('id');
        $activities = Activity::where('pekerja_id', $id)->get();

        return Datatables::collection($activities)
            ->addIndexColumn()      
            ->addColumn('pelanggan', function (Activity $activity) {
                return $activity->organisasi->simbol;
            })    
            ->addColumn('projek', function (Activity $activity) {
                return $activity->projek->simbol;
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
            ->editColumn('tarikh_rancang', function (Activity $activity) {
                return [
                    'display' =>($activity->tarikh_rancang && $activity->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($activity->tarikh_rancang))->format('d F Y') : '',
                    'timestamp' =>($activity->tarikh_rancang && $activity->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($activity->tarikh_rancang))->timestamp : ''
                ];
            })         
            ->rawColumns(['status_','link'])                                               
            ->make(true);        
    }    

    public function cipta_activity(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user = $request->user();
        $user_id = $user->id;
    
        $activity = New Activity;
        
        $activity->nama = $request->nama;
        $activity->kategori = $request->kategori;
        $activity->status = 'CIPTA';
        $activity->pekerja_id = (int)$request->pekerja_id;
        $activity->pemeriksa_id = (int)$request->pemeriksa_id;
        $activity->pengesah_id = (int)$request->pengesah_id;
        $activity->organisasi_id = $organisasi->id;
        $activity->tarikh_rancang = $request->tarikh_rancang;
        $activity->deskripsi = $request->deskripsi;
        $activity->projek_id = $projek_id;
        $activity->supervisor_id = $user_id;

        $activity->save();

        activity()
            ->performedOn($activity)
            ->causedBy($user)
            ->log('cipta');        

        toast('Aktiviti dicipta!','success');
        return back();
    }

    public function ubah_activity(Request $request) {
        
        $id = (int)$request->route('id');
        $user = $request->user();
        $activity = Activity::find($id);
        
        $activity->nama = $request->nama;
        $activity->kategori = $request->kategori;
        $activity->status = $request->status;
        $activity->pekerja_id = (int)$request->pekerja_id;
        $activity->pemeriksa_id = (int)$request->pemeriksa_id;
        $activity->pengesah_id = (int)$request->pengesah_id;
        $activity->tarikh_rancang = $request->tarikh_rancang;
        $activity->deskripsi = $request->deskripsi;

        $activity->save();

        activity()
            ->performedOn($activity)
            ->causedBy($user)
            ->log('ubah');        

        toast('Aktiviti diubah!','success');
        return back();
    }    

    public function satu_activity(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $id = (int)$request->route('id');
        
        $projek = Projek::find($projek_id);        
        $act = Activity::find($id);
        $pipers = User::where('organisasi_id', 1)->get();
        $umpa_remotes = User::where('organisasi_id', 18)->get();        

        return view('activity.satu', compact('act', 'projek','pipers','umpa_remotes'));
    }

    public function kemaskini_activity(Request $req) {
        $projek_id = (int)$req->route('projek_id');
        $id = (int)$req->route('id');
        $user = $req->user();
        $user_id = $user->id;
        
        $projek = Projek::find($projek_id);        
        $act = Activity::find($id);


        if ($user_id == $act->pekerja_id) {
            if($req->jenis == 'OK') {
                $act->deskripsi_ok = $req->deskripsi;
                $act->status = 'PELAKSANA - SIAP';  

                $noti = New Notifikasi;
                $url = '/projek/'.$projek_id.'/activity/'.$id;
                $noti->message = '<a href="'.$url.'"> Aktiviti '.$id.'</a> siap oleh '.$act->pekerja->nama.'.';
                $noti->user_id = $act->pemeriksa_id;
                $noti->save();

            } else if($req->jenis == 'KO') {
                $act->deskripsi_ko = $req->deskripsi;
                $act->status = 'PELAKSANA - TIDAK SIAP';

                $noti = New Notifikasi;
                $url = '/projek/'.$projek_id.'/activity/'.$id;
                $noti->message = '<a href="'.$url.'"> Aktiviti '.$id.'</a> tidak siap oleh '.$act->pekerja->nama.'.';
                $noti->user_id = $act->pemeriksa_id;
                $noti->save();                

            }             
        }    

        if ($req->jenis == 'SAH' and $user_id == $act->supervisor_id) {
            $act->deskripsi_sah = $req->deskripsi;
            $act->status = 'PENYELARAS - SAH';      
            $act->tarikh_siap = new DateTime();      
        }
        
        $act->save();

        activity()
            ->performedOn($act)
            ->causedBy($user)
            ->log('kemaskini');           

        toast('Aktiviti dikemaskini!','success');
        return back();
    }    
} 
