<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        return view('login.index');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'usr_id' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($request->session()->token() !== $request->_token) 
            return back()->withErrors(['login' => 'CSRF token mismatch.'])->withInput();

        $user = User::verifyCredentials($request->usr_id, $request->password);

        if(!$user)
        {
            return back()->withErrors(['login' => 'Username atau password salah.', ])->withInput($request->except('password'));
        }
        Auth::login($user); 
        $request->session()->regenerate(); 
        
        // store informasi user di session
        Session::put('usr_id', $user->usr_id);
        Session::put('rol_id', $user->rol_id);
        Session::put('kel_id', $user->kel_id);

        return redirect()->route('dashboard');
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

/* 
if (!$user) {
    return response()->json(['message' => 'Login failed'], 401);
}

// Return role and other user information
return response()->json(['role' => $user->role->role_name, 'message' => 'Login successful']); */