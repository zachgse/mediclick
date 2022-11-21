<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

  
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastName' => ['required', 'string', 'max:150'],
            'firstName' => ['required', 'string', 'max:150'],
            'middleName' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contactNo' => 'required|regex: /^([0-9\s\-\+\(\)]*)$/|max:11',
            'gender' => ['required', 'string', 'max:50'],
            'branchAdd' => ['required', 'numeric',],
            'city' => ['required', 'string', 'max:150'],
            'barangay' => ['required', 'string', 'max:150'],
            'zip' => ['required', 'numeric',],
            'conlastName' => ['required', 'string', 'max:150'],
            'confirstName' => ['required', 'string', 'max:150'],
            'conmiddleName' => ['required', 'string', 'max:150'],
            'conConNo' => 'required|regex: /^([0-9\s\-\+\(\)]*)$/|max:11',
            'relationship' => ['required', 'string', 'max:50'],
            'role' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create( array $data)
    {
      
        if ($data['role'] == 'Patient'){
            $status=true;
        }
        else {
            $status=false;
        }
        return User::create([
            'lastName' => $data['lastName'],
            'firstName' => $data['firstName'],
            'middleName' => $data['middleName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'branchAdd' => $data['branchAdd'],
            'city' => $data['city'],
            'barangay' => $data['barangay'],
            'zip' => $data['zip'],
            'conlastName' => $data['conlastName'],
            'confirstName' => $data['confirstName'],
            'conmiddleName' => $data['conmiddleName'],
            'conConNo' => $data['conConNo'],
            'relationship' => $data['relationship'],
            'role' => $data['role'],
            'status' => $status,
            'specialization' =>$data['specialization'],
          
         
        ]);

        
        
    }
    
   

   public function dropdownClinics()
    {
        $users = Post::all();

        return view('auth.register', ['users' => $users]);
    }

    
    public function send(Request $request)
    {
        return redirect()->back()->with('message' , 'Sent successfully!');
    }
    
}
