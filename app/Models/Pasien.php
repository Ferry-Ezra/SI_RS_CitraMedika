<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu pasien
    protected $table = "pasien";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["nama","tanggal_lahir","gender","alamat"];

     //hasOne -> menandakan bahwa pasien ini memiliki relasi di table pembayaran berdasarkan pasien_id
     public function pembayaran() {
        return $this->hasOne(Pasien::class,"pasien_id");
     }

     public function pemeriksaan() {
        return $this->hasOne(Pemeriksaan::class,"pasien_id");
    }

}
