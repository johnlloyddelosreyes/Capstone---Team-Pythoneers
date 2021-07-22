<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Local;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::PRODUCTS;
    // protected function redirectTo(){
    //     if(Auth()-user()->role == 'Seller'){
    //         return RouteServiceProvider::DASHBOARD;
    //     }
    //     elseif(Auth()-user()->role == 'Customer'){
    //         return RouteServiceProvider::HOME;
    //     }
    // }

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
            'storename' => ['required', 'string', 'max:255'],
            'storeaddress' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
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
            'name' => $data['name'],
            'storename' => $data['storename'],
            'storeaddress' => $data['storeaddress'],
            'contact' => $data['contact'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // return Local::create([
        //     'name' => $data['name'],
        //     'gender' => $data['gender'],
        //     'bdate' => $data['bdate'],
        //     'address' => $data['address'],
        //     'contact' => $data['contact'],
        //     'role' => $data['role'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);


    }
}
