<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

     //mendisable field timestamp pada database
     public $timestamps = false;
    
     //Menunjukkan table yang ada di database yaitu pembayaran
     protected $table = "pembayaran";
 
     // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
     protected $fillable = ["pasien_id","tanggal","total_biaya","cara_pembayaran"];

    //belongsTo -> menandakan bahwa pembayaran ini memiliki relasi di table pasien berdasarkan pasien_id
     public function pasien() {
        return $this->belongsTo(Pasien::class,"pasien_id");
     }
}
