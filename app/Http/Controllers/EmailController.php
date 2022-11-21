<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Payment;
use App\Models\Log;
class EmailController extends Controller
{
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

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'User',
            'description' => $user->firstName . " " .$user->lastName . " " .'sent an email',
        ]);

        

        return redirect()->back()->with('message' , 'Sent successfully!');
    }

    public function registrationProof(Request $request)
    {
      
        $data =[
            'name' => $request->name,
            'image' => $request->file('image')
        ];
        
        $to = 'paullontoc2133@gmail.com';

        \Mail::to($to)->send(new \App\Mail\TestMail($data));

        return redirect()->back()->with('message' , 'Sent successfully!');
    }


    public function store(Request $request)
    {
      

        

        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $clinicSubscription = Post::where('admin_id', $user->id)->get('subscription_id')->first();
        if($request->hasfile('paymentProof'))
        {
            $file = $request->file('paymentProof');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('paymentProof/', $filename);
            
        } 

         


           Payment::create([

                'user_id' => $user->id,
                'clinic_id' => $clinic->id,
                'paymentProof' => $filename,
                'subscription_id' => $clinicSubscription->subscription_id,
                'accountNumber' => request('accountNumber'),

             

            ]);


            return redirect()->back()->with('message' , 'Submitted successfully!');

        
    }
}
