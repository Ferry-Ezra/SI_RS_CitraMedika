<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

     //mendisable field timestamp pada database
     public $timestamps = false;
    
     //Menunjukkan table yang ada di database yaitu rawat_inap
     protected $table = "rawat_inap";
 
     // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
     protected $fillable = ["jenis_kamar_id","tanggal_masuk","tanggal_keluar","diagnosis","biaya"];

    //belongsTo -> menandakan bahwa konsep ini memiliki relasi di table jenis_kamar berdasarkan jenis_kamar_id
     public function jenisKamar() {
        return $this->belongsTo(JenisKamar::class,"jenis_kamar_id");
     }

      //hasOne -> menandakan bahwa rawat_inap ini memiliki relasi di table perawatan berdasarkan rawat_inap_id
    public function perawatan() {
        return $this->hasOne(Perawatan::class,"rawat_inap_id");
    }
}
