<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'approver_id_1',
        'approver_id_2',
        'approved',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relasi dengan model User (driver)
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    // Relasi dengan model User (approver)
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
