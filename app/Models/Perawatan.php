<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    use HasFactory;

      //mendisable field timestamp pada database
      public $timestamps = false;

      //Menunjukkan table yang ada di database yaitu perawatan
     protected $table = "perawatan";
 
     // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
     protected $fillable = ["rawat_jalan_id","rawat_inap_id"];
 
      //belongsTo -> menandakan bahwa perawatan ini memiliki relasi di table rawat_jalan berdasarkan rawat_jalan_id
     public function rawatJalan() {
         return $this->belongsTo(RawatJalan::class,"rawat_jalan_id");
     }

      //belongsTo -> menandakan bahwa perawatan ini memiliki relasi di table rawat_inap berdasarkan rawat_inap_id
      public function rawatInap() {
        return $this->belongsTo(RawatInap::class,"rawat_inap_id");
    }

    public function pemeriksaan() {
        return $this->hasOne(Pemeriksaan::class,"perawatan_id");
    }
}
