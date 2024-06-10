<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKamar extends Model
{
    use HasFactory;

     //mendisable field timestamp pada database
     public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu kamar
    protected $table = "jenis_kamar";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["kamar_id","jumlah_kamar"];

     //belongsTo -> menandakan bahwa jeniskamar ini memiliki relasi di table kamar berdasarkan kamar_id
    public function kamar() {
        return $this->belongsTo(Kamar::class,"kamar_id");
    }

    //hasOne -> menandakan bahwa konsep ini memiliki relasi di table kamar berdasarkan kamar_id
    public function rawatInap() {
        return $this->hasOne(RawatInap::class,"jenis_kamar_id");
    }
}
