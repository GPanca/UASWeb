@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin</h1>
    <h1 class="text-center mb-4">Data Kendaraan Bermotor di JABAR</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Data -->
    <div class="mb-3 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVehicleModal">Tambah Data</button>
    </div>

    <!-- Tabel Data Kendaraan -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>no</th>
                <th>Kota/Kabupaten</th>
                <th>Jenis Kendaraan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $key => $vehicle)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $vehicle->kota_kabupaten }}</td>
                    <td>{{ $vehicle->jenis_kendaraan }}</td>
                    <td>{{ $vehicle->jumlah }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVehicleModal{{ $vehicle->id }}">Edit</button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit Data -->
                <div class="modal fade" id="editVehicleModal{{ $vehicle->id }}" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editVehicleModalLabel">Edit Data Kendaraan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                        <input type="text" class="form-control" name="kota_kabupaten" value="{{ $vehicle->kota_kabupaten }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                        <select class="form-control" name="jenis_kendaraan" required>
                                            <option value="Roda 2" {{ $vehicle->jenis_kendaraan == 'Roda 2' ? 'selected' : '' }}>Roda 2</option>
                                            <option value="Roda 4" {{ $vehicle->jenis_kendaraan == 'Roda 4' ? 'selected' : '' }}>Roda 4</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" value="{{ $vehicle->jumlah }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div id="chart" class="mb-5"></div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('vehicles.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicleModalLabel">Tambah Data Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" name="kota_kabupaten" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <select class="form-control" name="jenis_kendaraan" required>
                            <option value="Roda 2">Roda 2</option>
                            <option value="Roda 4">Roda 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const options = {
            chart: {
                type: 'bar',
                height: 550
            },
            series: [{
                name: 'Jumlah Kendaraan',
                data: @json($chartData['data'])
            }],
            xaxis: {
                categories: @json($chartData['labels'])
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .table {
        margin-top: 20px;
    }
    .modal-content {
        border-radius: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }
</style>