<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index", [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // fungsi autentikasi login user
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

        // mengambil kredensial dari input user
        $credentials = $request->only('username','password');

        //jika berhasil maka buka dashboard
        if (Auth::attempt($credentials)) {
            
            // catat login ke dalam log
            LoginLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);

            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
        
        // jika gagal maka muncul pesan error
        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ])->withInput($request->except('password'));
    }

    // fungsi logout
    public function logout(Request $request)
    {
        // catat logout ke dalam log
        $latestLog = LoginLog::where('user_id', Auth::id())->latest()->first();
        if ($latestLog) {
            $latestLog->update(['logout_time' => now()]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    
}
