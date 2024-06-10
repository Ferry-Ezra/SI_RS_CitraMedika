<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
             //function untuk membuat field nama dengan tipe string dst
             $table->string('nama');
             $table->string('tanggal_lahir');
             $table->string('gender');
             $table->string('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
