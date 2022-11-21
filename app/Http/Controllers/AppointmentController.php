<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Post;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\Log;
use App\Models\AppointmentWalkIn;
use App\Models\CancelledAppointment;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class AppointmentController extends Controller
{

    
    public function index()
    {
        $posts = Post::all();

        return view('appointment.index', ['post' => $posts]);
    }
    
  
    public function create()
    {
        return view('appointment.createApp');
    }

    
    public function store()
    {

        
     
        request()->validate([

            'meeting' => 'required',
            'reason' => 'required', 'string', 'max:200',
            'physician_id' => 'required',
            'datetime' => ['unique:appointments', 'required'],
            'clinic_id' => 'required',


        ]);
        
        $user = auth()->user();

   
        Appointment::create([

            'meeting' => request('meeting'),
            'reason' => request('reason'),
            'physician_id' => request('physician_id'),
            'datetime' => request('datetime'),
            'user_id' => $user->id,
            'clinic_id' => request('clinic_id'),

        
           
 
        ]);

        
        $physicianVar = Appointment::where('user_id', $user->id)->get('physician_id')->first();
        $employee = Employee::where('id', $physicianVar->physician_id)->get('user_id')->first();
        $userEmail = User::where('id', $employee->user_id)->get('email')->first();
        
   
        


        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'You have a created an appointment!',
        ];

        $to = $user->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        

        Log::create([

            'user_id' => $user->id,
            'type' => 'Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'created an appointment',
        ]);
      
       /* $records = Patient::where('user_id', $user->id)->orWhereNull('id')->get()->first();

        if ($records == null){ */


            Patient::create([

                'user_id' => $user->id,
                'clinic_id' => request('clinic_id'),
                'physician_id' => request('physician_id'),
            ]);
         
       /*
       }

        else{
            return redirect('/home')->with('message' , 'Appointment has been created. Please wait for the physician to approve.');
        } */

        /*
        $physicianVar = Appoinntment::where('physician_id', $physician)->get()->first();
        $employee = Employee::where('user_id', $physicianVar->physician_id)->get()->first();
        $userEmail = User::where('id', $employee->user_id)->get()->first(); */



       

      
        return redirect('/home')->with('message' , 'Appointment has been created. Please wait for the physician to approve.');
    }

    public function showAppointment()
    {
        
        $user = auth()->user();
        $employeeClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        $physician = Employee::where('user_id', $user->id)->get('id')->first();

        $appointments = Appointment::where('clinic_id', $employeeClinic->clinic_id)
                                    ->where('physician_id', $physician->id)
                                    ->paginate(5);

        return view('pages.employeeViewAppointments', ['appointments' => $appointments]);
        
    }

    public function showAppointment_staff()
    {
        
        $user = auth()->user();
        $employeeClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();

        $appointments = Appointment::where('clinic_id', $employeeClinic->clinic_id)
                                    ->paginate(5);

        return view('pages.staffViewAppointments', ['appointments' => $appointments]);
        
    }
    


    public function getUser_employee(){

        $clinics = User::all();
        return view('pages.clinicAdminDashboard', ['clinics' => $clinics]);
    }

    

    public function showAppointmentDashboard()
    {

        $users = auth()->user();

        //count patients
        $clinic = Post::where('admin_id', $users->id)->get('id')->first();
        $patients = Patient::where('clinic_id', $clinic->id)->get();
        $patientCount = $patients->count();
     

        //count physician
        $physicians = Employee::where('clinic_id', $clinic->id)->where('role', 'Physician')->get();
        $physicianCount = $physicians->count();

        //count staff
        $staff = Employee::where('clinic_id', $clinic->id)->where('role', 'Staff')->get();
        $staffCount = $staff->count();

        //count appointments

        //list of phyiscians
        $physicianList = Employee::where('clinic_id', $clinic->id)->where('role', 'Physician')->paginate(5);
        $staffList = Employee::where('clinic_id', $clinic->id)->where('role', 'Staff')->paginate(5);
        $appointments = Appointment::where('clinic_id', $clinic->id)->paginate(5);

        return view('pages.clinicAdminDashboard', ['appointments' => $appointments, 'patientCount' => $patientCount, 
                    'physicianCount' => $physicianCount, 'staffCount' => $staffCount, 'physicianList' => $physicianList,
                    'staffList' => $staffList,]);
    }

   

    public function getClinicDoctor(){


        $users = Employee::where('role','Physician')->get();

        $clinics = Post::all();
    
        return view('appointment.createApp', ['users' => $users , 'clinics' =>$clinics]);
    }

    
    public function clinic(Post $clinic){

    
        return view('appointment.createApp', ['users' => $users , 'clinic' =>$clinic]);
    }


    public function appointmentDetails(Appointment $appointment)
    {

        return view('pages.appointmentDetails', ['appointment' => $appointment]);
    }

    public function appointmentDetails_staff(Appointment $appointment)
    {

        return view('pages.appointmentDetails_staff', ['appointment' => $appointment]);
    }

    public function appointmentDetails_patient(Appointment $appointment)
    {

        return view('pages.appointmentDetails_patient', ['appointment' => $appointment]);
    }

    public function appointmentDetails_walkIn(AppointmentWalkIn $appointment)
    {

        return view('pages.appointmentDetails_walkIn', ['appointment' => $appointment]);
    }

    public function appointmentDetails_walkIn_staff(AppointmentWalkIn $appointment)
    {

        return view('pages.appointmentDetails_walkIn_staff', ['appointment' => $appointment]);
    }
    
    public function edit(Appointment $appointment){
        

        $users = User::where('role','Physician')->get();
     
        return view('pages.employeeViewAppointments', ['appointment' => $appointment, 'users' => $users]);



    }

    public function updateStatus(Request $request, $id ){
        $appointments = Appointment::find($id);

        $user = auth()->user();
        $patient = Appointment::where('id', $id)->get()->first();
        $userEmail = User::where('id', $patient->user_id)->get()->first();
     
        if($appointments->status == '1')
        {
            $appointments->status = false; 

            $message = "Appointment is pending";

           
        }

        else if($appointments->status == '0')
        {
            $appointments->status = true; 

            $message = "Appointment has been approved";

            $details = [ 
                'title' => "Mail from MediClick",
                'body' => 'Your clinic appointment has been approved!!'
            ];
    
            $to = $userEmail->email;
            
            Mail::to($to)->send(new \App\Mail\TestMail($details));
        }

        else if($appointments->status == '4')
        {
            $appointments->status = false; 

            $message = "Appointment has been approved";

            
        }
      

        else if($appointments->status == '3')
        {

            $appointments->status = '4'; 

            $message = "Appointment has been cancelled";
        }

        $appointments->save();
        
        return redirect()->back()->with('message' , $message);

    }


    
    

    public function updatePatient(Request $request, $id ){
        $appointments = Appointment::find($id);

        if($appointments->status == true)
        {
            $appointments->status = '3'; 

            $message = "Appointment has been cancelled";
        }

        else {
            $appointments->status = '3';   

            $message = "Appointment has been cancelled";
        }

        $appointments->save();
        
        return redirect()->back()->with('message' , $message);

    }

    public function cancelAppointment(Appointment $appointment){
        

     
     
        return view('appointment.cancelAppointment', ['appointment' => $appointment]);



    }

    

    public function storeReasonPatient(Request $request)
    {

     

        $user = auth()->user();

        $employee = Patient::where('user_id', $user->id)->get('clinic_id')->first();

        CancelledAppointment::create([

            'clinic_id' => $employee->clinic_id,
            'user_id' => $user->id,
            'reason' => request('reason'),
        ]);

    

        Log::create([

            'user_id' => $user->id,
            'type' => ' Appointment',
            'description' => $user->firstName . " " .$user->lastName . " " .'cancelled an appointment',
        ]);


        return redirect('/home')->with('message', 'Your appointment has been cancelled');
    }

    public function destroyInPatient(Appointment $appointment)
    {
        $user = auth()->user();
        $userClinic;

        if($user->role == 'Patient')
        {
            $employee = Patient::where('user_id', $user->id)->get()->first();
        }
     
        elseif ($user->role == 'Physician') {
            $employee = Employee::where('user_id', $user->id)->get()->first();
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

        return redirect('/home')->with('message', 'Appointment has been deleted');
    }
}
