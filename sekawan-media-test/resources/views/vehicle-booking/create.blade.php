<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulir Pemesanan Kendaraan</div>

                    <div class="card-body">
                        <!-- Formulir pemesanan kendaraan -->
                        <form action="{{ route('vehicle.booking.store') }}" method="POST">
                            @csrf

                            <!-- Vehicle ID -->
                            <div class="form-group">
                                <label for="vehicle_id">Vehicle ID</label>
                                <input type="text" id="vehicle_id" name="vehicle_id" class="form-control" required>
                            </div>

                            <!-- Driver ID -->
                            <div class="form-group">
                                <label for="driver_id">Driver ID</label>
                                <input type="text" id="driver_id" name="driver_id" class="form-control" required>
                            </div>

                            <!-- Approver ID -->
                            <div class="form-group">
                                <label for="approver_id">Approver ID 1</label>
                                <input type="text" id="approver_id_1" name="approver_id_1" class="form-control" required>
                            </div>

                            <!-- Approver ID -->
                            <div class="form-group">
                                <label for="approver_id">Approver ID 2</label>
                                <input type="text" id="approver_id_2" name="approver_id_2" class="form-control" required>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
