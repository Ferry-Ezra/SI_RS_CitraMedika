<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('rawat_jalan', function (Blueprint $table) {
            $table->id();
             //function untuk membuat field tanggal dengan tipe string dst
             $table->string('tanggal');
             $table->string('diagnosis');
             $table->integer('biaya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_jalan');
    }
};
