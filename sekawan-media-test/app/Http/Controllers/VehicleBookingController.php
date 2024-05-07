<?php

// app/Http/Controllers/VehicleBookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBooking;

class VehicleBookingController extends Controller
{
    /**
     * Menampilkan formulir pemesanan kendaraan.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('vehicle-booking.create');
    }

    public function showDashboard()
    {
        // Di sini Anda dapat mengambil data yang diperlukan untuk grafik
        // Misalnya, jumlah pemesanan kendaraan per bulan
        // $monthlyBookings = VehicleBooking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        //     ->groupBy('month')
        //     ->get();

        // Kemudian, kirim data tersebut ke view
        return view('dashboard');
    }

    /**
     * Menyimpan data pemesanan kendaraan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validasi data pemesanan kendaraan
    $request->validate([
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'approver_id_1' => 'required',
        'approver_id_2' => 'required',
    ]);

    // Simpan data pemesanan kendaraan ke database
    VehicleBooking::create([
        'vehicle_id' => $request->input('vehicle_id'), // Mengambil nilai vehicle_id dari permintaan HTTP
        'driver_id' => $request->input('driver_id'), // Mengambil nilai driver_id dari permintaan HTTP
        'approver_id_1' => $request->input('approver_id_1'), // Mengambil nilai approver_id_1 dari permintaan HTTP
        'approver_id_2' => $request->input('approver_id_2'), // Mengambil nilai approver_id_2 dari permintaan HTTP
        'approved' => false, // Misalnya, set approved ke false secara default
    ]);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Pemesanan kendaraan berhasil disimpan!');
}

}
