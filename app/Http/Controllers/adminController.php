<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\AdminUser;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Admin;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function dashboard(){
        $admin = auth()->guard('admin')->user();
     
        return view('admin/admin_home',compact('admin'));
    }

    public function admin_signup(){
        return view('admin/admin_signup');
    }

    public function admin_signup_post(Request $request){
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:admins,admin_email',
            'admin_password' => 'required|min:5',
            'admin_cpassword' => 'required|same:admin_password',
        ]);
        $hashedPassword = Hash::make($request->input('admin_password'));
        $admin = DB::table('admins')->insert([
            'admin_name' => $request->input('admin_name'),
            'admin_email' => $request->input('admin_email'),
            'password' => $hashedPassword,
            
        ]);
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
            'admin_email' => $request->input('admin_email'),
            'password' => $request->input('admin_password'),
        ];
        $remember = $request->input('remember');
    
        // Check if the user exists
      
    
    
            // User exists, check password
            if (Auth::guard('admin')->attempt($credentials, $remember)) {
                // Authentication successful
    
                if (isset($remember) && !empty($remember)) {
                    // Set cookies if "Remember Me" is checked
                    setcookie("admin_email", $request->input('admin_email'), time() + (24 * 3600));
                    setcookie("admin_password", $request->input('admin_password'), time() + (24 * 3600));
                } else {
                    // Clear cookies if "Remember Me" is not checked
                    setcookie("admin_email", "");
                    setcookie("admin_password", "");
                }
   
                // return redirect()->route('admin/admin_home'); // Redirect to admin dashboard after successful login
            }
     
    
        // return back()->withInput($request->only('admin_email', 'remember'))->withErrors(['admin_email' => 'Invalid credentials']);
    }

    public function display_Posts()
    {
        // Check if the user is authenticated before accessing the 'id' property
     
        $posts = Post::orderBy('post_id', 'desc')->get();
    
                foreach ($posts as $post) {
                    $comments = Comment::where('comment_post_id', $post->post_id)->get();
                    $post->comments = $comments;
                }
    
                return view('admin/admin_show_posts', ['posts' => $posts]);
            
        }
    
        // Redirect to the login page or handle unauthorized access as needed
      
    

    public function show_admin_posts(){
        $posts = Post::orderBy('post_id', 'desc')->get();
        foreach ($posts as $post) {
            $user = User::find($post->user_id);
            $post->user_name = $user ? $user->name : 'Unknown User';
    
            $category = Category::find($post->post_category_id);
            $post->category_name = $category ? $category->cat_name : 'Unknown Category';
        }
        return view('admin/admin_posts',compact('posts'));
    }

   public function show_admin_category()
{
    $categories = Category::all();
    // $category = Category::find($id);
    // $categories = Category::where('category_user_id', $id)->get();

    return view('admin/admin_categories', compact('categories'));
}

public function show_admin_comments(){
    $comments = Comment::all();
    return view('admin/admin_comments',compact('comments'));
}

public function showAllUsers()
    {
        $users = User::all();

        return view('admin/all_users', ['users' => $users]);
    }

    public function showAllAdmins()
    {
        $admins = Admin::all();

        return view('admin/admin_users', ['admins' => $admins]);
    }
    public function displayOnlineUsers()
{
    // Set the time limit for considering users as "online" (e.g., within the last 5 minutes)
   

    return view('admin/online_users');
}


public function admin_dashboard(){
    $posts = Post::orderBy('post_id', 'desc')->get();
    $admin = auth()->guard('admin')->user();
    foreach ($posts as $post) {
        $comments = Comment::where('comment_post_id', $post->post_id)->get();
        $post->comments = $comments;
    }

    return view('admin/admin_dashboard',['posts' => $posts, 'admin' => $admin]);
}

public function approve($id)
{
    $post = Post::find($id);

    if (!$post) {
        return abort(404);
    }

    // Update the approval status
    $post->update(['Approval' => 'approved']);

    return redirect()->back()->with('success', 'Post approved successfully');
}


public function update_profile($id)
{
    $admin = Admin::findOrFail($id);
    return view('admin/admin_update_profile', compact('admin'));
}

public function update_profile_post(Request $request, $id){
    $admin = auth()->guard('admin')->user();
    $request->validate([
        'admin_name' => 'required|string|max:255',
        'admin_email' => 'required|email|max:255',
        
        'admin_gender' => 'required',
        'admin_phone' => 'required|digits:10',
        'admin_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        
        'admin_date_of_birth' => 'nullable|date', 
        'admin_qualification' => 'nullable|string|max:255',
        'admin_skills' => 'nullable|string|max:255',
        "admin_description" => 'nullable|string|max:1000',
     ]);
     $admin = Admin::findOrFail($id);

     $admin->admin_name = $request->input('admin_name');
     $admin->admin_email = $request->input('admin_email');
    
     $admin->admin_gender = $request->input('admin_gender');
     $admin->admin_phone = $request->input('admin_phone');
     $admin->admin_date_of_birth = $request->input('admin_date_of_birth');
     $admin->admin_qualification = $request->input('admin_qualification');
     $admin->admin_skills = $request->input('admin_skills');
     $admin->admin_description = $request->input('admin_description');

   // Handle image upload
   if ($request->hasFile('admin_image')) {
    // Get the original filename of the uploaded file
    $originalFilename = $request->file('admin_image')->getClientOriginalName();

    // Store the file with its exact name in the 'profile_images' directory
    $imagePath = $request->file('admin_image')->storeAs('admin_profile_images', $originalFilename, 'public');

    // Save the image path in the user model
    $admin->admin_image = $imagePath;
    
    $imageUrl = '/admin_profile_images/updated/image.jpg';

    // Save changes to the user model
    $admin->save();
    return response()->json(['image_url' => $imageUrl]);
}

}

public function show_admin_profile($id){
    $admin = Admin::findOrFail($id);

    // Display user details
    return view('/admin/admin_show_profile', compact('admin'));
}

public function change_password($id){
    $admin = Admin::find($id);
    
    return view('/admin/admin_change_password', compact('admin'));
}
public function change_password_post(Request $request, $id)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $admin = Admin::find($id);

    if (!$admin) {
        return redirect()->route('admin.dashboard')->with('error', 'Admin not found.');
    }

    // Check if the current password matches the one in the database
    if (!Hash::check($request->current_password, $admin->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the admin's password
    $admin->update([
        'password' => bcrypt($request->new_password),
    ]);

    return redirect()->route('admin_home')->with('success', 'Password changed successfully.');
}

public function show_charts(){
    return view('/admin/admin_charts');
}
// public function updateVisitors()
// {
//     // Assuming you have the visitor record with id and admin_id both equal to 0
//     $userId = 1; // Replace 0 with the actual user ID you want to find

//     $visitor = Visitor::join('users', 'visitors.id', '=', 'users.id')
//                       ->where('users.id', $userId)
//                       ->first();

//     if ($visitor) {
//         // Increment the 'hits' column by 1
//         $visitor->increment('hits');
//         return view('/admin/admin_visitors',compact('visitor'));
//         // Alternatively, you can use the following if you want to increment by a specific value:
//         // $visitor->increment('hits', $value);

//         // Optionally, you can update other columns if needed
//         // $visitor->update([
//         //     'column_name' => 'new_value',
//         //     // Add other columns and values as needed
//         // ]);
//     } else {
//         // Handle the case where the visitor record with id and admin_id both equal to 0 is not found
//     }

//     // Your other logic here
// }


public function updateVisitors()
{
    // Assuming you have the user ID for which you want to update the hits
    $userId = 1; // Replace 1 with the actual user ID you want to find

    // Find the user by ID
    $user = User::find($userId);

    if ($user) {
        // Find or create a visitor record for the user
        $visitor = Visitor::firstOrNew(['id' => $user->id]);

        // Increment the 'hits' column by 1
        $visitor->increment('hits');

        // Save the visitor record
        $visitor->save();

        return view('/admin/admin_visitors', compact('visitor'));
    } else {
        // Handle the case where the user with the specified ID is not found
    }

    // Your other logic here
}

}
    
    
  



