<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\Activity;
use App\Models\Projek;
use App\Models\Organisasi;

class ProjekController extends Controller
{
    public function senarai_projek(Request $request) {

        $user = $request->user();
        $user_id = $user->id;
        
        $user_organisasi = Organisasi::where('id', $user->organisasi_id)->first();
        if ($user_organisasi->id != 1) {
            $orgs = Organisasi::all();
            $projeks = Projek::where('organisasi_id', $user_organisasi->id)->get();  
        } else {
            $orgs = Organisasi::all();
            $projeks = Projek::all();            
        }

        if ($request->ajax()) {
            return Datatables::collection($projeks)
                ->addIndexColumn()
                ->addColumn('organisasi', function (Projek $projek) {
                    return $projek->organisasi->nama;
                })   
                ->addColumn('link', function (Projek $projek) {
                    $url = '/projek/'.$projek->id;
                    return '<a href="'.$url.'">Lihat </a>';
                })     
                ->rawColumns(['link'])              
                ->make(true);
        }                


        return view('projek.senarai', compact('projeks', 'orgs'));
    }  

    public function satu_projek(Request $request) {
        
        $id = $request->route('id');
        $projek = Projek::find($id);  

        $aktivitis = Activity::where([
            ['projek_id', '=', $projek->id]
        ])->get();

        return view('projek.satu', compact([
            'projek', 'aktivitis'
        ]));   
    }

    public function cipta_projek(Request $request) {
        $projek = New Projek;
        $projek->nama = $request->nama;
        $projek->simbol = $request->simbol;
        $projek->organisasi_id = $request->organisasi_id;
        $projek->save();
        return redirect('/projek');
    }

    public function ubah() {}

    public function gugur() {}
}
