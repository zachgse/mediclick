<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Log;
use App\Models\Post;

class EloquentController extends Controller
{
    


    public function getUserAppointment(){

        $user = auth()->user();
        $clinic = Post::where('admin_id' , $user->id)->get('id')->first();
        $appointments = Appointment::where('clinic_id', $clinic->id)->paginate(5);
        return view('pages.viewAppointments', ['appointments' => $appointments]);
    }
}
