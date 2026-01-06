<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progres_kerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kerjaan_id')->constrained('kerjaans')->onDelete('cascade');
            $table->string('progres');
            $table->string('deskripsi');
            $table->string('status_progres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_kerjaans');
    }
};
