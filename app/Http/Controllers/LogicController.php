<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Visitor;

class LogicController extends Controller
{
    public function count_All(){
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $totalComments = Comment::count();
        $totalAdmins = Admin::count();
        $totalHits = Visitor::sum('hits');
        // You can now use $totalUsers as the count of total users
        return view('/admin/admin_charts', compact('totalUsers','totalPosts','totalCategories','totalComments','totalAdmins','totalHits'));
    }
   
}
