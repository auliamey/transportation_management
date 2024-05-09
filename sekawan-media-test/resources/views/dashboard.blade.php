<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #vehicle-usage-chart {
            width: 200px;
            height: 100px;
        }

        .title-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-group row mb-0">
        <h1 class="title-container col-md-12">Dashboard Statistik Pemakaian Kendaraan</h1>
        @if(Auth::user()->role === 'admin')
            <div class="col-md-6 offset-md-6 ">
                <button type="submit" class="btn btn-primary">
                    <a href="{{ route('vehicle.booking.create') }}" class="text-white">Add Booking</a>
                </button>
            </div>
        @endif
        @if(Auth::check())
            <div class="col-md-6 offset-md-6 ">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @endif
    </div>
</div>

@if(Auth::user()->role === 'admin' && isset($monthlyBookings) && !empty($monthlyBookings))
    <div class="container">
        <h2>Grafik Pemakaian Kendaraan per Bulan</h2>
        <div class="mt-3">
            <a href="{{ route('vehicle.booking.export') }}" class="btn btn-success">Export to Excel</a>
        </div>
        <canvas id="vehicle-usage-chart"></canvas>
    </div>
@endif

@if(Auth::user()->role === 'manager' && isset($adminBookings) && !empty($adminBookings))
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Booking yang Diajukan</h2>
                @foreach($adminBookings as $booking)
                    <div class="card">
                        <div class="card-header">Booking ID: {{ $booking->id }}</div>
                        <div class="card-body">
                            <p>Vehicle ID: {{ $booking->vehicle_id }}</p>
                            <p>Driver ID: {{ $booking->driver_id }}</p>
                            @if($booking->approved)
                                <p class="text-success">Approved</p>
                            @else
                                <form action="{{ route('vehicle.booking.approve', $booking->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{ $adminBookings->links() }}
    </div>
@elseif(Auth::user()->role === 'manager')
    <p>Belum ada booking yang diajukan.</p>
@endif

@if(Auth::user()->role === 'admin' && isset($monthlyBookings) && !empty($monthlyBookings))
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk grafik pemakaian kendaraan per bulan
        var monthlyBookings = @json($monthlyBookings);

        var ctx = document.getElementById('vehicle-usage-chart').getContext('2d');

        var vehicleUsageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: monthlyBookings.map(data => data.month),
                datasets: [{
                    label: 'Jumlah Pemesanan',
                    data: monthlyBookings.map(data => data.total),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endif

</body>
</html>
