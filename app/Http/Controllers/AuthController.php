<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'nullable|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'user', // Default role
            'status' => 'pending', // Set to pending for admin approval
        ]);

        // Notify Admin for Approval (Optional)
        // Notification logic here...

        return redirect()->route('signin')->with('success', 'Your account has been created. It will be activated upon admin approval.');
    }

    public function showSigninForm()
    {
        return view('auth.signin');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email_or_username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email_or_username', 'password');

        // Attempt login with email or username
        $user = User::where(function ($query) use ($credentials) {
            $query->where('email', $credentials['email_or_username'])
                  ->orWhere('username', $credentials['email_or_username']);
        })->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->status !== 'approved') {
                return back()->withErrors(['Your account is not approved yet.']);
            }

            Auth::login($user);
            /*return redirect()->intended('dashboard');*/
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');  // Admin dashboard route
            }
    
            return redirect('residents'); 
        }

        return back()->withErrors(['Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
