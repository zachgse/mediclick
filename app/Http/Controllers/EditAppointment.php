<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\CancelledAppointment;
use App\Models\Log;
use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EditAppointment extends Controller
{
    //

    public function edit(Appointment $appointment){
        

        $users = User::where('role','Physician')->get();
     
        return view('appointment.appointment-edit', ['appointment' => $appointment, 'users' => $users]);



    }

    public function edit_patient(Appointment $appointment){
        

        $users = User::where('role','Physician')->get();
     
        return view('appointment.appointment-editPatient', ['appointment' => $appointment, 'users' => $users]);



    }

    public function update(Request $request, $id ){
        $appointments = Appointment::where('id',$id);

        $patient = Appointment::where('id', $id)->get()->first();
        $patientEmail = User::where('id', $patient->user_id)->get()->first();
        $physician = Employee::where('id', $patient->physician_id)->get()->first();
        $physicianEmail = User::where('id', $physician->user_id)->get()->first();

    
        request()->validate([
            'meeting' => 'string', 'nullable',
            'reason' => 'string','nullable', 'max:200',

            'datetime' => ['unique:appointments'],'nullable',
        ]);

        $appointments->update([

            'meeting' => request('meeting'),
            'reason' => request('reason'),
            'datetime' => request('datetime'),
        
        ]);

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated an appointment',
        ]);

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your appointment has been updated!'
        ];

        $to = $physicianEmail->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));



        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your appointment has been updated!'
        ];

        $to = $patientEmail->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect('/home')->with('message', 'Appointment has been updateed!');


    }

    public function update_patient(Request $request, $id ){
        $appointments = Appointment::where('id',$id);

        $patient = Appointment::where('id', $id)->get()->first();
        $patientEmail = User::where('id', $patient->user_id)->get()->first();
        $physician = Employee::where('id', $patient->physician_id)->get()->first();
        $physicianEmail = User::where('id', $physician->user_id)->get()->first();

    
        request()->validate([
            'meeting' => 'string', 'nullable',
            'reason' => 'string','nullable',

            'datetime' => ['unique:appointments'],'nullable',
        ]);

        $appointments->update([

            'meeting' => request('meeting'),
            'reason' => request('reason'),
            'datetime' => request('datetime'),
        
        ]);

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated an appointment',
        ]);

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your appointment has been updated!'
        ];

        $to = $physicianEmail->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));



        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your appointment has been updated!'
        ];

        $to = $patientEmail->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect('/home')->with('message', 'Appointment has been updateed!');


    }

    public function destroy(Appointment $appointment)
    {
        $user = auth()->user();
        $userClinic;

        

        if($user->role == 'Patient')
        {
            $userClinic = Patient::where('user_id', $user->id)->get('clinic_id')->first();
        }
     
        elseif ($user->role == 'Physician') {
            $userClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        }

        elseif ($user->role == 'Staff') {
            $userClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        }
        
        
        CancelledAppointment::create([

            'clinic_id' => $userClinic->clinic_id,
            'user_id' => $user->id,
            'reason' => request('reason'),
        ]);

        Log::create([

            'user_id' => $user->id,
            'type' => ' Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'cancelled an appointment',
        ]);

        $appointment->delete();

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your appointment has been deleted'
        ];

        $to = $user->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect('/home')->with('message', 'Appointment has been deleted');
    }
}
