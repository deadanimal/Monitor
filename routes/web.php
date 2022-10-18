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
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\RujukanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\ProTransaksiController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\BeaconController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingAssetController;

Route::get('meeting/attend', [MeetingController::class, 'tandaan_meeting']);
Route::post('meeting/attend', [MeetingController::class, 'menanda_meeting']);

Route::middleware(['auth'])->group(function () {
   
    Route::get('', [PenggunaController::class, 'dashboard'])->name('dashboard');    
    Route::get('profil', [PenggunaController::class, 'profil'])->name('profil');    
    Route::get('profil/log', [PenggunaController::class, 'log'])->name('log');   
    Route::post('profil/ubah-password', [PenggunaController::class, 'ubah_password']);
    Route::post('profil/lokasi', [PenggunaController::class, 'cipta_lokasi'])->name('cipta_lokasi');

    // Admin Function
    Route::middleware(['role:admin'])->group(function () {

        Route::get('log', [PenggunaController::class, 'senarai_log']);
        Route::get('borang-admin', [PenggunaController::class, 'senarai_borang_admin']);
        Route::get('pengguna', [PenggunaController::class, 'senarai_pengguna'])->name('pengguna.senarai');
        Route::get('pengguna/{id}', [PenggunaController::class, 'satu_pengguna'])->name('pengguna.satu');
        Route::get('pengguna/{id}/lokasi', [PenggunaController::class, 'senarai_lokasi'])->name('pengguna.senarai');
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

        Route::get('status', [PenggunaController::class, 'status']);

        Route::post('projek/{projek_id}/activity', [ActivityController::class, 'cipta_activity']);
        Route::put('projek/{projek_id}/activity/{id}', [ActivityController::class, 'ubah_activity']);     

        Route::post('projek/{projek_id}/deliverable', [DeliverableController::class, 'cipta_deliverable']);
        Route::put('projek/{projek_id}/deliverable/{id}', [DeliverableController::class, 'ubah_deliverable']);        

        Route::post('projek/{projek_id}/invoice', [InvoiceController::class, 'cipta_invoice']);
        Route::put('projek/{projek_id}/invoice/{id}', [InvoiceController::class, 'ubah_invoice']);    
        
        Route::get('jadual-staff/{id}', [PenggunaController::class, 'jadual_staff']);
        Route::get('jadual-projek/{id}', [PenggunaController::class, 'jadual_projek']);        
           
    });      


    // Other User Functions 
    
    Route::get('projek', [ProjekController::class, 'senarai_projek'])->name('projek.senarai');
    Route::get('projek/{id}', [ProjekController::class, 'satu_projek']);

    Route::get('rujukan', [RujukanController::class, 'senarai_rujukan'])->name('rujukan.senarai');
    Route::get('rujukan/{id}', [RujukanController::class, 'satu_rujukan']); 

    Route::get('notifikasi', [NotifikasiController::class, 'senarai_notifikasi'])->name('notifikasi.senarai');
    Route::get('notifikasi/{id}', [NotifikasiController::class, 'satu_notifikasi']);
    
    Route::get('projek/{projek_id}/nota', [NotaController::class, 'senarai_nota'])->name('projek.nota.senarai');
    Route::post('projek/{projek_id}/nota', [NotaController::class, 'cipta_nota']);
    Route::get('projek/{projek_id}/nota/{id}', [NotaController::class, 'satu_nota']);
    Route::put('projek/{projek_id}/nota/{id}', [NotaController::class, 'ubah_nota']);     

    Route::get('projek/{projek_id}/activity', [ActivityController::class, 'senarai_activity']);
    Route::get('projek/{projek_id}/activity/{id}', [ActivityController::class, 'satu_activity']);
    Route::post('projek/{projek_id}/activity/{id}/kemaskini', [ActivityController::class, 'kemaskini_activity']);

    Route::get('projek/{projek_id}/deliverable', [DeliverableController::class, 'senarai_deliverable']);
    Route::get('projek/{projek_id}/deliverable/{id}', [DeliverableController::class, 'satu_deliverable']);  
    Route::post('projek/{projek_id}/deliverable/{id}/kemaskini', [DeliverableController::class, 'kemaskini_deliverable']);  

    Route::get('projek/{projek_id}/dokumen', [DokumenController::class, 'senarai_dokumen']);
    Route::post('projek/{projek_id}/dokumen', [DokumenController::class, 'cipta_dokumen']);
    
    Route::get('projek/{projek_id}/invoice', [InvoiceController::class, 'senarai_invoice']);     
    Route::get('projek/{projek_id}/invoice/{id}', [InvoiceController::class, 'satu_invoice']);

    Route::get('projek/{projek_id}/perubahan', [PerubahanController::class, 'senarai_perubahan']);
    Route::post('projek/{projek_id}/perubahan', [PerubahanController::class, 'cipta_perubahan']);
    Route::get('projek/{projek_id}/perubahan/{id}', [PerubahanController::class, 'satu_perubahan']);
    Route::post('projek/{projek_id}/perubahan/{id}/terima', [PerubahanController::class, 'terima_perubahan']);
    Route::post('projek/{projek_id}/perubahan/{id}/siap', [PerubahanController::class, 'siap_perubahan']);
    Route::post('projek/{projek_id}/perubahan/{id}/sah', [PerubahanController::class, 'sah_perubahan']);
    
    Route::get('projek/{projek_id}/ralat', [RalatController::class, 'senarai_ralat']);
    Route::post('projek/{projek_id}/ralat', [RalatController::class, 'cipta_ralat']);
    Route::get('projek/{projek_id}/ralat/{id}', [RalatController::class, 'satu_ralat']);
    Route::post('projek/{projek_id}/ralat/{id}/terima', [RalatController::class, 'terima_ralat']);
    Route::post('projek/{projek_id}/ralat/{id}/siap', [RalatController::class, 'siap_ralat']);
    Route::post('projek/{projek_id}/ralat/{id}/sah', [RalatController::class, 'sah_ralat']);    
    
    Route::get('projek/{projek_id}/masalah', [MasalahController::class, 'senarai_masalah']);
    Route::post('projek/{projek_id}/masalah', [MasalahController::class, 'cipta_masalah']);
    Route::get('projek/{projek_id}/masalah/{id}', [MasalahController::class, 'satu_masalah']);
    Route::post('projek/{projek_id}/masalah/{id}/terima', [MasalahController::class, 'terima_masalah']);
    Route::post('projek/{projek_id}/masalah/{id}/siap', [MasalahController::class, 'siap_masalah']);
    Route::post('projek/{projek_id}/masalah/{id}/sah', [MasalahController::class, 'sah_masalah']);  

    Route::get('projek/{projek_id}/transaksi', [ProTransaksiController::class, 'senarai_transaksi_projek']);
    Route::get('projek/{projek_id}/transaksi/{id}', [ProTransaksiController::class, 'satu_transaksi_projek']);
    Route::post('projek/{projek_id}/transaksi', [ProTransaksiController::class, 'cipta_transaksi_projek']);    
    
    Route::get('tender', [TenderController::class, 'senarai_tender'])->name('tender.senarai');
    Route::get('tender/{id}', [TenderController::class, 'satu_tender']);    

    Route::get('kewangan', [TenderController::class, 'senarai_tender'])->name('tender.senarai');
    Route::get('sumber-manusia', [TenderController::class, 'senarai_tender'])->name('tender.senarai');

    # User Specific
    Route::get('pengguna/{id}/activity', [ActivityController::class, 'senarai_activity_pengguna']);
    Route::get('pengguna/{id}/deliverable', [DeliverableController::class, 'senarai_deliverable_pengguna']);

    Route::post('beacon', [BeaconController::class, 'receive_beacon']);

    Route::get('meeting', [MeetingController::class, 'senarai_meeting']);
    Route::post('meeting', [MeetingController::class, 'cipta_meeting']);
    Route::get('meeting/{id}', [MeetingController::class, 'satu_meeting']);
    Route::post('meeting/{id}/nota', [MeetingController::class, 'nota_meeting']);

    Route::get('booking', [BookingController::class, 'senarai_booking']);

    Route::get('booking-asset', [BookingAssetController::class, 'senarai_booking_asset']); 
    Route::post('booking-asset', [BookingAssetController::class, 'cipta_booking_asset']);     
    Route::get('booking-asset/{id}', [BookingAssetController::class, 'satu_booking_asset']);
    Route::get('booking-asset/{id}/book', [BookingAssetController::class, 'cipta_booking']);  

});


require __DIR__.'/auth.php';


// Route::get('lokasi', [LokasiController::class, 'senarai_lokasi'])->name('lokasi.senarai');
// Route::post('lokasi', [LokasiController::class, 'cipta_lokasi']);
// Route::get('lokasi/{id}', [LokasiController::class, 'satu_lokasi']);
// Route::put('lokasi/{id}', [LokasiController::class, 'ubah_lokasi']);   

// Route::get('nota', [NotaController::class, 'senarai_nota'])->name('nota.senarai');
// Route::post('nota', [NotaController::class, 'cipta_nota']);
// Route::get('nota/{id}', [NotaController::class, 'satu_nota']);
// Route::put('nota/{id}', [NotaController::class, 'ubah_nota']); 