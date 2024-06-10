<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu obat
    protected $table = "obat";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["nama","jenis","dosis","indikasi"];

    public function pemeriksaan() {
        return $this->hasOne(Pemeriksaan::class,"obat_id");
    }
}
