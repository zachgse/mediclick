<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Log;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'clinicNo' => ['required', 'string', 'max:255'],
            'blockNo' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'clinicNo' => $data['clinicNo'],
            'blockNo' => $data['branchAdd'],
            'city' => $data['city'],
            'barangay' => $data['barangay'],
            'zip' => $data['zip'],
        ]);
    }
    
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

        echo 'sent email success'; 
    }

    public function dropDownShow(Request $request)

    {

        $items = Item::pluck('name', 'id');

        $selectedID = 2;

        return view('items.edit', compact('id', 'items'));

    }

    
}
