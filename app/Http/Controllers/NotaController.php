<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Projek;
use DataTables;
use Carbon\Carbon;

class NotaController extends Controller
{
    
    public function senarai_nota(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $notas = Nota::where('projek_id', $projek_id)->get();

        return Datatables::collection($notas)
            ->addIndexColumn() 
            ->addColumn('pemilik', function (Nota $nota) {
                return $nota->user->name;
            })                                        
            ->addColumn('link', function (Nota $nota) {
                $url = '/projek/'.$nota->projek_id.'/nota/'.$nota->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })     
            ->editColumn('created_at', function (Nota $nota) {
                return [
                    'display' =>($nota->created_at && $nota->created_at != '0000-00-00 00:00:00') ? with(new Carbon($nota->created_at))->format('d F Y') : '',
                    'timestamp' =>($nota->created_at && $nota->created_at != '0000-00-00 00:00:00') ? with(new Carbon($nota->created_at))->timestamp : ''
                ];
            })                   
            ->rawColumns(['pemilik','link'])                                 
            ->make(true);      
    }

    public function cipta_nota(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $user_id = $request->user()->id;
    
        $nota = New Nota;
        
        $nota->nama = $request->nama;
        $nota->deskripsi = $request->deskripsi;
        $nota->projek_id = $projek_id;
        $nota->user_id = $user_id;
        $nota->organisasi_id = $projek->organisasi->id;        

        $nota->save();

        toast('Nota dicipta!','success');
        return back();
    }

    public function satu_nota(Request $req) {
        $id = (int)$req->route('id');
        $nota = Nota::find($id);
        return view('nota.satu', compact('nota'));
    }  

    public function ubah_nota(Request $req) {

        $id = (int)$req->route('id');
        $nota = Nota::find($id);
        $nota->nama = $req->nama;
        $nota->deskripsi = $req->deskripsi;

        $nota->save();
        toast('Nota diubah!','success');
        return back();
    }       

}
