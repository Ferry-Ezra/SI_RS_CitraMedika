<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            //function untuk membuat field jenis dengan tipe string dst
            $table->string('jenis');
            $table->integer('no_kamar');
            $table->integer('kapasitas');
            $table->string('status');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
