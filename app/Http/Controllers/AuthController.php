<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login_admin');
    }

    
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Cek user di tabel owner
        $owner = Owner::where('username', $request->username)->first();
    
        if (!$owner || !Hash::check($request->password, $owner->password)) {
            return back()->with('error', 'Invalid username or password.');
        }
    
        // Simpan user ke dalam session
        Session::put('owner_id', $owner->id);
        Session::put('owner_username', $owner->username);
    
        return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
    }    

    public function logout(Request $request)
    {
        Session::forget('owner_id');
        Session::forget('owner_username');
        return redirect()->route('admin')->with('success', 'Logged out successfully.');
    }    
}
