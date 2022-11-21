<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\Appointment;
use App\Models\Log;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function showClinicsAll(){

        $clinics = Post::all();
        $employees = Employee::where('role','Physician')->get();

        $user = auth()->user();
        $employeeClinic = Employee::where('user_id', $user->id)->get('clinic_id')->first();
        $employee= Employee::where('user_id', $user->id)->get('id')->first();

        $appointments = Appointment::paginate(2);
                                  
        return view('pages.home', ['clinics' => $clinics, 'employees' => $employees, 'appointments' => $appointments]);
    }

   
}
