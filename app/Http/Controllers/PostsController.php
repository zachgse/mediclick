<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Subscription;
use App\Models\ClinicAdmin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class PostsController extends Controller
{
    

  

    public function ClinicRegister(){
        return view('posts.create');
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required',
            'blockNo' => ['required', 'numeric',],
            'city' => ['required', 'string', 'max:150'],
            'barangay' =>  ['required', 'string', 'max:150'],
            'zip' =>  ['required', 'numeric',],
            'contactNo' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $user = auth()->user();
    
    
    

          if($request->hasfile('proof_image'))
            {
                $file = $request->file('proof_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('paymentProof/', $filename);
      
            } 


      
       
       $clinic = Post::create([
            'name' => request('name'),
            'blockNo' => request('blockNo'),
            'city' => request('city'),
            'barangay' => request('barangay'),
            'zip' => request('zip'),
            'contactNo' => request('contactNo'),
            'admin_id' => $user->id,
            'subscription_id' => request('subscription_id'),
            'proof_image' => $filename,
         
        ]); 

        $status = 3;
        
        $user->update([

            'status' => $status,
    
        
        ]);

    

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic',
            'description' => $user->firstName . " " .$user->lastName . " " .'created a clinic',
        ]);

        $clinic->save();


        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'You have successfully registered your clinic!',
        ];

        $to = $user->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));
    
        return redirect('/subscriptionaccount')->with('message' , 'Clinic created!');
        
    }

 

    public function getClinic(){

        $user = auth()->user();

        $payment = Payment::all();

        $clinics = Post::where('admin_id', $user->id)->get();
        return view('pages.subscriptionaccount', ['clinics' => $clinics, 'payment' => $payment]);
    }

  
  



    public function edit(Post $post){
        
        $user = auth()->user();
        $post = Post::where('admin_id', $user->id)->get()->first();


        return view('pages.clinicAdmin-Update', ['post' => $post]);

    }

    public function update(Request $request, $id ){

        $user = auth()->user();
        $post = Post::where('admin_id', $user->id)->get()->first();

        request()->validate([
            'name' => 'string',
            'blockNo' => 'string', 'numeric',
            'city' => 'string', 'max:150',
            'barangay' => 'string', 'max:150',
            'zip' => 'string', 'numeric',
            'contactNo' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'

         
        ]);


       

        if($request->hasFile('proof_image')) {
            $destination = 'paymentProof/'.$post->proof_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('proof_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('paymentProof/', $filename);
            $post->proof_image = $filename;
        }
 


        $post->update([

            'name' => request('name'),
            'blockNo' => request('blockNo'),
            'city' => request('city'),
            'barangay' => request('barangay'),
            'zip' => request('zip'),
            'contactNo' => request('contactNo'),
            'proof_image' => $filename,
  
        
        
        ]);


        $post->save();
        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated clinic',
        ]);

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your clinic details has been updated!'
        ];

        $to = $user->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect('/subscriptionaccount')->with('message', 'Clinic updated!');


    }  
    
    /*$employees = DB::table('employees')->join('users', 'users.id', '=', 'employees.user_id')->where('lastName', 'like', '%'.$search.'%')
    ->where('role', 'Physician')->paginate(5);*/

    public function search(Request $request)
    {

        $user = auth()->user();
        $search = $request->get('search');
        $clinic = Post::where('admin_id', $user->id)->get()->first();
        $employees = DB::table('users')->join('employees', 'users.id', '=', 'employees.user_id')->where('employees.role', 'Physician') ->where('employees.clinic_id', $clinic->id) 
                                        ->where('lastName', 'like', '%'.$search.'%')->paginate(5);

       
     
        return view ('pages.clinicAdmin-search' , ['employees' => $employees]);
    }

    public function searchStaff(Request $request)
    {
        $user = auth()->user();
        $search = $request->get('search');
        $clinic = Post::where('admin_id', $user->id)->get()->first();
        $employees = DB::table('users')->join('employees', 'users.id', '=', 'employees.user_id')->where('employees.role', 'Staff') ->where('employees.clinic_id', $clinic->id)  
                                        ->where('lastName', 'like', '%'.$search.'%')->paginate(5);

       
     
        return view ('pages.clinicAdmin-staffSearch' , ['employees' => $employees]);
    }

    public function patientsearch(Request $request)
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get()->first();
    
        $search = $request->get('search');
     /*   $patients = DB::table('patients')->join('users', 'users.id', '=', 'patients.user_id')->where('clinic_id', $clinic->clinic_id)
                                            ->where('lastName', 'like', '%'.$search.'%')->paginate(5); */

        $patients = DB::table('users')->join('patients', 'users.id', '=', 'patients.user_id')   ->where('lastName', 'like', '%'.$search.'%')->where('patients.clinic_id', $clinic->id)                               
                                     ->paginate(5);                                    

   
      
        return view ('pages.clinicAdmin-Patientsearch' , ['patients' => $patients]);
    } 



    public function patientRecordSearch(Request $request)
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get()->first();
     
        $search = $request->get('search');
        $patients = DB::table('users')->join('patients', 'users.id', '=', 'patients.user_id')   ->where('lastName', 'like', '%'.$search.'%')->where('patients.clinic_id', $clinic->id)                               
        ->paginate(5);    

       
                                    
        return view ('pages.clinicAdmin-patientRecordsSearch' , ['patients' => $patients]);
    }

    public function appointmentSearch(Request $request)
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get()->first();
     
        $search = $request->get('search');
        $appointments = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.user_id')->where('lastName', 'like', '%'.$search.'%')
                                                    ->where('appointments.clinic_id', $clinic->id)->paginate(5);

   
        return view ('pages.clinicAdmin-appointmentSearch' , ['appointments' => $appointments]);
    }

    public function patientSearch_physician(Request $request)
    {

        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $patients = DB::table('patients')->where('lastName', 'like', '%'.$search.'%')->join('users', 'users.id', '=', 'patients.user_id')->join('employees', 'employees.id', '=', 'patients.physician_id')
                                            ->where('patients.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('physician.physician-patientSearch' , ['patients' => $patients]);
    }

    public function listOfPatientSearch_physician(Request $request)
    {
        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $patients = DB::table('patients')->join('users', 'users.id', '=', 'patients.user_id')->join('posts', 'posts.id', '=', 'patients.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                         ->paginate(5);

   
        return view ('physician.physician-listOfPatientSearch' , ['patients' => $patients]);
    }

    public function appointmentsSearch_physician(Request $request)
    {

        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $appointments = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.user_id')->join('posts', 'posts.id', '=', 'appointments.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                                    ->where('appointments.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('physician.physician-appointmentSearch' , ['appointments' => $appointments]);
    }

    public function walkinAppointmentsSearch_physician(Request $request)
    {
        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $appointments = DB::table('appointment_walk_ins')->join('posts', 'posts.id', '=', 'appointment_walk_ins.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                                            ->where('appointment_walk_ins.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('physician.physician-walkinAppointmentSearch' , ['appointments' => $appointments]);
    }

    public function appointmentSearch_patient(Request $request)
    {
        $user = auth()->user();
        $clinic = Patient::where('user_id', $user->id)->get()->first();
        $search = $request->get('search');
        $appointments = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.user_id')->where('lastName', 'like', '%'.$search.'%')
                                                    ->where('appointments.user_id', $user->id)
                                                    ->where('appointments.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('pages.patient-appoinntmentSearch' , ['appointments' => $appointments]);
    }

    public function clinicSearch(Request $request)
    {
        
        $search = $request->get('search');
        $clinics = DB::table('posts')->where('name', 'like', '%'.$search.'%')->paginate(5);

   
        return view ('pages.home-clinicSearch' , ['clinics' => $clinics]);
    }


    //
    public function listOfPatientSearch_staff(Request $request)
    {
        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $patients = DB::table('patients')->join('users', 'users.id', '=', 'patients.user_id')->join('posts', 'posts.id', '=', 'patients.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                         ->paginate(5);

   
        return view ('pages.staff-listOfPatientSearch' , ['patients' => $patients]);
    }

    public function appointmentsSearch_staff(Request $request)
    {

        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $appointments = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.user_id')->join('posts', 'posts.id', '=', 'appointments.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                                    ->where('appointments.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('pages.staff-appointmentSearch' , ['appointments' => $appointments]);
    }

    public function walkinAppointmentsSearch_staff(Request $request)
    {
        $user = auth()->user();
        $clinic = Employee::where('user_id', $user->id)->get()->first();

        $search = $request->get('search');
        $appointments = DB::table('appointment_walk_ins')->join('posts', 'posts.id', '=', 'appointment_walk_ins.clinic_id')->where('lastName', 'like', '%'.$search.'%')
                                                            ->where('appointment_walk_ins.clinic_id', $clinic->clinic_id)->paginate(5);

   
        return view ('pages.staff-walkinAppointmentSearch' , ['appointments' => $appointments]);
    }




   
    
   
}



