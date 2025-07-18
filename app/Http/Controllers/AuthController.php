<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(StoreAuthRequest $request): RedirectResponse
    {
        $request->validated();

        $identifier = filter_var($request->input('identifier'), FILTER_VALIDATE_EMAIL) ? 'email': 'username';
        $remember = $request->input('remember-me') == 'on' ? true: false;

        if (Auth::attempt([$identifier => $request->input('identifier'), 'password' => $request->input('password')], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Selamat datang kembali');
        }

        return back()->withErrors([
            'error' => 'Login gagal',
        ])->onlyInput('error');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda berhasil logout');
    }
}
