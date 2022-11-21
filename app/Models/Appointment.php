<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ClinicAdmin;
use App\Models\Employee;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting',
        'reason',
        'physician_id',
        'datetime',
        'user_id',
        'clinic_id',
        'status',
    ];

    public function userAppointment(){
        return $this->belongsTo('App\Models\User' , 'user_id', 'id');
    }

    public function employeeAppointment(){
        return $this->belongsTo('App\Models\Employee', 'physician_id', 'id');
    }
    

  
    
}
