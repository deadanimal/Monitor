<?php

namespace App\Http\Controllers;

use File;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\Projek;
use App\Models\Organisasi;
use App\Models\User;
use App\Models\Notifikasi;

class InvoiceController extends Controller
{
    public function senarai_invoice(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $invoice = invoice::where('projek_id', $projek_id)->get();    
        
        return Datatables::collection($invoice)
            ->addIndexColumn()             
            ->addColumn('status_', function (Invoice $invoice) {
                $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($invoice->status).'</span>';
                return $html_badge;
            })        
            ->addColumn('link', function (Invoice $invoice) {
                $url = '/projek/'.$invoice->projek_id.'/invoice/'.$invoice->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })     
            ->editColumn('tarikh_rancang', function (Invoice $invoice) {
                return [
                    'display' =>($invoice->tarikh_rancang && $invoice->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($invoice->tarikh_rancang))->format('d F Y') : '',
                    'timestamp' =>($invoice->tarikh_rancang && $invoice->tarikh_rancang != '0000-00-00 00:00:00') ? with(new Carbon($invoice->tarikh_rancang))->timestamp : ''
                ];
            })        
            ->editColumn('tarikh_hantar', function (Invoice $invoice) {
                return [
                    'display' =>($invoice->tarikh_hantar && $invoice->tarikh_hantar != '0000-00-00 00:00:00') ? with(new Carbon($invoice->tarikh_hantar))->format('d F Y') : '',
                    'timestamp' =>($invoice->tarikh_hantar && $invoice->tarikh_hantar != '0000-00-00 00:00:00') ? with(new Carbon($invoice->tarikh_hantar))->timestamp : ''
                ];
            })                   
            ->rawColumns(['status_','link'])               
            ->make(true);          
    }

    public function satu_invoice(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $id = (int)$request->route('id');
        
        $projek = Projek::find($projek_id);        
        $invoice = Invoice::find($id);

        return view('invoice.satu', compact('invoice'));        
    }

    public function cipta_invoice(Request $request) {
        $projek_id = (int)$request->route('projek_id');
        $projek = Projek::find($projek_id);
        $organisasi = Organisasi::find($projek->organisasi->id);
        $user = $request->user();
        $user_id = $user->id;
    
        $invoice = New Invoice;
        
        $invoice->nama = $request->nama;
        $invoice->kategori = $request->kategori;
        $invoice->status = 'CIPTA';
        $invoice->organisasi_id = $organisasi->id;
        $invoice->tarikh_rancang = $request->tarikh_rancang;
        $invoice->projek_id = $projek_id;
        $invoice->jumlah = $request->jumlah*100;
        $invoice->user_id = $user_id;

        $invoice->save();

        activity()
            ->performedOn($invoice)
            ->causedBy($user)
            ->log('cipta');        

        toast('Invoice dicipta!','success');
        return back();        
    }

    public function ubah_invoice(Request $request) {
        
        $id = (int)$request->route('id');
        $user = $request->user();
        $invoice = invoice::find($id);
        
        $invoice->nama = $request->nama;
        $invoice->kategori = $request->kategori;
        $invoice->tarikh_rancang = $request->tarikh_rancang;
        $invoice->tarikh_hantar = $request->tarikh_hantar;
        $invoice->jumlah = $request->jumlah*100;

        $invoice->save();

        activity()
            ->performedOn($invoice)
            ->causedBy($user)
            ->log('ubah');          

        toast('Invoice diubah!','success');
        return back();
    }    

    public function gugur() {}
}
