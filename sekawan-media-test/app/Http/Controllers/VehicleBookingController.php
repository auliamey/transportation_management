<?php

// app/Http/Controllers/VehicleBookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBooking;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class VehicleBookingController extends Controller
{
    /**
     * Menampilkan formulir pemesanan kendaraan.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $drivers = User::where('role', 'employee')->get();
        $approvers = User::where('role', 'manager')->get();

        return view('vehicle-booking.create', compact('vehicles', 'drivers', 'approvers'));
    }

    
    public function export()
    {
        return Excel::download(new BookingsExport, 'bookings.xlsx');
    }



    public function showDashboard()
    {

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

        if ($request->approver_id_1 === $request->approver_id_2) {
            // Set pesan kesalahan dalam session
            Session::flash('error', 'Approver 1 dan Approver 2 tidak boleh sama.');
    
            // Kembali ke halaman sebelumnya
            return back()->withInput();
        }
    

        // Simpan data pemesanan kendaraan ke database
        VehicleBooking::create([
            'vehicle_id' => $request->input('vehicle_id'),
            'driver_id' => $request->input('driver_id'),
            'approver_id_1' => $request->input('approver_id_1'),
            'approver_id_2' => $request->input('approver_id_2'),
            'approved_id_1' => false, 
            'approved_id_2' => false, 
        ]);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Pemesanan kendaraan berhasil disimpan!');
    }


    public function approve($id)
    {
        $booking = VehicleBooking::findOrFail($id);

        if ($booking->approver_id_1 === auth()->id()) {
            $booking->approved_id_1 = true;
        } else if ($booking->approver_id_2 === auth()->id()){
            $booking->approved_id_2 = true;
        }

        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Booking berhasil diapprove.');
    }



}
