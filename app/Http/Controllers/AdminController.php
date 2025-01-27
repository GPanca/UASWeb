<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.admin', compact('vehicles'));
    }

    public function store(Request $request)
    {
        Vehicle::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function showData()
    {
        $vehicles = Vehicle::select('kota_kabupaten', 'jenis_kendaraan', \DB::raw('SUM(total) as total'))
                           ->groupBy('kota_kabupaten', 'jenis_kendaraan')
                           ->get();

        $dataKota = $vehicles->groupBy('kota_kabupaten')->map(function ($group) {
            return [
                'roda_2' => $group->where('jenis_kendaraan', 'roda 2')->sum('total'),
                'roda_4' => $group->where('jenis_kendaraan', 'roda 4')->sum('total'),
            ];
        });

        return view('dashboard.admin', ['dataKota' => $dataKota]);
    }
}
