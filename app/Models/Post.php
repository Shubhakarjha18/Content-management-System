<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = ['post_title', 'post_content', 'user_id', 'post_category_id', 'Approval'];

    // Relationships

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define a relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
        return $this->hasMany(Comment::class, 'post_id'); // Make sure 'post_id' is the correct foreign key column
    }
    }
   

