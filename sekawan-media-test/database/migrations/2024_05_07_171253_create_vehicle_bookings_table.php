<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicle_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('driver_id'); 
            $table->unsignedBigInteger('approver_id_1')->nullable();
            $table->unsignedBigInteger('approver_id_2')->nullable();
            $table->boolean('approved_id_1')->default(false);
            $table->boolean('approved_id_2')->default(false);
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('users'); 
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('approver_id_1')->references('id')->on('users');
            $table->foreign('approver_id_2')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_bookings');
    }
};
