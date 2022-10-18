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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh')->nullable();
            $table->text('ulasan')->nullable();
            $table->foreignId('booking_asset_id')->nullable()->constrained('booking_assets')->cascadeOnDelete();                        
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();                        
            $table->timestamps();

            $table->unique(['user_id', 'tarikh', 'booking_asset_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
