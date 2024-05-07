<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleBooking;
use App\Models\User;
use App\Models\Vehicle;

class VehicleBookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mendapatkan ID user dan vehicle dari tabel terkait
        $userIds = User::pluck('id')->toArray();
        $vehicleIds = Vehicle::pluck('id')->toArray();

        // Menambahkan data dummy pemesanan kendaraan
        foreach (range(1, 10) as $index) {
            VehicleBooking::create([
                'vehicle_id' => $vehicleIds[array_rand($vehicleIds)],
                'driver_id' => $userIds[array_rand($userIds)], 
                'approver_id_1' => $userIds[array_rand($userIds)],
                'approver_id_2' => $userIds[array_rand($userIds)],
                'approved' => true, // Atau false, sesuai kebutuhan
            ]);
        }

        // Tambahkan data dummy lainnya sesuai kebutuhan
    }
}
