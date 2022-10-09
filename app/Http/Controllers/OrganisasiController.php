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
                ->make(true);
        }
                        
        return view('organisasi.senarai', compact('orgs'));
    }



    public function satu_organisasi(Request $request) {
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
        return redirect($url);
    }

    public function ubah_organisasi(Request $request) {

    }

    public function gugur_organisasi(Request $request) {

    }
}
