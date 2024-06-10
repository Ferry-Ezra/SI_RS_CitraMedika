<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    //function untuk mengembalikan tampilan data pembayara
    public function index() {
        //untuk mendapatkan data rawat_inap dari table pembayaran
        $pembayaran = Pembayaran::all();   
        $pasien = Pasien::all();
        return view("admin.pembayaran.pembayaran", compact("pembayaran", "pasien"));
    }

    //function untuk mengembalikan tampilan tambah data pembayaran
    public function create() {
        $pasien = Pasien::all();
        return view("admin.pembayaran.pembayaran-entry", compact("pasien"));
    }

     //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "pasien_id"=> "required",
            "tanggal"=> "required",
            "total_biaya"=> "required",
            "cara_pembayaran"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Pembayaran::create($request->all());

        //ketika selesai akan di alihkan ke route dengan nama pembayaran
        return redirect()->route("pembayaran");
    }

    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "pasien_id"=> "required",
            "tanggal"=> "required",
            "total_biaya"=> "required",
            "cara_pembayaran"=> "required",
        ]);
       
       //Dibuat variable rawat_inap untuk menampung data id dari table pembayaran
       $pembayaran = Pembayaran::find($id);

       // Function update digunakan untuk update data di dalam database
       $pembayaran->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama pembayaran
       return redirect()->route("pembayaran");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable pembayaran untuk menampung data id dari table pembayaran
       $pembayaran = Pembayaran::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $pembayaran->delete();

       //ketika selesai akan di alihkan ke route dengan nama pembayaran
       return redirect()->route("pembayaran");
   }

    //function untuk cetak pdf
    public function cetak()
    {
    //untuk mendapatkan data rawat_inap dari table pembayaran
    $pembayaran = Pembayaran::all();   
    $pasien = Pasien::all();
     $pdf = Pdf::loadview('report.report-pembayaran', compact('pasien','pembayaran'));
     //setting nama file download pdf
     return $pdf->download('Laporan Data Pembayaran.pdf');
    }
}
