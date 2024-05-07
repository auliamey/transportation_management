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
        // Menambahkan data dummy kendaraan
        Vehicle::create([
            'type' => 'Angkutan Orang',
            'license_plate' => 'AB 1234 CD',
        ]);

        Vehicle::create([
            'type' => 'Angkutan Barang',
            'license_plate' => 'BC 5678 EF',
        ]);

        // Tambahkan data dummy lainnya sesuai kebutuhan
    }
}
