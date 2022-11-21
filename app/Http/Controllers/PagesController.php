<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Appointment;


class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function pricing(){
        return view('pages.pricing');
    }

    public function BasicSubscription(){
        return view('pages.BasicSubscription');
    }

    public function PremiumSubscription(){
        return view('pages.PremiumSubscription');
    }

    public function CancelSubscription(){
        return view('pages.cancelSubscription');
    }

    public function login(){
        return view('pages.login');
    }

    public function appointment(){
        return view('pages.appointment');
    }

    public function records(){
        return view('pages.records');
    }

    public function Dashboard(){
        return view('pages.dashboard');
    }

    public function TermsAndConditions(){
        return view('pages.termsandconditions');
    }

    public function PrivacyPolicies(){
        return view('pages.privacypolicies');
    }

    public function Register(){
        return view('pages.register');
    }

    public function PatientRegister(){
        return view('pages.patient-registration');
    }

    public function PhysicianRegister(){
        return view('pages.physician-registration');
    }

    public function StaffRegister(){
        return view('pages.staff-registration');
    }

    public function ForgotPassword(){
        return view('pages.forgotpassword');
    }

    public function ChangePassword(){
        return view('pages.changepassword');
    }

    public function ChangePasswordAdmin(){
        return view('pages.changepasswordAdmin');
    }

    public function ViewPatientAccount(){
        return view('pages.viewPatientAccount');
    }

    public function UpdatePatientAccount(){
        return view('pages.updatePatientAccount');
    }

    public function ViewPhysicianAccount(){
        return view('pages.viewPhysicianAccount');
    }

    public function UpdatePhysicianAccount(){
        return view('pages.updatePhysicianAccount');
    }

    public function ViewStaffAccount(){
        return view('pages.viewStaffAccount');
    }

    public function UpdateStaffAccount(){
        return view('pages.updateStaffAccount');
    }

     public function ClinicAdminDashboard(){
        return view('pages.clinicAdminDashboard');
    }

    public function UpdateClinicAdmin(){
        return view('pages.updateClinicAdmin');
    }

    public function SubscriptionAccount(){
        return view('pages.subscriptionaccount');
    }

    public function ClinicAdminPatientView(){
        return view('pages.clinicAdminPatientView');
    }

    

    public function ClinicAdminStaffView(){
        return view('pages.clinicAdminStaffView');
    }
    
    
    public function ViewAppointments(){
        return view('pages.viewAppointments');
    }
        
    public function ChangeSubscription(){
        return view('pages.changeSubscription');
    }

    public function ClinicAdminRegister(){
        return view('pages.clinicAdmin-registration');
    }

    public function ClinicAdminBasic(){
        return view('pages.clinicAdmin-basic');
    }

    public function ClinicAdminPremium(){
        return view('pages.clinicAdmin-premium');
    }

    public function ClinicAdminViewPatientDetails(){
        return view('pages.clinicAdmin-viewPatientDetails');
    }

    public function ClinicAdminViewPhysicianDetails(){
        return view('pages.clinicAdmin-viewPhysicianDetails');
    }

    public function ClinicAdminViewStaffDetails(){
        return view('pages.clinicAdmin-viewStaffDetails');
    }

    public function tryblade(){
        return view('pages.try');
    }

    public function clinicSelect(){
        return view('clinic.clinic-choose');
    }


    public function showUpdateClinic(){

        return view('pages.clinicAdmin-Update');
    }
    

    public function changeSub()
    {
        return view('pages.clinicAdmin-changeSub');
    }

    public function home()
    {
        $clinics = Post::all();
        $employees = Employee::where('role','Physician')->get();

        $user = auth()->user();
        $employeeClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        $employee= Employee::where('user_id', $user->id)->get('id')->first();

        $appointments = Appointment::paginate(2);
                                  
        return view('pages.home', ['clinics' => $clinics, 'employees' => $employees, 'appointments' => $appointments]);
    }

    public function viewAllPhysician()
    {
        return view('pages.viewAllPhysicians');
    }
}
