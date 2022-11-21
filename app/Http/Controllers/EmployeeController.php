<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Log;

class EmployeeController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();

        return view('clinic.apply-clinic', ['post' => $posts]);
    }
    
    public function store(Request $request)
    {

     
        
        
        request()->validate([

            'clinic_id' => 'required',
            'proof_image' => 'mimes:pdf,jpg,jpeg,png|max:4096',


        ]);
        $user = auth()->user();

        if($request->hasfile('proof_image'))
        {
            $file = $request->file('proof_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('paymentProof/', $filename);
            
        } 

        

      

    

        Log::create([

            'user_id' => $user->id,
            'type' => ' Employee',
            'description' => $user->firstName . " " .$user->lastName . " " .'created an employee',
        ]);

        $records = Employee::where('user_id', $user->id)->orWhereNull('id')->get()->first();

        if ($records == null){


            Employee::create([

                'user_id' => $user->id,
                'role' => $user->role,
                'clinic_id' => request('clinic_id'),
                'proof_image' => $filename,
     
            ]);
         
       
       }

        else{
            return redirect('/home')->with('message' , 'You have already applied to this clinic.');
        }


        return redirect('/home')->with('message', 'Your application has been submitted! Please wait for the admin to confirm');
    }

    public function dropdownClinics()
    {
        $clinics = Post::all();

        return view('clinic.apply-clinic', ['clinics' => $clinics]);
    }
}
