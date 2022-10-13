<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\Activity;
use App\Models\Projek;
use App\Models\Organisasi;
use App\Models\User;
use App\Models\ProPengguna;
use App\Models\ProTransaksi;

use App\Mail\SiapKerja;
use Illuminate\Support\Facades\Mail;


class ProjekController extends Controller
{
    public function senarai_projek(Request $request) {

        $user = $request->user();
        $user_id = $user->id;
        
        $orgs = Organisasi::all();

        //Mail::to('d5dd8393-fa52-441d-9000-5549f076eb95@email.webhook.site')->send(new SiapKerja($orgs));

        $user_organisasi = Organisasi::where('id', $user->organisasi_id)->first();
        if ($user_organisasi->id != 1) {
            $projeks = Projek::where('organisasi_id', $user_organisasi->id)->get();  
        } else {
            
            if($user->hasRole(['admin'])) {
                $projeks = Projek::all();            
            } else {
                $projeks = Projek::whereNot('organisasi_id', 1)->get();
            }
        
        }

        if ($request->ajax()) {
            return Datatables::collection($projeks)
                ->addIndexColumn()
                ->addColumn('organisasi', function (Projek $projek) {
                    return $projek->organisasi->nama;
                })   
                ->addColumn('link', function (Projek $projek) {
                    $url = '/projek/'.$projek->id;
                    $url2 = '/jadual-projek/'.$projek->id;
                    $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Teliti</button></a> <a href="'.$url2.'"><button class="btn btn-success">Jadual</button></a>';
                    return $html_button;
                })     
                ->rawColumns(['link'])              
                ->make(true);
        }                


        return view('projek.senarai', compact('projeks', 'orgs'));
    }  

    public function satu_projek(Request $request) {
        
        $id = $request->route('id');
        $projek = Projek::find($id);  

        $pipers = User::where('organisasi_id', 1)->get();
        $umpa_remotes = User::where('organisasi_id', 18)->get();

        return view('projek.satu', compact([
            'projek', 'pipers', 'umpa_remotes'
        ]));   
    }

    public function cipta_projek(Request $request) {
        $projek = New Projek;
        $projek->nama = $request->nama;
        $projek->simbol = $request->simbol;
        $projek->organisasi_id = $request->organisasi_id;
        $projek->save();
        toast('Projek dicipta!','success');
        return redirect('/projek');
    }

    public function ubah() {}

    public function gugur() {}
}
