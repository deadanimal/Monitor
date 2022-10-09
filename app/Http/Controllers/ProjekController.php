<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Projek;
use App\Models\Organisasi;

class ProjekController extends Controller
{
    public function senarai_projek(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        $orgs = Organisasi::all();
        $projeks = Projek::all();


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
