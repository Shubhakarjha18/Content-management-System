<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\AdminUser;
use App\Models\User;

class adminController extends Controller
{
    public function dashboard(){
        return view('admin/admin_home');
    }

    public function authenticator(){
        return view('admin/authenticator');
    }



   

    // ... other methods ...

    public function authenticator_post(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:5'
        ]);
    
        $credentials = [
            'email' => $request->input('admin_email'),
            'password' => $request->input('admin_password'),
        ];
        $remember = $request->input('remember');
    
        // Check if the user exists
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && $user->role === 'admin') {
            // User exists, check password
            if (Auth::attempt($credentials, $remember)) {
                // Authentication successful
    
                if (isset($remember) && !empty($remember)) {
                    // Set cookies if "Remember Me" is checked
                    setcookie("email", $request->input('admin_email'), time() + (24 * 3600));
                    setcookie("password", $request->input('admin_password'), time() + (24 * 3600));
                } else {
                    // Clear cookies if "Remember Me" is not checked
                    setcookie("email", "");
                    setcookie("password", "");
                }
    
                return redirect()->route('admin/admin_home'); // Redirect to admin dashboard after successful login
            }
        }
    
        return back()->withInput($request->only('admin_email', 'remember'))->withErrors(['admin_email' => 'Invalid credentials']);
    }
    
    }



