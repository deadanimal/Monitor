<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenggunaController;

Route::middleware(['auth'])->group(function () {
   
    Route::get('', [PenggunaController::class, 'dashboard'])->name('dashboard');    
    Route::get('profile', [PenggunaController::class, 'profile'])->name('profile');    
    Route::get('profile/log', [PenggunaController::class, 'log'])->name('log');   
    Route::post('profile/lokasi', [PenggunaController::class, 'lokasi'])->name('lokasi');

    // Admin Function

    Route::get('log', [PenggunaController::class, 'senarai_log']);
    Route::get('user', [PenggunaController::class, 'senarai_user']);    
    Route::post('user', [PenggunaController::class, 'cipta_user']);
    Route::post('organisasi', [PenggunaController::class, 'cipta_organisasi']);
    Route::get('organisasi/{id}', [PenggunaController::class, 'satu_organisasi']);
    Route::put('organisasi/{id}', [PenggunaController::class, 'ubah_organisasi']);

    Route::get('kategori', [PenggunaController::class, 'senarai_kategori']);
    Route::post('kategori', [PenggunaController::class, 'cipta_kategori']);
    Route::get('kategori/{id}', [PenggunaController::class, 'satu_kategori']);
    Route::put('kategori/{id}', [PenggunaController::class, 'ubah_kategori']);   
    
    Route::get('projek', [PenggunaController::class, 'senarai_projek']);
    Route::post('projek', [PenggunaController::class, 'cipta_projek']);
    Route::get('projek/{id}', [PenggunaController::class, 'satu_projek']);
    Route::put('projek/{id}', [PenggunaController::class, 'ubah_projek']);     


    // Other User Functions 
    
    Route::get('lokasi', [PenggunaController::class, 'senarai_lokasi']);
    Route::post('lokasi', [PenggunaController::class, 'cipta_lokasi']);
    Route::get('lokasi/{id}', [PenggunaController::class, 'satu_lokasi']);
    Route::put('lokasi/{id}', [PenggunaController::class, 'ubah_lokasi']);   
    
    Route::get('nota', [PenggunaController::class, 'senarai_nota']);
    Route::post('nota', [PenggunaController::class, 'cipta_nota']);
    Route::get('nota/{id}', [PenggunaController::class, 'satu_nota']);
    Route::put('nota/{id}', [PenggunaController::class, 'ubah_nota']);  
    
    Route::get('projek/{projek_id}/nota', [PenggunaController::class, 'senarai_nota']);
    Route::post('projek/{projek_id}/nota', [PenggunaController::class, 'cipta_nota']);
    Route::get('projek/{projek_id}/nota/{id}', [PenggunaController::class, 'satu_nota']);
    Route::put('projek/{projek_id}/nota/{id}', [PenggunaController::class, 'ubah_nota']);    
    
    Route::get('projek/{projek_id}/ticket', [PenggunaController::class, 'senarai_ticket']);
    Route::post('projek/{projek_id}/ticket', [PenggunaController::class, 'cipta_ticket']);
    Route::get('projek/{projek_id}/ticket/{id}', [PenggunaController::class, 'satu_ticket']);
    Route::put('projek/{projek_id}/ticket/{id}', [PenggunaController::class, 'ubah_ticket']);
    Route::post('projek/{projek_id}/ticket/{id}/hantar', [PenggunaController::class, 'hantar_message']);  

    Route::get('projek/{projek_id}/activity', [PenggunaController::class, 'senarai_activity']);
    Route::post('projek/{projek_id}/activity', [PenggunaController::class, 'cipta_activity']);
    Route::get('projek/{projek_id}/activity/{id}', [PenggunaController::class, 'satu_activity']);
    Route::put('projek/{projek_id}/activity/{id}', [PenggunaController::class, 'ubah_activity']);

    Route::get('projek/{projek_id}/deliverable', [PenggunaController::class, 'senarai_deliverable']);
    Route::post('projek/{projek_id}/deliverable', [PenggunaController::class, 'cipta_deliverable']);
    Route::get('projek/{projek_id}/deliverable/{id}', [PenggunaController::class, 'satu_deliverable']);
    Route::put('projek/{projek_id}/deliverable/{id}', [PenggunaController::class, 'ubah_deliverable']); 

    Route::get('projek/{projek_id}/dokumen', [PenggunaController::class, 'senarai_dokumen']);
    Route::post('projek/{projek_id}/dokumen', [PenggunaController::class, 'cipta_dokumen']);
    Route::get('projek/{projek_id}/dokumen/{id}', [PenggunaController::class, 'satu_dokumen']);
    Route::put('projek/{projek_id}/dokumen/{id}', [PenggunaController::class, 'ubah_dokumen']);     
    
    Route::get('projek/{projek_id}/invoice', [PenggunaController::class, 'senarai_invoice']);
    Route::post('projek/{projek_id}/invoice', [PenggunaController::class, 'cipta_invoice']);
    Route::get('projek/{projek_id}/invoice/{id}', [PenggunaController::class, 'satu_invoice']);
    Route::put('projek/{projek_id}/invoice/{id}', [PenggunaController::class, 'ubah_invoice']);     
    
    Route::get('projek/{projek_id}/keperluan-bisnes', [PenggunaController::class, 'satu_projek']);
    Route::post('projek/{projek_id}/keperluan-bisnes', [PenggunaController::class, 'satu_projek']);
    Route::get('projek/{projek_id}/keperluan-bisnes/{id}', [PenggunaController::class, 'satu_projek']);
    Route::put('projek/{projek_id}/keperluan-bisnes/{id}', [PenggunaController::class, 'satu_projek']);

    Route::get('projek/{projek_id}/perubahan', [PenggunaController::class, 'senarai_perubahan']);
    Route::post('projek/{projek_id}/perubahan', [PenggunaController::class, 'cipta_perubahan']);
    Route::get('projek/{projek_id}/perubahan/{id}', [PenggunaController::class, 'satu_perubahan']);
    Route::put('projek/{projek_id}/perubahan/{id}', [PenggunaController::class, 'ubah_perubahan']);  
    
    Route::get('projek/{projek_id}/ralat', [PenggunaController::class, 'senarai_ralat']);
    Route::post('projek/{projek_id}/ralat', [PenggunaController::class, 'cipta_ralat']);
    Route::get('projek/{projek_id}/ralat/{id}', [PenggunaController::class, 'satu_ralat']);
    Route::put('projek/{projek_id}/ralat/{id}', [PenggunaController::class, 'ubah_ralat']);  
    
    Route::get('projek/{projek_id}/masalah', [PenggunaController::class, 'senarai_masalah']);
    Route::post('projek/{projek_id}/masalah', [PenggunaController::class, 'cipta_masalah']);
    Route::get('projek/{projek_id}/masalah/{id}', [PenggunaController::class, 'satu_masalah']);
    Route::put('projek/{projek_id}/masalah/{id}', [PenggunaController::class, 'ubah_masalah']);      

    # Lain Lain
    Route::post('upload', [PenggunaController::class, 'cipta_upload'])->name('cipta_upload');

});

require __DIR__.'/auth.php';
