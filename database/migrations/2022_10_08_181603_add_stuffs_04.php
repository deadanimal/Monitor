<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$table->char('name', 100);
        Schema::table('activities', function (Blueprint $table) {
            $table->string('nama')->nullable();
            $table->char('kategori', 12)->nullable();  
            $table->char('status', 12)->nullable();   
            $table->date('tarikh_rancang_mula')->nullable();
            $table->date('tarikh_sebenar_mula')->nullable();
            $table->date('tarikh_rancang_akhir')->nullable();
            $table->date('tarikh_sebenar_akhir')->nullable();
            $table->date('tarikh_siap')->nullable();
            
            $table->foreignId('projek_id')->nullable()->constrained('projeks')->cascadeOnDelete();
            $table->foreignId('organisasi_id')->nullable()->constrained('organisasis')->cascadeOnDelete();
            
            $table->foreignId('pekerja_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('supervisor_id')->nullable()->constrained('users')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
