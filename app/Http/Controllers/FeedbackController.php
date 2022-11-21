<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Log;

class FeedbackController extends Controller
{
    //

    public function index()
    {
      

        return view('pages.feedbacks');
    }
    
    public function store()
    {

     
        
        request()->validate([

            'name' => 'required', 'max:200',
            'message' => 'required', 'max:250',
    


        ]);
        $user = auth()->user();

        Feedback::create([

            'name' => request('name'),
            'message' => request('message'),
 
        ]);

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Feedback',
            'description' => $user->firstName . " " .$user->lastName . " " .'created a feedback',
        ]);

        $details = [ 
            'title' => "Mail from MediClick",
            'body' => 'Your have received a feedback!'
        ];

        $to = 'mediclick.philippines@gmail.com';
        
        //Mail::to($to)->send(new \App\Mail\TestMail($details));

        return redirect('/home')->with('message' , "Feedback submitted. Thank you for contacting us!");
    }


    public function feedbacks()
    {

        $feedbacks = Feedback::paginate(5);
        return view('system-admin.sysAd-Feedbacks', ['feedbacks' => $feedbacks]);

       
    }
}
