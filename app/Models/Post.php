<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClinicAdmin;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Payment;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blockNo',   
        'subDuration',   
        'city',
        'barangay',
        'zip',
        'admin_id',
        'contactNo',
        'subscription_id',
        'proof_image',
        
    ];

    public function clinic(){
        return $this->belongsTo(ClinicAdmin::class);
    }

    public function userAdmin(){
        return $this->belongsTo('App\Models\User' , 'admin_id', 'id');
    }

    public function clinicSub(){
        return $this->belongsTo('App\Models\Subscription' , 'subscription_id', 'id' );
    }

    public function employeeClinic(){
        return $this->hasMany('App\Models\Employee', 'clinic_id', 'id');
    }

    
    public function clinicPatient(){
        return $this->belongsTo('App\Models\Patient', 'clinic_id', 'id');
    }

    public function requestClinic(){
        return $this->hasMany('App\Models\UserRequest', 'clinic_id', 'id');
    }

    public function paymentClinic(){
        return $this->hasMany('App\Models\Payment', 'clinic_id', 'id');
    }
 
}
