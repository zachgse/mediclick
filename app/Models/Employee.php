<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Appointment;
use App\Models\Patient;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clinic_id',
        'role',
        'proof_image',

    ];

    public function userEmployee(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function employeeClinic(){
        return $this->belongsTo('App\Models\Post', 'clinic_id', 'id');
    }

    public function patientEmployee(){
        return $this->hasMany('App\Models\Patient', 'physician_id', 'id');
    }

    public function employeeAppointment(){
        return $this->hasMany('App\Models\Appointment', 'physician_id', 'id');
    }

    public function requestClinic(){
        return $this->hasMany('App\Models\UserRequest', 'employee_id', 'id');
    }
    

}
