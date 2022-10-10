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
        Schema::table('perubahans', function (Blueprint $table) {
            $table->string('nama')->nullable();
            $table->string('kategori')->nullable();
            $table->string('status')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('projek_id')->nullable()->constrained('projeks')->cascadeOnDelete();
            $table->foreignId('organisasi_id')->nullable()->constrained('organisasis')->cascadeOnDelete();              
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
