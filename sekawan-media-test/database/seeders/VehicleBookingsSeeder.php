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
        $userIds = User::pluck('id')->toArray();
        $vehicleIds = Vehicle::pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            VehicleBooking::create([
                'vehicle_id' => $vehicleIds[array_rand($vehicleIds)],
                'driver_id' => $userIds[array_rand($userIds)], 
                'approver_id_1' => 1,
                'approver_id_2' => 2,
                'approved_id_1' => false, 
                'approved_id_2' => false, 
            ]);
        }

    }
}
