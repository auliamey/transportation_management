<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBooking;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah pemesanan kendaraan berdasarkan approver ID
        $approverStatistics = VehicleBooking::select('approver_id_1', DB::raw('COUNT(*) as total'))
            ->groupBy('approver_id_1')
            ->get();

        // Mengambil nama approver dari user table
        $approvers = [];
        foreach ($approverStatistics as $statistic) {
            $approverName = User::find($statistic->approver_id_1)->name;
            $approvers[$approverName] = $statistic->total;
        }

        return view('dashboard', compact('approvers'));
    }
}
