<?php

use App\Models\Pasien;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            //untuk memasukkan pasien_id ke dalam table,karena pasien_id bersifat foreign key
            $table->foreignIdFor(Pasien::class);
            //function untuk membuat field tanggal dengan tipe string dst
            $table->string('tanggal');
            $table->integer('total_biaya');
            $table->string('cara_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
