<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use DataTables;

class NotaController extends Controller
{
    public function senarai_nota(Request $request) {
        $notas = Nota::all();
     
        if ($request->ajax()) {
            return Datatables::collection($notas)
                ->addIndexColumn()
                ->make(true);
        }
                        
        return view('nota.senarai', compact('notas'));
    }

    public function satu_nota(Request $request) {

    }

    public function cipta_nota(Request $request) {

    }

    public function ubah_nota(Request $request) {

    }

    public function gugur_nota(Request $request) {

    }
}
