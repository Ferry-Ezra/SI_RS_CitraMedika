<?php

use App\Models\RawatInap;
use App\Models\RawatJalan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     //function untuk membuat fiel pada database
    public function up(): void
    {
        Schema::create('perawatan', function (Blueprint $table) {
            $table->id();
            //untuk memasukkan rawat_jalan_id ke dalam table perawatan,karena rawat_jalan_id bersifat foreign key
            $table->foreignIdFor(RawatJalan::class);
            //untuk memasukkan rawat_inap_id ke dalam table perawatan,karena rawat_inap_id bersifat foreign key
            $table->foreignIdFor(RawatInap::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatan');
    }
};
