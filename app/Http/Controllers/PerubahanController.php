<?php

namespace App\Http\Controllers;

use DataTables;
use DateTime;

use Illuminate\Http\Request;

use App\Models\Perubahan;
use App\Models\Projek;
use App\Models\Organisasi;

class PerubahanController extends Controller
{
    public function senarai_perubahan(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $perubahans = Perubahan::where('projek_id', $projek_id)->get();

        return Datatables::collection($perubahans)
            ->addIndexColumn()
            ->addColumn('pelaksana', function (Perubahan $perubahan) {
                return $perubahan->pekerja->name;
            })                            
            ->make(true);        
    }

    public function cipta_perubahan(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user_id = $request->user()->id;
    
        $perubahan = New Perubahan;
        
        $perubahan->nama = $request->nama;
        $perubahan->kategori = $request->kategori;
        $perubahan->status = 'CIPTA';
        $perubahan->deskripsi = $request->deskripsi;
        $perubahan->projek_id = $projek_id;
        $perubahan->user_id = $user_id;
        $perubahan->organisasi_id = $projek->organisasi->id;

        $perubahan->save();

        toast('Perubahan dicipta!','success');
        return back();
    }
}
