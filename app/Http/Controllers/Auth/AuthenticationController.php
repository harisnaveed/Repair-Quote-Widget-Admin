<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email is required!',
            'email.email' => 'Invalid email format!',
            'password.required' => 'Password is required!',
        ]);

        // Attempt to authenticate the user
        if (Auth::guard()->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials!',
        ])->onlyInput('email');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
