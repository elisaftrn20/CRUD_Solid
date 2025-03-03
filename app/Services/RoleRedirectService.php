<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RoleRedirectService
{
    public function redirectToDashboard()
    {
        $user = Auth::user();
        return match ($user->role) {
            'superadmin' => route('dashboard.index'),
            'admingudang' => route('dashboard.index'),
            default => route('login')->with('error', 'Akses tidak valid')
        };
    }
}
