<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Employee;
Use App\Models\Patient;
use App\Models\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class UserController extends Controller
{
    //
    public function showPatient()
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $patients = Patient::where('clinic_id', $clinic->id)->paginate(5);

        return view('pages.clinicAdminPatientView', ['patients' => $patients]);
    }

    public function patientnDetails(Patient $patient)
    {

        return view('pages.clinicAdmin-viewPatientDetails', ['patient' => $patient]);
    }

    public function showPhysician(Employee $employees)
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $employees = Employee::where('clinic_id', $clinic->id)->where('role','Physician')->paginate(5);
   

        return view('pages.clinicAdminPhysicianView', ['employees' => $employees]);
   
    }

    

    public function showPhysicianDetails(Employee $employee)
    {

        return view('pages.clinicAdmin-viewPhysicianDetails', ['employee' => $employee]);
    }

    public function dropdownPhysician()
    {
        $users = User::where('role','Physician')->get();

        return view('appointment.createApp', ['users' => $users]);
    }

  

    public function showStaff(Employee $employees)
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $employees = Employee::where('clinic_id', $clinic->id)->where('role','Staff')->paginate(5);

        return view('pages.clinicAdminStaffView', ['employees' => $employees]);
   
    }
        
    

    
    
    public function edit(User $user)
    {
        return view('pages.clinicAdminPhysicianView', ['users' => $users]);
    }
    public function update (Request $request, $id){
        $user = User::find($id);

        if($user->status == true)
        {
            $user->status = false; 
            $message = "User have been deactivated";
        }
        else {
            $user->status = true;   
            $message = "User have been activated";
        }

        $user->save();
        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated the status',
        ]);
        
        return redirect()->back()->with('message' , $message);

    }

    public function index()
    {
        return view('email');
    }

    public function send(Request $request)
    {
        $data =[
            'name' => $request->name,
            'image' => $request->file('image')
        ];
        
        $to = 'paullontoc2133@gmail.com';

        \Mail::to($to)->send(new \App\Mail\TestMail($data));

        return redirect()->back()->with('message' , 'Sent successfully!');
    }

    public function showPatientDetails()
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();

        $patient = Patient::where('clinic_id', $clinic->id)->get()->first();

        return view('pages.clinicAdmin-viewPatientDetails', ['patient' => $patient]);
    }

    public function viewAllPhysiciansClinic()
    {

        


        $clinics = Post::all();

        return view('pages.viewAllClinics', ['clinics' => $clinics]);

}
}