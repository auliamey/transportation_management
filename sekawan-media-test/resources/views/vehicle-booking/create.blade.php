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

                    @if (Session::has('error'))
                      <div class="alert alert-danger" role="alert">
                          {{ Session::get('error') }}
                      </div>
                  @endif


                    <div class="card-body">
                        <!-- Formulir pemesanan kendaraan -->
                        <form action="{{ route('vehicle.booking.store') }}" method="POST">
                            @csrf

                            <!-- Vehicle ID -->
                            <div class="form-group">
                                <label for="vehicle_id">Pilih Kendaraan</label>
                                <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->license_plate }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Driver ID -->
                            <div class="form-group">
                                <label for="driver_id">Pilih Pengemudi</label>
                                <select name="driver_id" id="driver_id" class="form-control" required>
                                    <option value="">Pilih Pengemudi</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approver ID 1 -->
                            <div class="form-group">
                                <label for="approver_id_1">Pilih Approver 1</label>
                                <select name="approver_id_1" id="approver_id_1" class="form-control" required>
                                    <option value="">Pilih Approver 1</option>
                                    @foreach($approvers as $approver)
                                        <option value="{{ $approver->id }}" {{ old('approver_id_1') == $approver->id ? 'selected' : '' }}>{{ $approver->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approver ID 2 -->
                            <div class="form-group">
                                <label for="approver_id_2">Pilih Approver 2</label>
                                <select name="approver_id_2" id="approver_id_2" class="form-control" required>
                                    <option value="">Pilih Approver 2</option>
                                    @foreach($approvers as $approver)
                                        <option value="{{ $approver->id }}" {{ old('approver_id_2') == $approver->id ? 'selected' : '' }}>{{ $approver->name }}</option>
                                    @endforeach
                                </select>
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
