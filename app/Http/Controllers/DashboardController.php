<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
       
        $pasienCount = Pasien::count();
        $pembayaranCount = Pembayaran::count();
        return view("admin.dashboard.index", compact("pasienCount","pembayaranCount"));
    }
}
