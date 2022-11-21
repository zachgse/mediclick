<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentWalkIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'contactNo',
        'datetime',
        'email',
        'meeting',
        'reason',
        'physician_id',
        'datetime',
        'user_id',
        'clinic_id',
        'status',
    ];
}
