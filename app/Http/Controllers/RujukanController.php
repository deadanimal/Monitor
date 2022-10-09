<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Rujukan;

class RujukanController extends Controller
{
    public function senarai_rujukan (Request $request) {

        $rujs = Rujukan::all();

        if ($request->ajax()) {
            return Datatables::collection($rujs)
                ->addIndexColumn()
                ->addColumn('link', function (Rujukan $rujukan) {
                    $url = '/rujukan/'.$rujukan->id;
                    $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                    return $html_button;
                })     
                ->rawColumns(['link'])                 
                ->make(true);
        }   

        return view('rujukan.senarai');
    }

    public function borang_rujukan() {
        return view('rujukan.borang');
    }

    public function cipta_rujukan(Request $req) {

        $ruj = New Rujukan;
        $ruj->nama = $req->nama;
        $ruj->kategori = $req->kategori;
        $ruj->deskripsi = $req->deskripsi;

        $ruj->save();
        toast('Rujukan dicipta!','success');
        return back();
    }

    public function satu_rujukan(Request $req) {
        $id = (int)$req->route('id');
        $ruj = Rujukan::find($id);
        return view('rujukan.satu', compact('ruj'));
    }    

    public function ubah_rujukan(Request $req) {

        $id = (int)$req->route('id');
        $ruj = Rujukan::find($id);
        $ruj->nama = $req->nama;
        $ruj->kategori = $req->kategori;
        $ruj->deskripsi = $req->deskripsi;

        $ruj->save();
        toast('Rujukan diubah!','success');
        return back();
    }    
}
