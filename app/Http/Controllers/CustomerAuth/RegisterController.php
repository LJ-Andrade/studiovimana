<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Client;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/tienda';

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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:clients',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6|confirmed',
            ]);
        }
        
        /**
         * Create a new client instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\Client
         */
    protected function create(array $data)
    {
        switch($data['group']){
            case '1':
                $group = "1";
                break;
            case '99':
                $group = "2";
                break;
            default:
                $group = "1";
        }        
        
        return Client::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'group' => $group
        ]);

    }

    protected function guard(){
        return auth()->guard('customer');
    }

    public function showRegistrationForm(){
        return view('store.register');
    }

}
