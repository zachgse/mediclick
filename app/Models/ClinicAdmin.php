<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class ClinicAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clinic_id',
    ];


    public function clinic()
   {
       return $this->hasMany(Post::class);
   } 
   public function user()
   {
       return $this->hasMany(User::class);
   } 
}
