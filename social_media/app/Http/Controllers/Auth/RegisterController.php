<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'firstname' => ['required', 'string', 'max:255'],
	        'lastname'  => ['required', 'string', 'max:255'],
	        'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
	        'birthDate' => ['required', 'date', 'date_format:Y-m-d'],
	        'street'    => ['required', 'string', 'max:255'],
	        'mobile'    => ['required', 'numeric', 'digits_between:9,13'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
	        'lastname' => $data['lastname'],
	        'password'  => Hash::make($data['password']),
            'email'     => $data['email'],
	        'birthDate' => $data['birthDate'],
	        'street'    => $data['street'],
	        'mobile'    => $data['mobile'],

        ]);
    }
}
