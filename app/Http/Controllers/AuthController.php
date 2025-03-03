<?php

namespace App\Http\Controllers;

use App\Services\RoleRedirectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $roleRedirectService;

    // Constructor untuk meng-inject service
    public function __construct(RoleRedirectService $roleRedirectService)
    {
        $this->roleRedirectService = $roleRedirectService;
    }

    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect($this->roleRedirectService->redirectToDashboard());
        }
    
        return back()->withInput()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout');
    }
}
