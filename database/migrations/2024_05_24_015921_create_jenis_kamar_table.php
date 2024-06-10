<?php

use App\Models\Kamar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('jenis_kamar', function (Blueprint $table) {
            $table->id();
            //untuk memasukkan kamar_id ke dalam table jenis_kamar karena kamar_id bersifat foreign key
            $table->foreignIdFor(Kamar::class);
            //function untuk membuat field jumlah_kamar dengan tipe integer 
            $table->integer('jumlah_kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kamar');
    }
};
