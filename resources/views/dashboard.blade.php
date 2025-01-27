<h1>Dashboard</h1>
<canvas id="vehicleChart"></canvas>

<script>
    const ctx = document.getElementById('vehicleChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Kendaraan',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
    });
</script>
