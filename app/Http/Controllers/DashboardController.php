<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    if ($request->user()->role === 'admin') {
        $vehicles = Vehicle::all();
        // Data untuk grafik
        $dataKota = Vehicle::select('kota_kabupaten', \DB::raw('SUM(jumlah) as total'))
            ->groupBy('kota_kabupaten')
            ->get();
        $chartData = [
            'labels' => $dataKota->pluck('kota_kabupaten'),
            'data' => $dataKota->pluck('total')
        ];
        return view('dashboard.admin', compact('vehicles', 'chartData'));
    } elseif ($request->user()->role === 'user') {
        $vehicles = Vehicle::all();
        // Data untuk grafik
        $dataKota = Vehicle::select('kota_kabupaten', \DB::raw('SUM(jumlah) as total'))
            ->groupBy('kota_kabupaten')
            ->get();
        $chartData = [
            'labels' => $dataKota->pluck('kota_kabupaten'),
            'data' => $dataKota->pluck('total')
        ];
        return view('dashboard.user', compact('vehicles', 'chartData')); // Tambahkan compact('chartData')
    }

    abort(403, 'Anda tidak memiliki akses ke halaman ini.');
}

    
    // Fungsi untuk menambahkan data kendaraan
    public function store(Request $request)
    {
        $request->validate([
            'kota_kabupaten' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        Vehicle::create($request->all());

        return redirect()->back()->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    // Fungsi untuk mengupdate data kendaraan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_kabupaten' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->back()->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data kendaraan
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->back()->with('success', 'Data kendaraan berhasil dihapus.');
    }
}
