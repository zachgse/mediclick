<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Employee;
use App\Models\UserRequest;
use App\Models\Appointment;
use App\Models\Log;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
class PatientController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();

        return view('clinic.apply-clinic', ['post' => $posts]);
    }
    
    public function store()
    {

        
        request()->validate([

            'clinic_id' => 'required',
    


        ]);
        $user = auth()->user();

        Employee::create([

            'user_id' => $user->id,
            'clinic_id' => request('clinic_id'),
 
        ]);

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic',
            'description' => $user->firstName . " " .$user->lastName . " " .'created an employee',
        ]);

        return redirect('/home');
    }

    public function showPatients()
    {
    
        $patients = User::where('role', 'patient')->get();
        return view('pages.physicianViewPatient', ['patients' => $patients]);
    }


    public function edit(Patient $patient){
 
        return view('physician.physician-AddpatientRecords', ['patient' => $patient]);
    }

    public function update(Request $request, $id ){
        $appointments = Patient::find($id);

        request()->validate([
            'height' => 'numeric', 'nullable', 'max:200',
            'socialRemarks' => 'required','string','nullable', 'max:200',
            'familyRemarks' => 'required','string','nullable', 'max:200',
            'weight' => 'numeric','nullable', 
            'rightEye' => 'numeric','nullable', 
            'leftEye' => 'numeric','nullable', 
            'bodyTemp' => 'numeric','nullable', 
            'pulseRate' => 'numeric','nullable', 
            'respirationRate' => 'numeric','nullable', 
            'bloodPressure' => 'numeric','nullable', 
            'bloodType' => 'string','nullable', 
            'tobacco' => 'string','nullable',
            'alcohol' => 'string','nullable',
            'drugs' => 'string','nullable',
            'hypertension' => 'string','nullable',
            'heartDisease' => 'string','nullable',
            'kidneyDisease' => 'string','nullable',
            'diabetese' => 'string','nullable', 
            'diagnosis' => 'required','string', 'max:200',
            'prescription' => 'mimes:pdf,jpg,jpeg,png|max:4096|required',
            
        ]);

        if($request->has('tobacco')) {
            $temp = true;
        }else {
            $temp = false;
        }

        if($request->has('alcohol')) {
            $tempAlcohol = true;
        }else {
            $tempAlcohol = false;
        }

        if($request->has('drugs')) {
            $tempDrugs = true;
        }else {
            $tempDrugs = false;
        }

        if($request->has('hypertension')) {
            $tempHypertension = true;
        }else {
            $tempHypertension = false;
        }

        if($request->has('heartDisease')) {
            $tempHeartDisease = true;
        }else {
            $tempHeartDisease = false;
        }

        if($request->has('kidneyDisease')) {
            $tempKidneyDisease = true;
        }else {
            $tempKidneyDisease = false;
        }

        if($request->has('diabetese')) {
            $tempDiabetese = true;
        }else {
            $tempDiabetese = false;
        }

        if($request->has('diabetese')) {
            $tempDiabetese = true;
        }else {
            $tempDiabetese = false;
        }
        
/*
        if($request->hasFile('file')) {
            
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('patientFiles/', $filename);
            $appointments->file = $filename;
        }  */


        if ($request->hasFile('prescription')) {
            $file = $request->file('prescription');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'.$extension;
            $file->move('patientFiles/', $filename);
          
        } 
        $appointments->update([

            'height' => request('height'),
            'familyRemarks' => request('familyRemarks'),
            'socialRemarks' => request('socialRemarks'),
            'weight' => request('weight'),
            'rightEye' => request('rightEye'),
            'leftEye' => request('leftEye'),
            'bodyTemp' => request('bodyTemp'),
            'pulseRate' => request('pulseRate'),
            'respirationRate' => request('respirationRate'),
            'bloodPressure' => request('bloodPressure'),
            'bloodType' => request('bloodType'),
            'tobacco' => $temp,
            'alcohol' => $tempAlcohol,
            'drugs' => $tempDrugs,
            'hypertension' => $tempHypertension,
            'heartDisease' => $tempHeartDisease,
            'kidneyDisease' => $tempKidneyDisease,
            'diabetese' => $tempDiabetese,
            'diagnosis' => request('diagnosis'),
            'prescription' => $filename
        
        ]);
      
     

        return redirect('/employeePatientRecords')->with('message', 'Updated successfully!');


    }

    public function edit_staff(Patient $patient){
 
        return view('pages.staff-AddpatientRecords', ['patient' => $patient]);
    }

    public function update_staff(Request $request, $id ){
        $appointments = Patient::find($id);


       
        request()->validate([
            'height' => 'numeric', 'nullable', 
            'weight' => 'numeric','nullable',
            'rightEye' => 'numeric','nullable', 
            'leftEye' => 'numeric','nullable', 
            'bodyTemp' => 'numeric','nullable', 
            'pulseRate' => 'numeric','nullable', 
            'respirationRate' => 'numeric','nullable', 
            'bloodPressure' => 'numeric','nullable', 
            'bloodType' => 'string','nullable', 
 
            
        ]);


    
        $appointments->update([

            'height' => request('height'),
            'weight' => request('weight'),
            'rightEye' => request('rightEye'),
            'leftEye' => request('leftEye'),
            'bodyTemp' => request('bodyTemp'),
            'pulseRate' => request('pulseRate'),
            'respirationRate' => request('respirationRate'),
            'bloodPressure' => request('bloodPressure'),
            'bloodType' => request('bloodType'),

        ]);
      
     

        return redirect('/staffPatientRecords')->with('message', 'Updated successfully!');


    }

    public function patientRecords()
    {
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->get()->first();

        $patients = Patient::where('clinic_id', $employee->clinic_id)->where('physician_id', $employee->id)->paginate(5);
        return view('pages.employeePatientRecords', ['patients' => $patients]);
    }

    public function patientRecords_staff()
    {
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->get()->first();

        $patients = Patient::where('clinic_id', $employee->clinic_id)->paginate(5);
        return view('pages.staffPatientRecords', ['patients' => $patients]);
    }

    public function patientList()
    {
        $patients = Patient::paginate(5);

        return view('physician.physician-listPatients', ['patients' => $patients]);
    }

    public function patienRecord()
    {
        $user = auth()->user();
        $patients = Patient::where('user_id', $user->id)->get();

        return view('pages.patientRecord', ['patients' => $patients]);
    }

    public function editPatient(Patient $patient){
        


     
        return view('physician.physician-listPatients', ['patient' => $patient]);



    }

    public function editPatientRecords(Patient $patient){
        


     
        return view('pages.patientRecord', ['patient' => $patient]);



    }

    public function patientRecordsDetailed(Patient $patient)
    {
        

            return view('physician.patientRecordsDetailed', ['patient' => $patient]);
      

    }

    public function userRequests()
    {
        $user = auth()->user();

      
        $requests = UserRequest::where('patient_id', $user->id)->get();
        return view('pages.patientRequest', ['requests' => $requests]);
    }

    public function showAppointment()
    {
        $user = auth()->user();
        $appointments = Appointment::where('user_id', $user->id)->paginate(5);

        return view('pages.patientViewAppointments', ['appointments' => $appointments]);
        
    }

    public function updateRequestStatus(Request $request, $id ){
        $patient = Patient::find($id);

     
        $user = auth()->user();
        $patientInfo = Patient::where('id', $id)->get()->first();

        $patientEmail = User::where('id', $patientInfo->user_id)->get()->first();


        if($patient->status == '0')
        {
            $patient->status = '2'; 

            $message = "Request has been sent.";

            $details = [ 
                'title' => "Mail from MediClick",
                'body' => 'A physician have request to view your records!!'
            ];
    
            $to = $patientEmail->email;
            
            Mail::to($to)->send(new \App\Mail\TestMail($details));

        }

        if($patient->status == '1')
        {
       
            $message = "Patient has already allowed his access status";
       
        }

        else {
            $patient->status = '2'; 
            $message = "Request has been already sent.";
        }

        $patient->save();
        
        return redirect()->back()->with('message' , $message);

    }

    public function updatePatientStatus(Request $request, $id ){
        $patient = Patient::find($id);

     
        if($patient->status == '0')
        {
            $patient->status = '1'; 

            $message = "Allowed other clinics to access your records.";
        }
        else if($patient->status == '2')
        {
            $patient->status = '1'; 

            $message = "Allowed other clinics to access your records.";

            
        }


        else if($patient->status == '1')
        {
       
            $message = "You have already allowed your access status";
       
        }

       

        $patient->save();
        
        return redirect()->back()->with('message' , $message);

    }

    public function updatePatientStatusDisable(Request $request, $id ){
        $patient = Patient::find($id);

     
        if($patient->status == '1')
        {
            $patient->status = '0'; 

            $message = "Disabled other clinics to access your records.";
        }
        

       

        $patient->save();
        
        return redirect()->back()->with('message' , $message);

    }

    public function patientRecordsAllowed(Patient $patient)
    {
        

            return view('pages.patientRecordsAllowed', ['patient' => $patient]);
      

    }

    public function patientRecords_staffAllowed(Patient $patient)
    {
        

            return view('pages.patientRecords_staff', ['patient' => $patient]);
      

    }


    public function showClinicDetails(Post $user)
    {
        
        return view('pages.clinicDetails', ['user' => $user]);
    }

    public function myRecords(Patient $patient)
    {
        return view('pages.myRecords', ['patient' => $patient]);
    }

    public function myRecords_display(Patient $patient)
    {

        $user = auth()->user();

        $patients = Patient::where('user_id' , $user->id)->get();
        return view('pages.myRecords', ['patients' => $patients, 'patient' =>$patient]);
    }

    public function myRecords_detailed(Patient $patient)
    {
        return view('pages.myRecords_detailed', ['patient' => $patient]);
    }

 
    
    


}
