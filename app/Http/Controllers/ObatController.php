<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Obat;
use Barryvdh\DomPDF\Facade\Pdf;

class ObatController extends Controller
{
    //function untuk mengembalikan tampilan data obat
    public function index() {
        //untuk mendapatkan data obat dari table obat
        $obat = Obat::all();   
        return view("admin.obat.obat", compact("obat"));
    }

    //function untuk mengembalikan tampilan tambah data obat
    public function create() {
        return view("admin.obat.obat-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "jenis"=> "required",
            "dosis"=> "required",
            "indikasi"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Obat::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama obat
        return redirect()->route("obat");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "jenis"=> "required",
            "dosis"=> "required",
            "indikasi"=> "required",
       ]); 
       
       //Dibuat variable obat untuk menampung data id dari table obat
       $obat = Obat::find($id);

       // Function update digunakan untuk update data di dalam database
       $obat->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama obat
       return redirect()->route("obat");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable obat untuk menampung data id dari table obat
       $obat = Obat::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $obat->delete();

       //ketika selesai akan di alihkan ke route dengan nama obat
       return redirect()->route("obat");
   }

   //function untuk cetak pdf
   public function cetak()
   {
    //untuk mendapatkan data obat dari table obat
    $obat = Obat::all(); 
    $pdf = Pdf::loadview('report.report-obat', compact('obat'));
    //setting nama file download pdf
    return $pdf->download('Laporan Data Obat.pdf');
   }
}
