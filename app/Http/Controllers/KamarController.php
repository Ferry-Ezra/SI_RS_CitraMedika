<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use Barryvdh\DomPDF\Facade\Pdf;

class KamarController extends Controller
{
    //function untuk mengembalikan tampilan data kamar
    public function index() {
        //untuk mendapatkan data kamar dari table kamar
        $kamar = Kamar::all();   
        return view("admin.kamar.kamar", compact("kamar"));
    }

    //function untuk mengembalikan tampilan tambah data kamar
    public function create() {
        return view("admin.kamar.kamar-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis"=> "required",
            "no_kamar"=> "required",
            "kapasitas"=> "required",
            "status"=> "required",
            "keterangan"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Kamar::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama kamar
        return redirect()->route("kamar");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis"=> "required",
            "no_kamar"=> "required",
            "kapasitas"=> "required",
            "status"=> "required",
            "keterangan"=> "required",
        ]);
       
       //Dibuat variable kamar untuk menampung data id dari table kamar
       $kamar = Kamar::find($id);

       // Function update digunakan untuk update data di dalam database
       $kamar->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama kamar
       return redirect()->route("kamar");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable kamar untuk menampung data id dari table kamar
       $kamar = Kamar::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $kamar->delete();

       //ketika selesai akan di alihkan ke route dengan nama kamar
       return redirect()->route("kamar");
   }

   //function untuk cetak pdf
   public function cetak()
   {
    //untuk mendapatkan data kamar dari table kamar
    $kamar = Kamar::all();   
    $pdf = Pdf::loadview('report.report-kamar', compact('kamar'));
    //setting nama file download pdf
    return $pdf->download('Laporan Data Kamar.pdf');
   }
}
