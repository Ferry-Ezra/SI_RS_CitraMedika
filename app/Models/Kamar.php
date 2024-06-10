<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

     //mendisable field timestamp pada database
     public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu kamar
    protected $table = "kamar";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["jenis","no_kamar","kapasitas","status","keterangan"];

     //hasOne -> menandakan bahwa konsep ini memiliki relasi di table jenis_kamar berdasarkan kamar_id
    public function jenisKamar() {
        return $this->hasOne(JenisKamar::class,"kamar_id");
    }
}
