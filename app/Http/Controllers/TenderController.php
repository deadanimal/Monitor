<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Tender;

class TenderController extends Controller
{
    public function senarai_tender(Request $req) {

        $tenders = Tender::all();

        if ($req->ajax()) {
            return Datatables::collection($activities)
            ->addIndexColumn()      
            ->addColumn('pelanggan', function (Activity $activity) {
                return $activity->organisasi->nama;
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

        return view('tender.senarai');
    }

    public function satu_tender(Request $req) {
        $id = (int)$req->route('id');
        $tender = Tender::find($id);
        return view('tender.satu', compact('tender'));
    }

    public function cipta_tender(Request $req) {
        $user = $req->user();
        $user_id = $user->id;

        $tender = New Tender;

        $tender->nama = $req->nama;
        $tender->nama = $req->nama;

        $tender->pegawai_kewangan_id = $req->pegawai_kewangan_id;
        $tender->pegawai_teknikal_id = $req->pegawai_teknikal_id;        
        $tender->organisasi_id = $req->organisasi_id;
        $tender->user_id = $user_id;
        
        $tender->save();
        
        toast('Tender dicipta!','success');
        return back();
    } 
}
