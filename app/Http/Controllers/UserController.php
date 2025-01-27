<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class UserController extends Controller
{
    public function dashboard()
    {
        // Ambil semua data kendaraan
        $vehicles = Vehicle::all();
        // Data untuk chart
        $dataKota = Vehicle::select('kota_kabupaten', \DB::raw('SUM(jumlah) as total'))
            ->groupBy('kota_kabupaten')
            ->get();
        $chartData = [
            'labels' => $dataKota->pluck('kota_kabupaten'),
            'data' => $dataKota->pluck('total')
        ];
        // Kirim data ke view
        return view('dashboard.user', [
            'vehicles' => $vehicles,
            'chartData' => $chartData
        ]);
    }
    
}
