<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RawatJalan;
use Barryvdh\DomPDF\Facade\Pdf;

class RawatJalanController extends Controller
{
     //function untuk mengembalikan tampilan data rawat_jalan
     public function index() {
        //untuk mendapatkan data kamar dari table rawat_jalan
        $rawat_jalan = RawatJalan::all();   
        return view("admin.rawat_jalan.rawat-jalan", compact("rawat_jalan"));
    }

    //function untuk mengembalikan tampilan tambah data rawat_jalan
    public function create() {
        return view("admin.rawat_jalan.rawat-jalan-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "tanggal"=> "required",
            "diagnosis"=> "required",
            "biaya"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        RawatJalan::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama rawat_jalan
        return redirect()->route("rawat-jalan");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "tanggal"=> "required",
            "diagnosis"=> "required",
            "biaya"=> "required",
        ]);
       
       //Dibuat variable kamar untuk menampung data id dari table rawat_jalan
       $rawat_jalan = RawatJalan::find($id);

       // Function update digunakan untuk update data di dalam database
       $rawat_jalan->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama rawat_jalan
       return redirect()->route("rawat-jalan");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable rawat_jalan untuk menampung data id dari table rawat_jalan
       $rawat_jalan = RawatJalan::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $rawat_jalan->delete();

       //ketika selesai akan di alihkan ke route dengan nama rawat_jalan
       return redirect()->route("rawat-jalan");
   }

    //function untuk cetak pdf
    public function cetak()
    {
    //untuk mendapatkan data kamar dari table rawat_jalan
    $rawat_jalan = RawatJalan::all();   
     $pdf = Pdf::loadview('report.report-rawat-jalan', compact("rawat_jalan"));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Rawat Jalan.pdf');
    }
}
