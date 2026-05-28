<?php

namespace App\Http\Controllers\Platform\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Show platform login form.
     */
    public function showLoginForm()
    {
        return view('platform.auth.login');
    }

    /**
     * Handle platform login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:platform_users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email not found!',
        ]);

        if (Auth::guard('platform')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('platform.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials!',
        ])->onlyInput('email');
    }

    /**
     * Handle platform logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('platform')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('platform.login');
    }
}
