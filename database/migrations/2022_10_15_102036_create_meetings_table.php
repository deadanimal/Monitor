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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->date('tarikh')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();            
            $table->foreignId('projek_id')->nullable()->constrained('projeks')->cascadeOnDelete();            
            $table->foreignId('organisasi_id')->nullable()->constrained('organisasis')->cascadeOnDelete();            
            $table->timestamps();
        });

        Schema::create('meeting_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('meeting_id')->nullable()->constrained('meetings')->cascadeOnDelete();            
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();            
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
