<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;

class DokterController extends Controller
{
    //function untuk mengembalikan tampilan data dokter
    public function index() {
        //untuk mendapatkan data dokter dari table dokter
        $dokter = Dokter::all();   
        return view("admin.dokter.dokter", compact("dokter"));
    }

    //function untuk mengembalikan tampilan tambah data dokter
    public function create() {
        return view("admin.dokter.dokter-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "spesialisasi"=> "required",
            "no_sip"=> "required",
            "alamat"=> "required",
            "telp"=> "required",
            "email"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Dokter::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama dokter
        return redirect()->route("dokter");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "spesialisasi"=> "required",
            "no_sip"=> "required",
            "alamat"=> "required",
            "telp"=> "required",
            "email"=> "required",
       ]); 
       
       //Dibuat variable dokter untuk menampung data id dari table dokter
       $dokter = Dokter::find($id);

       // Function update digunakan untuk update data di dalam database
       $dokter->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama motor
       return redirect()->route("dokter");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable dokter untuk menampung data id dari table dokter
       $dokter = Dokter::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $dokter->delete();

       //ketika selesai akan di alihkan ke route dengan nama dokter
       return redirect()->route("dokter");
   }

   //function untuk cetak pdf
   public function cetak()
   {
    //untuk mendapatkan data dokter dari table dokter
    $dokter = Dokter::all();   
    $pdf = Pdf::loadview('report.report-dokter', compact('dokter'));
    //setting nama file download pdf
    return $pdf->download('Laporan Data Dokter.pdf');
   }
}

