<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\User;
use App\Models\Employee;
class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clinic_id', 
        'physician_id', 
        'height',   
        'socialRemarks', 
        'familyRemarks', 
        'weight',
        'rightEye',
        'leftEye',
        'bodyTemp',
        'pulseRate',
        'respirationRate',
        'bloodPressure',
        'bloodType',
        'tobacco',
        'alcohol',
        'drugs',
        'hypertension',
        'heartDisease',
        'kidneyDisease',
        'diabetese',
        'diagnosis',
        'prescription',
    ];

    public function userPatient(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function clinicPatient(){
        return $this->belongsTo('App\Models\Post', 'clinic_id', 'id');
    }

    public function patientEmployee(){
        return $this->belongsTo('App\Models\Employee', 'physician_id', 'id');
    }

    
}
