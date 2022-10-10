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
        Schema::table('activities', function (Blueprint $table) {
            $table->text('deskripsi_sah')->nullable();     
            $table->text('deskripsi_ok')->nullable();     
            $table->text('deskripsi_ko')->nullable();     
        });

        Schema::table('deliverables', function (Blueprint $table) {
            $table->text('deskripsi_sah')->nullable();     
            $table->text('deskripsi_siap')->nullable();     
            $table->text('deskripsi_lambat')->nullable();     
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
