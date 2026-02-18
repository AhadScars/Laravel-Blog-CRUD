<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

protected $fillable = ['title', 'description', 'tags', 'image', 'user_id'];



    
 public function user(){
        return $this->belongsTo(User::class);
    }
}
