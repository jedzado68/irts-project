<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function registration()
    {
        return view('users.registration');
    }

    public function store(Request $request)
    {
    
        // Validate the incoming request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'acceptTerms' => 'required|in:yes',
        ]);
       
        // Hash the password before storing
        $data['password'] = Hash::make($data['password']);
        //  if($request->role_user == 1){
        //     $data['users_type']= $request->role_user;
        //     }else{
        //         $data['users_type']= $request->role_user;
        //     }

        $data['users_type']= $request->role_user;
       
        
        // $data['users_type'] = 0;
        // Create a new user
        $newUser = User::create($data);
    
      
       
        return redirect()->route('users.login')->with('success', 'User registered successfully.');
    }
      
    public function login()
    {
        // Render the login view
        return view('users.login');
    }
    public function loginSubmit(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Check redirection is working
           
            return redirect()->route('jobs.dashboard');
        }
        
        
    
        // If authentication fails, redirect back with an error message and retain input
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function home()
    {
        return view('jobs.home');
    }
}
