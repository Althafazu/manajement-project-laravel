<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index", [
            'title' => 'Login',
            'active' => 'login'
        ]);    
    }

    public function authenticate(Request $request)
    {
        $request->validate
        ( 
            [
                'username' => 'required|string|max:20',
            'password' => 'required|string|min:8' 
            ], [
                'username.required' => 'Username harus diisi.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal 8 karakter.'
            ]
        );
        
        $credentials = $request->only('username','password');
        // $user = User::verifyCredentials($credentials['username'], $credentials['password']);
        
        // mencari user dan password pada database
        $user = User::where('usr_id', $credentials['username']) ->where('usr_password', $credentials['password'])->first();
        if ($user) {
            // Login berhasil
            Auth::login($user);

            // Perbarui session
            $request->session()->regenerate();

            // Redirect berdasarkan role user
            if ($user->isRole('Mahasiswa')) {
                return redirect()->route('dashboard');
            } elseif ($user->isRole('Admin')) {
                return redirect()->route('dashboard');
            }
        }

        // Jika gagal login, kembalikan dengan error
        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ])->withInput($request->except('password'));
    }
    
    // Fungsi logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();
        
        // Invalidasi session dan perbarui token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect ke halaman login
        return redirect()->route('login');
    }
}
