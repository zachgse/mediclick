<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clinic_id',
        'reason',

    ];

    public function userCancelledAppts()
    {
        return $this->belongsTo('App\Models\User' , 'user_id', 'id');
                
    }
}
