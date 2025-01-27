@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 class="text-center mb-4" style="color: #3498db;">Data Kendaraan Bermotor di JABAR</h1>

        <!-- Tabel Data Kendaraan -->
        @if($vehicles->isEmpty())
            <p class="text-center" style="color: #666;">Data tidak tersedia.</p>
        @else
            <table class="table table-bordered mt-4" style="background-color: #fff; border: 1px solid #ddd;">
                <thead class="table-dark">
                    <tr>
                        <th>Kota/Kabupaten</th>
                        <th>Jenis Kendaraan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->kota_kabupaten }}</td>
                            <td>{{ $vehicle->jenis_kendaraan }}</td>
                            <td>{{ $vehicle->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Chart -->
        <canvas id="chartCanvas" width="400" height="200"></canvas>
        <div id="chart" class="mb-5"></div>
    </div>

    <!-- Chart Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        setTimeout(function() {
            const chartData = @json($chartData);
            const ctx = document.getElementById('chartCanvas').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Jumlah Kendaraan',
                        data: chartData.data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(6, 59, 95)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Kendaraan per Kota/Kabupaten'
                        }
                    }
                }
            });
        }, 500);
    </script>
@endsection
