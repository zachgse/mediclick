<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Appointment;
use App\Models\ClinicAdmin;
use App\Models\Post;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\Log;
use App\Models\Payment;
use App\Models\CancelledAppointment;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastName',
        'firstName',
        'middleName',
        'email',
        'password',
        'contactNo',
        'gender', 
        'branchAdd',   
        'city',
        'barangay',
        'zip',
        'conlastName',
        'confirstName',
        'conmiddleName',
        'conConNo',
        'relationship',
        'role',
        'clinic',
        'specialization',
        'status',
      
    ];

    /**
     * The attributes that should be hidden for serialization.
     *php artisan migrate:refresh --seed
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userAppointment()
    {
        return $this->hasMany('App\Models\Appointment' , 'user_id', 'id');
                
    }

    public function userCancelledAppts()
    {
        return $this->hasMany('App\Models\CancelledAppointment' , 'user_id', 'id');
                
    }

    public function logUser()
    {
        return $this->hasMany('App\Models\Log' , 'user_id', 'id');
                
    }

    public function user()
    {
        return $this->belongsTo(ClinicAdmin::class);
                
    }

    public function userAdmin(){
        return $this->hasMany('App\Models\Post' , 'admin_id', 'id');
    }

    public function userEmployee(){
        return $this->hasMany('App\Models\Employee' , 'user_id', 'id' );
    }

  


    public function userPatient(){
        return $this->hasMany('App\Models\Patient' , 'user_id', 'id' );
    }

    public function requestUser(){
        return $this->belongsTo('App\Models\UserRequest', 'user_id', 'id');
    }

    public function paymentUser(){
        return $this->hasMany('App\Models\Payment', 'user_id', 'id');
    }
}
