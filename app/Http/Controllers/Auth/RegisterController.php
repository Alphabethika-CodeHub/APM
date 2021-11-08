<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        // return User::create([
        //     'username' => $data['username'],
        //     'phone' => $data['phone'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        // $data->validate([            
        //     'username' => ['required', 'string', 'max:8'],
        //     'phone' => ['required', 'max:14'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $fields = request('image');
        
        if($fields == "image1"){
            return User::create([
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } elseif($fields == "image2") {
            return User::create([
                'image' => 'images/user/2.jpg',
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],           
                'password' => Hash::make($data['password']),
                'level' => "Public"
            ]);
        } elseif($fields == "image3") {
            return User::create([
                'image' => 'images/user/3.jpg',
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],           
                'password' => Hash::make($data['password']),
                'level' => "Public"
            ]);
        } elseif($fields == "image4") {
            return User::create([
                'image' => 'images/user/4.jpg',
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],           
                'password' => Hash::make($data['password']),
                'level' => "Public"
            ]);
        } elseif($fields == "image5") {
            return User::create([
                'image' => 'images/user/5.jpg',
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],           
                'password' => Hash::make($data['password']),
                'level' => "Public"
            ]);
        } elseif($fields == "image6") {
            return User::create([
                'image' => 'images/user/6.jpg',
                'username' => $data['username'],
                'phone' => $data['phone'],
                'email' => $data['email'],           
                'password' => Hash::make($data['password']),
                'level' => "Public"
            ]);
        }

    }
}
