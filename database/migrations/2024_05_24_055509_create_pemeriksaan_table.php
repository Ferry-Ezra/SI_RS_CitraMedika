<?php

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Perawatan;
use App\Models\TenagaKesehatan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dokter::class);
            $table->foreignIdFor(TenagaKesehatan::class);
            $table->foreignIdFor(Pasien::class);
            $table->string('tanggal_pemeriksaan');
            $table->string('diagnosa');
            $table->foreignIdFor(Perawatan::class);
            $table->foreignIdFor(Obat::class);
            $table->string('rencana_perawatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
