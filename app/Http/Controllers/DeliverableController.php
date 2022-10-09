<?php

namespace App\Http\Controllers;
use DataTables;

use Illuminate\Http\Request;

use App\Models\Deliverable;
use App\Models\Projek;
use App\Models\Organisasi;

class DeliverableController extends Controller
{

    public function senarai_deliverable(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $deliverables = Deliverable::where('projek_id', $projek_id)->get();

        return Datatables::collection($deliverables)
            ->addIndexColumn()
            ->addColumn('pelaksana', function (Deliverable $deliverable) {
                return $deliverable->pekerja->name;
            })                            
            ->make(true);        
    }

    public function cipta_deliverable(Request $request) {
        
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user_id = $request->user()->id;
    
        $deliverable = New Deliverable;
        
        $deliverable->nama = $request->nama;
        $deliverable->kategori = $request->kategori;
        $deliverable->status = 'CIPTA';
        $deliverable->pekerja_id = (int)$request->pekerja_id;
        $deliverable->organisasi_id = $organisasi->id;
        $deliverable->tarikh_rancang = $request->tarikh_rancang;
        $deliverable->deskripsi = $request->deskripsi;
        $deliverable->projek_id = $projek_id;
        $deliverable->supervisor_id = $user_id;

        $deliverable->save();

        toast('Deliverable dicipta!','success');
        return back();
    }

    public function senarai() {}

    public function satu() {}

    public function cipta() {}

    public function ubah() {}

    public function gugur() {}
}
