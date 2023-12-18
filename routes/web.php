<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [AuthController::class,'HomePage'])->name('home');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::get('/signup',[AuthController::class,'signUp'])->name('signup');
Route::post('/signup',[AuthController::class,'signUpPost'])->name('signup.post');

Route::get('/updateSeeker',[AuthController::class,'update'])->name('updateSeeker');
Route::post('/updateSeeker',[AuthController::class,'updatePost'])->name('updateSeeker.post');
// // Example route with web middleware
// Route::middleware(['web'])->group(function () {
//     Route::get('/home',[AuthController::class,'loggeduser'] );
// });

Route::get('/logout', function () {
    Auth::logout(); // Logout the currently authenticated user

    // Optionally, you can redirect to a specific page after logout
    return redirect('/login');
})->name('logout'); 


Route::get('/add_post', [AuthController::class,'addpost'])->name('addpost');
Route::post('/add_post', [AuthController::class,'addpost_post'])->name('addpost.post');
Route::get('/categories', [AuthController::class,'addcategory'])->name('addcategory');
Route::post('/categories', [AuthController::class,'addcategoryPost'])->name('addcategory.post');

Route::get('/add_post', [AuthController::class,'showPostForm']);
Route::get('/showProfile', [AuthController::class,'viewProfile']);
Route::get('/showProfile', [AuthController::class,'showprofile']);
