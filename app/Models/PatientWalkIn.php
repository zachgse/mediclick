<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientWalkIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'contactNo',
        'email',
        'physician_id',
        'clinic_id',
    ];
}
