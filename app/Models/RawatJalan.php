<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    use HasFactory;
    
    //mendisable field timestamp pada database
    public $timestamps = false;
    
    //Menunjukkan table yang ada di database yaitu rawat_jalan
    protected $table = "rawat_jalan";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["tanggal","diagnosis","biaya"];

      //hasOne -> menandakan bahwa rawat_jalan ini memiliki relasi di table perawatan berdasarkan rawat_jalan_id
      public function perawatan() {
        return $this->hasOne(Perawatan::class,"rawat_jalan_id");
    }
}
