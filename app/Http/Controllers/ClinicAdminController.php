<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\ClinicAdmin;
use App\Models\Subscription;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CancelledAppointment;
use App\Models\Log;
use App\Models\Patient;

use Illuminate\Support\Facades\Mail;
use App\Models\Payment;

class ClinicAdminController extends Controller
{
    //
    public function getClinic(){

        $clinics = ClinicAdmin::select('clinic_id', 'user_id')->get();
        return view('pages.subscriptionaccount', ['clinics' => $clinics]);
    }

   

    public function edit(Post $post){
        
       
        $user = auth()->user();
        
        $post = Post::where('admin_id', $user->id)->get('id')->first();

        $subscription = Subscription::get();


        
        return view('pages.clinicAdmin-changeSub', ['post' => $post, 'subscription' => $subscription]);

    }

    public function update(Request $request, $id ){
        $post = Post::where('id',$id);
        
        $user= auth()->user();
        $post->update([
            'subscription_id' => request('subscription_id'),
        ]);

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated the subscription',
        ]);

        return redirect('/subscriptionaccount');


    }

    public function appointmentDetails(Appointment $appointment)
    {

        return view('pages.clinicAdmin-viewAppointmentDetails', ['appointment' => $appointment]);
    }

    public function staffDetails(Employee $employee)
    {

        return view('pages.clinicAdmin-viewStaffDetails', ['employee' => $employee]);
    }

    public function updateEmployeeStatuus (Request $request, $id){
        $employee = Employee::find($id);

        $userStatus = User::where('id', $employee->user_id)->get()->first();
              
    

        $user = auth()->user();
        if($employee->status == true)
        {
            $userStatus->status = false;
            $employee->status = false; 
   
            $message = "Employee has been deactivated";

            $details = [ 
                'title' => "Mail from MediClick",
                'body' => 'Your account has been deactivated'
            ];
    
            $to = $userStatus->email;
            
            Mail::to($to)->send(new \App\Mail\TestMail($details));
        }

        

        else {
            $employee->status = true;   
            $userStatus->status = true;
            $message = "Employee has been activated";

            $details = [ 
                'title' => "Mail from MediClick",
                'body' => 'Your account has been activated'
            ];
    
            $to = $userStatus->email;
            
            Mail::to($to)->send(new \App\Mail\TestMail($details));
        }



        $employee->save();
        $userStatus->save();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated the employee status',
        ]);

        
        return redirect()->back()->with('message' , $message);

    }

  

    public function patientRecords()
    {
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get()->first();
        $patients = Patient::where('clinic_id', $clinic->id)->paginate(5);

        
        return view('pages.clinicAdmin-patientRecords', ['patients' => $patients]);

       
    }

    
    public function clinicAuditLogs()
    {
        $user = auth()->user();
        $logs = Log::where('type', ' Clinic')->get();

       dd($logs);
        return view('pages.clinicAuditLogs', ['logs' => $logs]);

       
    }

    public function destroy(Patient $patient)
    {

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'deletedd a patient recordd',
        ]);
        $patient->delete();

        

        return redirect()->back()->with('message', 'Patient record has been deleted');
    }

    public function resubscribe(Payment $payment){

      
        $user = auth()->user();
        $subscriptions = Subscription::all();
        $clinic = Post::where('admin_id', $user->id)->get()->first();

       

        return view ('pages.clinicAdmin-Resubscribe', ['payment' => $payment, 'subscriptions' => $subscriptions, 'clinic' => $clinic]);
    }

    public function storeResubscribe(Request $request){

        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $subscriptions = Subscription::all();

        request()->validate([

            'subscription_id' => 'required',
            'paymentProof' => 'mimes:pdf,jpg,jpeg,png|max:4096',
            'accountNumber' => 'numeric', 'max:200',
            

        ]);
        
      
        if($request->hasfile('paymentProof'))
        {
            $file = $request->file('paymentProof');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('paymentProofClinic/', $filename);
  
        } 
  

 
   
        Payment::create([

            'user_id' => $user->id,
            'clinic_id' => $clinic->id,
            'subscription_id' => request('subscription_id'),
            'paymentProof' => $filename,
            'accountNumber' => request('accountNumber'),
           
 
        ]);

        Log::create([

            'user_id' => $user->id,
            'type' => 'Resubscribe',
            'description' => $user->firstName . " " .$user->lastName . " " .'resubscribed',
        ]);

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your payment has been submitted successfully! Please wait for the system admin to confirm your payment',
        ];

        $to = $user->email;
        
        Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect ('/subscriptionaccount')->with('message', 'Submitted  successfuly! Please wait for the system admin to confirm');
    }
    
    public function cancalled_appts(){

      
        $user = auth()->user();
        $clinic = Post::where('admin_id' , $user->id)->get()->first();
        $appointments = CancelledAppointment::where('clinic_id', $clinic->id)->paginate(5);
    

        return view ('pages.clinicAdmin-cancelledAppts', ['appointments' => $appointments, ]);
    }
    
}
