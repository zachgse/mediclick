<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clinic_id',
        'subscription_id',
        'paymentProof',
        'accountNumber',
    ];

    public function paymentUser(){
        return $this->hasMany('App\Models\User', 'user_id', 'id');
    }

    public function paymentClinic(){
        return $this->belongsTo('App\Models\Post', 'clinic_id', 'id');
    }

}
