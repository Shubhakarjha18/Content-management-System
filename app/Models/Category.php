<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

      // Define the table associated with the model
 // Assuming your table name is 'categories'
 protected $table = 'categories';

 // Assuming your primary key is 'id'
 protected $primaryKey = 'cat_id';

 // Other properties and methods as needed
 public function user()
    {
        return $this->belongsTo(User::class, 'category_user_id');
    }
     
}
