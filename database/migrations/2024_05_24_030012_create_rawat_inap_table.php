<?php

use App\Models\JenisKamar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('rawat_inap', function (Blueprint $table) {
            $table->id();
            //untuk memasukkan kamar_id ke dalam table, jenis_kamar karena kamar_id bersifat foreign key
            $table->foreignIdFor(JenisKamar::class);
            //function untuk membuat field tanggal_masuk dengan tipe string dst
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar');
            $table->string('diagnosis');
            $table->integer('biaya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_inap');
    }
};
