<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Projek;
use App\Models\ProTransaksi;

class ProTransaksiController extends Controller
{

    public function senarai_transaksi_projek(Request $request) {
        $id = $request->route('projek_id');
        $projek = Projek::find($id);  

        $transaksis = ProTransaksi::where('projek_id', $projek->id)->get();

        
            return Datatables::collection($transaksis)
                ->addIndexColumn()   
                ->addColumn('link', function (ProTransaksi $transaksi) {
                    $url = '/projek/'.$transaksi->projek->id.'/transaksi/'.$transaksi->id;
                    $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Teliti</button></a>';
                    return $html_button;
                })                   
                ->rawColumns(['link'])              
                ->make(true);
        
    }

    public function satu_transaksi_projek(Request $request) {
        $id = $request->route('id');

        $transaksi = ProTransaksi::find($id);
        return view('projek.satu_transaksi', compact('transaksi'));
    }    

    public function cipta_transaksi_projek(Request $request) {
        $id = $request->route('projek_id');
        $projek = Projek::find($id);  

        $transaksi = New ProTransaksi;
        $transaksi->nama = $request->nama;
        $transaksi->modul = $request->modul;
        $transaksi->aktif = true;
        $transaksi->deskripsi = $request->deskripsi;
        $transaksi->projek_id = $projek->id;
        $transaksi->organisasi_id = $projek->organisasi->id;
        $transaksi->save();
        
        toast('Transaksi dicipta!','success');
        return back();
    }
}
