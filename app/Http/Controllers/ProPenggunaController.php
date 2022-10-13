<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek;
use App\Models\ProPengguna;

class ProPenggunaController extends Controller
{
    public function cipta_pengguna_projek(Request $request) {
        $id = $request->route('id');
        $projek = Projek::find($id);  

        $pengguna = New ProPengguna;
        $pengguna->nama = $request->nama;
        $pengguna->aktif = true;
        $pengguna->deskripsi = $request->deskripsi;
        $pengguna->projek_id = $projek->id;
        $pengguna->organisasi_id = $projek->organisasi->id;
        $pengguna->save();
        
        return back();
    }

}
