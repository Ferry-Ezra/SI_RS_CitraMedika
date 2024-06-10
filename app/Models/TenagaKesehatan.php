<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKesehatan extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu tenaga_kesehatan
    protected $table = "tenaga_kesehatan";

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ["jenis","nama","alamat","telp"];

    public function pemeriksaan() {
        return $this->hasOne(Pemeriksaan::class,"tenaga_kesehatan_id");
    }
}
