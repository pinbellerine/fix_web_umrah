<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WisataLuarNegeri;
use App\Models\WisataDomestik;
use App\Models\JamaahUmrah;
use App\Models\JamaahHaji;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts from database
        $counts = [
            'wisataLuarNegeriCount' => WisataLuarNegeri::count(),
            'wisataDomestikCount' => WisataDomestik::count(),
            'jamaahUmrahCount' => JamaahUmrah::count(),
            'jamaahHajiCount' => JamaahHaji::count(),
        ];
        
        // Fetch transactions for the dashboard
        $dataTransaksi = Transaksi::all();
        
        return view('dashboard', compact('counts', 'dataTransaksi'));
    }
}
