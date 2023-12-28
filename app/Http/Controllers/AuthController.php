<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
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

        // echo "<pre>";
        //     print_r($request->all());
        //    echo  "<pre>";
       
    //    return response()->json(['res'=>'geted']);
       
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5',
        'cpassword' => 'required|same:password',
        'role' => 'required'
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
        'role' => $request->input('role'),
    ]);

    $userRole = $request->input('role');

    // ... Other registration logic ...

    // Return a response with the 'role' property
    return response()->json(['role' => $userRole], 200);

    // Additional logic after successful insertion, if needed

    // return response()->json(['Registered' => true]);


    

   


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
               
                setcookie("email",$request->input('email'),time() + (24 * 3600));
                setcookie("password",$request->input('password'),time() + (24 * 3600));
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

public function updateProfile(Request $request)
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
        
        'date_of_birth' => 'nullable|date', 
        'qualification' => 'nullable|string|max:255',
        'skills' => 'nullable|string|max:255',
        "description" => 'nullable|string|max:1000',
     ]);

    // Update user profile
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->age = $request->input('age');
    $user->gender = $request->input('gender');
    $user->phone = $request->input('phone');
    $user->date_of_birth = $request->input('date_of_birth');
    $user->qualification = $request->input('qualification');
    $user->skills = $request->input('skills');
    $user->description = $request->input('description');

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
    echo "<pre>";
    print_r($request->all());
   echo  "</pre>";

   
   


    //     $user = Auth()->user();
    //     $userid = $user->id; 

    //     $categories = new Category;
    //     // $categories = Category::where('cat_name', $request->input('post_category_id'))->first();
    //     $catid = $categories->cat_id = $request->input('post_category_id');

    //    if($userid !== null && $userid !== '' && $catid !== null && $catid !== '') {
    //     $user = Auth::user();
    //     $userid = $user->id; 
    //     if($user){

       
    //     $post = new Post;

    //     $post->post_title = $request->input('post_title');
    //     $post->post_content = $request->input('post_content');
    //     $post->user_id = $request->userid;
    //     $post->post_category_id = $request->$catid;

    //     $post->save();
        
    //     echo "<h1>Post successfully added</h1>";
    // }
    //    }else{
    //     echo "<h1>Not posted</h1>";
    //    }

      

    $request->validate([
        'post_title' => 'required|string|max:255',
        'post_content' => 'required|string|max:1000',
        'post_category_id' => 'required|exists:categories,cat_id',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $user = Auth::user();
        $userid = $user->id; 
    

        $originalFilename = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('post_images', $originalFilename, 'public');

    $post_query = DB::table('posts')->insert([
        'post_title' => $request->input('post_title'),

        'post_content' => $request->input('post_content'),
        'post_category_id' => $request->input('post_category_id'),
        'user_id' => $userid,
        'image' => $imagePath
        
    ]);

    if($post_query){
        echo "Posted";

    }else{
        echo "Not Posted";
    }
    
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
    $user = Auth::user();

    // Display user details
    return view('showprofile', ['user' => $user]);
}


public function ViewProfile(){
    return view('showprofile');
}

public function updatePost($id){
  
   $post = Post::Find($id);
   $categories = Category::all();
    
    return view('update_post',compact('post','categories'));
}


public function updatePost_post(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'post_title' => 'required|string|max:255',
        'post_category_id' => 'required|exists:categories,cat_id', // Make sure the category exists
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Example validation for an image upload
        'post_content' => 'required|string|max:1000'
    ]);

    // Find the post by ID
    $post = Post::Find($id);

    // Check if the post exists
    if (!$post) {
        // Handle the case where the post is not found, e.g., redirect back or show an error message
        return redirect()->back()->with('error', 'Post not found');
    }

    // Update post data
    $post->post_title = $request->input('post_title');
    $post->post_category_id = $request->input('post_category_id');
    $post->post_content = $request->input('post_content');

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Add your logic for handling image uploads, e.g., store the file and update the post's image field
        // Example:
        $imagePath = $request->file('image')->store('post_images', 'public');
        $post->image = $imagePath;
    }

    // Save the updated post
    $post->save();

    // Redirect with a success message
    return redirect()->route('show_posts')->with('success', 'Post updated successfully');
}


// public function showUpdateForm()
// {
//     $categories = Category::all();
    
//     return view('update_post', ['categories' => $categories]);
   
// }



public function viewPost($id){
    $post = Post::Find($id);
        // Retrieve posts along with their comments
        $posts = Post::with('comments')->get();
    return view('show_posts',compact('post','posts'));
}

public function showPosts(){

    $user = Auth::user();

    $posts = Post::where('user_id',$user->id)->get();
    // $posts = Post::with('comments')->where('user_id', $user->id)->get();

    foreach ($posts as $post) {
        // Fetch comments for each post
        $comments = Comment::where('comment_post_id', $post->post_id)->get();
        // $comments = Comment::all();
        $post->comments = $comments;
    }

    return view('show_posts',['posts' => $posts]);
}

public function viewComment($id){
    $post = Post::Find($id);
   
    return view('comment',compact('post'));
}

public function comment_post(Request $request, $post_id){
// echo "<pre>";
//         print_r($request->all());
//        echo  "<pre>";
          // Validate the incoming request data
    $request->validate([
        'comment' => 'required|string|max:1000',

    ]);
    $user = Auth::user();
        $userid = $user->id; 
    // Find the post by ID
    $postId = $post_id;


    $comment= DB::table('comments')->insert([
        'comment' => $request->input('comment'),

        
        'comment_user_id' => $userid,
        'comment_post_id' => $postId
        
    ]);
    return redirect()->back()->with('success', 'Comment posted successfully.');
}
public function showComment($id)
{
    $post = Post::Find($id);
    $posts = Post::all();
    // Assuming $id is the post ID
    $comments = Comment::where('comment_post_id', $post->id)->get();
    $comments = Comment::all();

    return view('view_comments', compact('comments'));
}



}







