<?php

namespace App\Http\Controllers;


use App\Models\AppointmentWalkIn;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Log;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AppointmentWalkInController extends Controller

{
    //

  

    public function getClinicDoctor(){


        $users = Employee::where('role','Physician')->get();

        $clinics = Post::all();
    
        return view('appointment.createAppWalk-In', ['users' => $users , 'clinics' => $clinics]);
    }

    public function appointments(AppointmentWalkIn $appointment){


        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->get()->first();

        $appointments = AppointmentWalkIn::where('physician_id', $employee->id)->paginate(5);

 
    
        return view('appointment.walkInAppointmentList', ['appointments' => $appointments , 'appointment' => $appointment]);
    }

    public function appointments_staff(AppointmentWalkIn $appointment){


        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->get()->first();

        $appointments = AppointmentWalkIn::where('clinic_id', $employee->clinic_id)->paginate(5);

 
    
        return view('appointment.walkInAppointmentList_staff', ['appointments' => $appointments , 'appointment' => $appointment]);
    }
    
    
    public function store(Request $request)
    {


        request()->validate([
            
            'firstName' => 'string',  'max:200',
            'lastName' => ['required', 'string', 'max:200'],
            'email' => 'required', 'email', 'string', 'max:200',
            'reason' => 'required', 'string', 'max:200',
            'contactNo' => 'required|regex: /^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'datetime' => ['unique:appointments', 'required'],
           

        ]);
        
        $user = auth()->user();

        $employee = Employee::where('user_id', $user->id)->get('id')->first();
        $clinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        $type = 'Face-to-face';
   

        
        AppointmentWalkIn::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'contactNo' => request('contactNo'),
            'email' => request('email'),
            'meeting' => $type,
            'reason' => request('reason'),
            'physician_id' => $employee->id,
            'datetime' => request('datetime'),
          
            'clinic_id' => $clinic->clinic_id,
         
        ]); 


   

            

        Log::create([

            'user_id' => $user->id,
            'type' => 'Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'created an appointment',
        ]);

        

      
        return redirect('/home')->with('message' , 'Appointment has been created!');
    }
}
