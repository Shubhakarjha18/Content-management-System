<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\LogicController;
use App\Http\Middleware\RedirectBasedOnRole;
use App\Http\Middleware\AuthCheckMiddleware;
// ...

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');

Route::get('/signup',[AuthController::class,'signUp'])->name('signup');
Route::post('/signup',[AuthController::class,'signUpPost'])->name('signup.post');

Route::get('/admin/authenticator', [adminController::class, 'authenticator'])->name('admin_auth');
Route::post('/admin/authenticator', [adminController::class, 'authenticator_post'])->name('admin_auth.post');

Route::get('/admin/admin_signup', [adminController::class, 'admin_signup'])->name('admin_signup');
Route::post('/admin/admin_signup', [adminController::class, 'admin_signup_post'])->name('admin_signup.post');
//user middleware

Route::get('/home', [AuthController::class,'HomePage'])->name('home');





Route::get('/updateSeeker',[AuthController::class,'update'])->name('updateSeeker');
Route::post('/updateSeeker',[AuthController::class,'updateProfile'])->name('updateSeeker.post');
// // Example route with web middleware
// Route::middleware(['web'])->group(function () {
//     Route::get('/home',[AuthController::class,'loggeduser'] );
// });

Route::get('/logout', function () {
    Auth::logout(); // Logout the currently authenticated user

    // Optionally, you can redirect to a specific page after logout
    return redirect('/login');
})->name('logout'); 


Route::get('/add_post/{userid}', [AuthController::class,'addpost'])->name('addpost');
Route::post('/add_post', [AuthController::class,'addpost_post'])->name('addpost.post');
Route::get('/categories', [AuthController::class,'addcategory'])->name('addcategory');
Route::post('/categories', [AuthController::class,'addcategoryPost'])->name('addcategory.post');

Route::get('/add_post', [AuthController::class,'showPostForm']);

Route::get('/showprofile/{userId}', [AuthController::class,'ViewProfile']);
Route::get('/showprofile/{userId}', [AuthController::class,'showprofile'])->name('show.profile');
Route::get('/update_post/{post_id}', [AuthController::class,'updatePost']);
Route::post('/update_post/{post_id}', [AuthController::class,'updatePost_post'])->name('update_post.post');
// Route::get('/update_post/{post_id}', [AuthController::class,'showUpdateForm']);




Route::get('/show_posts/{id}', [AuthController::class, 'viewPost'])->name('viewpost');
Route::get('/show_posts', [AuthController::class, 'showPosts'])->name('show_posts');


Route::get('/comment/{post_id}', [AuthController::class,'viewComment'])->name('comment');
Route::post('/comment/{post_id}', [AuthController::class,'comment_post'])->name('comment.post');
Route::get('/view_comments/{post_id}', [AuthController::class,'showComment']);
// Route::get('/show_posts/{id}', [AuthController::class, 'showcomment']);
Route::get('/tables/post_table', [AuthController::class,'view_post_table']);
Route::get('/tables/categories_table', [AuthController::class,'view_categories_table']);
Route::get('/tables/comments_table', [AuthController::class,'view_comments_table']);

Route::get('/posts/{id}', [AuthController::class, 'show']);
Route::get('/show_categories/{id}', [AuthController::class, 'show_category']);
Route::get('/deleted/{id}', [AuthController::class, 'confirmDelete']);
Route::get('/delet/{id}', [AuthController::class, 'catDelete']);
Route::get('/delete/{id}', [AuthController::class, 'commentDelete']);
Route::get('/edit_category/{cat_id}', [AuthController::class,'editCategory']);
Route::post('/edit_category/{cat_id}', [AuthController::class,'editCategory_post'])->name('editcategory.post');

Route::get('/forget_password', [AuthController::class, 'forget_password'])->name('forget.password');
Route::post('/forget_password', [AuthController::class, 'forget_passwordPost'])->name('forget.password.post');
Route::get('/reset_password/{token}', [AuthController::class, 'reset_password'])->name('reset.password');
Route::post('/reset_password', [AuthController::class, 'reset_passwordPost'])->name('reset.password.post');
Route::get('/view_all_posts', [AuthController::class, 'view_all_posts']);






//admin middleware

 

    Route::get('/admin/admin_home', [adminController::class, 'dashboard'])->name('admin_home');
    Route::get('/admin/admin_dashboard', [adminController::class, 'admin_dashboard']);
    
    Route::get('/admin/admin_posts', [adminController::class, 'show_admin_posts']);
    Route::get('/admin/admin_categories', [adminController::class, 'show_admin_category']);
    Route::get('/admin/admin_comments', [adminController::class, 'show_admin_comments']);
    Route::get('/admin/all_users', [adminController::class, 'showAllUsers']);
    Route::get('/admin/admin_users', [adminController::class, 'showAllAdmins']);
    Route::get('/admin/online_users', [adminController::class, 'displayOnlineUsers']);
    Route::post('/approve/{id}', [adminController::class, 'approve'])->name('posts.approve');
    
    Route::get('/logout_admin', function () {
        Auth::logout(); // Logout the currently authenticated user
    
        // Optionally, you can redirect to a specific page after logout
        return redirect('/admin/authenticator');
    })->name('logout.admin'); 
    
    Route::get('/admin/admin_show_posts', [adminController::class, 'display_Posts']);
    Route::get('/admin/admin_update_profile/{id}',[adminController::class,'update_profile'])->name('updateAdmin');
    Route::post('/admin/admin_update_profile/{id}',[adminController::class,'update_profile_post'])->name('updateprofile.post');
    Route::get('/admin/admin_show_profile/{id}',[adminController::class,'show_admin_profile'])->name('showprofile.admin');
    Route::get('/admin/admin_change_password/{id}', [adminController::class, 'change_password'])->name('admin.change.password.form');
    Route::post('/admin/admin_change_password/{id}', [adminController::class, 'change_password_post'])->name('admin.change.password.post');
    Route::get('/admin/admin_charts', [adminController::class, 'show_charts'])->name('show.charts');
    Route::get('/admin/admin_charts', [LogicController::class, 'count_All']);
    Route::get('/admin/admin_visitors', [adminController::class, 'updateVisitors'])->name('update.visit');