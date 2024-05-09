<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBooking;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'manager') {
            $adminBookings = VehicleBooking::where('approver_id_1', Auth::id())
                                ->orWhere('approver_id_2', Auth::id())
                                ->paginate(4);
            return view('dashboard', compact('adminBookings'));
        } else if (Auth::user()->role === 'admin') {
            $monthlyBookings = VehicleBooking::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as total')
                            ->groupBy('month')
                            ->get();
            return view('dashboard', compact('monthlyBookings'));
        } else {
            return view('dashboard');
        }
    }
}
