<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use DataTables;
use Carbon\Carbon;

use App\Models\Dokumen;
use App\Models\Projek;
use App\Models\Organisasi;

class DokumenController extends Controller
{


    public function senarai_dokumen(Request $request) {

        $projek_id = (int)$request->route('projek_id');
        $dokumens = Dokumen::where('projek_id', $projek_id)->get();

        return Datatables::collection($dokumens)
            ->addIndexColumn()
            ->addColumn('pemilik', function (Dokumen $dokumen) {
                return $dokumen->user->name;
            })             
            ->addColumn('link', function (Dokumen $dokumen) {
                $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$dokumen->path;
                $html_button = '<a href="'.$url.'" target="_blank"><button class="btn btn-primary">Muat Turun</button></a>';
                return $html_button;
            })   
            ->editColumn('created_at', function (Dokumen $dokumen) {
                return [
                    'display' =>($dokumen->created_at && $dokumen->created_at != '0000-00-00 00:00:00') ? with(new Carbon($dokumen->created_at))->format('d F Y') : '',
                    'timestamp' =>($dokumen->created_at && $dokumen->created_at != '0000-00-00 00:00:00') ? with(new Carbon($dokumen->created_at))->timestamp : ''
                ];
            })                    
            ->rawColumns(['pemilik','link'])                
            ->make(true);        
    }

    public function cipta_dokumen(Request $request)
    {
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $user = $request->user();

             
        if ($request->hasFile('upload')) {

            $path = $request->file('upload')->store('monitor/uploads');
            $doku = New Dokumen;
            $doku->nama = $request->nama;
            $doku->path = $path;
            $doku->user_id = $request->user()->id;
            $doku->projek_id = $projek_id;
            $doku->organisasi_id = $projek->organisasi_id;
            $doku->save();

     
            return back()->with('success','File has been successfully uploaded.');     
        }
             

        //$path = Storage::disk('s3')->putFile('monitor/', $request->file);
        // $path = Storage::putFileAs(
        //     'monitors', $request->file, $request->user()->id
        // );     
        //$path = Storage::putFile('avatars', $request->file('avatar'));
        // $request->merge([
        //     'size' => $request->file->getSize(),
        //     'path' => $path
        // ]);
        // $this->dokumen->create($request->only('path', 'nama', 'size'));
        //return back()->with('success', 'Dokumen disimpan');
    }    

    public function senarai() {}

    public function satu() {}

    public function cipta() {}

    public function ubah() {}

    public function gugur() {}
}
