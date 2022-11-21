<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
     

    ];

    public function clinicSub(){
        return $this->hasMany('App\Models\Post' , 'subscription_id', 'id' );
    }
}
