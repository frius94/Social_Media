<?php

namespace App\Http\Controllers\Auth;

use App\SchoolClass;
use App\User;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

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
	        'birthDate' => ['required', 'date'],
	        'street'    => ['required', 'string', 'max:255'],
	        'mobile'    => ['required', 'numeric', 'digits_between:9,13'],
	        'plz'       => ['required', 'numeric', 'digits:4'],
	        'city'      => ['required', 'string', 'max:255'],
	        'classname' => ['required', 'string', 'max:255'],

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

    	$city = City::registerUser([
    		'plz'  => $data['plz'],
		    'city' => $data['city'],
	    ]);

    	$class = SchoolClass::registerUser($data['classname']);

	    return User::create([
            'firstname'        => $data['firstname'],
	        'lastname'         => $data['lastname'],
	        'password'         => Hash::make($data['password']),
            'email'            => $data['email'],
	        'birthDate'        => $data['birthDate'],
	        'street'           => $data['street'],
	        'mobile'           => $data['mobile'],
		    'cities_id'        => $city['id'],
		    'schoolClasses_id' => $class['id'],

        ]);

    }
}
