<?php

namespace App\Http\Controllers\Auth;
use App\Society;
use App\Law;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'law_id' => 'required',
            'society_id' => 'required',
            'password' => 'required|min:6|confirmed',
            'photo' => 'required|max:200',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
        	'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'law_id' => $data['law_id'],
            'society_id' => $data['society_id'],
            'password' => bcrypt($data['password']),
            'photo' => $data['photo'],
        ]);
    }
	
	public function showRegistrationForm()
    {
    	$societies = Society::getAll();
		$laws = Law::getAll();
        return view('auth.register', compact('societies', 'laws'));
    }
}
