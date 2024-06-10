<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

use App\Models\JenisKamar;
use Barryvdh\DomPDF\Facade\Pdf;

class JenisKamarController extends Controller
{
    //function untuk mengembalikan tampilan data jenis_kamar
    public function index() {
        //untuk mendapatkan data jenis_kamar dari table jenis_kamar
        $jenis_kamar = JenisKamar::all();
         //untuk mendapatkan data kamar dari table kamar
        $kamar = Kamar::all();   
        return view("admin.jenis.jenis-kamar", compact("jenis_kamar","kamar"));
    }

    //function untuk mengembalikan tampilan tambah data jenis_kamar
    public function create() {
        //untuk mendapatkan data kamar dari table kamar
        $kamar = Kamar::all();   
        return view("admin.jenis.jenis-kamar-entry", compact("kamar"));
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kamar_id"=> "required",
            "jumlah_kamar"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        JenisKamar::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama jenis_kamar
        return redirect()->route("jenis-kamar");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kamar_id"=> "required",
            "jumlah_kamar"=> "required",
        ]);
       
       //Dibuat variable jenis_kamar untuk menampung data id dari table jenis_kamar
       $jenis_kamar = JenisKamar::find($id);

       // Function update digunakan untuk update data di dalam database
       $jenis_kamar->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama jenis_kamar
       return redirect()->route("jenis-kamar");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable jenis_kamar untuk menampung data id dari table jenis_kamar
       $jenis_kamar = JenisKamar::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $jenis_kamar->delete();

       //ketika selesai akan di alihkan ke route dengan nama jenis_kamar
       return redirect()->route("jenis-kamar");
   }

   //function untuk cetak pdf
   public function cetak()
   {
   //untuk mendapatkan data jenis_kamar dari table jenis_kamar
   $jenis_kamar = JenisKamar::all();
    //untuk mendapatkan data kamar dari table kamar
    $kamar = Kamar::all();  
    $pdf = Pdf::loadview('report.report-jenis', compact('jenis_kamar','kamar'));
    //setting nama file download pdf
    return $pdf->download('Laporan Data Jenis Kamar.pdf');
   }
}
