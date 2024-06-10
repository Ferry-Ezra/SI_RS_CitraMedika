<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PerawatanController extends Controller
{
    //function untuk mengembalikan tampilan data perawatan
    public function index() {
        //untuk mendapatkan data perawatan dari table perawatan
        $perawatan = Perawatan::all();
         //untuk mendapatkan data rawatJalan dari table rawatJalan
        $rawatJalan = RawatJalan::all();   
         //untuk mendapatkan data rawatinap dari table rawatInap
        $rawatInap = RawatInap::all();   
        return view("admin.perawatan.perawatan", compact("perawatan","rawatJalan","rawatInap"));
    }

    //function untuk mengembalikan tampilan tambah data perawatan
    public function create() {
        //untuk mendapatkan data rawatJalan dari table rawatJalan
        $rawatJalan = RawatJalan::all();   
         //untuk mendapatkan data rawatinap dari table rawatInap
        $rawatInap = RawatInap::all();    
        return view("admin.perawatan.perawatan-entry", compact("rawatJalan","rawatInap"));
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "rawat_jalan_id"=> "required",
            "rawat_inap_id"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Perawatan::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama perawatan
        return redirect()->route("perawatan");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "rawat_jalan_id"=> "required",
            "rawat_inap_id"=> "required",
        ]);
       
       //Dibuat variable perawatan untuk menampung data id dari table perawatan
       $perawatan = Perawatan::find($id);

       // Function update digunakan untuk update data di dalam database
       $perawatan->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama perawatan
       return redirect()->route("perawatan");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable perawatan untuk menampung data id dari table perawatan
       $perawatan = Perawatan::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $perawatan->delete();

       //ketika selesai akan di alihkan ke route dengan nama perawatan
       return redirect()->route("perawatan");
   }

    //function untuk cetak pdf
    public function cetak()
    {
   //untuk mendapatkan data perawatan dari table perawatan
   $perawatan = Perawatan::all();
     $pdf = Pdf::loadview('report.report-perawatan', compact('perawatan'));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Jenis Perawatan.pdf');
    }
}
