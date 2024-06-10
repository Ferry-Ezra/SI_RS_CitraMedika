<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Perawatan;
use App\Models\TenagaKesehatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PemeriksaanController extends Controller
{
     //function untuk mengembalikan tampilan data perawatan
     public function index() {
        $dokter = Dokter::all();
        $tenagaKesehatan = TenagaKesehatan::all();   
        $pasien = Pasien::all();   
        $perawatan = Perawatan::all();   
        $obat = Obat::all();   
        $pemeriksaan = Pemeriksaan::all();
        return view("admin.pemeriksaan.pemeriksaan", compact("pemeriksaan","dokter","tenagaKesehatan","pasien","perawatan","obat"));
    }

    //function untuk mengembalikan tampilan tambah data perawatan
    public function create() {
        $dokter = Dokter::all();
        $tenagaKesehatan = TenagaKesehatan::all();   
        $pasien = Pasien::all();   
        $perawatan = Perawatan::all();   
        $obat = Obat::all();     
        return view("admin.pemeriksaan.pemeriksaan-entry",compact("dokter","tenagaKesehatan","pasien","perawatan","obat"));
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "dokter_id"=> "required",
            "tenaga_kesehatan_id"=> "required",
            "pasien_id"=> "required",
            "tanggal_pemeriksaan"=> "required",
            "diagnosa"=> "required",
            "perawatan_id"=> "required",
            "obat_id"=> "required",
            "rencana_perawatan"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Pemeriksaan::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama pemeriksaan
        return redirect()->route("pemeriksaan");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "dokter_id"=> "required",
            "tenaga_kesehatan_id"=> "required",
            "pasien_id"=> "required",
            "tanggal_pemeriksaan"=> "required",
            "diagnosa"=> "required",
            "perawatan_id"=> "required",
            "obat_id"=> "required",
            "rencana_perawatan"=> "required",
        ]);
       
       //Dibuat variable pemeriksaan untuk menampung data id dari table pemeriksaan
       $pemeriksaan = Pemeriksaan::find($id);

       // Function update digunakan untuk update data di dalam database
       $pemeriksaan->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama pemeriksaan
       return redirect()->route("pemeriksaan");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable pemeriksaan untuk menampung data id dari table pemeriksaan
       $pemeriksaan = Pemeriksaan::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $pemeriksaan->delete();

       //ketika selesai akan di alihkan ke route dengan nama pemeriksaan
       return redirect()->route("pemeriksaan");
   }

    //function untuk cetak pdf
    public function cetak()
    {
        $dokter = Dokter::all();
        $tenagaKesehatan = TenagaKesehatan::all();   
        $pasien = Pasien::all();   
        $perawatan = Perawatan::all();   
        $obat = Obat::all();   
        $pemeriksaan = Pemeriksaan::all();
        $pdf = Pdf::loadview('report.report-pemeriksaan',compact("pemeriksaan","dokter","tenagaKesehatan","pasien","perawatan","obat"));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Pemeriksaan Dokter.pdf');
    }
}
