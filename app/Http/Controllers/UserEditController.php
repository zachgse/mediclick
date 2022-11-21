<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class UserEditController extends Controller
{
    //

    public function index()
    {
        $current_user = auth()->user();
        $user = User::where('id', $current_user->id)->get()->first();
        return view('auth.profile', ['user' =>$user]);
    }
    public function edit(User $user){
        

     
        return view('auth.edit', ['user' => $user]);



    }

    public function update(Request $request, $id ){
        $users = User::where('id',$id);

        request()->validate([

            'contactNo' => ['nullable', 'int'],
            'gender' => ['sometimes','nullable','string', 'max:255'],
            'branchAdd' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'barangay' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'int'],
            'conlastName' => ['nullable','string', 'max:255'],
            'confirstName' => ['nullable', 'string', 'max:255'],
            'conmiddleName' => ['nullable','string', 'max:255'],
            'conConNo' => ['nullable', 'string', 'max:255'],
            'relationship' => ['nullable','string', 'max:255'],
        ]);

        $users->update([

  
            'contactNo' => request('contactNo'),
            'gender' => request('gender'),
            'branchAdd' => request('branchAdd'),
            'city' => request('city'),
            'barangay' => request('barangay'),
            'zip' => request('zip'),
            'conlastName' => request('conlastName'),
            'confirstName' => request('confirstName'),
            'conmiddleName' => request('conmiddleName'),
            'conConNo' => request('conConNo'),
            'relationship' => request('relationship'),
        
        ]);

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'updated profile',
        ]);

        return redirect('/profile');


    }
}
