<?php

namespace App\Http\Controllers;

use App\Models\TenagaKesehatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TenagaKesehatanController extends Controller
{
    //function untuk mengembalikan tampilan data tenaga_kesehatan
    public function index() {
        //untuk mendapatkan data tenaga_kesehatan dari table tenaga_kesehatan
        $kesehatan = TenagaKesehatan::all();
        return view("admin.kesehatan.tenaga-kesehatan", compact("kesehatan"));
    }

    //function untuk mengembalikan tampilan tambah data tenaga_kesehatan
    public function create() {
        return view("admin.kesehatan.tenaga-kesehatan-entry");
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis"=> "required",
            "nama"=> "required",
            "alamat"=> "required",
            "telp"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        TenagaKesehatan::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama pasien
        return redirect()->route("tenaga-kesehatan");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "jenis"=> "required",
            "nama"=> "required",
            "alamat"=> "required",
            "telp"=> "required",
       ]); 
       
       //Dibuat variable kesehatan untuk menampung data id dari table tenaga_kesehatan
       $kesehatan = TenagaKesehatan::find($id);

       // Function update digunakan untuk update data di dalam database
       $kesehatan->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama tenaga-kesehatan
       return redirect()->route("tenaga-kesehatan");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable kesehatan untuk menampung data id dari table tenaga-kesehatan
       $kesehatan = TenagaKesehatan::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $kesehatan->delete();

       //ketika selesai akan di alihkan ke route dengan nama tenaga-kesehatan
       return redirect()->route("tenaga-kesehatan");
   }

    //function untuk cetak pdf
    public function cetak()
    {
    //untuk mendapatkan data tenaga_kesehatan dari table tenaga_kesehatan
    $kesehatan = TenagaKesehatan::all();
     $pdf = Pdf::loadview('report.report-kesehatan', compact('kesehatan'));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Tenaga Kesehatan.pdf');
    }
}
