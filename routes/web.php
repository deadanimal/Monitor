<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\RujukanController;

Route::middleware(['auth'])->group(function () {
   
    Route::get('', [PenggunaController::class, 'dashboard'])->name('dashboard');    
    Route::get('profil', [PenggunaController::class, 'profil'])->name('profil');    
    Route::get('profil/log', [PenggunaController::class, 'log'])->name('log');   
    Route::post('profil/lokasi', [PenggunaController::class, 'lokasi'])->name('lokasi');

    // Admin Function
    Route::middleware(['role:admin'])->group(function () {

        Route::get('log', [PenggunaController::class, 'senarai_log']);
        Route::get('borang-admin', [PenggunaController::class, 'senarai_borang_admin']);
        Route::get('pengguna', [PenggunaController::class, 'senarai_pengguna'])->name('pengguna.senarai');
        Route::get('pengguna/{id}', [PenggunaController::class, 'satu_pengguna'])->name('pengguna.satu');
        Route::post('pengguna', [PenggunaController::class, 'cipta_pengguna']);
        Route::get('organisasi', [OrganisasiController::class, 'senarai_organisasi'])->name('organisasi.senarai');
        Route::post('organisasi', [OrganisasiController::class, 'cipta_organisasi']);
        Route::get('organisasi/{id}', [OrganisasiController::class, 'satu_organisasi']);
        Route::put('organisasi/{id}', [OrganisasiController::class, 'ubah_organisasi']);
    
        Route::get('kategori', [KategoriController::class, 'senarai_kategori'])->name('kategori.senarai');
        Route::post('kategori', [KategoriController::class, 'cipta_kategori']);
        Route::get('kategori/{id}', [KategoriController::class, 'satu_kategori']);
        Route::put('kategori/{id}', [KategoriController::class, 'ubah_kategori']);   
            
        Route::post('projek', [ProjekController::class, 'cipta_projek']);    
        Route::put('projek/{id}', [ProjekController::class, 'ubah_projek']);

        Route::get('rujukan/cipta', [RujukanController::class, 'borang_rujukan']);
        Route::post('rujukan', [RujukanController::class, 'cipta_rujukan']);
        Route::put('rujukan/{id}', [RujukanController::class, 'ubah_rujukan']);        
        
        
    });   
    
    // Admin Function
    Route::middleware(['role:admin|pmo|finance'])->group(function () {

        Route::post('projek/{projek_id}/activity', [ActivityController::class, 'cipta_activity']);
        Route::put('projek/{projek_id}/activity/{id}', [ActivityController::class, 'ubah_activity']);     

        Route::post('projek/{projek_id}/deliverable', [DeliverableController::class, 'cipta_deliverable']);
        Route::put('projek/{projek_id}/deliverable/{id}', [DeliverableController::class, 'ubah_deliverable']);        

        Route::post('projek/{projek_id}/invoice', [InvoiceController::class, 'cipta_invoice']);
        Route::put('projek/{projek_id}/invoice/{id}', [InvoiceController::class, 'ubah_invoice']);        
        
        
    });      


    // Other User Functions 
    
    Route::get('projek', [ProjekController::class, 'senarai_projek'])->name('projek.senarai');
    Route::get('projek/{id}', [ProjekController::class, 'satu_projek']);

    Route::get('rujukan', [RujukanController::class, 'senarai_rujukan'])->name('rujukan.senarai');
    Route::get('rujukan/{id}', [RujukanController::class, 'satu_rujukan']);
        
    
    Route::get('lokasi', [LokasiController::class, 'senarai_lokasi'])->name('lokasi.senarai');
    Route::post('lokasi', [LokasiController::class, 'cipta_lokasi']);
    Route::get('lokasi/{id}', [LokasiController::class, 'satu_lokasi']);
    Route::put('lokasi/{id}', [LokasiController::class, 'ubah_lokasi']);   
    
    Route::get('nota', [NotaController::class, 'senarai_nota'])->name('nota.senarai');
    Route::post('nota', [NotaController::class, 'cipta_nota']);
    Route::get('nota/{id}', [NotaController::class, 'satu_nota']);
    Route::put('nota/{id}', [NotaController::class, 'ubah_nota']);  

    Route::get('notifikasi', [NotifikasiController::class, 'senarai_notifikasi'])->name('notifikasi.senarai');
    Route::post('notifikasi', [NotifikasiController::class, 'cipta_notifikasi']);
    Route::get('notifikasi/{id}', [NotifikasiController::class, 'satu_notifikasi']);
    Route::put('notifikasi/{id}', [NotifikasiController::class, 'ubah_notifikasi']);      
    
    Route::get('projek/{projek_id}/nota', [NotaController::class, 'senarai_nota'])->name('projek.nota.senarai');
    Route::post('projek/{projek_id}/nota', [NotaController::class, 'cipta_nota']);
    Route::get('projek/{projek_id}/nota/{id}', [NotaController::class, 'satu_nota']);
    Route::put('projek/{projek_id}/nota/{id}', [NotaController::class, 'ubah_nota']);    
    
    Route::get('projek/{projek_id}/ticket', [TicketController::class, 'senarai_ticket']);
    Route::post('projek/{projek_id}/ticket', [TicketController::class, 'cipta_ticket']);
    Route::get('projek/{projek_id}/ticket/{id}', [TicketController::class, 'satu_ticket']);
    Route::put('projek/{projek_id}/ticket/{id}', [TicketController::class, 'ubah_ticket']);
    Route::post('projek/{projek_id}/ticket/{id}/hantar', [TicketController::class, 'hantar_message']);  

    Route::get('projek/{projek_id}/activity', [ActivityController::class, 'senarai_activity']);
    Route::get('projek/{projek_id}/activity/{id}', [ActivityController::class, 'satu_activity']);

    Route::get('projek/{projek_id}/deliverable', [DeliverableController::class, 'senarai_deliverable']);
    Route::get('projek/{projek_id}/deliverable/{id}', [DeliverableController::class, 'satu_deliverable']);  

    Route::get('projek/{projek_id}/dokumen', [DokumenController::class, 'senarai_dokumen']);
    Route::post('projek/{projek_id}/dokumen', [DokumenController::class, 'cipta_dokumen']);
    Route::get('projek/{projek_id}/dokumen/{id}', [DokumenController::class, 'satu_dokumen']);
    Route::get('projek/{projek_id}/dokumen/{id}/muatnaik', [DokumenController::class, 'muatnaik_dokumen']);
    Route::put('projek/{projek_id}/dokumen/{id}', [DokumenController::class, 'ubah_dokumen']);     
    
    Route::get('projek/{projek_id}/invoice', [InvoiceController::class, 'senarai_invoice']);     
    Route::get('projek/{projek_id}/invoice/{id}', [InvoiceController::class, 'satu_invoice']);
    
    Route::get('projek/{projek_id}/keperluan-bisnes', [PenggunaController::class, 'satu_projek']);
    Route::post('projek/{projek_id}/keperluan-bisnes', [PenggunaController::class, 'satu_projek']);
    Route::get('projek/{projek_id}/keperluan-bisnes/{id}', [PenggunaController::class, 'satu_projek']);
    Route::put('projek/{projek_id}/keperluan-bisnes/{id}', [PenggunaController::class, 'satu_projek']);

    Route::get('projek/{projek_id}/perubahan', [PerubahanController::class, 'senarai_perubahan']);
    Route::post('projek/{projek_id}/perubahan', [PerubahanController::class, 'cipta_perubahan']);
    Route::get('projek/{projek_id}/perubahan/{id}', [PerubahanController::class, 'satu_perubahan']);
    Route::put('projek/{projek_id}/perubahan/{id}', [PerubahanController::class, 'ubah_perubahan']);  
    
    Route::get('projek/{projek_id}/ralat', [RalatController::class, 'senarai_ralat']);
    Route::post('projek/{projek_id}/ralat', [RalatController::class, 'cipta_ralat']);
    Route::get('projek/{projek_id}/ralat/{id}', [RalatController::class, 'satu_ralat']);
    Route::put('projek/{projek_id}/ralat/{id}', [RalatController::class, 'ubah_ralat']);  
    
    Route::get('projek/{projek_id}/masalah', [MasalahController::class, 'senarai_masalah']);
    Route::post('projek/{projek_id}/masalah', [MasalahController::class, 'cipta_masalah']);
    Route::get('projek/{projek_id}/masalah/{id}', [MasalahController::class, 'satu_masalah']);
    Route::put('projek/{projek_id}/masalah/{id}', [MasalahController::class, 'ubah_masalah']);      

    # Lain Lain
    Route::post('upload', [PenggunaController::class, 'cipta_upload'])->name('cipta_upload');

});

require __DIR__.'/auth.php';
