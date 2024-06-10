<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\RawatInap;
use Barryvdh\DomPDF\Facade\Pdf;

class RawatInapController extends Controller
{
    //function untuk mengembalikan tampilan data rawat_inap
    public function index() {
        //untuk mendapatkan data rawat_inap dari table rawat_inap
        $rawat_inap = RawatInap::all();   
        $jenisKamar = JenisKamar::all();
        $kamar = Kamar::all();
        return view("admin.rawat_inap.rawat-inap", compact("rawat_inap", "jenisKamar","kamar"));
    }

    //function untuk mengembalikan tampilan tambah data rawat_inap
    public function create() {
        $jenisKamar = JenisKamar::all();
        $kamar = Kamar::all();
        return view("admin.rawat_inap.rawat-inap-entry", compact("jenisKamar","kamar"));
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis_kamar_id"=> "required",
            "tanggal_masuk"=> "required",
            "tanggal_keluar"=> "required",
            "diagnosis"=> "required",
            "biaya"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        RawatInap::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama rawat_inap
        return redirect()->route("rawat-inap");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis_kamar_id"=> "required",
            "tanggal_masuk"=> "required",
            "tanggal_keluar"=> "required",
            "diagnosis"=> "required",
            "biaya"=> "required",
        ]);
       
       //Dibuat variable rawat_inap untuk menampung data id dari table rawat_inap
       $rawat_inap = RawatInap::find($id);

       // Function update digunakan untuk update data di dalam database
       $rawat_inap->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama rawat_inap
       return redirect()->route("rawat-inap");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable rawat_inap untuk menampung data id dari table rawat_inap
       $rawat_inap = RawatInap::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $rawat_inap->delete();

       //ketika selesai akan di alihkan ke route dengan nama rawat_inap
       return redirect()->route("rawat-inap");
   }

    //function untuk cetak pdf
    public function cetak()
    {
    //untuk mendapatkan data rawat_inap dari table rawat_inap
    $rawat_inap = RawatInap::all();   
    $jenisKamar = JenisKamar::all();
    $kamar = Kamar::all();
     $pdf = Pdf::loadview('report.report-rawat-inap', compact("rawat_inap", "jenisKamar","kamar"));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Rawat Inap.pdf');
    }
}
