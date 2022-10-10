<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use DataTables;

class OrganisasiController extends Controller
{
    public function senarai_organisasi(Request $request) {

        $orgs = Organisasi::all();
     
        if ($request->ajax()) {
            return Datatables::collection($orgs)
                ->addIndexColumn()
                ->addColumn('link', function (Organisasi $organisasi) {
                    $url = '/organisasi/'.$organisasi->id;
                    $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                    return $html_button;
                })     
                ->rawColumns(['link'])                    
                ->make(true);
        }
                        
        return view('organisasi.senarai', compact('orgs'));
    }



    public function satu_organisasi(Request $request) {
        $id = (int)$request->route('id');
        $org = Organisasi::find($id);
        return view('organisasi.satu', compact('org'));        
    }

    public function cipta_organisasi(Request $request) {
        $user = $request->user();
        $user_id = $user->id;

        $org = New Organisasi;
        $org->nama = $request->nama;
        $org->simbol = $request->simbol;
        $org->save();

        $url = '/organisasi';
        toast('Organisasi dicipta!','success');
        return redirect($url);
    }

    public function ubah_organisasi(Request $request) {

    }

    public function gugur_organisasi(Request $request) {

    }
}
