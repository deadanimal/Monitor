<?php

namespace App\Http\Controllers;
use DataTables;
use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Deliverable;
use App\Models\Projek;
use App\Models\Organisasi;

class DeliverableController extends Controller
{

    public function senarai_deliverable(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $deliverables = Deliverable::where('projek_id', $projek_id)->get();

        return Datatables::collection($deliverables)
            ->addIndexColumn()
            ->addColumn('pelaksana', function (Deliverable $deliverable) {
                return $deliverable->pekerja->name;
            })          
            ->addColumn('status_', function (Deliverable $deliverable) {
                $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($deliverable->status).'</span>';
                return $html_badge;
            })        
            ->addColumn('link', function (Deliverable $deliverable) {
                $url = '/projek/'.$deliverable->projek_id.'/deliverable/'.$deliverable->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })     
            ->editColumn('tarikh_rancang', function (Deliverable $deliverable) {
                return [
                    'display' =>($deliverable->tarikh_rancang && $deliverable->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($deliverable->tarikh_rancang))->format('d F Y') : '',
                    'timestamp' =>($deliverable->tarikh_rancang && $deliverable->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($deliverable->tarikh_rancang))->timestamp : ''
                ];
            })                 
            ->rawColumns(['status_','link'])                                  
            ->make(true);        
    }

    public function senarai_deliverable_pengguna(Request $request) {

        $id = (int)$request->route('id');        
        $deliverables = Deliverable::where('pekerja_id', $id)->get();

        return Datatables::collection($deliverables)
            ->addIndexColumn()     
            ->addColumn('pelanggan', function (Deliverable $deliverable) {
                return $deliverable->organisasi->simbol;
            })    
            ->addColumn('projek', function (Deliverable $deliverable) {
                return $deliverable->projek->simbol;
            })          
            ->addColumn('status_', function (Deliverable $deliverable) {
                $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($deliverable->status).'</span>';
                return $html_badge;
            })        
            ->addColumn('link', function (Deliverable $deliverable) {
                $url = '/projek/'.$deliverable->projek_id.'/deliverable/'.$deliverable->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })         
            ->editColumn('tarikh_rancang', function (Deliverable $deliverable) {
                return [
                    'display' =>($deliverable->tarikh_rancang && $deliverable->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($deliverable->tarikh_rancang))->format('d F Y') : '',
                    'timestamp' =>($deliverable->tarikh_rancang && $deliverable->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($deliverable->tarikh_rancang))->timestamp : ''
                ];
            })                 
            ->rawColumns(['status_','link'])                     
            ->make(true);        
    }       

    public function cipta_deliverable(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user = $request->user();
        $user_id = $user->id;
    
        $deliverable = New Deliverable;
        
        $deliverable->nama = $request->nama;
        $deliverable->kategori = $request->kategori;
        $deliverable->status = 'CIPTA';
        $deliverable->pekerja_id = (int)$request->pekerja_id;
        $deliverable->organisasi_id = $organisasi->id;
        $deliverable->tarikh_rancang = $request->tarikh_rancang;
        $deliverable->deskripsi = $request->deskripsi;
        $deliverable->projek_id = $projek_id;
        $deliverable->supervisor_id = $user_id;

        $deliverable->save();

        activity()
            ->performedOn($deliverable)
            ->causedBy($user)
            ->log('cipta');          

        toast('Deliverable dicipta!','success');
        return back();
    }

    public function satu_deliverable(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $id = (int)$request->route('id');
        
        $projek = Projek::find($projek_id);        
        $deli = Deliverable::find($id);

        return view('deliverable.satu', compact('deli', 'projek'));
    }

    public function kemaskini_deliverable(Request $req) {
        $projek_id = (int)$req->route('projek_id');
        $id = (int)$req->route('id');
        $user = $request->user();
        $user_id = $user->id;
        
        $projek = Projek::find($projek_id);        
        $deli = Deliverable::find($id);


        if ($user_id == $deli->pekerja_id) {
            if($req->jenis == 'OK') {
                $deli->deskripsi_ok = $req->deskripsi;
                $deli->status = 'SIAP';          
            } else if($req->jenis == 'KO') {
                $deli->deskripsi_ko = $req->deskripsi;
                $deli->status = 'TIDAK SIAP';
            }             
        }    

        if ($req->jenis == 'SAH' and $user_id == $deli->supervisor_id) {
            $deli->deskripsi_sah = $req->deskripsi;
            $deli->status = 'SAH';      
            $deli->tarikh_siap = new DateTime();      
        }
        
        $deli->save();

        activity()
            ->performedOn($deli)
            ->causedBy($user)
            ->log('edit');        

        toast('Hasil dikemaskini!','success');
        return back();
    }     

}
