<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'type' => 'Angkutan Orang',
            'license_plate' => 'AB 1234 CD',
        ]);

        Vehicle::create([
            'type' => 'Angkutan Barang',
            'license_plate' => 'BC 5678 EF',
        ]);

        Vehicle::create([
            'type' => 'Angkutan Orang',
            'license_plate' => 'B 478 HOK',
        ]);

        Vehicle::create([
            'type' => 'Angkutan Barang',
            'license_plate' => 'L 9125 P',
        ]);
    }
}
