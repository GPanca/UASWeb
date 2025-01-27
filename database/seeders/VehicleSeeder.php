<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::insert([
            ['jenis_kendaraan' => 'roda 2', 'kota_kabupaten' => 'Bandung', 'jumlah' => 1000],
            ['jenis_kendaraan' => 'roda 4', 'kota_kabupaten' => 'Bandung', 'jumlah' => 500],
            ['jenis_kendaraan' => 'roda 2', 'kota_kabupaten' => 'Bekasi', 'jumlah' => 800],
            ['jenis_kendaraan' => 'roda 4', 'kota_kabupaten' => 'Bekasi', 'jumlah' => 300],
        ]);
    }
}
