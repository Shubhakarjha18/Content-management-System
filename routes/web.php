<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Middleware\RedirectBasedOnRole;

// ...

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [AuthController::class,'HomePage'])->name('home');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::get('/signup',[AuthController::class,'signUp'])->name('signup');
Route::post('/signup',[AuthController::class,'signUpPost'])->name('signup.post');

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

Route::get('/showprofile', [AuthController::class,'ViewProfile']);
Route::get('/showprofile', [AuthController::class,'showprofile']);
Route::get('/update_post/{post_id}', [AuthController::class,'updatePost']);
Route::post('/update_post/{post_id}', [AuthController::class,'updatePost_post'])->name('update_post.post');
// Route::get('/update_post/{post_id}', [AuthController::class,'showUpdateForm']);




Route::get('/show_posts/{id}', [AuthController::class, 'viewPost'])->name('viewpost');
Route::get('/show_posts', [AuthController::class, 'showPosts'])->name('show_posts');


Route::get('/comment/{post_id}', [AuthController::class,'viewComment'])->name('comment');
Route::post('/comment/{post_id}', [AuthController::class,'comment_post'])->name('comment.post');
Route::get('/view_comments/{post_id}', [AuthController::class,'showComment']);
// Route::get('/show_posts/{id}', [AuthController::class, 'showcomment']);



//admin Routes


Route::middleware(['role.redirect'])->group(function () {
    // Your routes here
    Route::get('/admin/admin_home', [adminController::class,'dashboard'])->name('admin_home');
Route::get('/admin/authenticator', [adminController::class,'authenticator'])->name('admin_auth');
Route::post('/admin/authenticator', [adminController::class,'authenticator_post'])->name('admin_auth.post');
});
Route::get('/logout_admin', function () {
    Auth::logout(); // Logout the currently authenticated user

    // Optionally, you can redirect to a specific page after logout
    return redirect('/admin/authenticator');
})->name('logout.admin'); 