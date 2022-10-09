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
            
            $table->date('tarikh_rancang')->nullable();
            $table->dropColumn(['tarikh_rancang_mula',
            'tarikh_sebenar_mula',
            'tarikh_rancang_akhir',
            'tarikh_sebenar_akhir']);

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
