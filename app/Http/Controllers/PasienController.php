<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;

class PasienController extends Controller
{
    //function untuk mengembalikan tampilan data pasien
    public function index() {
        //untuk mendapatkan data dokter dari table pasien
        $pasien = Pasien::all();
        return view("admin.pasien.pasien", compact("pasien"));
    }

    //function untuk mengembalikan tampilan tambah data pasien
    public function create() {
        return view("admin.pasien.pasien-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "tanggal_lahir"=> "required",
            "gender"=> "required",
            "alamat"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Pasien::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama pasien
        return redirect()->route("pasien");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "nama"=> "required",
            "tanggal_lahir"=> "required",
            "gender"=> "required",
            "alamat"=> "required",
       ]); 
       
       //Dibuat variable pasien untuk menampung data id dari table pasien
       $pasien = Pasien::find($id);

       // Function update digunakan untuk update data di dalam database
       $pasien->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama pasien
       return redirect()->route("pasien");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable dokter untuk menampung data id dari table pasien
       $pasien = Pasien::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $pasien->delete();

       //ketika selesai akan di alihkan ke route dengan nama pasien
       return redirect()->route("pasien");
   }

    //function untuk cetak pdf
    public function cetak()
    {
      //untuk mendapatkan data dokter dari table pasien
        $pasien = Pasien::all();
     $pdf = Pdf::loadview('report.report-pasien', compact('pasien'));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Pasien.pdf');
    }
}
