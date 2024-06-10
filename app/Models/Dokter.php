<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu dokter_tables
    protected $table = "dokter_tables";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["nama","spesialisasi","no_sip","alamat","telp", "email"];

    public function pemeriksaan() {
        return $this->hasOne(Pemeriksaan::class,"dokter_id");
    }
}
