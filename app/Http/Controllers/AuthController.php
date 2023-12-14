<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function signUp(){
        return view('signup');
    }

    public function signUpPost(Request $request){

    //     echo "<pre>";
    //     print_r($request->all());
    //    echo  "<pre>";
       
    //    return response()->json(['res'=>'geted']);
       
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:seeker,email',
        'password' => 'required|min:5',
        'cpassword' => 'required|same:password'
    ]);
    $hashedPassword = Hash::make($request->input('password'));
    $query = DB::table('seeker')->insert([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>$hashedPassword,
    ]);

    // if($query){
    //     return redirect()->route('login');
    // }else{
    //     return redirect()->route('signup');
    // }
    }
       
       
        
        

    
    public function login(){
        return view('login');
    }


    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

       $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            // return redirect()->intended('signup');
            dd('Login successful');
        }else{
            // return redirect()->route('login');
            dd('Login failed');
    }
}
}