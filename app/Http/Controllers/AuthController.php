<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
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

      
       
    //    return response()->json(['res'=>'geted']);
       
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5',
        'cpassword' => 'required|same:password'
    ]);
    $hashedPassword = Hash::make($request->input('password'));
//     echo "<pre>";
//     print_r($request->all());
//    echo  "<pre>";
//    $user = DB::table('seekers')->insert([
//         'name'=>$request->input('name'),
//         'email'=>$request->input('email'),
//         'password'=>$hashedPassword,
//     ]);


    $user = DB::table('users')->insert([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $hashedPassword,
    ]);

    // Additional logic after successful insertion, if needed

    return response()->json(['Registered' => true]);


    

   


    // if($user){
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
       $remember = $request->input('remember');


        if(Auth::attempt($credentials,$remember)){
            // return redirect()->route('/home')->withCookie(cookie('remember_token', str_random(60), 1440));
            if(isset($remember)&&!empty($remember)){
               
                setcookie("email",$request->input('email'),time()+3600);
                setcookie("password",$request->input('password'),time()+3600);
            }else{
                
                setcookie("email","");
                setcookie("password","");
            }
            return redirect()->route('/home');
        } 
        return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'Invalid credentials']);
}


public function HomePage(){
    return view('home');
}


public function loggeduser()
{
    $userEmail = auth()->user()->email;
    return view('home', ['email' => $userEmail]);
}

public function update(){
    return view('updateSeeker')->with('user',auth()->user());
}

public function updatePost(Request $request)
{
    $user = auth()->user();

    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'age' => 'required|integer|between:10,60',
        'gender' => 'required',
        'phone' => 'required|digits:10',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update user profile
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->age = $request->input('age');
    $user->gender = $request->input('gender');
    $user->phone = $request->input('phone');

    // Handle image upload
    if ($request->hasFile('image')) {
        // Get the original filename of the uploaded file
        $originalFilename = $request->file('image')->getClientOriginalName();
    
        // Store the file with its exact name in the 'profile_images' directory
        $imagePath = $request->file('image')->storeAs('profile_images', $originalFilename, 'public');
    
        // Save the image path in the user model
        $user->image = $imagePath;
        
    }
    
    $imageUrl = '/profile_images/updated/image.jpg';

    // Save changes to the user model
    $user->save();
    return response()->json(['image_url' => $imageUrl]);

    // You may want to redirect to a profile page or show a success message
    // return redirect()->route('/home')->with('success', 'Profile updated successfully');
}

public function addpost(){
    return view('add_post');
}
public function addpost_post(Request $request){
    $request->validate([
        'post_title' => 'required|string|max:255',
        'post_content' => 'required|string|max:1000',
        'post_category_id' => 'required|exists:categories,cat_id'
        
    ]);
    $post_query = DB::table('posts')->insert([
        'post_title' => $request->input('post_title'),

        'post_content' => $request->input('post_content'),
        'post_category_id' => $request->input('post_category_id'),
        
    ]);
    
}

public function showPostForm()
{
    $categories = Category::all();
    
    return view('add_post', ['categories' => $categories]);
}

public function addcategory(){
    return view('categories');
}


public function addcategoryPost(Request $request){
    // echo "<pre>";
    //     print_r($request->all());
    //    echo  "<pre>";

    $request->validate([
        'cat_name' => 'required|string|max:255',
        'cat_descp' => 'required|string|max:1000'
        
    ]);

    $cat_query = DB::table('categories')->insert([
        'cat_name' => $request->input('cat_name'),
        'cat_descp' => $request->input('cat_descp')
        
    ]);


   
}



public function showprofile(){
    $users = User::all();
}


public function ViewProfile(){
    return view('showProfile');
}
}







