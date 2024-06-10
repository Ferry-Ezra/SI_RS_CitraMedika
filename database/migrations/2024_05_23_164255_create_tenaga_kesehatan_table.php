<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('tenaga_kesehatan', function (Blueprint $table) {
            $table->id();
            //function untuk membuat field jenis dengan tipe string dst
            $table->string('jenis');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_kesehatan');
    }
};
