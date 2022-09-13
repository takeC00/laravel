<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'price', 'introduction', 'adress', 'image', 'user_id', 'post_user'];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
