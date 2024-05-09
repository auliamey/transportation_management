<?php

namespace App\Exports;

use App\Models\VehicleBooking;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingsExport implements FromCollection
{
    public function collection()
    {
        return VehicleBooking::all();
    }
}
