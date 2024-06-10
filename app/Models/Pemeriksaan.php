<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

    //Menunjukkan table yang ada di database yaitu pemeriksaan
   protected $table = "pemeriksaan";

   // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
   protected $fillable = [
    "dokter_id", 
    "tenaga_kesehatan_id", 
    "pasien_id", 
    "tanggal_pemeriksaan", 
    "diagnosa", 
    "perawatan_id", 
    "obat_id", 
    "rencana_perawatan"
];



   public function dokter() {
       return $this->belongsTo(Dokter::class,"dokter_id");
   }

    public function tenagaKesehatan() {
      return $this->belongsTo(TenagaKesehatan::class,"tenaga_kesehatan_id");
    
    }
    public function pasien() {
      return $this->belongsTo(Pasien::class,"pasien_id");
    }

    public function perawatan() {
        return $this->belongsTo(Perawatan::class,"perawatan_id");
    }

    public function obat() {
        return $this->belongsTo(Obat::class,"obat_id");
    }
    
}
