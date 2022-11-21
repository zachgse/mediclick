<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
Route::get('/hello', function () {
    //return view('welcome');
    return 'Hello World!';
});


Route::get('/users/{id}/{name}', function($id,$name) {
    return 'This is user '.$name. ' with an id of ' .$id;
});

//Old way of controller routing 
Route::get('/', 'PagesController@index');

use App\Http\Controllers\AboutController;
Route::get('/about',[AboutController::class, 'about']);

*/

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\EditClinicController;
use App\Http\Controllers\ClinicAdminController;
use App\Http\Controllers\EditAppointment;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentWalkInController;



Route::get('/',[PagesController::class, 'index']);
Route::get('/about',[PagesController::class, 'about']);
Route::get('/pricing',[PagesController::class, 'pricing']);
Route::get('/BasicSubscription',[PagesController::class, 'BasicSubscription']);
Route::get('/PremiumSubscription',[PagesController::class, 'PremiumSubscription']);
Route::get('/login',[PagesController::class, 'login']);
Route::get('/records',[PagesController::class, 'records']);
Route::get('/basicSubscription-form',[PagesController::class, 'basicSubform']);
Route::get('/termsandconditions',[PagesController::class, 'termsandconditions']);
Route::get('/privacypolicies',[PagesController::class, 'PrivacyPolicies']);
Route::get('/feedbacks',[FeedbackController::class, 'index']);

Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['auth', 'EmailVerify']], function () { //patient profile routes

    Route::group(['middleware' => 'ClinicAdmin'], function () { //
        Route::get('/clinicAdmin-changeSub',[ClinicAdminController::class, 'show_subscription_update'])->middleware('changeSubAdmin');
        Route::get('/clinicAdmin-changeSub',[ClinicAdminController::class, 'edit'])->middleware('changeSubAdmin');
        Route::put('/clinicAdmin-changeSub/{post}',[ClinicAdminController::class, 'update'])->middleware(['changeSubAdmin']);
        Route::get('/clinicAdminPatientView',[UserController::class, 'showPatient']);
        Route::get('/clinicAdminPhysicianView',[UserController::class, 'showPhysician']);
        Route::get('/pages/{employee}/clinicAdmin-viewPhysicianDetails',[UserController::class, 'showPhysicianDetails']);
        Route::get('/clinicAdmin-cancelledAppts',[ClinicAdminController::class, 'cancalled_appts']);
        Route::get('/clinicAdmin-Update',[PostsController::class, 'edit'])->middleware('editClinicCheck');
        Route::put('/clinicAdmin-Update/{post}',[PostsController::class, 'update'])->middleware('editClinicCheck');
        Route::get('/clinicAdmin-patientRecords',[ClinicAdminController::class, 'patientRecords']);
        Route::get('/pages/{patient}/clinicAdmin-viewPatientDetails',[UserController::class, 'patientnDetails']);
        Route::delete('/pages/{patient}',[ClinicAdminController::class, 'destroy']);
        Route::get('/clinicAuditLogs',[ClinicAdminController::class, 'clinicAuditLogs']);
        Route::get('/clinicAdmin-Resubscribe',[ClinicAdminController::class, 'resubscribe'])->middleware('resubscribeAccess'); // here
        Route::get('/viewAppointments',[EloquentController::class, 'getUserAppointment']);
        Route::get('/subscriptionaccount',[PostsController::class, 'getClinic'])->middleware('statusCheck');
        Route::post('/pages/clinicAdmin-Resubscribe',[ClinicAdminController::class, 'storeResubscribe'])->middleware('resubscribeAccess'); // here
        Route::get('/clinicAdmin-search',[PostsController::class, 'search']);
        Route::get('/clinicAdmin-Patientsearch',[PostsController::class, 'patientsearch']);
        Route::get('/clinicAdmin-patientRecordsSearch',[PostsController::class, 'patientRecordSearch']);
        Route::get('/clinicAdmin-appointmentSearch',[PostsController::class, 'appointmentSearch']);
        Route::get('/clinicAdminStaffView',[UserController::class, 'showStaff']);
        Route::get('/clinicAdmin-staffSearch',[PostsController::class, 'searchStaff']);
        Route::put('/clinicAdminPhysicianView/{employee}',[ClinicAdminController::class, 'updateEmployeeStatuus']);
        Route::get('/pages/{appointment}/clinicAdmin-viewAppointmentDetails',[ClinicAdminController::class, 'appointmentDetails']);
        Route::get('/pages/{employee}/clinicAdmin-viewStaffDetails',[ClinicAdminController::class, 'staffDetails']);
        Route::put('/clinicAdminStaffView/{employee}',[ClinicAdminController::class, 'updateEmployeeStatuus']);
        Route::get('/clinicAdmin-viewPatientDetails',[UserController::class, 'showPatientDetails']);
        Route::get('/subscriptionaccount',[EmailController::class, 'index']);
        Route::post('/subscriptionaccount',[SubscriptionController::class, 'store']);
        Route::get('/subscriptionaccount',[SubscriptionController::class, 'showSubscription']);
        Route::get('/posts',[PostsController::class, 'index']);
        Route::get('/posts',[PostsController::class, 'ClinicRegister']);
        Route::get('/posts/create',[PostsController::class, 'create']);
        Route::post('/posts',[PostsController::class, 'store']);
        Route::get('/create',[PostsController::class, 'ClinicRegister']);
        Route::get('/create',[SubscriptionController::class, 'showSubscriptionPackages']);
        Route::get('/clinicAdminDashboard',[AppointmentController::class, 'showAppointmentDashboard'])->middleware('statusCheck');
    
        
    });
    
    Route::group(['middleware' => 'SystemAdmin' ], function () { //system admin routes
        Route::get('/sysAd-Dashboard',[SystemAdminController::class, 'sysAdDashboard']);
        Route::get('/sysAd-Dashboard',[SystemAdminController::class, 'showClinics']);
        Route::get('/sysAd-viewClinics',[SystemAdminController::class, 'showClinicsAll']);
        Route::get('/sysAd-viewClinics/{clinic}/edit',[SystemAdminController::class, 'edit']);
        Route::put('/system-admin/{user}',[SystemAdminController::class, 'allowClinicedit']);
        Route::put('/sysAd-viewClinics/{user}',[SystemAdminController::class, 'update']);
        Route::get('/system-admin/{user}/sysAd-clinicDetails',[SystemAdminController::class, 'showClinicDetails']);
        Route::get('/sysAd-AuditLogs',[SystemAdminController::class, 'auditLogs']);
        Route::get('/sysAd-Payments',[PaymentController::class, 'index']);
        Route::get('/sysAd-Feedbacks',[FeedbackController::class, 'feedbacks']);
        Route::put('/sysAd-Payments/{payment}',[SystemAdminController::class, 'add_duration_payment']);
    });
    
    Route::group(['middleware' => 'Physician'], function () { //physician
        Route::get('/physician/{patient}/physician-AddpatientRecords',[PatientController::class, 'edit']);
        Route::put('/physician/{patient}',[PatientController::class, 'update']);
        Route::get('/physician/{patient}/physician-listPatients',[PatientController::class, 'editPatient']);
        Route::get('/employeePatientRecords',[PatientController::class, 'patientRecords']);
        Route::get('/physician-listPatients',[PatientController::class, 'patientList']);
        Route::get('/pages/{patient}',[PatientController::class, 'editPatientRecords']);
        Route::get('/pages/{appointment}/appointmentDetails',[AppointmentController::class, 'appointmentDetails'])->middleware(PhysicianValidate::class);
        Route::get('/physician/{patient}/patientRecordsAllowed',[PatientController::class, 'patientRecordsAllowed']);
        Route::get('/physician-patientSearch',[PostsController::class, 'patientSearch_physician']);
        Route::get('/physician-listOfPatientSearch',[PostsController::class, 'listOfPatientSearch_physician']);
        Route::get('/physician-appointmentSearch',[PostsController::class, 'appointmentsSearch_physician']);
        Route::get('/physician-walkinAppointmentSearch',[PostsController::class, 'walkinAppointmentsSearch_physician']);
        Route::put('/physician/{patient}/physician-listPatients',[PatientController::class, 'updateRequestStatus']);
        Route::get('/walkInAppointmentList',[AppointmentWalkInController::class, 'appointments']);
        Route::get('/employeeViewAppointments',[AppointmentController::class, 'showAppointment']);
        Route::get('/appointment/{appointment}/appointment-edit',[EditAppointment::class, 'edit'])->middleware(PhysicianValidate::class); // physician edit appt
        Route::put('/appointment/{appointment}/appointment-edit',[EditAppointment::class, 'update']);
        Route::get('/pages/{appointment}/appointmentDetails_walkIn',[AppointmentController::class, 'appointmentDetails_walkIn'])->middleware(PhysicianValidate::class);
    
    
    });
    
    Route::group(['middleware' => 'Staff'], function () { //staff
    
        Route::get('/staffPatientRecords',[PatientController::class, 'patientRecords_staff']);
        Route::get('/staffViewAppointments',[AppointmentController::class, 'showAppointment_staff']);
        Route::get('/pages/{appointment}/appointmentDetails_staff',[AppointmentController::class, 'appointmentDetails_staff'])->middleware(StaffValidate1::class);
        Route::get('/physician/{patient}/patientRecords_staff',[PatientController::class, 'patientRecords_staffAllowed'])->middleware(StaffValidate::class);
        Route::get('/walkInAppointmentList_staff',[AppointmentWalkInController::class, 'appointments_staff']);
        Route::get('/pages/{patient}/staff-AddpatientRecords',[PatientController::class, 'edit_staff'])->middleware(StaffValidate::class);
        Route::put('/pages/{patient}/staff-AddpatientRecords',[PatientController::class, 'update_staff']);
        Route::get('/staff-listOfPatientSearch',[PostsController::class, 'listOfPatientSearch_staff']);
        Route::get('/staff-appointmentSearch',[PostsController::class, 'appointmentsSearch_staff']);
        Route::get('/staff-walkinAppointmentSearch',[PostsController::class, 'walkinAppointmentsSearch_staff']);
        Route::get('/pages/{appointment}/appointmentDetails_walkIn_staff',[AppointmentController::class, 'appointmentDetails_walkIn_staff'])->middleware(StaffValidate1::class);
   
    });
    
    Route::group(['middleware' => 'Patient'], function () { //patient
    
        Route::get('/patient-appoinntmentSearch',[PostsController::class, 'appointmentSearch_patient']);
        Route::get('/pages/{appointment}/appointmentDetails_patient',[AppointmentController::class, 'appointmentDetails_patient'])->middleware(PatientValidate::class);
        Route::get('/patientViewAppointments',[PatientController::class, 'showAppointment']);
        Route::get('/patientRecord',[PatientController::class, 'patienRecord']);
        Route::put('/pages/{appointment}/patientViewAppointments',[AppointmentController::class, 'updatePatient']);
        Route::put('/pages/{patient}/patientRecord',[PatientController::class, 'updatePatientStatus']);
        Route::put('/patientRecord/{patient}',[PatientController::class, 'updatePatientStatusDisable']);
        Route::get('/appointment/{appointment}/appointment-editPatient',[EditAppointment::class, 'edit_patient'])->middleware(PatientValidate::class); // patient edit appt
        Route::put('/appointment/{appointment}/appointment-editPatient',[EditAppointment::class, 'update_patient']);
        
        Route::get('/pages/{patient}/myRecords',[PatientController::class, 'myRecords']);
        Route::get('/myRecords',[PatientController::class, 'myRecords_display']);
        Route::get('/pages/{patient}/myRecords_detailed',[PatientController::class, 'myRecords_detailed']);

    

        
    });

    Route::post('/pages/feedbacks',[FeedbackController::class, 'store']);
    Route::get('/home',[HomeController::class, 'showClinicsAll']);
    Route::get('/home',[PagesController::class, 'home']);
    Route::get('/profile',[UserEditController::class, 'index']);
    Route::get('/auth/{user}/edit',[UserEditController::class, 'edit']);
    Route::put('/auth/{user}',[UserEditController::class, 'update']);
    Route::put('/home ',[PagesController::class, 'home']);
    Route::get('/home-clinicSearch',[PostsController::class, 'clinicSearch']);
    Route::get('/physician/{patient}/patientRecordsDetailed',[PatientController::class, 'patientRecordsDetailed']);

    Route::get('/appointment',[AppointmentController::class, 'index']);
    Route::get('/appointment/{appointment}',[AppointmentController::class, 'cancelAppointment']); // here
    Route::get('/appointment/createApp',[AppointmentController::class, 'create']);
    Route::post('/appointment',[AppointmentController::class, 'store']);
  

    Route::delete('/appointment/{appointment}',[EditAppointment::class, 'destroy']);
    Route::get('/createApp',[AppointmentController::class, 'getClinicDoctor']);

   
 
    Route::post('/appointment/createAppWalk-In',[AppointmentWalkInController::class, 'store']);
    Route::get('/createAppWalk-In',[AppointmentWalkInController::class, 'getClinicDoctor']);
  

    Route::post('/apply-clinic',[EmployeeController::class, 'store']);
    Route::get('/apply-clinic',[EmployeeController::class, 'dropdownClinics']);
    
    Route::get('/physicianViewPatient',[PatientController::class, 'showPatients']);
    Route::get('/pages/{user}/clinicDetails',[PatientController::class, 'showClinicDetails']);
    Route::put('/pages/{appointment}',[AppointmentController::class, 'updateStatus']);
    
});





//all




//user
Route::get('/viewAllClinics',[UserController::class, 'viewAllPhysiciansClinic']);
Route::get('/auth/register',[UserController::class, 'dropdownClinics']);



// appointment - patient, physician and staff




//patient




// feedbacks


//home



//payments 






//search


