<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Log;
use App\Models\Payment;
use App\Models\Feedback;

class SystemAdminController extends Controller
{
    //
    public function sysAdDashboard()
    {
        return view("system-admin.sysAd-Dashboard");
    }

    public function showClinics(){

        $logs = Log::paginate(5);
        $clinics = Post::all();
        $clinicCount = $clinics->count();
       

        return view('system-admin.sysAd-Dashboard', ['clinics' => $clinics, 'logs' => $logs, 'clinicCount' => $clinicCount]);
    }

    

    public function showClinicsAll(){

        $users = Post::orderBy('subDuration', 'ASC')->paginate(5);

        return view('system-admin.sysAd-viewClinics', ['users' => $users]);
    }

    public function showStaff()
    {
        $users = User::where('role','Staff')->get();

        return view('pages.sysAd-viewClinics', ['users' => $users]);
    }

    public function edit(Post $user)
    {
        return view('pages.sysAd-viewClinics', ['user' => $user]);
    }
    
    public function update (Request $request, $id){
        $user = Post::find($id);
        
        
  
        $clinic = Post::where('id', $id)->get('admin_id')->first();
        $userAdmin = User::where('id', $clinic->admin_id)->get()->first();
        
        if($user->status == true)
        {
            $user->status = false; 
            $userAdmin->status = false;
            $message = "Clinc has been deactivated";
        }

        else {
            $user->status = true;   
            $userAdmin->status = '1';
            $user->editStatus = false;
            $message = "Clinic has been activated";
        }



        $user->save();
        $userAdmin->save();

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'System Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated the statuus',
        ]);

        return redirect()->back()->with('message' , $message);

    }

    public function showClinicDetails(Post $user)
    {
        
        return view('system-admin.sysAd-clinicDetails', ['user' => $user]);
    }

    public function auditLogs()
    {
    
        $logs = Log::paginate(10);

   
        return view('system-admin.sysAd-AuditLogs', ['logs' => $logs]);

       
    }
    

    public function add_duration_payment (Request $request, $id) {
        $payment = Payment::find($id);
        $var = Payment::where('id', $payment->id)->get()->first();
        $clinic = Post::where('id', $payment->clinic_id)->get()->first();
     
        $currentDuration = $clinic->subDuration;

        if ($var->subscription_id == 1) {
            $duration = 180;
        }
        else if ($var->subscription_id == 2) {
            $duration = 365;
        }
  
        if ($var->status == false)
        {
            $var->status = true;
        }
 

        $clinic->update([
            'subDuration' => $currentDuration + $duration,
     
        ]);

        $var->update([
            'status' => '1',
    
     
        ]);
        

      


      
    

   

    return redirect()->back()->with('message', 'Clinic duration has been updateed');
  
    }

    public function allowClinicedit (Request $request, $id){
        $clinic = Post::find($id);

        $user2 = auth()->user();

        $user = auth()->user();
        if($clinic->editStatus == 1)
        {
            $clinic->editStatus = false;
            $user2->status = false;
            $message = "Clinic edit access has been deactivated";
        }

       

        else {   
            $clinic->editStatus = true;
            $user->status = true;   
            $user2->status = true;
            $user->editStatus = false;
            $message = "Clinic edit access has been activated";
        }

        $clinic->save();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated the clinic edit status',
        ]);
        return redirect()->back()->with('message' , $message);

    }
}