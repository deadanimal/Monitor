<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function senarai_kategori(Request $request) {
        
        $kategoris = Kategori::all();

        if ($request->ajax()) {
            return Datatables::collection($kategoris)
                ->addIndexColumn()                    
                ->addColumn('link', function (Kategori $kategori) {
                    $url = '/kategori/'.$kategori->id;
                    $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                    return $html_button;
                })     
                ->rawColumns(['link'])                  
                ->make(true);
        }              


        return view('kategori.senarai', compact([
            'kategoris'
        ]))->withSuccess('Task Created Successfully!');        
    }

    public function satu_kategori(Request $request) {
        $id = (int)$request->route('id');
        $cat = Kategori::find($id);
        return view('kategori.satu', compact('cat'));  
    }

    public function cipta_kategori(Request $request) {
        $kategori = New Kategori;
        $kategori->nama = $request->nama;
        //$kategori->taggable_id = $request->taggable_id;
        //$kategori->taggable_type = $request->taggable_type;
        $kategori->save();
        toast('Kategori dicipta!','success');
        return back();
    }

    public function ubah_kategori(Request $request) {

    }

    public function gugur_kategori(Request $request) {

    }
}
