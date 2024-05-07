<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
              <a href="{{ route('vehicle.booking.create') }}" class="text-white">Add Booking</a>
            </button>
        </div>
    </div>
    
    <h1>Dashboard Statistik Pemakaian Kendaraan</h1>

    <!-- Tampilkan statistik menggunakan tabel -->
    <table class="table">
        <thead>
            <tr>
                <th>Approver</th>
                <th>Jumlah Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($approvers as $approver => $total)
                <tr>
                    <td>{{ $approver }}</td>
                    <td>{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tambahkan elemen untuk menampilkan grafik pemakaian kendaraan jika perlu -->
    <!-- <canvas id="vehicle-usage-chart"></canvas> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Logika untuk mengambil data dan menampilkan grafik pemakaian kendaraan
    </script> -->
</body>
</html>
